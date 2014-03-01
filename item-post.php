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
osc_add_hook('header','bender_nofollow_construct');

    osc_enqueue_script('jquery-validate');
    bender_add_body_class('item item-post');
    $action = 'item_add_post';
    $edit = false;
    if(Params::getParam('action') == 'item_edit'){
        $action = 'item_edit_post';
        $edit = true;
    }
    ?>
<?php osc_current_web_theme_path('header.php') ; ?>
<?php ItemForm::location_javascript_new(); ?>
<?php if(osc_images_enabled_at_items()) ItemForm::photos_javascript(); ?>
<section class="wrapper result_outer account_outer">
  
 <article class="after_loginarea">
 	<h1 class="publish"><?php _e('Publish a listing', 'isha'); ?></h1>
	 <form name="item" action="<?php echo osc_base_url(true);?>" method="post" enctype="multipart/form-data" id="item-post">
     <input type="hidden" name="action" value="<?php echo $action; ?>" />
                    <input type="hidden" name="page" value="item" />
                    <?php if($edit){ ?>
                        <input type="hidden" name="id" value="<?php echo osc_item_id();?>" />
                        <input type="hidden" name="secret" value="<?php echo osc_item_secret();?>" />
                    <?php } ?>
	<h1><?php _e('General Information', 'isha'); ?></h1>
    <div class="inner_area">
    	<ul> 
        	<li>
            	<label><?php _e('Category', 'isha'); ?></label>
                <?php ItemForm::category_select(null, null, __('Select a category', 'isha')); ?>
            </li>
            <li>
            	<label for="title[<?php echo osc_locale_code(); ?>]"><?php _e('Title', 'isha'); ?></label>
                <?php ItemForm::title_input('title',osc_locale_code(), osc_esc_html( bender_item_title() )); ?>
            </li>
            <li>
            	<label for="description[<?php echo osc_locale_code(); ?>]"><?php _e('Description', 'isha'); ?></label>
                 <?php ItemForm::description_textarea('description',osc_locale_code(), osc_esc_html( bender_item_description() )); ?>
           	</li>
			<?php if( osc_price_enabled_at_items() ) { ?>
            <li>
            	<label for="price"><?php _e('Price', 'isha'); ?></label>
                 <?php ItemForm::price_input_text(); ?>
                                <?php ItemForm::currency_select(); ?>
            </li>
			<?php } ?>
        </ul>
    
    </div>
	<?php if( osc_images_enabled_at_items() ) { ?>
 	<h1><?php _e('Photo', 'isha'); ?></h1>
    <div class="inner_area">
    	<ul>
        	<li>
            	<label  for="photos[]"><?php _e('Photos', 'isha'); ?></label>
                
				<div id="photos">
                	  <?php ItemForm::photos(); ?>
                </div>
               
                <a href="#" onclick="addNewPhoto(); return false;"><?php _e('Add new photo', 'isha'); ?></a>
                <div class="clear"></div>
            </li>
            
        </ul>
    
    </div>
	<?php }?>
    <h1><?php _e('Listing Location', 'isha'); ?></h1>
    <div class="inner_area">
    	<ul>
        	<li>
            	<label  for="country"><?php _e('Country', 'isha'); ?></label>
                <?php ItemForm::country_select(osc_get_countries(), osc_user()); ?>
            </li>
            <li>
            	<label  for="region"><?php _e('Region', 'isha'); ?></label>
                <?php ItemForm::region_text(osc_user()); ?>
            </li>
            <li>
            	<label  for="city"><?php _e('City', 'isha'); ?></label>
               <?php ItemForm::city_text(osc_user()); ?>
            </li>
            <li>
            	<label for="cityArea"><?php _e('City Area', 'isha'); ?></label>
                <?php ItemForm::city_area_text(osc_user()); ?>
            </li>
            <li>
            	<label for="address"><?php _e('Address', 'isha'); ?></label>
                 <?php ItemForm::address_text(osc_user()); ?>
            </li>
        
        </ul>
    </div>
	 <?php if(!osc_is_web_user_logged_in() ) { ?>
	 <h1><?php _e("Seller's information", 'isha'); ?></h1>
	 
	    <div class="inner_area">
    	<ul>
        	<li>
            	<label for="contactName"><?php _e('Name', 'isha'); ?></label>
                <?php ItemForm::contact_name_text(); ?>
            </li>
            <li>
            	<label for="contactEmail"><?php _e('E-mail', 'isha'); ?></label>
                <?php ItemForm::contact_email_text(); ?>
            </li>
            <li>
            	<?php ItemForm::show_email_checkbox(); ?> 
				<label for="showEmail"><?php _e('Show e-mail on the listing page', 'isha'); ?></label>
            </li>
          
        </ul>

    </div>
	<?php }    if($edit) {
                            ItemForm::plugin_edit_item();
                        } else {
                            ItemForm::plugin_post_item();
                        }
                        ?>
						 <div class="inner_area">
						 <ul>
						 <li>
						   <button type="submit" class="publish_new_btn ui-button ui-button-middle ui-button-main">
						   <?php if($edit) { _e("Update", 'isha'); } 
						   else { _e("Publish", 'isha'); } ?></button>
						   </li>
						   </ul> 
						   </div>
	</form>
 </article>
 
<div class="clear"></div>
</section>

<?php osc_current_web_theme_path('footer.php'); ?>