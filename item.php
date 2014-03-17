<?php
    /*
     *      Osclass – software for creating and publishing online classified
     *                           advertising platforms
     *
     *                        Copyright (C) 2013 OSCLASS
     *
     *       This program is free software: you can redistribute it and/or
     *     modify it under the terms of the GNU Affero General Public License
     *     as published by the Free Software Foundation, either version 3 of
     *            the License, or (at your option) any later version.
     *
     *     This program is distributed in the hope that it will be useful, but
     *         WITHOUT ANY WARRANTY; without even the implied warranty of
     *        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *             GNU Affero General Public License for more details.
     *
     *      You should have received a copy of the GNU Affero General Public
     * License along with this program.  If not, see <http://www.gnu.org/licenses/>.
     */

    // meta tag robots
    osc_add_hook('header','bender_follow_construct');

    osc_enqueue_script('fancybox');
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('jquery-validate');

    bender_add_body_class('item');
    osc_add_hook('after-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('item-sidebar.php');
    }

    $location = array();
    if( osc_item_city_area() !== '' ) {
        $location[] = osc_item_city_area();
    }
    if( osc_item_city() !== '' ) {
        $location[] = osc_item_city();
    }
    if( osc_item_region() !== '' ) {
        $location[] = osc_item_region();
    }
    if( osc_item_country() !== '' ) {
        $location[] = osc_item_country();
    }

    osc_current_web_theme_path('header.php');
?>
<div class="page">
  <section class="wrapper result_outer">
    <section class="product_box">
      <?php  if( osc_images_enabled_at_items() ) { ?>
      <?php
        if( osc_count_item_resources() > 0 ) {
            $i = 0;
        ?>
      <article class="product_detail">
        <a href="<?php echo osc_resource_url(); ?>" class="main-photo" rel="image_group" title="<?php _e('Image', 'bender'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
          <!--<img src=""<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />-->
          <img src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />

        </a>
        <ul>
          <?php for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
          <li>
            <a href="<?php echo osc_resource_url(); ?>" rel="image_group" title="<?php _e('Image', 'bender'); ?> <?php echo $i+1;?> / <?php echo osc_count_item_resources();?>">
              <img src="<?php echo osc_resource_thumbnail_url(); ?>" width="75" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
            </a>
          </li>
          <?php } ?>
        </ul>
      </article>
      <?php }}?>
      <div class="top_right_slider theme-default">
        <div id="slider" class="nivoSlider">
          <img src="/playandbay/oc-content/themes/isha/images/banner.png" />
        </div>
      </div>

      <div class="clear"></div>

      <div class="desc_cont">
        <article class="product_detail_text">
          <div class="divheading">
            <h1>
              <?php echo osc_item_title() . ' ' . osc_item_city(); ?>
            </h1>
            <h2>
              <?php if ( osc_item_pub_date() !== '' ) { printf( __('<strong class="publish">Published date</strong>: %1$s', 'bender'), osc_format_date( osc_item_pub_date() ) ); } ?>
              <br>

                <b>
                  <?php _e("Location", 'bender'); ?>:
                </b> <?php echo implode(', ', $location); ?>:

              </h2>
          </div>
          <div class="divqrcode">
            <img src="/playandbay/oc-content/themes/isha/images/qrcode.jpg" />
            <!--<?php show_qrcode(); ?>-->
          </div>
          <div class="clear"></div>
          <?php if( osc_price_enabled_at_items() ) { ?>
          <?php bender_draw_dropdown(); ?>
          <?php } ?>

          <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
          <p id="edit_item_view">
            <strong>
              <a href=""
                <?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?>
              </a>
            </strong>
          </p>
          <?php } ?>
          <div class="clear"></div>
          <!--<div class="descheading">Description</div>-->
          <p class="description">
            <?php echo osc_item_description(); ?>
          </p>



          <?php if( osc_count_item_meta() >= 1 ) { ?>
          <br />
          <h3>
            <?php while ( osc_has_item_meta() ) { ?>
            <?php if(osc_item_meta_value()!='') { ?>
            <b>
              <?php echo osc_item_meta_name(); ?>:
            </b>
            <?php echo osc_item_meta_value(); ?>
            <?php } ?>
            <?php } ?>
          </h3>
          <?php } ?>
          <div class="views">
            <?php echo osc_item_views() ;  ?>
            <?php _e('views', 'bender'); ?>
          </div>
          <div class="ratings">
            <?php osc_run_hook('item_detail', osc_item() );  ?>
            <!--<?php echo osc_item_views() ;  _e('views', 'bender'); ?>
          <?php _e('views', 'bender'); ?>-->
          </div>
          <!--<div class="view">
          <?php echo osc_item_views() ; ?>
          <?php _e('views', 'bender'); ?>
        </div>-->
          <p class="contact_button">
            <?php if( !osc_item_is_expired () ) { ?>
            <?php if( !( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) ) { ?>
            <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
            <a href="#contact" class="ui-button ui-button-middle ui-button-main resp-toogle">
              <?php _e('Contact seller', 'bender'); ?>
            </a>
            <?php     } ?>
            <?php     } ?>
            <?php } ?>
            <?php watchlist(); ?>
            <?php osclass_pm_link(); ?>
            <a href=""
              <?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="ui-button ui-button-middle"><?php _e('Share', 'bender'); ?>
            </a>
          </p>
          <?php osc_run_hook('location'); ?>

        </article>

      </div>
      <div class="right_contact">
        <?php osc_current_web_theme_path('item-sidebar.php');?>
      </div>
      <div class="clear"></div>
      <?php if( osc_comments_enabled() ) { ?>
      <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
      <div class="comment_area">
        <h2>
          <?php _e('Comments', 'bender'); ?>
        </h2>
        <ul id="comment_error_list"></ul>
        <?php CommentForm::js_validation(); ?>
        <?php if( osc_count_item_comments() >= 1 ) { ?>
        <div class="comments_list">
          <?php while ( osc_has_item_comments() ) { ?>
          <div class="comment">
            <h3>
              <strong>
                <?php echo osc_comment_title(); ?>
              </strong>
              <em>
                <?php _e("by", 'bender'); ?> <?php echo osc_comment_author_name(); ?>:
              </em>
            </h3>
            <p>
              <?php echo nl2br( osc_comment_body() ); ?>
            </p>
            <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
            <p>
              <a rel="nofollow" href=""
                <?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bender'); ?>"><?php _e('Delete', 'bender'); ?>
              </a>
            </p>
            <?php } ?>
          </div>
          <?php } ?>
          <div class="paginate" style="text-align: right;">
            <?php echo osc_comments_pagination(); ?>
          </div>
        </div>
        <?php } ?>
        <h2>
          <?php _e('Leave your comment (spam and offensive messages will be removed)', 'bender'); ?>
        </h2>
        <form action=""
          <?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
          <input type="hidden" name="action" value="add_comment" />
          <input type="hidden" name="page" value="item" />
          <input type="hidden" name="id" value=""<?php echo osc_item_id(); ?>" />
          <?php if(osc_is_web_user_logged_in()) { ?>
          <input type="hidden" name="authorName" value=""<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
          <input type="hidden" name="authorEmail" value=""<?php echo osc_logged_user_email();?>" />
          <?php } else {?>
          <?php CommentForm::author_input_text(); ?>
          <?php CommentForm::email_input_text(); ?>
          <?php }; ?>
          <?php CommentForm::body_input_textarea(); ?>
          <div class="clear"></div>
          <button class="share" type="submit">
            <?php _e('Submit', 'bender'); ?>
          </button>
        </form>
      </div>
      <?php } ?>
      <?php } ?>

    </section>
    <?php related_listings(); ?>



    <div class="clear"></div>



  </section>

  <div class="clear"></div>
