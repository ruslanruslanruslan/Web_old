<?php
/*
 * Osclass – software for creating and publishing online classified advertising platforms Copyright (C) 2013 OSCLASS This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details. You should have received a copy of the GNU Affero General Public License along with this program. If not, see <http://www.gnu.org/licenses/>.
 */
// meta tag robots
if (osc_count_items() == 0 || stripos($_SERVER ['REQUEST_URI'], 'search')) {
    osc_add_hook('header', 'bender_nofollow_construct');
} else {
    osc_add_hook('header', 'bender_follow_construct');
}
bender_add_body_class('search');
$listClass = '';
$buttonClass = '';
if (osc_search_show_as() == 'gallery') {
    $listClass = 'listing-grid';
    $buttonClass = 'active';
}
osc_add_hook('before-main', 'sidebar');

function sidebar() {
    osc_current_web_theme_path('search-sidebar.php');
}

osc_add_hook('footer', 'autocompleteCity');

function autocompleteCity() {
    ?>
    <script type="text/javascript">
        $(function() {
            function log(message) {
                $("<div/>").text(message).prependTo("#log");
                $("#log").attr("scrollTop", 0);
            }

            $("#sCity").autocomplete({
                source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                minLength: 2,
                select: function(event, ui) {
                    $("#sRegion").attr("value", ui.item.region);
                    log(ui.item ?
                            "<?php _e('Selected', 'modern'); ?>: " + ui.item.value + " aka " + ui.item.id :
                            "<?php _e('Nothing selected, input was', 'modern'); ?> " + this.value);
                }
            });

        });
    </script>
    <?php
}
?>
<?php //osc_current_web_theme_path('header.php') ;  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>search page</title>
        <link href="<?php echo osc_current_web_theme_url('css/style_search.css'); ?>" rel="stylesheet" />
        <link type="text/css" rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/jquery.selectBox.css'); ?>">
            <link type="text/css" rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/jquery.selectBox1.css'); ?>">
                <link rel="stylesheet" type="text/css" media="all" href="<?php echo osc_current_web_theme_url('css/jquery.selectbox.css'); ?>" />
                <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/jquery-1.2.6.pack.js'); ?>"></script>
                <script type="text/javascript" src="<?php echo osc_current_web_theme_url('js/jquery.selectbox-0.6.1.js'); ?>"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                <link rel="stylesheet" type="text/css" media="only screen and (max-width:1300px) and (min-width:1201px)" href="<?php echo osc_current_web_theme_url('css/max1300width.css'); ?>">
                    <link rel="stylesheet" type="text/css" media="only screen and (max-width:1200px) and (min-width:979px)" href="<?php echo osc_current_web_theme_url('css/max1200width.css'); ?>">
                        <link rel="stylesheet" type="text/css" media="only screen and (max-width:979px) and (min-width:768px)" href="<?php echo osc_current_web_theme_url('css/max979width.css'); ?>">
                            <link rel="stylesheet" type="text/css" media="only screen and (max-width:767px) and (min-width:681px)" href="<?php echo osc_current_web_theme_url('css/max767width.css'); ?>">
                                <link rel="stylesheet" type="text/css" media="only screen and (max-width:680px) and (min-width: 481px)" href="<?php echo osc_current_web_theme_url('css/min500max680.css'); ?>">
                                    <link rel="stylesheet" type="text/css" media="only screen and (max-width:480px) and (min-width:349px)" href="<?php echo osc_current_web_theme_url('css/max480width.css'); ?>">
                                        <link rel="stylesheet" type="text/css" media="only screen and (max-width:348px) and (min-width:320px)" href="<?php echo osc_current_web_theme_url('css/max350width.css'); ?>">
                                            <script type="text/javascript" src="js/jquery-latest.js"></script>
                                            <script type="text/javascript" src="js/jquery.selectbox.js"></script>
                                            <script type="text/javascript" src="js/selectbox.js"></script>
                                            </head>
                                            <style>
                                                .dash {
                                                    background: none repeat scroll 0 0 #0382B1;
                                                    color: #FFFFFF;
                                                    float: right;
                                                    font-size: 12px;
                                                    height: 60px;
                                                    margin-left: 1%;
                                                    padding: 15px 10px;
                                                }

                                                .dash span {
                                                    display: block;
                                                    font-weight: bold;
                                                    padding: 10px 0;
                                                    text-align: center;
                                                }

                                                .dash a {
                                                    display: inline !important;
                                                }

                                                .dash a.logout {
                                                    background: none repeat scroll 0 0 #FFFFFF;
                                                    color: #000000;
                                                    padding: 5px;
                                                    text-decoration: none;
                                                }

                                                .dash a.account_new {
                                                    background: none repeat scroll 0 0 #FFFFFF;
                                                    color: #000000;
                                                    font-weight: normal;
                                                    margin-right: 10px;
                                                    padding: 5px;
                                                    text-decoration: none;
                                                }

                                                .dash a.logout:hover,.dash a.account_new:hover {
                                                    background: none repeat scroll 0 0 #DE450C;
                                                    color: #FFFFFF;
                                                }
                                            </style>

                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $(".search-btn").click(function() {
                                                        $(".search_box").slideToggle("slow", function() {
                                                            // Animation complete.
                                                        });
                                                    });

                                                    jQuery('#yourName').attr('placeholder', 'Name');
                                                    jQuery('#yourEmail').attr('placeholder', 'Email');
                                                    jQuery('#phoneNumber').attr('placeholder', 'Phone no.');
                                                    jQuery('#message').attr('placeholder', 'Message');
                                                    jQuery('#body').attr('placeholder', 'Message');
                                                    jQuery('#message').attr('rows', '5');
                                                    jQuery(".my_page").find("ul").addClass("result_slide");
                                                    jQuery('a.list-last').html('[ Next >> ]');
                                                    jQuery('a.list-first').html('[ << Previous ]');
                                                });
                                            </script>

                                            <script type="text/javascript">
                                                jQuery(document).ready(function() {
                                                    jQuery.fn.goTo = function($thiss) {
                                                        jQuery('html, body').animate({
                                                            scrollTop: parseInt(jQuery(this).offset().top - jQuery("header").height()) + 'px' //
                                                        }, 'slow');
                                                        return this; // for chaining...
                                                    }

                                                    /** code for scroll and select menu **/
                                                    jQuery("nav.navigation ul.nav > li > a").each(function(b, c) {
                                                        var div_Id = jQuery(this).attr("href");
                                                        jQuery(div_Id).data({"index": b});
                                                    });
                                                    /** code for scroll and select menu **/

                                                    jQuery("nav.navigation ul.nav > li > a:not(.no-link)").click(function(e) {
                                                        e.preventDefault();
                                                        var $this = jQuery(this);
                                                        jQuery("nav.navigation ul.nav > li").removeClass("current");
                                                        $this.closest("li").addClass("current");
                                                        var link_to = jQuery(this).attr("href");
                                                        var $thiss = jQuery(this);
                                                        if (link_to == '#no') {
                                                            jQuery("#home").goTo($thiss);
                                                        } else {
                                                            jQuery(link_to).goTo($thiss);
                                                        }

                                                    });
                                                    jQuery("nav.navigation3 ul.nav > li > a:not(.not-link)").click(function(e) {
                                                        e.preventDefault();
                                                        jQuery("nav.navigation3 ul.nav > li").removeClass("current");
                                                        jQuery(this).closest("li").addClass("current");
                                                        var link_to = jQuery(this).attr("href");
                                                        var $thiss = jQuery(this);
                                                        if (link_to == '#no') {
                                                            jQuery("#home").goTo($thiss);
                                                        } else {
                                                            jQuery(link_to).goTo($thiss);
                                                        }
                                                    });
                                                });

                                                /** code for scroll and select menu **/
                                                jQuery(window).scroll(function() {
                                                    jQuery('.div-cont').each(function() {
                                                        if (appeardd(jQuery(this))) {
                                                            var $headers = $("header");
                                                            var b = jQuery(this).data("index");
                                                            $headers.each(function(f, g) {
                                                                if ($(this).length > 0) {
                                                                    var h = $(this).find("nav ul").children("li");
                                                                    h.removeClass("current");
                                                                    h.eq(b).addClass("current");
                                                                }
                                                            });

                                                        }
                                                    });
                                                });

                                                function viewport()
                                                {
                                                    var e = window
                                                            , a = 'inner';
                                                    if (!('innerWidth' in window))
                                                    {
                                                        a = 'client';
                                                        e = document.documentElement || document.body;
                                                    }
                                                    return {width: e[ a + 'Width' ], height: e[ a + 'Height' ]}
                                                }
                                                function appeardd($element) {
                                                    var $window = jQuery(window);
                                                    var window_left = $window.scrollLeft();
                                                    var window_top = $window.scrollTop();
                                                    var offset = $element.offset();
                                                    var left = offset.left;
                                                    var top = offset.top;
                                                    if (top + $element.height() >= window_top &&
                                                            top - ($element.data('appear-top-offset') || 0) <= window_top + viewport().height &&
                                                            left + $element.width() >= window_left &&
                                                            left - ($element.data('appear-left-offset') || 0) <= window_left + viewport().width) {
                                                        // alert( jQuery.makeArray($element) );
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                }

                                                /** code for scroll and select menu **/
                                            </script>
                                            </head>

                                            <style>
                                                #srch {
                                                    display: none;
                                                }
                                            </style>
                                            <script>
                                                $(document).ready(function() {
                                                    $("#tog").click(function() {
                                                        $("#srch").toggle("slow");
                                                    });
                                                });
                                            </script>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $(".togimg").click(function() {
                                                        $(".navigation3").slideToggle();
                                                    });
                                                });
                                            </script>



                                            <script>
                                                $(document).ready(function() {
                                                    $('.accord > span').hide();
                                                    $('.MCtooltip  > h3').hover(function() {
                                                        $(this).next('span').slideToggle('slow');
                                                    });
                                                });
                                            </script>
                                            <script type="text/javascript">
                                                $(document).ready(function() {
                                                    $(".jquery-selectbox-list").mouseleave(function() {
                                                        $(".jquery-selectbox-list").hide();
                                                    });
                                                });
                                            </script>
                                            <body>
                                                <center>
                                                    <?php include_once("analyticstracking.php") ?>
                                                    <div class="srch_bar">
                                                        <div id="tog">
                                                            <img src="<?php echo osc_current_web_theme_url('images/sub2.gif'); ?>" width="50" height="149" class="subscri" title="Subscribe" alt="img" />
                                                        </div>

                                                        <div id="srch">
                                                            <input type="text" class="srchboxa" placeholder="Введите свой адрес электронной почты" />
                                                            <div class="clear"></div>
                                                            <input type="submit" class="srchbtn" value="Subscribe Now" />
                                                            <div class="clear"></div>
                                                        </div>

                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="chose-langu">
                                                        <a class="search-btn" href="javascript:void(0)"></a>
                                                        <?php if (osc_count_web_enabled_locales() > 1) { ?>
                                                            <?php $i = 0; ?>
                                                            <?php
                                                            while (osc_has_web_enabled_locales()) {
                                                                if ($i == "0") {
                                                                    ?>
                                                                    <a class="english-btn" href="<?php echo osc_change_language_url(osc_locale_code()); ?>"><img src="<?php echo osc_current_web_theme_url('images/english-flag.png'); ?>" alt=" "></a>
                                                                <?php } elseif ($i == '1') { ?>
                                                                    <a class="rusiian-btn" href="<?php echo osc_change_language_url(osc_locale_code()); ?>"><img src="<?php echo osc_current_web_theme_url('images/russian-flag.png'); ?>" alt=" "></a>
                                                                <?php } ?>
                                                                <?php $i++; ?>
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <header> <section class="wrapper result_outer"> <a href="<?php echo osc_base_url(); ?>" class="img"><img src="<?php echo osc_current_web_theme_url('images/logo.png') ?>" width="240" height="56" alt="logo" /></a>
<?php if (osc_is_web_user_logged_in()) { ?>
                                                                <div class="dash">
                                                                    <span><?php echo sprintf(__('Hi %s', 'isha'), osc_logged_user_name() . '!'); ?>  &middot;</span> <strong><a class="account_new" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'isha'); ?></a></strong> <a class="logout" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'isha'); ?></a>
                                                                </div>
<?php } ?>
                                                            <div class="togimg"></div>
                                                            <nav class="navigation3">
                                                                <ul>
                                                                    <li><a href="<?php echo osc_base_url() . '#home'; ?>"> <img src="<?php echo osc_current_web_theme_url('images/home_icon.png'); ?>" alt="Home_icon" class="active_icon"> <span><?php _e("Home", 'isha'); ?></span></a></li>
                                                                    <li><a href="<?php echo osc_base_url() . '#listing'; ?>"><img src="<?php echo osc_current_web_theme_url('images/list_icon.png') ?>" alt="Home_icon" class="active_icon"><span><?php _e("Listing", 'isha'); ?></span></a></li>
                                                                    <li><a href="<?php echo osc_base_url() . '#contact'; ?>"><img src="<?php echo osc_current_web_theme_url('images/contact_icon.png') ?>" alt="Home_icon" class="active_icon"><span><?php _e("Contact us", 'isha'); ?></span></a></li>
