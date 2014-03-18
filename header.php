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
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="<?php echo str_replace('_', '-', osc_current_user_locale()); ?>">
    <head>
	 <?php osc_current_web_theme_path('common/head.php') ; ?>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$( ".search-btn" ).click(function() {
  $( ".search_box" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});

jQuery('#yourName').attr('placeholder','Name');
	jQuery('#yourEmail').attr('placeholder','Email');
	jQuery('#phoneNumber').attr('placeholder','Phone no.');
	jQuery('#message').attr('placeholder','Message');
	jQuery('#body').attr('placeholder','Message');
	jQuery('#message').attr('rows','5');
	jQuery(".my_page").find("ul").addClass( "result_slide" );
		jQuery('a.list-last').html('[ Next >> ]');
	jQuery('a.list-first').html('[ << Previous ]');
});
</script>

	<script type="text/javascript" >
	jQuery(document).ready(function(){
		jQuery.fn.goTo = function( $thiss ) {
			jQuery('html, body').animate({
					scrollTop: parseInt(jQuery(this).offset().top-jQuery("header").height()) + 'px' //
				}, 'slow');
				return this; // for chaining...
		   }
		   
		/** code for scroll and select menu **/   
		jQuery("nav.navigation ul.nav > li > a").each(function(b,c){
			  var div_Id = jQuery(this).attr("href");
			  jQuery(div_Id).data({"index":b});
		});
		/** code for scroll and select menu **/

		jQuery("nav.navigation ul.nav > li > a:not(.no-link)").click(function(e){
			e.preventDefault();
			var $this = jQuery(this);
			 jQuery("nav.navigation ul.nav > li").removeClass("current");
			 $this.closest("li").addClass("current");
			var link_to = jQuery(this).attr("href");
			var $thiss = jQuery(this);
			if(link_to=='#no'){
				jQuery("#home").goTo( $thiss );
			}else{
				jQuery(link_to).goTo( $thiss );
			}
			
		});
		jQuery("nav.navigation3 ul.nav > li > a:not(.not-link)").click(function(e){
			e.preventDefault();
			jQuery("nav.navigation3 ul.nav > li").removeClass("current");
			jQuery(this).closest("li").addClass("current");
			var link_to = jQuery(this).attr("href");
			var $thiss = jQuery(this);
			if(link_to=='#no'){
				jQuery("#home").goTo( $thiss );
			}else{
				jQuery(link_to).goTo( $thiss );
			}
		});
	});

		/** code for scroll and select menu **/
		jQuery(window).scroll(function() {	
				jQuery('.div-cont').each(function(){
				 if(appeardd(jQuery(this))){
				  var $headers = $("header");
					var b =  jQuery(this).data("index");
					$headers.each(function(f, g){
						if( $(this).length > 0 ){
							var h = $(this).find("nav ul").children( "li" );
							h.removeClass("current");
							h.eq( b ).addClass("current");
						}
					});
					 
				 }
			   });
			});
			
			function viewport()
			{
				var e = window
				, a = 'inner';
				if ( !( 'innerWidth' in window ) )
				{
				a = 'client';
				e = document.documentElement || document.body;
				}
				return { width : e[ a+'Width' ] , height : e[ a+'Height' ] }
			}
			function appeardd($element){
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
<body>
<?php include_once("analyticstracking.php") ?>
<header>
	<section class="header_midbox wrapper">
    	<a href="<?php echo osc_base_url(); ?>"><img width="226" src="<?php echo osc_current_web_theme_url('images/logo.png')?>" alt="Logo Here" class="logo"/></a> 
		<?php if(osc_is_web_user_logged_in() ) { ?>
		<div class="dash">
                    <span><?php echo sprintf(__('Hi %s', 'isha'), osc_logged_user_name() . '!'); ?>  &middot;</span>
                    <strong><a class="account_new" href="<?php echo osc_user_dashboard_url(); ?>"><?php _e('My account', 'isha'); ?></a></strong>
                    <a class="logout" href="<?php echo osc_user_logout_url(); ?>"><?php _e('Logout', 'isha'); ?></a>
                </div>
	    <?php } 
		if(osc_is_home_page()){?>
		        <nav class="navigation">
        	<ul class="nav" >
            	<li class="current" ><a href="#home" ><img src="<?php echo osc_current_web_theme_url('images/home_icon.png'); ?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/home_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Home", 'isha') ; ?></p></a></li>
            	<li><a href="#listing"><img src="<?php echo osc_current_web_theme_url('images/list_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/list_icon_normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Listing", 'isha') ; ?></p></a></li>
            	<li><a href="#contact"><img src="<?php echo osc_current_web_theme_url('images/contact_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/contact_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Contact us", 'isha') ; ?></p></a></li>
				            	  <?php ?>
            <?php if( !osc_is_web_user_logged_in() ) { ?>
				<li><a href="#login_register"><img src="<?php echo osc_current_web_theme_url('images/login_icon.png');?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/login_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Login", 'isha') ; ?></p></a></li>
				
            	<li><a href="#login_register"><img src="<?php echo osc_current_web_theme_url('images/register_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/register_icon_normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Register", 'isha') ; ?></p></a></li>
				  <?php } else{ ?>
            <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category() ; ?>"><img src="<?php echo osc_current_web_theme_url('images/publish-icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/publish-icon-normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Publish your ad", 'isha');?></p></a></li>
			<?php }?>
           
            </ul> 
        </nav> 
      <?php }else{?> 
        <nav class="navigation3">
        	<ul class="nav1" >
            	<li class="current" ><a href="<?php echo osc_base_url().'#home'; ?>" >
				<img src="<?php echo osc_current_web_theme_url('images/home_icon.png'); ?>" alt="Home_icon" class="active_icon" />
				<img src="<?php echo osc_current_web_theme_url('images/home_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Home", 'isha') ; ?></p></a>
				</li>

            	<li><a href="<?php echo osc_base_url().'#listing'; ?>"><img src="<?php echo osc_current_web_theme_url('images/list_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/list_icon_normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Listing", 'isha') ; ?></p></a></li>
            	<li><a href="<?php echo osc_base_url().'#contact'; ?>"><img src="<?php echo osc_current_web_theme_url('images/contact_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/contact_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Contact us", 'isha') ; ?></p></a></li>
             				
            <?php if( !osc_is_web_user_logged_in() ) { ?>
				<li><a href="<?php echo osc_base_url().'#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/login_icon.png');?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/login_icon_normal.png');?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Login", 'isha') ; ?></p></a></li>
				
            	<li><a href="<?php echo osc_base_url().'#login_register'; ?>"><img src="<?php echo osc_current_web_theme_url('images/register_icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/register_icon_normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Register", 'isha') ; ?></p></a></li>
				<?php } else { ?>
            <li class="publish_ad"><a class="no-link" href="<?php echo osc_item_post_url_in_category() ; ?>"><img src="<?php echo osc_current_web_theme_url('images/publish-icon.png')?>" alt="Home_icon" class="active_icon" /><img src="<?php echo osc_current_web_theme_url('images/publish-icon-normal.png')?>" alt="Home_icon" class="normal_icon" /><p><?php _e("Publish your ad", 'isha');?></p></a></li>
            <?php } ?>
            </ul>
        </nav>
         <?php }?>
    </section>

