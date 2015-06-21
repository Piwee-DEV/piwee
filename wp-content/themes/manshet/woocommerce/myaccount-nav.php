<?php global $woocommerce; ?>
<ul class="woocommerce-side-nav">
	<li class="<?php if(is_page(get_option('woocommerce_view_order_page_id')) || is_page(get_option('woocommerce_myaccount_page_id'))) { echo 'active'; } ?>">
		<a href="<?php echo get_permalink(get_option('woocommerce_view_order_page_id')); ?>">
			<?php _e('View Orders' , 'bd'); ?>
		</a>
	</li>
	<li class="<?php if(is_page(get_option('woocommerce_edit_address_page_id'))) { echo 'active'; } ?>">
		<a href="<?php echo get_permalink(get_option('woocommerce_edit_address_page_id')); ?>">
			<?php _e('Change Address' , 'bd'); ?>
		</a>
	</li>
	<li class="<?php if(is_page(get_option('woocommerce_change_password_page_id'))) { echo 'active'; } ?>">
		<a href="<?php echo get_permalink(get_option('woocommerce_change_password_page_id')); ?>">
			<?php _e('Change Password' , 'bd'); ?>
		</a>
	</li>
</ul>