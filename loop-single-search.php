<?php $size = explode('x', osc_thumbnail_dimensions()); ?>
<!--<article class="list_result">
  <figure>
    <?php if( osc_images_enabled_at_items() ) { ?>
    <?php if(osc_count_item_resources()) { ?>
    <img src=""<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="108" height="110">
    <?php } else { ?>
    <img src=""<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="108" height="110">
    <?php } ?>
    <?php } ?>
    <?php bender_draw_dropdown(); ?>

  </figure>
  <div class="list_textbox">
    <h1>
      <a href=""
        <?php echo osc_item_url() ; ?>" ><?php echo osc_item_title() ; ?>(<?php echo osc_item_category() ; ?>)
      </a>
    </h1>
    <h3>
      <a href=""
        <?php echo osc_item_url() ; ?>" ><?php echo osc_item_city(); //osc_item()['s_city'];?> - (<?php echo osc_item_region(); ?>) - <?php echo osc_format_date(osc_item_pub_date()); ?>.
      </a>
    </h3>
    <p>
      <?php echo osc_highlight( strip_tags( osc_item_description()) ,250) ; ?>
    </p>
  </div>
  <div class="clear"></div>

  <div class="clear"></div>
  <?php if($admin){ ?>
  <span class="admin-options">
    <a href=""
      <?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?>
    </a>
    <span>|</span>
    <a class="delete" onclick="javascript:return confirm('"
      <?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'bender')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'bender'); ?>
    </a>
    <?php if(osc_item_is_inactive()) {?>
    <span>|</span>
    <a href=""
      <?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'bender'); ?>
    </a>
    <?php } ?>
  </span>
  <?php } ?>

</article>-->


<div class="rsearch">
  <div class="left_photo">
    <figure>
      <!--<img src="http://playandbay.com/oc-content/uploads/109841_thumbnail.jpg"></img>-->
      <?php if( osc_images_enabled_at_items() ) { ?>
      <?php if(osc_count_item_resources()) { ?>
      <img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="108" height="110">
      <?php } else { ?>
      <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="108" height="110">
      <?php } ?>
      <?php } ?>

    </figure>
  </div>
  <div class="right_content">
    <h4>
      <a href=""
        <?php echo osc_item_url() ; ?>" ><?php echo osc_item_title() ; ?>(<?php echo osc_item_category() ; ?>)
      </a>
    </h4>
    <p>
      <?php echo osc_highlight( strip_tags( osc_item_description()) ,250) ; ?>
    </p>
    <!--<div class="price">
      <?php bender_draw_dropdown(); ?>
      --><!--1900 yp.--><!--
    </div>-->
  </div>
  <!--<div class="bottom">
    <span>
      <?php bender_draw_dropdown(); ?>
    </span>
    <span class="citycoutnry">
      <a href="<?php echo osc_item_url() ; ?>" ><?php echo osc_item_city(); //osc_item()['s_city'];?> - (<?php echo osc_item_region(); ?>) - <?php echo osc_format_date(osc_item_pub_date()); ?>.
      </a>
    </span>
  </div>-->
  <div class="mctooltip_box">
    <span>7399 руб. </span>
    <span>
      <select name="">
        <option>Other Currencies</option>
        <option>376 EUR</option>
        <option>314 GBP</option>
        <option>4818 UAH</option>
        <option>521 USD</option>
      </select>
    </span>
    <span class="florida_right_bor">Florida - Feruary 14, 2014</span>
  </div>
</div>