</header>

<article class="search_box">
		<section class="search_midbox wrapper">
        	<div class="search_area">
			 <form action="<?php echo osc_base_url(true) ; ?>" method="get" class="search nocsrf" <?php /* onsubmit="javascript:return doSearch();"*/ ?>>
				<input type="hidden" name="page" value="search" />
            	<div class="input_outer_area">
                	   <input type="text" name="sPattern" id="query" class="input-text" value="" placeholder="<?php echo osc_get_preference('keyword_placeholder', 'bender') ; ?>" />
                   <?php osc_categories_select('sCategory', null, __('Select a category', 'bender_black')) ; ?>
                    <div class="clear"></div>
                </div>
				
                <input type="submit" class="search_btn ui-button ui-button-big js-submit" value="Search" />
                <div class="clear"></div>
               </form>
            </div>
        </section>
</article>
<div class="wrapper wrapper-flash">
    <?php
        $breadcrumb = osc_breadcrumb('&raquo;', false, get_breadcrumb_lang());
        if( $breadcrumb !== '') { ?>
        <div class="breadcrumb">
            <?php echo $breadcrumb; ?>
            <div class="clear"></div> 
        </div> 
    <?php
        }
    ?>
    <?php osc_show_flash_message(); ?>
</div>
	<div id="home" class="div-cont" >
		
			<?php 
			osc_run_hook('inside-main'); 
		?>
			<?php osc_run_hook('home-content'); ?>
	</div>
	<?php osc_run_hook('product');?>
	
			  <?php if( osc_users_enabled() ) { ?>
            <?php if( !osc_is_web_user_logged_in() ) { ?>
	<?php osc_run_hook('login-content');
	}}?>
	
	<?php osc_run_hook('contact-content');?>