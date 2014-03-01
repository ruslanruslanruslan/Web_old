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

/**

DEFINES

*/
    define('BENDER_THEME_VERSION', '1.0');
    if( !osc_get_preference('keyword_placeholder', 'bender_theme') ) {
        osc_set_preference('keyword_placeholder', __('ie. PHP Programmer', 'bender'), 'bender_theme');
    }
    osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));
    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));
    osc_enqueue_script('fancybox');
    // used for date/dateinterval custom fields
    osc_enqueue_script('php-date');

/**

FUNCTIONS

*/

    // install update options
    if( !function_exists('benderBodyClass_theme_install') ) {
        function bender_theme_install() {
            osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'bender_theme');
            osc_set_preference('version', BENDER_THEME_VERSION, 'bender_theme');
            osc_set_preference('footer_link', '1', 'bender_theme');
            osc_set_preference('donation', '0', 'bender_theme');
            osc_set_preference('default_logo', '1', 'bender_theme');
            osc_set_preference('defaultShowAs@all', 'list', 'bender_theme');
            osc_set_preference('defaultShowAs@search', 'list');
            osc_reset_preferences();
        }
    }

    if(!function_exists('check_install_bender_theme')) {
        function check_install_bender_theme() {
            $current_version = osc_get_preference('version', 'bender_theme');
            //check if current version is installed or need an update<
            if( !$current_version ) {
                bender_theme_install();
            }
        }
    }

    if(!function_exists('bender_add_body_class_construct')) {
        function bender_add_body_class_construct($classes){
            $benderBodyClass = benderBodyClass::newInstance();
            $classes = array_merge($classes, $benderBodyClass->get());
            return $classes;
        }
    }
    if(!function_exists('bender_body_class')) {
        function bender_body_class($echo = true){
            /**
            * Print body classes.
            *
            * @param string $echo Optional parameter.
            * @return print string with all body classes concatenated
            */
            osc_add_filter('bender_bodyClass','bender_add_body_class_construct');
            $classes = osc_apply_filter('bender_bodyClass', array());
            if($echo && count($classes)){
                echo 'class="'.implode(' ',$classes).'"';
            } else {
                return $classes;
            }
        }
    }
    if(!function_exists('bender_add_body_class')) {
        function bender_add_body_class($class){
            /**
            * Add new body class to body class array.
            *
            * @param string $class required parameter.
            */
            $benderBodyClass = benderBodyClass::newInstance();
            $benderBodyClass->add($class);
        }
    }
    if(!function_exists('bender_nofollow_construct')) {
        /**
        * Hook for header, meta tags robots nofollos
        */
        function bender_nofollow_construct() {
            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;
            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;

        }
    }
    if( !function_exists('bender_follow_construct') ) {
        /**
        * Hook for header, meta tags robots follow
        */
        function bender_follow_construct() {
            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;
            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;

        }
    }
    /* logo */
    if( !function_exists('logo_header') ) {
        function logo_header() {
             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . osc_current_web_theme_url('images/logo.jpg') . '"></a>';
             if( file_exists( WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg' ) ) {
                return $html;
             } else {
                return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';
            }
        }
    }
    if( !function_exists('bender_draw_item') ) {
        function bender_draw_item($class = false,$admin = false, $premium = false) {
            $premiumSlug = '';
            if($premium){
                $premiumSlug = '-premium';
            }
			
            require WebThemes::newInstance()->getCurrentThemePath().'loop-single'.$premiumSlug.'.php';
        }
    }
    if( !function_exists('bender_show_as') ){
        function bender_show_as(){

            $p_sShowAs    = Params::getParam('sShowAs');
            $aValidShowAsValues = array('list', 'gallery');
            if (!in_array($p_sShowAs, $aValidShowAsValues)) {
                $p_sShowAs = bender_default_show_as();
            }

            return $p_sShowAs;
        }
    }
    if( !function_exists('bender_default_show_as') ){
        function bender_default_show_as(){
            return getPreference('defaultShowAs@all','bender_theme');
        }
    }
    if( !function_exists('bender_draw_categories_list') ) {
        function bender_draw_categories_list(){ ?>
        <?php echo '<div id="home" class="div-cont">	<article class="service_area">';  ?>
         <?php
         //cell_3
        $total_categories   = osc_count_categories();
        $col1_max_cat       = ceil($total_categories/3);

         osc_goto_first_category();
         $i      = 0;

         while ( osc_has_categories() ) {
         ?>
        <?php
            if($i%$col1_max_cat == 0){
                if($i > 0) { echo '</div>'; }
                if($i == 0) {
                   echo '<div class="cell_3 first_cel">';
                } else {
                    echo '<div class="cell_3">';
                }
            }
        ?>
    <div class="instrument device">
	<?php if($i=='0'){?>
            <img src="<?php echo osc_current_web_theme_url('images/instrument.png')?>" alt="image Here" />
			<?php } elseif($i=='1'){?>
            <img src="<?php echo osc_current_web_theme_url('images/devices.png')?>" alt="image Here" />
			<?php } if($i=='2'){?>
            <img src="<?php echo osc_current_web_theme_url('images/services.png')?>" alt="image Here" />
			<?php }?>
            <h2><a class="<?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span></h2>
			<?php /**/if ( osc_count_subcategories() > 0 ) { ?>
               <ul>
                         <?php while ( osc_has_subcategories() ) { ?>
                             <li>
                             <?php if( osc_category_total_items() > 0 ) { ?><a class="category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>
                             <?php } else { ?><span><?php echo osc_category_name() ; ?> (<?php echo osc_category_total_items() ; ?>)</span></li>
                             <?php } ?>
                         <?php } ?>
                   </ul>
			<?php } ?>
        </div>
        <?php
                $i++;
            } 
            echo '</div></article>';
        ?>
        
        <?php
        }
    }
	
	if(!function_exists('home_content_page')){
	 function home_content_page(){
	 ?>
	 		<article class="banner">
			<img src="<?php echo osc_current_web_theme_url('images/banner.png');?>" alt="" />
		</article>
	 <article class="welcome_area">
	<section class="welcome_mid_box wrapper">
    	<h1>Welcome</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
   <img src="<?php echo osc_current_web_theme_url('images/man_image.png');?>" alt="" />
     </section>
</article>
</div>
	 <?php 
	 }
	}
	
    if( !function_exists('bender_search_number') ) {
        /**
          *
          * @return array
          */
        function bender_search_number() {
            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);
            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());
            if( $search_to > osc_search_total_items() ) {
                $search_to = osc_search_total_items();
            }

            return array(
                'from' => $search_from,
                'to'   => $search_to,
                'of'   => osc_search_total_items()
            );
        }
    }
    /*
     * Helpers used at view
     */
    if( !function_exists('bender_item_title') ) {
        function bender_item_title() {
            $title = osc_item_title();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('title') != "" ) {
                    $title_ = Session::newInstance()->_getForm('title');
                    if( @$title_[$locale['pk_c_code']] != "" ){
                        $title = $title_[$locale['pk_c_code']];
                    }
                }
            }
            return $title;
        }
    }
    if( !function_exists('bender_item_description') ) {
        function bender_item_description() {
            $description = osc_item_description();
            foreach( osc_get_locales() as $locale ) {
                if( Session::newInstance()->_getForm('description') != "" ) {
                    $description_ = Session::newInstance()->_getForm('description');
                    if( @$description_[$locale['pk_c_code']] != "" ){
                        $description = $description_[$locale['pk_c_code']];
                    }
                }
            }
            return $description;
        }
    }
    if( !function_exists('related_listings') ) {
        function related_listings() {
            View::newInstance()->_exportVariableToView('items', array());

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addRegion(osc_item_region());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems      = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems == 3 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            $mSearch = new Search();
            $mSearch->addCategory(osc_item_category_id());
            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));
            $mSearch->limit('0', '3');

            $aItems = $mSearch->doSearch();
            $iTotalItems = count($aItems);
            if( $iTotalItems > 0 ) {
                View::newInstance()->_exportVariableToView('items', $aItems);
                return $iTotalItems;
            }
            unset($mSearch);

            return 0;
        }
    }

    if( !function_exists('osc_is_contact_page') ) {
        function osc_is_contact_page() {
            if( Rewrite::newInstance()->get_location() === 'contact' ) {
                return true;
            }

            return false;
        }
    }

    if( !function_exists('get_breadcrumb_lang') ) {
        function get_breadcrumb_lang() {
            $lang = array();
            $lang['item_add']               = __('Publish a listing', 'bender');
            $lang['item_edit']              = __('Edit your listing', 'bender');
            $lang['item_send_friend']       = __('Send to a friend', 'bender');
            $lang['item_contact']           = __('Contact publisher', 'bender');
            $lang['search']                 = __('Search results', 'bender');
            $lang['search_pattern']         = __('Search results: %s', 'bender');
            $lang['user_dashboard']         = __('Dashboard', 'bender');
            $lang['user_dashboard_profile'] = __("%s's profile", 'bender');
            $lang['user_account']           = __('Account', 'bender');
            $lang['user_items']             = __('Listings', 'bender');
            $lang['user_alerts']            = __('Alerts', 'bender');
            $lang['user_profile']           = __('Update account', 'bender');
            $lang['user_change_email']      = __('Change email', 'bender');
            $lang['user_change_username']   = __('Change username', 'bender');
            $lang['user_change_password']   = __('Change password', 'bender');
            $lang['login']                  = __('Login', 'bender');
            $lang['login_recover']          = __('Recover password', 'bender');
            $lang['login_forgot']           = __('Change password', 'bender');
            $lang['register']               = __('Create a new account', 'bender');
            $lang['contact']                = __('Contact', 'bender');
            return $lang;
        }
    }

    if(!function_exists('user_dashboard_redirect')) {
        function user_dashboard_redirect() {
            $page   = Params::getParam('page');
            $action = Params::getParam('action');
            if($page=='user' && $action=='dashboard') {
                if(ob_get_length()>0) {
                    ob_end_flush();
                }
                header("Location: ".osc_user_list_items_url(), TRUE,301);
            }
        }
        osc_add_hook('init', 'user_dashboard_redirect');
    }

    if( !function_exists('get_user_menu') ) {
        function get_user_menu() {
            $options   = array();
            $options[] = array(
                'name'  => __('Listings', 'bender'),
                'url'   => osc_user_list_items_url(),
                'class' => 'opt_items'
            );
            $options[] = array(
                'name' => __('Alerts', 'bender'),
                'url' => osc_user_alerts_url(),
                'class' => 'opt_alerts'
            );
            $options[] = array(
                'name'  => __('Account', 'bender'),
                'url'   => osc_user_profile_url(),
                'class' => 'opt_account'
            );
            $options[] = array(
                'name'  => __('Change email', 'bender'),
                'url'   => osc_change_user_email_url(),
                'class' => 'opt_change_email'
            );
            $options[] = array(
                'name'  => __('Change username', 'bender'),
                'url'   => osc_change_user_username_url(),
                'class' => 'opt_change_username'
            );
            $options[] = array(
                'name'  => __('Change password', 'bender'),
                'url'   => osc_change_user_password_url(),
                'class' => 'opt_change_password'
            );
            $options[] = array(
                'name'  => __('Delete account', 'bender'),
                'url'   => '#',
                'class' => 'opt_delete_account'
            );

            return $options;
        }
    }

    if( !function_exists('delete_user_js') ) {
        function delete_user_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();
            if( ($location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items'))) || (Params::getParam('page') ==='custom' && Params::getParam('in_user_menu')==true ) ) {
                osc_enqueue_script('delete-user-js');
            }
        }
        osc_add_hook('header', 'delete_user_js', 1);
    }

    if( !function_exists('user_info_js') ) {
        function user_info_js() {
            $location = Rewrite::newInstance()->get_location();
            $section  = Rewrite::newInstance()->get_section();

            if( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) ) {
                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );
                View::newInstance()->_exportVariableToView('user', $user);
                ?>
<script type="text/javascript">
    bender.user = {};
    bender.user.id = '<?php echo osc_user_id(); ?>';
    bender.user.secret = '<?php echo osc_user_field("s_secret"); ?>';
</script>
            <?php }
        }
        osc_add_hook('header', 'user_info_js');
    }

    function theme_bender_actions_admin() {
        if( Params::getParam('file') == 'oc-content/themes/bender/admin/settings.php' ) {
            if( Params::getParam('donation') == 'successful' ) {
                osc_set_preference('donation', '1', 'bender_theme');
                osc_reset_preferences();
            }
        }

        switch( Params::getParam('action_specific') ) {
            case('settings'):
                $footerLink  = Params::getParam('footer_link');
                $defaultLogo = Params::getParam('default_logo');

                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'bender_theme');
                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'bender_theme');
                osc_set_preference('default_logo', ($defaultLogo ? '1' : '0'), 'bender_theme');
                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'bender_theme');
                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));

                osc_add_flash_ok_message(__('Theme settings updated correctly', 'bender'), 'admin');
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/bender/admin/settings.php'));
            break;
            case('upload_logo'):
                $package = Params::getFiles('logo');
                if( $package['error'] == UPLOAD_ERR_OK ) {
                    if( move_uploaded_file($package['tmp_name'], WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                        osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'bender'), 'admin');
                    } else {
                        osc_add_flash_error_message(__("An error has occurred, please try again", 'bender'), 'admin');
                    }
                } else {
                    osc_add_flash_error_message(__("An error has occurred, please try again", 'bender'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/bender/admin/header.php'));
            break;
            case('remove'):
                if(file_exists( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" ) ) {
                    @unlink( WebThemes::newInstance()->getCurrentThemePath() . "images/logo.jpg" );
                    osc_add_flash_ok_message(__('The logo image has been removed', 'bender'), 'admin');
                } else {
                    osc_add_flash_error_message(__("Image not found", 'bender'), 'admin');
                }
                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/bender/admin/header.php'));
            break;
        }
    }

    function bender_redirect_user_dashboard()
    {
        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {
            header('Location: ' .osc_user_list_items_url());
            exit;
        }
    }
    osc_add_hook('init', 'bender_redirect_user_dashboard', 2);
    osc_add_hook('init_admin', 'theme_bender_actions_admin');
    osc_admin_menu_appearance(__('Header logo', 'bender'), osc_admin_render_theme_url('oc-content/themes/bender/admin/header.php'), 'header_bender');
    osc_admin_menu_appearance(__('Theme settings', 'bender'), osc_admin_render_theme_url('oc-content/themes/bender/admin/settings.php'), 'settings_bender');
/**

TRIGGER FUNCTIONS

*/
check_install_bender_theme();
if(osc_is_home_page()){
    osc_add_hook('inside-main','bender_draw_categories_list');
} else if( osc_is_static_page() || osc_is_contact_page() ){
    osc_add_hook('before-content','bender_draw_categories_list');
}
if(osc_is_home_page()){
    osc_add_hook('home-content','home_content_page');
}
if(osc_is_home_page()){
    osc_add_hook('product','product_listing');
    osc_add_hook('login-content','login_content');
    osc_add_hook('contact-content','contact_content');
}
if(osc_is_home_page() || osc_is_search_page()){
    bender_add_body_class('has-searchbox');
}


function bender_sidebar_category_search($catId = null)
{
    $aCategories = array();
    if($catId==null) {
        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();
    } else {
        // if parent category, only show parent categories
        $aCategories = Category::newInstance()->toRootTree($catId);
        end($aCategories);
        $cat = current($aCategories);
        // if is parent of some category
        $childCategories = Category::newInstance()->findSubcategories($cat['pk_i_id']);
        if(count($childCategories) > 0) {
            $aCategories[] = $childCategories;
        }
    }

    if(count($aCategories) == 0) {
        return "";
    }

    bender_print_sidebar_category_search($aCategories, $catId);
}

function bender_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)
{
    $class = '';
    if(!isset($aCategories[$i])) {
        return null;
    }

    if($i===0) {
        $class = 'class="category"';
    }

    $c   = $aCategories[$i];
    $i++;
    if(!isset($c['pk_i_id'])) {
        echo '<ul '.$class.'>';
        if($i==1) {
            echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null))).'">'.__('All categories')."</a></li>";
        }
        foreach($c as $key => $value) {
    ?>
            <li>
                <a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id']))); ?>">
                <?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }
                else{ echo $value['s_name']; } ?>
                </a>

            </li>
    <?php
        }
        if($i==1) {
        echo "</ul>";
        } else {
        echo "</ul>";
        }
    } else {
    ?>
    <ul <?php echo $class;?>>
        <?php if($i==1) { ?>
        <li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null))); ?>"><?php _e('All categories'); ?></a></li>
        <?php } ?>
            <li>
                <a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id']))); ?>">
                <?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }
                      else{ echo $c['s_name']; } ?>
                </a>
                <?php bender_print_sidebar_category_search($aCategories, $current_category, $i); ?>
            </li>
        <?php if($i==1) { ?>
        <?php } ?>
    </ul>
