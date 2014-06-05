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
osc_add_hook('header', 'bender_follow_construct');

osc_enqueue_script('fancybox');
osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
osc_enqueue_script('jquery-validate');

bender_add_body_class('item');
osc_add_hook('after-main', 'sidebar');

function sidebar() {
    osc_current_web_theme_path('item-sidebar.php');
}

$location = array();
if (osc_item_city_area() !== '') {
    $location[] = osc_item_city_area();
}
if (osc_item_city() !== '') {
    $location[] = osc_item_city();
}
if (osc_item_region() !== '') {
    $location[] = osc_item_region();
}
if (osc_item_country() !== '') {
    $location[] = osc_item_country();
}

osc_current_web_theme_path('header.php');
?>
<!-- Add fancyBox main JS and CSS files -->


<script type="text/javascript" src="http://playandbay.com/betaPlayandBay2/oc-content/themes/isha/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link href="http://playandbay.com/betaPlayandBay2/oc-content/themes/isha/fancybox/jquery.fancybox.css?v=2.1.5" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    $(document).ready(function() {
<!--$('.fancybox').fancybox();-->
        $(".fancybox")
                .attr('rel', 'gallery')
                .fancybox({
            padding: 0
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        // For Previus Next slider
        var imagewidth = '60'; //$j('.visible-area').width();
        var totalimages = '7';
        var visibleimages = '3';
        var sliderwidth = imagewidth * totalimages;


        $('.slider').css({'width': sliderwidth});
        //alert(sliderwidth);
        var count = 0;

        $('.Next').click(function() {
            // alert('next clicked');
            if (count < totalimages - visibleimages) {
                $('.Next').css({'disable': false});
                count = count + 1;

            }

            else {

                $('.Next').css({'disable': true});
                return false;

            }

            var sliderposition = count * imagewidth;
            $('.slider').animate({'left': -sliderposition}, 1000);
            return false;
        });

        $('.Prev').click(function() {

            if (count >= 1)
            {
                count = count - 1;
            }

            var sliderposition = count * imagewidth;
            $('.slider').animate({'left': -sliderposition}, 1000);
            return false;
        });

    });



</script>
<!--<script type="text/javascript">
  $(document).ready(function () {
  $('.MCtooltip').closest("span").hide();
  $('.MCtooltip').hover(function () {
  //$(this).closest("span").show('slow');
  
  $(this).parent().nextAll("span").slideToggle("slow");
  });
  });
