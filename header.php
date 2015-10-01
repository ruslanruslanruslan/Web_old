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
?><!DOCTYPE html>
<html dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
        <?php osc_current_web_theme_path('common/head.php'); ?>
    </head>
    <body>
        <?php include_once("analyticstracking.php") ?>
        <header>
            <section class="header_midbox wrapper">
                <a href="<?php echo osc_base_url(); ?>"><img width="226" src="<?php echo osc_current_web_theme_url('images/logo.png') ?>" alt="Logo Here" class="logo"/></a>
                <?php if (osc_is_web_user_logged_in()) { ?>
                    <div class="dash">
                        <span><?php echo sprintf(__('Hi %s', 'isha'), osc_logged_user_name() . '!'); ?>  &middot;</span>
                        <strong><a class="account_new" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'isha'); ?></a></strong>
                        <a class="logout" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'isha'); ?></a>
                    </div>
                    <?php
                }
                if (osc_is_home_page()) {
                    ?>
                    <nav class="navigation">
                        <ul class="nav" >
                            <li class="current" ><a href="#home" ><img src="<?php echo osc_current_web_theme_url('images/home_icon.png'); ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/home_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Home", 'isha'); ?></p></a></li>
                            <li><a href="#listing"><img src="<?php echo osc_current_web_theme_url('images/list_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/list_icon_normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Listing", 'isha'); ?></p></a></li>
                            <li><a href="#contact"><img src="<?php echo osc_current_web_theme_url('images/contact_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/contact_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Contact us", 'isha'); ?></p></a></li>
                            <?php ?>
                            <?php if (!osc_is_web_user_logged_in()) { ?>
                                <li><a href="#login_register"><img src="<?php echo osc_current_web_theme_url('images/login_icon.png'); ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/login_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Login", 'isha'); ?></p></a></li>

                                <li><a href="#login_register"><img src="<?php echo osc_current_web_theme_url('images/register_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/register_icon_normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Register", 'isha'); ?></p></a></li>
                            <?php } else { ?>
                                <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category(); ?>"><img src="<?php echo osc_current_web_theme_url('images/publish-icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/publish-icon-normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Publish your ad", 'isha'); ?></p></a></li>
                            <?php } ?>

                        </ul>
                    </nav>
                    <div class="menu_icon" id="menu_cliced">
                        <div class="horisontal"></div>
                        <div class="horisontal"></div>
                        <div class="horisontal"></div>
                    </div>
                <?php } else { ?>
                    <nav class="navigation">
                        <ul class="nav1" >
                            <li class="current" ><a href="<?php echo osc_base_url() . '#home'; ?>" >
                                    <img src="<?php echo osc_current_web_theme_url('images/home_icon.png'); ?>" alt="Home_icon" class="active_icon" />
                                    <img src="<?php echo osc_current_web_theme_url('images/home_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Home", 'isha'); ?></p></a>
                            </li>

                            <li><a href="<?php echo osc_base_url() . '#listing'; ?>"><img src="<?php echo osc_current_web_theme_url('images/list_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/list_icon_normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Listing", 'isha'); ?></p></a></li>
                            <li><a href="<?php echo osc_base_url() . '#contact'; ?>"><img src="<?php echo osc_current_web_theme_url('images/contact_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/contact_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Contact us", 'isha'); ?></p></a></li>

                            <?php if (!osc_is_web_user_logged_in()) { ?>
                                <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/login_icon.png'); ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/login_icon_normal.png'); ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Login", 'isha'); ?></p></a></li>

                                <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/register_icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/register_icon_normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Register", 'isha'); ?></p></a></li>
                            <?php } else { ?>
                                <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category(); ?>"><img src="<?php echo osc_current_web_theme_url('images/publish-icon.png') ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/publish-icon-normal.png') ?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Publish your ad", 'isha'); ?></p></a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <div class="menu_icon" id="menu_cliced">
                        <div class="horisontal"></div>
                        <div class="horisontal"></div>
                        <div class="horisontal"></div>
                    </div>
                <?php } ?>
            </section>
                <?php if (osc_is_home_page()) {
                    ?>
                    <div class="nav-mobile" id="menu-mobile_cliced">
                        <div class="mobile_header"><div>Меню</div><div id="close_menu"></div>
                        </div>
                        <style type="text/css">
                        .mobile_header #close_menu
                        {
                            background: url(<?= osc_current_web_theme_url("images/close.png"); ?>) !important;
                        }
                        .mobile_header #close_menu:hover
                        {
                            background: url(<?= osc_current_web_theme_url("images/close_red.png"); ?>) !important;   
                        }
                        </style>
                        <ul class="nav" >
                            <li class="current for_mob" ><a href="#home" ><p><?php _e("Home", 'isha'); ?></p></a></li>
                            <li><a href="#listing"><p><?php _e("Listing", 'isha'); ?></p></a></li>
                            <li><a href="#contact"><p><?php _e("Contact us", 'isha'); ?></p></a></li>
                            <?php ?>
                            <?php if (!osc_is_web_user_logged_in()) { ?>
                                <li><a href="#login_register"><p><?php _e("Login", 'isha'); ?></p></a></li>


                                <li><a href="#login_register"><p><?php _e("Register", 'isha'); ?></p></a></li>

                            <?php } else { ?>
                                <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category(); ?>"><p><?php _e("Publish your ad", 'isha'); ?></p></a></li>
                                <div class="dash">
                        <span><?php echo sprintf(__('Hi %s', 'isha'), osc_logged_user_name() . '!'); ?>  &middot;</span>
                        <strong><a class="account_new" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'isha'); ?></a></strong>
                        <a class="logout" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'isha'); ?></a>
                    </div>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } else { ?>
                        <div class="nav-mobile" id="menu-mobile_cliced">
                        <div class="mobile_header"><div>Меню</div><div id="close_menu"></div>
                        </div>
                        <ul class="nav">
                            <li class="current" ><a href="<?php echo osc_base_url() . '#home'; ?>" >
                                    <p><?php _e("Home", 'isha'); ?></p></a>
                            </li>



                            <li><a href="<?php echo osc_base_url() . '#listing'; ?>"><p><?php _e("Listing", 'isha'); ?></p></a></li>
                            <li><a href="<?php echo osc_base_url() . '#contact'; ?>"><p><?php _e("Contact us", 'isha'); ?></p></a></li>


                            <?php if (!osc_is_web_user_logged_in()) { ?>
                                <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><p><?php _e("Login", 'isha'); ?></p></a></li>

                                <li><a href="<?php echo osc_base_url() . '#login_register'; ?>"><p><?php _e("Register", 'isha'); ?></p></a></li>
                            <?php } else { ?>
                                <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category(); ?>"><p><?php _e("Publish your ad", 'isha'); ?></p></a></li>
                                <div class="dash">
                        <span><?php echo sprintf(__('Hi %s', 'isha'), osc_logged_user_name() . '!'); ?>  &middot;</span>
                        <strong><a class="account_new" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'isha'); ?></a></strong>
                        <a class="logout" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'isha'); ?></a>
                    </div>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
        </header>

        <article class="search_box">
            <section class="search_midbox wrapper">
                <div class="search_area">
                    <form action="<?php echo osc_base_url(true); ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();" */ ?>>
                        <input type="hidden" name="page" value="search" />

                          <input id="s_order_type" type="hidden" name="iOrderType" value="desc">
                          <input id="s_order" type="hidden" name="sOrder" value="dt_pub_date">
                        <div class="input_outer_area">

                            <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_get_preference('keyword_placeholder', 'isha'); ?>" />
                            <?php osc_categories_select('sCategory', null, __('Category', 'isha')); ?>
                            <!-- <div class="clear"></div>  -->



                        <input type="submit" class="search_btn ui-button ui-button-big js-submit" style="border: none;radius: 0px;0px Arial, Helvetica, sans-serif;color: #fff;height: 43px;font-size:14px" value="OK" />
                        <!-- <div class="clear"></div>  -->

                        </div>


                    </form>
                </div>
            </section>
        </article>
        <div class="wrapper wrapper-flash">

            <?php osc_show_flash_message(); ?>
        </div>
        <div id="home" class="div-cont" >

            <?php
            osc_run_hook('inside-main');
            ?>
            <?php osc_run_hook('home-content'); ?>
        </div>
		 <?php
            $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
            if ($breadcrumb !== '') {
                ?>
                <div class="breadcrumb">
                    <?php echo $breadcrumb; ?>
                    <div class="clear"></div>
                    <script type="text/javascript">
                        $('.breadcrumb .first-child a').prepend('<div class="for_home_images"><img src="<?= osc_current_web_theme_url("images/home.png"); ?>" clss="visibl"><img src="<?= osc_current_web_theme_url("images/home_hover.png"); ?>" clss="not" style="position:absolute;top:3px;left:0;z-index:5"></div>');
                    </script>
                </div>
                <?php
            }
            ?>
        <?php osc_run_hook('product'); ?>

        <?php if (osc_users_enabled()) { ?>
            <?php if (!osc_is_web_user_logged_in()) { ?>
                <?php
                osc_run_hook('login-content');
            }
        }
        ?>

        <?php osc_run_hook('contact-content'); ?>