<?php
    }
}

?>
<?php  
if(!function_exists('product_listing')){
function product_listing(){ ?>
<div id="listing" class="div-cont" >
<article class="latest_box">
		<section class="latest_midbox wrapper">
			<h1 class="latest"><?php _e('Latest Listings', 'bender') ; ?></h1>
			<?php if( osc_count_latest_items() == 0) { ?>
				<div class="clear"></div>
				<p class="empty"><?php _e("There aren't listings available at this moment", 'bender'); ?></p>
			<?php } else { ?>
			<div class="listing">
			<?php //osc_current_web_theme_path('loop.php'); ?>
            	 <?php
            $i = 0;
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                bender_draw_item($class);
                $i++;
            }
        ?>
				<?php if( osc_count_latest_items() == osc_max_latest_items() ) { ?>
					<a href="<?php echo osc_search_show_all_url() ; ?>" class="view_more">View More</a>
				<?php } ?>
            </div>
            <?php } ?>
			<?php if(osc_count_list_regions() > 0 ) { ?>
            <aside class="location">
            	<h1><?php _e("Location", 'bender') ; ?></h1>
					<?php while(osc_has_list_regions() ) { ?>
					<li><a href="<?php echo osc_list_region_url(); ?>"><?php echo osc_list_region_name() ; ?>(<?php echo osc_list_region_items() ; ?>)</a></li>
					<?php } ?>
               
                <div class="clear"></div>
            </aside>
            <?php } ?>
            <div class="clear"></div>
        </section>
</article>
</div>
<?php } 
}
 if(!function_exists('login_content')){
function login_content(){?>
<div id="login_register" class="div-cont"  >
<article class="login_are">
	<section class="login_midbox wrapper">
    	<h1 class="login_text">Login & Sign Up</h1>
        <aside class="login_areabox">
        	<h1>Log in to Play and Bay</h1>
            <ul>
            	<li>
                	<label>User Name/Email</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<label>Enter Password Here</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<a href="#">forgot password ?</a>
                    <input type="button" value="Login" />
                </li>
            </ul>
        </aside>
        <aside class="login_areabox login_areabox2">
        	<h1>Register for Play and Bay</h1>
            <ul>
            	<li>
                	<label>First Name</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<label>Last Name</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<label>Email</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<label>Password</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                	<label>Re-Enter Password</label>
                    <input type="text" placeholder="" value="" />
                </li>
            	<li>
                    <input type="button" value="Submit" />
                </li>
            </ul>
        </aside>
        <div class="clear"></div>
    </section>
</article>
</div>
<?php }
} if(!function_exists('contact_content')){
function contact_content(){?>

<div id="contact" class="div-cont" >
<article class="contact_area">
		<section class="contact_midbox wrapper">
        		<center>
                    <ul class="social-links clearfix">
                        <li class="flx-facebook-icon"><a href="#"></a></li>
                        <li class="flx-skype-icon"><a href="#"></a></li>
                        <li class="flx-youtube-icon"><a href="#"></a></li>
                        <li class="flx-linkdin-icon"><a href="#"></a></li>
                        <li class="flx-vk-icon"><a href="#"></a></li>
                    </ul>
                </center>
        		<h1 class="latest"><?php _e('Contact us', 'bender'); ?></h1>
				<form name="contact_form" action="<?php echo osc_base_url(true); ?>" method="post" >
					<aside class="map_back">
						 <?php ContactForm::your_name(); ?>
						 <?php ContactForm::your_email(); ?>
						 <?php ContactForm::your_phone_number(); ?> 
						 <?php ContactForm::your_message(); ?>
						
						<input type="submit" class="submit" value="Submit"/>
					</aside>
					<?php osc_run_hook('contact_form'); ?>
					<button type="submit" class="ui-button ui-button-middle ui-button-main"><?php _e("Send", 'bender');?></button>
					<?php osc_run_hook('admin_contact_form'); ?>
				</form>
				<?php ContactForm::js_validation(); ?>
                <aside class="contact_text">
                	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. <br /><br />

						<span>Email:</span> info@playandbay.com<br />
                        <span>Phone:</span> 80808000<br />
                        <span>Fax:</span> +91 8582485425<br />
                        <span>Website:</span> www.playandbay.com
                    </p>
                </aside>
                <div class="clear"></div>
        </section>

</article>
</div>
<?php }
}?>
<?php


/**

CLASSES

*/
class benderBodyClass
{
    /**
    * Custom Class for add, remove or get body classes.
    *
    * @param string $instance used for singleton.
    * @param array $class.
    */
    private static $instance;
    private $class;

    private function __construct()
    {
        $this->class = array();
    }

    public static function newInstance()
    {
        if (  !self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function add($class)
    {
        $this->class[] = $class;
    }
    public function get()
    {
        return $this->class;
    }
}
?>