</script>-->
<div class="page">
    <section class="wrapper result_outer">
        <section class="product_box">
            <?php if (osc_images_enabled_at_items()) { ?>
                <?php
                if (osc_count_item_resources() > 0) {
                    $i = 0;
                    ?>
                    <article class="product_detail">
                        <a href="<?php echo osc_resource_original_url(); ?>" class="main-photo fancybox" rel="image_group" title="<?php _e('Image', 'bender'); ?> <?php echo $i + 1; ?> / <?php echo osc_count_item_resources(); ?>">
                            <img src="<?php echo osc_resource_preview_url(); ?>" alt="<?php echo osc_item_title(); ?>"   title="<?php echo osc_item_title(); ?>" id="headimg" />
                        </a>
                        <?php if (osc_count_item_resources() > 5) { ?>
                            <div>
                                <a class="Prev" href="#"></a>
                            </div>
                        <?php } ?>
                        <?php if (osc_count_item_resources() > 5) { ?>
                            <div class="visible-area" style="width:180px">
                            <?php } else { ?>
                                <div class="visible-area" style="width:310px">
                                <?php } ?>

                                <ul class="slider">
                                    <?php for ($i = 0; osc_has_item_resources(); $i++) { ?>
                                        <li>
                                            <a  class="fancybox" href="<?php echo osc_resource_original_url(); ?>"  data-fancybox-group="gallery" rel="image_group" title="<?php _e('Image', 'bender'); ?> <?php echo $i + 1; ?> / <?php echo osc_count_item_resources(); ?>">
                                                <img id="<?php echo osc_resource_original_url(); ?>" src="<?php echo osc_resource_thumbnail_url(); ?>"  alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>"   data-fancybox-group="gallery"/>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php if (osc_count_item_resources() > 5) { ?>
                                <div>
                                    <a class="Next" href="#"></a>
                                </div>
                            <?php } ?>
                    </article>
                    <?php
                }
            }
            ?>
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
                            <?php
                            if (osc_item_pub_date() !== '') {
                                printf(__('<strong class="publish">Published date</strong>: %1$s', 'bender'), osc_format_date(osc_item_pub_date(), 'F d, Y H:i'));
                            }
                            ?>
                            <br>

                            <b>
                                <?php _e("Location", 'bender'); ?>:
                            </b> <?php echo implode(', ', $location); ?>:

                        </h2>

                        <?php if (osc_price_enabled_at_items()) { ?>
                            <?php bender_draw_dropdown(); ?>
                        <?php } ?>

                    </div>
                    <div class="divqrcode">

                        <?php show_qrcode(); ?>
                    </div>
                    <div class="clear"></div>


                    <?php if (osc_is_web_user_logged_in() && osc_logged_user_id() == osc_item_user_id()) { ?>
                        <p id="edit_item_view">
                            <strong>
                                <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?>
                                </a>
                            </strong>
                        </p>
                    <?php } ?>
                    <div class="clear"></div>
                    <!--<div class="descheading">Description</div>-->
                    <p class="description">
                        <?php echo osc_item_description(); ?>
                    </p>



                    <?php if (osc_count_item_meta() >= 1) { ?>
                        <br />
                        <h3>
                            <?php while (osc_has_item_meta()) { ?>
                                <?php if (osc_item_meta_value() != '') { ?>
                                    <b>
                                        <?php echo osc_item_meta_name(); ?>:
                                    </b>
                                    <?php echo osc_item_meta_value(); ?>
                                <?php } ?>
                            <?php } ?>
                        </h3>
                    <?php } ?>
                    <div class="views">
                        <?php echo osc_item_views(); ?>
                        <?php _e('views', 'bender'); ?>
                    </div>
                    <div class="ratings">
                        <?php osc_run_hook('item_detail', osc_item()); ?>
                        <!--<?php
                        echo osc_item_views();
                        _e('views', 'bender');
                        ?>
                        <?php _e('views', 'bender'); ?>-->
                    </div>
                    <!--<div class="view">
                    <?php echo osc_item_views(); ?>
                    <?php _e('views', 'bender'); ?>
                  </div>-->
                    <p class="contact_button">
                        <?php if (!osc_item_is_expired()) { ?>
                            <?php if (!( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 )) { ?>
                                <?php if (osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact()) { ?>
                                    <?php osclass_pm_link(); ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <?php watchlist(); ?>
                        <a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="ui-button ui-button-middle"><?php _e('Share', 'bender'); ?>
                        </a>
                    </p>
                    <?php osc_run_hook('location'); ?>

                </article>

            </div>
            <div class="right_contact">
                <?php osc_current_web_theme_path('item-sidebar.php'); ?>
            </div>


        </section>
        <?php related_listings(); ?>



        <div class="clear"></div>



    </section>

    <div class="clear"></div>
</div>
<div class="relatedlistings_box">
    <section class="related_box">
        <?php if (osc_count_items() > 0) { ?>
            <aside class="related_list">
                <h1><?php _e('Related listings', 'bender'); ?></h1>
                <?php
                $i = 0;
                while (osc_has_items()) {
                    $i++;
                    ?>
                    <?php
                    $class = false;
                    if ($i % 4 == 0) {
                        $class = 'last';
                    }
                    bender_draw_item_search($class);
                    ?>
                <?php } ?>

            </aside>
        <?php } ?>


        <div class="clear"></div>
    </section>
</div>
<div class="clear"></div>
<?php if (osc_comments_enabled()) { ?>
    <?php if (osc_reg_user_post_comments() && osc_is_web_user_logged_in() || !osc_reg_user_post_comments()) { ?>
        <div class="clear"></div>
        <div class="comments_manbox">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <h4><?php _e('Comments', 'bender'); ?></h4>
                        <ul id="comment_error_list"></ul>
                        <?php CommentForm::js_validation(); ?>
                        <div class="row_cols">
                            <div class="rcol">
                                <h4>
                                    <?php _e('Leave your comment (spam and offensive messages will be removed)', 'bender'); ?>
                                </h4>
                                <form class="contect_form_box" action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                                    <input type="hidden" name="action" value="add_comment" />
                                    <input type="hidden" name="page" value="item" />
                                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                                    <?php if (osc_is_web_user_logged_in()) { ?>
                                        <input type="hidden" name="authorName" value="<?php echo osc_esc_html(osc_logged_user_name()); ?>" />
                                        <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email(); ?>" />
                                    <?php } else { ?>
                                        <?php CommentForm::author_input_text(); ?>
                                        <?php CommentForm::email_input_text(); ?>
                                    <?php }; ?>
                                    <?php CommentForm::body_input_textarea(); ?>
                                    <!-- input type="text" class="contect_form_input contect_form_mar" name="">
                                    <input type="text" class="contect_form_input" name="">
                                    <!-- textarea class="contect_form_textarea" rows="" cols="" name=""></textarea>
                                    <!--<input type="button" class="submit_botton_div" value="Submit" name="">-->
                                    <div class="clear"></div>
                                    <div class="botton_div1">
                                        <button type="submit">
                                            <?php _e('Submit', 'bender'); ?>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="rcol rcolof">
                                <?php if (osc_count_item_comments() >= 1) { ?>
                                    <div class="comments_list">
                                        <?php while (osc_has_item_comments()) { ?>
                                            <div class="comment">
                                                <h4>
                                                    <strong>
                                                        <?php echo osc_comment_title(); ?>
                                                    </strong>
                                                    <?php _e("by", 'bender'); ?> <?php echo osc_comment_author_name(); ?>:
                                                </h4>
                                                <div>
                                                    <p>
                                                        <?php echo nl2br(osc_comment_body()); ?>
                                                    </p>
                                                    <?php if (osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id())) { ?>
                                                        <p>
                                                            <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bender'); ?>"><?php _e('Delete', 'bender'); ?>
                                                            </a>
                                                        </p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="paginate" style="text-align: right;">
                                            <?php echo osc_comments_pagination(); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>


<?php osc_current_web_theme_path('footer.php'); ?>
<div id="jp_popup_wrap" style="display: none;"></div>
<div id="jp_popup" style="margin-left: -275px; display: none;">

    <div id="mailchimp_subscribe_form">
        <div id="mailchimp_subscribe" style="width:600px;">
            <div id="mailchimp_subscribe_content">

                <!--<a id="jpmail_subscribe_close" onclick="$('#jp_popup_wrap').css('display', 'none');$('#jp_popup').css('display', 'none');" href="#"></a>-->
                <div class="clear"></div>


                <!--<div style="font-weight:700!important;font-size:18px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;margin-top: -10px;">
                  Now shipping to <span style="color:#61BA46">India</span>
                </div>
                <div style="font-weight:100!important;font-size:12px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;border-bottom:solid 1px #eee;margin-bottom:20px;">
                  Fast Shipping. Low Shipping Rates.<br>Secure Checkout. 14-Day Returns</div>-->
                <div class="jpsubscribe_title" style="padding:0px;">
                    <div style="padding:10px;height:42px;">
                        <h1>Sign up and Save!</h1>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="resp-wrapper newregister">
                    <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                        <div style="width:275px;margin:0 auto;">
                            <p style="font-size:14px;font-weight:700 !important:color:#555;">
                                Receive email-only deals, special offers, product exclusives, contests, news &amp;more!
                                Register for Play and Bay
                            </p>
                        </div>
                        <input type="hidden" name="page" value="register" />
                        <input type="hidden" name="action" value="register_post" />
                        <ul id="error_list"></ul>
                        <div class="control-group">
                            <!--<label class="control-label" for="name">
                            <?php _e('Name', 'bender'); ?>
                            </label>-->
                            <div class="controls">

                                <?php UserForm::name_text(); ?>

                            </div>
                        </div>
                        <div class="control-group">
                            <!--<label class="control-label" for="email">
                            <?php _e('E-mail', 'bender'); ?>
                            </label>-->
                            <div class="controls">
                                <?php UserForm::email_text(); ?>
                                <?php osc_show_recaptcha('register'); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--<label class="control-label" for="password">
                            <?php _e('Password', 'bender'); ?>
                            </label>-->
                            <div class="controls">
                                <?php UserForm::password_text(); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--<label class="control-label" for="password-2">
                            <?php _e('Repeat password', 'bender'); ?>
                            </label>-->
                            <div class="controls">
                                <?php UserForm::check_password_text(); ?>
                                <p id="password-error" style="display:none;">
                                    <?php _e("Passwords don't match", 'bender'); ?>
                                </p>
                            </div>
                        </div>
                        <?php osc_run_hook('user_register_form'); ?>
                        <div class="control-group control-group1">
                            <div class="controls">
                                <button type="submit" class="ui-button ui-button-middle ui-button-main">
                                    <?php _e("Create", 'bender'); ?>
                                </button>
                                <div class="botton_div1" style="margin-left:30px; float:left; width:150px; margin-top:10px;">
                                    <a href="#" onclick="return openlogin();">Login</a>
                                </div>
                                <div class="clear" style="height:20px;"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <br />
                <?php osc_run_hook('login-content'); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<!--Login start-->
<div id="jp_popup_login" style="margin-left: -275px; display: none;">

    <div id="mailchimp_subscribe_form">
        <div id="mailchimp_subscribe" style="width:600px;">
            <div id="mailchimp_subscribe_content">

                <!--<a id="jpmail_subscribe_close" onclick="$('#jp_popup_wrap').css('display', 'none');$('#jp_popup').css('display', 'none');" href="#"></a>-->
                <div class="clear"></div>


                <!--<div style="font-weight:700!important;font-size:18px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;margin-top: -10px;">
                  Now shipping to <span style="color:#61BA46">India</span>
                </div>
                <div style="font-weight:100!important;font-size:12px;width:90%;margin:0 auto;color:#555;padding-bottom:10px;border-bottom:solid 1px #eee;margin-bottom:20px;">
                  Fast Shipping. Low Shipping Rates.<br>Secure Checkout. 14-Day Returns</div>-->
                <div class="jpsubscribe_title" style="padding:0px;">
                    <div style="padding:10px;height:42px;">
                        <h1>Login</h1>
                    </div>
                </div>

                <div class="clear"></div>
                <div class="resp-wrapper newregister">
                    <form action="<?php echo osc_base_url(true); ?>" method="post" >
                        <input type="hidden" name="page" value="login" />
                        <input type="hidden" name="action" value="login_post" />

                        <div class="control-group">
                            <!--<label class="control-label" for="email">
                            <?php _e('E-mail', 'isha'); ?>
                            </label>-->
                            <div class="controls">
                                <?php UserForm::email_login_text(); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--<label class="control-label" for="password">
                            <?php _e('Password', 'isha'); ?>
                            </label>-->
                            <div class="controls">
                                <?php UserForm::password_login_text(); ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <!--<div class="controls checkbox">
                            <?php UserForm::rememberme_login_checkbox(); ?>
                              <label for="remember">
                            <?php _e('Remember me', 'isha'); ?>
                              </label>
                            </div>-->
                            <div class="controls">
                                <button type="submit" class="ui-button ui-button-middle ui-button-main">
                                    <?php _e("Log in", 'isha'); ?>
                                </button>
                                <div class="botton_div1" style="margin-left:30px; float:left; width:150px; margin-top:10px;">
                                    <a href="#" onclick="return openregister();">Create</a>
                                </div>
                            </div>
                        </div>
                        <br />
                        <br />
                        <br />
                        <!--<div class="actions">
                          <a href="<?php echo osc_register_account_url(); ?>"><?php _e("Register for a free account", 'isha'); ?>
                          </a>
                          <br />
                          <a href="<?php echo osc_recover_user_password_url(); ?>"><?php _e("Forgot password?", 'isha'); ?>
                          </a>
                        </div>-->
                    </form>
                </div>
                <br />
                <?php osc_run_hook('login-content'); ?>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>

<?php UserForm::js_validation(); ?>
<script  language="javascript">
    $("#s_name").val("").prop("placeholder", "UserName");
    $("#s_email").val("").prop("placeholder", "Email");
    $("#s_password").val("").prop("placeholder", "Password");
    $("#s_password2").val("").prop("placeholder", "Confirm Password");


    $("#password").val("").prop("placeholder", "Password");
    $("#email").val("").prop("placeholder", "Email");

    function openlogin() {

        $('#jp_popup').hide('slow');
        $('#jp_popup_login').show('slow');

        return false;

    }
    function openregister() {

        $('#jp_popup').show('slow');
        $('#jp_popup_login').hide('slow');

        return false;

    }


</script>
<?php if (!osc_is_web_user_logged_in()) { ?>
    <script language="javascript">
        window.onload = load();
        function load() {

            setTimeout(function() {
                $('#jp_popup').show();
                $('#jp_popup_wrap').show();
            }, 3000);
        }
        function changeimage(x) {
            // alert(x.id);
            document.getElementById('headimg').src = x.id;
            return false;
        }
    </script>
<?php } ?>
