<?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<?php /* <article class="list_result">
  <figure>
  <?php if (osc_images_enabled_at_premiums()) { ?>
  <?php if (osc_count_premium_resources()) { ?>
  <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_premium_title(); ?>" width="108" height="97">
  <?php } else { ?>
  <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_premium_title(); ?>" width="108" height="97">
  <?php } ?>
  <?php } ?>
  <?php bender_draw_dropdown(); ?>

  </figure>
  <div class="list_textbox">
  <h1><a href="<?php echo osc_premium_url(); ?>" ><?php echo osc_premium_title(); ?>(<?php echo osc_premium_category(); ?>)</a></h1>
  <h3><a href="<?php echo osc_premium_url(); ?>" ><?php echo osc_item_city(); //osc_item()['s_city']; ?> - (<?php echo osc_premium_region(); ?>) - <?php echo osc_format_date(osc_premium_pub_date()); ?>.</a></h3>
  <p><?php echo osc_highlight(strip_tags(osc_premium_description()), 250); ?></p>
  </div>
  <div class="clear"></div>

  <div class="clear"></div>
  <?php if ($admin) { ?>
  <span class="admin-options">
  <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow"><?php _e('Edit premium', 'bender'); ?></a>
  <span>|</span>
  <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_premium_delete_url(); ?>" ><?php _e('Delete', 'bender'); ?></a>
  <?php if (osc_premium_is_inactive()) { ?>
  <span>|</span>
  <a href="<?php echo osc_premium_activate_url(); ?>" ><?php _e('Activate', 'bender'); ?></a>
  <?php } ?>
  </span>
  <?php } ?>

  </article>
 */ ?>
<li>
    <article class="listings">
        <a href="<?php echo osc_premium_url(); ?>">
            <figure>
                <?php // if (osc_images_enabled_at_premiums()) { ?>
                <?php if (osc_count_premium_resources()) { ?>
                    <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_premium_title(); ?>" width="108" height="97">
                <?php } else { ?>
                    <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_premium_title(); ?>" width="108" height="97">
                <?php } ?>
                <?php //} ?>
            </figure>
        </a>
        <div class="rytttlist">
            <div class="ztxt"><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_premium_title(); ?></a></div>

            <p><a href="<?php echo osc_premium_url(); ?>"><?php echo osc_highlight(strip_tags(osc_premium_description()), 250); ?></a></p>
        </div>
        <div class="clear"></div>
        <div class="price">
            <a class="MCtooltip dte"><?php echo osc_item_city(); ?> - <?php echo osc_format_date(osc_premium_pub_date()); ?></a>
            <?php bender_draw_dropdown(); ?>
            <div class="clear"></div>

            <!--1900 yp.-->
        </div>
        <div class="clear"></div>
        <?php if ($admin) { ?>
            <span class="admin-options">
                <a href="<?php echo osc_premium_edit_url(); ?>" rel="nofollow"><?php _e('Edit premium', 'bender'); ?></a>
                <span>|</span>
                <a class="delete" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_premium_delete_url(); ?>" ><?php _e('Delete', 'bender'); ?></a>
                <?php if (osc_premium_is_inactive()) { ?>
                    <span>|</span>
                    <a href="<?php echo osc_premium_activate_url(); ?>" ><?php _e('Activate', 'bender'); ?></a>
                <?php } ?>
            </span>
        <?php } ?>
    </article>
</li>