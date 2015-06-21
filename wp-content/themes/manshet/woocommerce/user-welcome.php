<?php global $bd_data, $woocommerce, $current_user; ?>
<p class="myaccount_user">
	<span class="myaccount_user_container">
		<span class="username">
		<?php
		printf(
			__( 'Hello, %s:', 'bd' ),
			$current_user->display_name
		);
		?>
		</span>
		<span class="view-cart">
			<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id')); ?>"><?php _e('View Cart', 'bd'); ?></a>
		</span>
	</span>
</p>