<?php if (!osc_is_web_user_logged_in()) { ?>
                                                                        <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/login_icon.png'); ?>" alt="Home_icon" class="active_icon"><span><?php _e("Login", 'isha'); ?></span></a></li>
                                                                        <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/register_icon.png') ?>" alt="Home_icon" class="active_icon"><span><?php _e("Register", 'isha'); ?></span></a></li>
                                                                    <?php } else { ?>
                                                                        <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category(); ?>"><img src="<?php echo osc_current_web_theme_url('images/publish-icon.png') ?>" alt="Home_icon" class="active_icon" /><span><?php _e("Publish your ad", 'isha'); ?></span></a></li>
<?php } ?>
                                                                </ul>
                                                            </nav> </section> </header>
                                                    <div class="clear"></div>
                                                    <div class="page">
                                                        <section class="wrapper result_outer">
<?php osc_run_hook('before-main'); ?>
                                                            <section class="cent_srch_ryt">
                                                                <div class="maincc">
                                                                    <div class="mainccs">
                                                                        <input class="mrvmain" type="text" name="sPattern" id="query" value="<?php echo osc_esc_html(osc_search_pattern()); ?>" placeholder="Search " /> <input type="button" class="mrvbtn" />
                                                                        <div class="clear"></div>
                                                                    </div>
