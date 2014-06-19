<?php
$js_lang = array(
    'delete' => __('Delete', 'bender'),
    'cancel' => __('Cancel', 'bender')
);

osc_enqueue_script('jquery');
osc_enqueue_script('jquery-ui');
//osc_enqueue_script('jquery.min.js');
osc_register_script('global-theme-js', osc_current_web_theme_js_url('global.js'), 'jquery');
osc_register_script('delete-user-js', osc_current_web_theme_js_url('delete_user.js'), 'jquery-ui');
osc_enqueue_script('global-theme-js');
osc_enqueue_style('style', osc_current_web_theme_url('layout.css'));
osc_run_hook('header');
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title><?php echo meta_title(); ?></title>
<meta name="title" content="<?php echo osc_esc_html(meta_title()); ?>" />
<?php if (meta_description() != '') { ?>
    <meta name="description" content="<?php echo osc_esc_html(meta_description()); ?>" />
<?php } ?>
<?php if (meta_keywords() != '') { ?>
    <meta name="keywords" content="<?php echo osc_esc_html(meta_keywords()); ?>" />
<?php } ?>
<?php if (osc_get_canonical() != '') { ?>
    <!-- canonical -->
    <link rel="canonical" href="<?php echo osc_get_canonical(); ?>"/>
    <!-- /canonical -->
<?php } ?>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Fri, Jan 01 1970 00:00:00 GMT" />

<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0" />

<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- favicon -->
<link rel="shortcut icon" href="<?php echo osc_current_web_theme_url('favicon/favicon-48.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo osc_current_web_theme_url('favicon/favicon-144.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo osc_current_web_theme_url('favicon/favicon-114.png'); ?>">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo osc_current_web_theme_url('favicon/favicon-72.png'); ?>">
<link rel="apple-touch-icon-precomposed" href="<?php echo osc_current_web_theme_url('favicon/favicon-57.png'); ?>">
<!-- /favicon -->

<link href="<?php echo osc_current_web_theme_url('js/jquery-ui/jquery-ui-1.10.2.custom.min.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />

<script type="text/javascript">
    var bender = window.bender || {};
    bender.base_url = '<?php echo osc_base_url(true); ?>';
    bender.langs = <?php echo json_encode($js_lang); ?>
</script>
<!-- Including css files -->
<link href="<?php echo osc_current_web_theme_url('css/style.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/browser.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:1024px), (max-device-width:1024px) and (orientation:landscape)" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/ipad-landscape-width.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:1024px), (max-device-width:1024px) and (orientation:landscape)" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/ipad-portrait-width.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:768px), (max-device-width:768px) and (orientation:portrait)" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/browser.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:600px)" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/iphone-landscape-width.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:480px), (max-device-width:480px)" />
<link rel="stylesheet" type="text/css" href="<?php echo osc_current_web_theme_url('css/iphone-portrait-width.css'); ?>?<?php echo rand(0, pow(10, 5)); ?>" media="only screen and (max-width:320px), (max-device-width:320px)" />

<link href="<?php echo osc_current_web_theme_url('css/style_search.css') ?>" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/jquery.selectBox.css') ?>">
<link type="text/css" rel="stylesheet" href="<?php echo osc_current_web_theme_url('css/jquery.selectBox1.css') ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo osc_current_web_theme_url('css/jquery.selectbox.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (min-width:1201px)" href="<?php echo osc_current_web_theme_url('css/max1300width.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:1200px) and (min-width:979px)" href="<?php echo osc_current_web_theme_url('css/max1200width.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:979px) and (min-width:768px)" href="<?php echo osc_current_web_theme_url('css/max979width.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:767px) and (min-width:681px)" href="<?php echo osc_current_web_theme_url('css/max767width.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:680px) and (min-width: 481px)" href="<?php echo osc_current_web_theme_url('css/min500max680.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:480px) and (min-width:349px)" href="<?php echo osc_current_web_theme_url('css/max480width.css') ?>">
<link rel="stylesheet" type="text/css" media="only screen and (max-width:348px) and (min-width:320px)" href="<?php echo osc_current_web_theme_url('css/max350width.css') ?>">
<style>
#srch{ display:none;}
</style>
<!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 7]>
        <style>
        input[type=button].search_btn
        {
                padding:10px 15px;
        }
    </style>
<![endif]-->
<!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script -->

<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('jquery.selectbox.js') ?>"></script>
<script type="text/javascript" src="<?php echo osc_current_web_theme_js_url('selectbox.js') ?>"></script>
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
        jQuery('a.list-first').html('First');
        jQuery('a.list-last').html('Last');
        jQuery('a.searchPaginationNext').html('Next');
        jQuery('a.searchPaginationPrev').html('Prev');
    });
</script>

<script type="text/javascript" >
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
