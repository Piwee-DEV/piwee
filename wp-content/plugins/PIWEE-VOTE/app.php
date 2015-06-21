<?php
/*
Plugin Name: PIWEE Vote Module
Plugin URI: http://alexandrenguyen.fr
Description: Vote module FOR PIWEE
Version: 1.0
Author: Alexandre Nguyen
Author URI: http://alexandrenguyen.fr
License: Copyright 2014  Alexandre Nguyen  (email : alex.nr@hotmail.co.jp)

        This program is free software; you can redistribute it and/or modify
        it under the terms of the GNU General Public License, version 2, as
        published by the Free Software Foundation.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program; if not, write to the Free Software
        Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

register_activation_hook( __FILE__, 'registerTables');
add_action( 'admin_menu', 'register_vote_page' );


function register_vote_page(){
    add_menu_page( 'PIWEE Vote', 'PIWEE Vote', 'manage_options', 'vote_page', 'vote_page', plugins_url('images/logo-piwee.jpg' , __FILE__), null );
}

function vote_page() {

    global $wpdb;

    if (isset($_POST['name'])) { //add
        
        addVoteChoice($_POST['name']);

    }

    if (isset($_POST['choice_id'])) { //delete
        
        deleteVoteChoice($_POST['choice_id']);
    }

    ?>

    <h3>Ajouter un nouveau choix de vote</h3>
    <form action="#" method="POST">
        <input type="text" name="name" placeholder="Nouveau choix de vote" required>
        <input type="submit" value="Ajouter" class="button">
    </form>

    <?php 

        $choices = getChoices();

        foreach ($choices as $choice) {

            ?>

            <p>
                <?php echo $choice->name ?>
                <form action="#" method="POST">
                    <input type="hidden" name="choice_id" value="<?php echo $choice->id ?>">
                    <input type="submit" value="Supprimer" class="button" onclick="return confirm('Voulez-vous vraiment supprimer cette entrée ?');">
                </form>
            </p>

            <hr>

            <?php
        }

    ?>

    <?php

}

function deleteVoteChoice($id) {

    global $wpdb;

    $wpdb->query($wpdb->prepare("DELETE FROM wp_piwee_vote_field WHERE id = %d", $id));

}

function addVoteChoice($name) {

    global $wpdb;

    $wpdb->query($wpdb->prepare("INSERT INTO wp_piwee_vote_field(name) VALUES(%s)", array($name)));

}

function getChoices() {

    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM  wp_piwee_vote_field");

    return $result;
}

function registerTables() {

    global $wpdb;
    
    $wpdb->query("CREATE TABLE IF NOT EXISTS `wp_piwee_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `vote_field_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

    $wpdb->query("CREATE TABLE IF NOT EXISTS `wp_piwee_vote_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

}


//frotend voting system

add_action("wp_ajax_nopriv_my_user_vote", "my_user_vote", 10, 3);
add_action("wp_ajax_nopriv_get_vote_post_choice", "getVoteCountByPostAndChoice", 10, 3);

function my_user_vote() {

   $response = new stdClass;

   $choice_id = $_REQUEST['choice_id'];
   $post_id = $_REQUEST['post_id'];

   vote($post_id, $choice_id);

   $response->result = "ok";

   echo json_encode($response);

   die();

}

function vote($post_id, $choice_id) {

    global $wpdb;
    
    $wpdb->query("INSERT INTO wp_piwee_vote(post_id, vote_field_id, datetime) VALUES($post_id, $choice_id, '" . date("Y-m-d H:i:s") . "')");

}

function getVoteCountByPostAndChoice() {

    global $wpdb;
    
    $choice_id = $_REQUEST['choice_id'];
    $post_id = $_REQUEST['post_id'];

    $entries = $wpdb->query("SELECT * FROM wp_piwee_vote WHERE post_id = " . $post_id . " AND vote_field_id = " . $choice_id);

    echo $entries;

    die();

}

add_action('wp_head', 'registerVotingJS');

function registerVotingJS(){
    
    ?>
    <script type="text/javascript">

        function PiweeVote(post_id, choice_id) {

            if (!(jQuery.cookie("piwee_vote_post_" + post_id) > 0)) {

             jQuery.ajax({
                 type : "POST",
                 url : "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                 data : { action: "my_user_vote", post_id : post_id, choice_id: choice_id },
                 success: function(response) {

                    response = JSON.parse(response);

                    if (response.result == "ok") {
                        LoadVoteCount(post_id, choice_id);
                        jQuery("#vote-display-ok").show("fast");
                        jQuery.cookie("piwee_vote_post_" + post_id, choice_id);
                    }

                 }
              });
    
            }

        }

    </script>

    <script type="text/javascript">

        function LoadVoteCount(post_id, choice_id) {

             jQuery.ajax({
                 type : "POST",
                 url : "<?php echo admin_url( 'admin-ajax.php' ) ?>",
                 data : { action: "get_vote_post_choice", post_id : post_id, choice_id: choice_id },
                 success: function(response) {
                
                    jQuery("#count-vote-" + choice_id).html(response);

                 }
              });

        }

    </script>
<?php
}