<?php echo osc_search_pagination(); ?>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="headnav">
                                                                    <div class="list_left"><?php _e('Search Results for :- ', 'bender'); ?>
<?php echo search_title(); ?></div>
                                                                    <div class="list_ryt">
                                                                        <span class="sorttxt">Sort by:</span>
                                                                        <div class="demoTarget">
                                                                            <select id="default-usage-select">
                                                                                <option value=1>По дате публикации</option>
                                                                                <option value=2>По возрастанию цены</option>
                                                                                <option value=3>По убыванию цены</option>
                                                                            </select>
                                                                            <div class="clr"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clear"></div>
                                                                </div>
                                                                <div class="accord">
                                                                    <ul class="alist alist1">
                                                                        <!--       <h1> Search Results for :- Музыкальные инструменты</h1>-->
                                                                        <li><article class="listings"> <figure> <img src="images/thumbnail.png" width="108" height="97" alt="img" /> </figure>
                                                                                <div class="rytttlist">
                                                                                    <div class="ztxt">
                                                                                        <a href="#"> Zoom G9.2tt</a>
                                                                                    </div>
                                                                                    <p>Продам процессор,в идеальном состоянии,(ПРОДАЮ ПО ПРИЧИНЕ ФИНАНСОВ)• 6-полосный графический эквалайзер предоставляет пользователю дополнительную гибкость в адаптации звучания применительно к конкретной ситуации •</p>
                                                                                </div>
                                                                                <div class="clear"></div>
                                                                                <div class="price">
                                                                                    <a class="MCtooltip dte"> Krasnodar - March 9,2014 </a> <a href="#" class="rate">70000 руб. </a> <a class="MCtooltip " href="#"><h3>Другие валюты</h3> <span class="ancj1">1148 GBP<br>1386 EUR<br>18032 UAH<br>1918 USD
                                                                                                        </span> </a>
                                                                                                        <div class="clear"></div>
                                                                                                        </div>
                                                                                                        </article></li>
                                                                                                        </ul>
                                                                                                        </div>
                                                                                                        <section class="result_box">
                                                                                                            <h1 class="result"></h1>
