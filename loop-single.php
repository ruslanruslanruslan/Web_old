<?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<div class="inner_listing">
    <?php if( osc_images_enabled_at_items() ) { ?>
        <?php if(osc_count_item_resources()) { ?>
           <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="82" height="68">
        <?php } else { ?>
           <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="82" height="68">
        <?php } ?>
    <?php } ?>
<div class="listing_text">
                    	 <h2><a href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><?php echo osc_item_title() ; ?></a></h2>
                        <p><a href="<?php echo osc_item_url() ; ?>"><?php echo osc_item_category() ; ?> - <?php echo osc_item_city(); ?> (<?php echo osc_item_region(); ?>) - <?php echo osc_format_date(osc_item_pub_date()); ?>
						<?php if( osc_price_enabled_at_items() ) { echo osc_format_price(osc_item_price()); } ?></a><br><br>
						<a href="<?php echo osc_item_url() ; ?>"><?php echo osc_highlight( strip_tags( osc_item_description()) ,250) ; ?></a></p>
                    </div>
					<div class="clear"></div>
					<?php if($admin){ ?>
                    <span class="admin-options">
                        <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?></a>
                        <span>|</span>
                        <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'bender'); ?></a>
                        <?php if(osc_item_is_inactive()) {?>
                        <span>|</span>
                        <a href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bender'); ?></a>
                        <?php } ?>
                    </span>
                <?php } ?>
</div>