</div>
<div class="relatedlistings_box">
  <section class="related_box">
    <?php if( osc_count_items() > 0 ) { ?>
    <aside class="related_list">
      <h1>
        <?php _e('Related listings', 'bender'); ?>
      </h1>
      <?php
          $i = 0;
          while(osc_has_items()) { $i++; ?>
      <?php
                 $class = false;
                 if($i%4 == 0){
                    $class = 'last';
                 }
                 bender_draw_item_search($class); ?>
      <?php } ?>
    </aside>
    <?php } ?>


    <div class="clear"></div>
  </section>
</div>
<div class="comments_manbox">
  <div class="container">
    <div class="row">
      <div class="span12">
        <h4>Comments</h4>
        <form class="contect_form_box" method="get" action="">
          <input type="text" class="contect_form_input contect_form_mar" name="">
            <input type="text" class="contect_form_input" name="">
              <textarea class="contect_form_textarea" rows="" cols="" name=""></textarea>
              <!--<input type="button" class="submit_botton_div" value="Submit" name="">-->
              <div class="botton_div1">
                <a href="#">Submit</a>
              </div>
         </form>
      </div>
    </div>
  </div>
</div>


<!--<?php osc_current_web_theme_path('footer.php') ; ?>-->
<div id="jp_popup_wrap" style="display: none;"></div>
<div id="jp_popup" style="margin-left: -225px; display: none;">

  <div id="mailchimp_subscribe_form">
    <div id="mailchimp_subscribe">
      <div id="mailchimp_subscribe_content">

        <a id="jpmail_subscribe_close" onclick="$('#jp_popup_wrap').css('display', 'none');$('#jp_popup').css('display', 'none');" href="#"></a>
        <div class="clear"></div>


        <div style="font-weight:700!important;font-size:18px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;margin-top: -10px;">
          Now shipping to <span style="color:#61BA46">India</span>
        </div>
        <div style="font-weight:100!important;font-size:12px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;border-bottom:solid 1px #eee;margin-bottom:20px;">
          Fast Shipping. Low Shipping Rates.<br>Secure Checkout. 14-Day Returns</div>
        <div class="jpsubscribe_title" style="padding:0px;">
          <div style="padding:10px;height:42px;">
            <h1>Sign up and Save!</h1>
          </div>
        </div>

        <div class="clear"></div>
        <form action="" method="post" name="login_form" onsubmit="return false;">
          <div style="padding:0 10px;">
            <div style="width:275px;margin:0 auto;">
              <p style="font-size:14px;font-weight:700 !important:color:#555;">Receive email-only deals, special offers, product exclusives, contests, news &amp;more!</p>
            </div>
            <div class="clear"></div>

            <div>
              <input id="sub_email" type="text" name="sub_email" style="color: rgb(204, 204, 204); font-weight: normal;" value="" autocomplete="off">

                <div class="new_popup_submit_button" onclick="$(this).getForm().sendRequest('on_action',{update: {'mailchimp_subscribe_form':'jp_newsletter_popup'}, onAfterUpdate: function() {_gaq.push(['_trackEvent', 'Subscription', 'Emails', 'Newletter PopUp']);}})" href="javascript:void(0)"></div>
                <div class="clear" style="height:20px;"></div>
              </div>
            <input type="hidden" name="redirect" value="http://jadopado.com/product/JP00005719/apple-iphone-5c-32gb-white">
    </div>

          <div class="clear"></div>
        </form>

      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<script language="javascript">
  window.onload = load();
  function load() {

  setTimeout(function(){$('#jp_popup').show();$('#jp_popup_wrap').show();},10000);
  }
</script>