<?php osc_run_hook('search_ads_listing_top'); ?>
                                                                                                            <div class="my_page" style="margin-top: 10px"></div>
                                                                                                            <div class="clear"></div>
<?php if (osc_count_items() == 0) { ?>
                                                                                                                <div class="refine_result">
                                                                                                                    <p><?php printf(__('There are no results matching "%s"', 'bender'), osc_search_pattern()); ?></p>
                                                                                                                </div>
                                                                                                                <?php
                                                                                                            } else {
                                                                                                                $search_number = bender_search_number();
                                                                                                                echo '<div class="refine_result"><p>';
                                                                                                                printf(__('%1$d to %2$d of <span> %3$d </span> listings', 'bender'), $search_number ['from'], $search_number ['to'], $search_number ['of']);
                                                                                                                echo '</p>';
                                                                                                                ?>
                                                                                                                <div class="accord">
                                                                                                                    <ul class="alist alist1">
                                                                                                                        <?php
                                                                                                                        $i = 0;
                                                                                                                        osc_get_premiums();
                                                                                                                        if (osc_count_premiums() > 0) {
                                                                                                                            while (osc_has_premiums()) {
                                                                                                                                $class = '';
                                                                                                                                if ($i % 2 == 0) {
                                                                                                                                    // $class = 'first';
                                                                                                                                }
                                                                                                                                //bender_draw_item_search ( $class, false, true );
                                                                                                                                $i++;
                                                                                                                                if ($i == 2) {
                                                                                                                                    break;
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                                <div class="accord">
                                                                                                                    <div class="outpart">
                                                                                                                        <ul class="alaist">
                                                                                                                            <?php if (osc_count_items() > 0) { ?>
                                                                                                                                <?php
                                                                                                                                $i = 0;
                                                                                                                                while (osc_has_items()) {
                                                                                                                                    $i++;
                                                                                                                                    $class = false;
                                                                                                                                    if ($i % 2 == 0) {
                                                                                                                                        // $class = 'rzero';
                                                                                                                                    }
                                                                                                                                    bender_draw_item_search($class);
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                            </ul>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="clear"></div>
                                                                                                                    <?php
                                                                                                                    if (osc_rewrite_enabled()) {
                                                                                                                        $footerLinks = osc_search_footer_links();
                                                                                                                        if (count($footerLinks) > 0) {
                                                                                                                            ?>
                                                                                                                            <div id="related-searches">
                                                                                                                                <h5><?php _e('Other searches that may interest you', 'bender'); ?></h5>
                                                                                                                                <ul class="footer-links">
                                                                                                                                    <?php
                                                                                                                                    foreach ($footerLinks as $f) {
                                                                                                                                        View::newInstance()->_exportVariableToView('footer_link', $f);
                                                                                                                                        ?>
                                                                                                                                        <?php if ($f['total'] < 3) continue; ?>
                                                                                                                                        <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
                                                                                                                            <?php } ?>
                                                                                                                                </ul>
                                                                                                                            </div>
                                                                                                                            <?php
                                                                                                                        }
                                                                                                                    }
                                                                                                                }
                                                                                                                ?>
<?php } ?>
<?php echo osc_search_pagination('sotbot'); ?>
                                                                                                        </section>
                                                                                                        </section>
                                                                                                        </section>
                                                                                                        </div>
                                                                                                        <div class="clear"></div>
                                                                                                        </div>
                                                                                                        <script type="text/javascript">
                                                                                                            //<![CDATA[
                                                                                                            $("#default-usage-select").selectbox().bind(
                                                                                                                    'change',
                                                                                                                    function() {
                                                                                                                        if ($(this).val() == 1) {
                                                                                                                            document.location.href = 'index.php?page=search&sOrder=dt_pub_date&iOrderType=desc';
                                                                                                                        }
                                                                                                                        if ($(this).val() == 2) {
                                                                                                                            document.location.href = 'index.php?page=search&sOrder=i_price&iOrderType=asc';
                                                                                                                        }
                                                                                                                        if ($(this).val() == 3) {
                                                                                                                            document.location.href = 'index.php?page=search&sOrder=i_price&iOrderType=desc';
                                                                                                                        }
                                                                                                                    });
                                                                                                            //]]>
                                                                                                        </script>		
                                                                                                        </div>
                                                                                                        </center>
                                                                                                        <footer>
                                                                                                            <p>© Copyright 2012-2013, All Rights Reserved, playandbay.com</p>
                                                                                                        </footer>


<?php //osc_current_web_theme_path('footer.php') ;    ?>
                                                                                                        </body>