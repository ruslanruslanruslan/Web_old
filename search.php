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
if (osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search')) {
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
<?php osc_current_web_theme_path('header.php'); ?>
<?php osc_register_script('delete-user-js', osc_current_web_theme_js_url('jquery-1.2.6.pack.js'), 'jquery-ui'); ?>
<?php osc_register_script('delete-user-js', osc_current_web_theme_js_url('jquery.selectbox-0.6.1.js'), 'jquery-ui'); ?>
<?php osc_register_script('delete-user-js', osc_current_web_theme_js_url('js/jquery.selectbox.js'), 'jquery-ui'); ?>
<?php osc_register_script('delete-user-js', osc_current_web_theme_js_url('js/selectbox.js'), 'jquery-ui'); ?>

<section class="wrapper result_outer">

    <section>
        <div class="srch_bar">
            <div id="tog"> <img src="<?php echo osc_current_web_theme_url() ?>images/sub2.gif" width="50" height="149" class="subscri" title="Subscribe" alt="img"></div>

            <div id="srch" style="display: none;">
                <form action="<?php echo osc_base_url(true); ?>" method="post" name="sub_alert" id="sub_alert" class="nocsrf">
                    <?php AlertForm::page_hidden(); ?>
                    <?php AlertForm::alert_hidden(); ?>

                    <?php if (osc_is_web_user_logged_in()) { ?>
                        <?php AlertForm::user_id_hidden(); ?>
                        <?php AlertForm::email_hidden(); ?>

                    <?php } else { ?>
                        <?php AlertForm::user_id_hidden(); ?>
                        <?php AlertForm::email_text(); ?>

                    <?php }; ?>
                    <div class="clear"></div>
                    <input type="submit" class="srchbtn" value="<?php _e('Subscribe now', 'bender'); ?>">
                    <div class="clear"></div>
                </form>
            </div>

            <div class="clear"></div>
        </div>
        <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf" id="frm_search">
            <input type="hidden" name="page" value="search"/>
            <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
            <input type="hidden" name="iOrderType" value="<?php
            $allowedTypesForSorting = Search::getAllowedTypesForSorting();
            echo $allowedTypesForSorting[osc_search_order_type()];
            ?>" />
                   <?php foreach (osc_search_user() as $userId) { ?>
                <input type="hidden" name="sUser[]" value="<?php echo $userId; ?>"/>
            <?php } ?>
            <div class="clear"></div>


            <?php osc_run_hook('before-main'); ?>

            <section class="cent_srch_ryt">
                <div class="maincc">
                    <div class="mainccs">
                        <input type="text" class="mrvmain" placeholder="Search "  name="sPattern"  id="query" value="<?php echo osc_search_pattern() ?>">
                        <input type=submit class="mrvbtn" value="">
                        <div class="clear"></div>
                    </div>
                    <?php echo osc_search_pagination(); ?>
                    <div class="clear"></div>
                    
                </div>

                <div class="headnav">
                    <div class="list_left">
                        <?php _e('Search Results for :- ', 'bender'); ?>
                        <?php echo search_title(); ?>
                        <?php
                        if (osc_count_items() == 0) {
                            printf(__('There are no results matching "%s"', 'bender'), osc_search_pattern());
                        } else {
                            $search_number = bender_search_number();
                            printf(__('%1$d to %2$d of <span> %3$d </span> listings', 'bender'), $search_number['from'], $search_number['to'], $search_number['of']);
                        }
                        ?>
                    </div>

                    <div class="list_ryt">
                        <?php
                        $orders = osc_list_orders();
                        $current = '';
                        foreach ($orders as $label => $params) {
                            $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                            if (osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                                $current = $label;
                            }
                        }
                        ?>
                        <span class="sorttxt"><?php _e('Sort by', 'bender'); ?>:</span>  

                        <div class="demoTarget">
                            <select id="default-usage-select" name="sOrder" class="selectBox" style="width:180px;">
                                <?php
                                foreach ($orders as $label => $params) {
                                    //$orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                                    ?>
                                    <?php if (osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                                        <option selected="selected" value="<?php echo $params['sOrder'] ?>"><?php echo $label; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $params['sOrder'] ?>"><?php echo $label; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <div class="clr"></div>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>

                <div class="accord">
                    <ul class="alist alist1">
                        <!--       <h1> Search Results for :- Музыкальные инструменты</h1>-->
                        <?php
                        $i = 0;
                        osc_get_premiums();
                        if (osc_count_premiums() > 0) {

                            while (osc_has_premiums()) {
                                $class = '';
                                if ($i % 3 == 0) {
                                    $class = 'first';
                                }
                                isha_draw_item_search($class, false, true);
                                $i++;
                                if ($i == 3) {
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
                                $f = true;
                                $i = 0;
                                $count = ceil( osc_count_items() / 2 );
                                while (osc_has_items()) {
                                    $i++;
                                    ?>
                                    <?php
                                    if ($i > $count && $f) {
                                        $f = false;
                                        echo '</ul><ul class="alaist">';
                                    }
                                    isha_draw_item_search(false);
                                    ?>
                                <?php } ?>

                            <?php } ?>


                        </ul> 

                    </div>
                    <div class="clear"></div>


                </div>

                <div class="sotbot">
                    <?php echo osc_search_pagination(); ?>
                </div>
                <div class="clear"></div>
                <?php
                /*if (osc_rewrite_enabled()) {
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
                }*/
                ?>
            </section>
            <div class="clear"></div>
        </form>
    </section>

</section>

<script>
    //<![CDATA[
    (function($){
        $(document).ready(function(){
            $('#default-usage-select').change(function() {
                $('#frm_search').submit();
            });

            $('#tog').click(function() {
                $('#srch').toggle('slow');
            });

            $('.accord > span').hide();
            $('.MCtooltip  > h3').hover(function() {
                $(this).next('span').slideToggle('slow');
            });

            $(".togimg").click(function() {
                $(".navigation3").slideToggle();
            });
            
            $(".jquery-selectbox-list").mouseleave(function() {
                $(".jquery-selectbox-list").hide();
            });
            
            $(".sub_button").click(function() {
                $.post('<?php echo osc_base_url(true); ?>', {email: $("#alert_email").val(), userid: $("#alert_userId").val(), alert: $("#alert").val(), page: "ajax", action: "alerts"},
                function(data) {
                    if (data == 1) {
                        alert('<?php echo osc_esc_js(__('You have sucessfully subscribed to the alert', 'bender')); ?>');
                    }
                    else if (data == -1) {
                        alert('<?php echo osc_esc_js(__('Invalid email address', 'bender')); ?>');
                    }
                    else {
                        alert('<?php echo osc_esc_js(__('There was a problem with the alert', 'bender')); ?>');
                    }
                    ;
                });
                return false;
            });

            var sQuery = '<?php echo osc_esc_js(AlertForm::default_email_text()); ?>';

            if ($('input[name=alert_email]').val() == sQuery) {
                $('input[name=alert_email]').css('color', 'gray');
            }
            $('input[name=alert_email]').click(function() {
                if ($('input[name=alert_email]').val() == sQuery) {
                    $('input[name=alert_email]').val('');
                    $('input[name=alert_email]').css('color', '');
                }
            });
            $('input[name=alert_email]').blur(function() {
                if ($('input[name=alert_email]').val() == '') {
                    $('input[name=alert_email]').val(sQuery);
                    $('input[name=alert_email]').css('color', 'gray');
                }
            });
            $('input[name=alert_email]').keypress(function() {
                $('input[name=alert_email]').css('background', '');
            })
        });
    })(jQuery);
    //]]>
</script>
<?php osc_current_web_theme_path('footer.php'); ?>
