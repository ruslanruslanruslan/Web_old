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
			<article class="product_detail_text">
            	<h1> <?php echo osc_item_title() . ' ' . osc_item_city(); ?></h1>
            	<h2><b><?php if ( osc_item_pub_date() !== '' ) { printf( __('<strong class="publish">Published date</strong>: %1$s', 'bender'), osc_format_date( osc_item_pub_date() ) ); } ?></b><br>
				<b><?php _e("Location", 'bender'); ?>: <?php echo implode(', ', $location); ?>:</b></h2>
				<?php if( osc_price_enabled_at_items() ) { ?>
				<?php bender_draw_dropdown(); ?>
				<?php } ?>
              
			   <?php if(osc_is_web_user_logged_in() && osc_logged_user_id()==osc_item_user_id()) { ?>
            <p id="edit_item_view">
                <strong>
                    <a href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'bender'); ?></a>
                </strong>
            </p>
        <?php } ?>
                <div class="clear"></div>
                <p class="description"><?php echo osc_item_description(); ?></p>
                
				   <?php show_qrcode(); ?>
				   
				    <?php if( osc_count_item_meta() >= 1 ) { ?>
                <br />
                <h3>
                    <?php while ( osc_has_item_meta() ) { ?>
                        <?php if(osc_item_meta_value()!='') { ?>
                                <b><?php echo osc_item_meta_name(); ?>:</b> <?php echo osc_item_meta_value(); ?>
                        <?php } ?>
                    <?php } ?>
                </h3>
            <?php } ?>
			
				        <?php osc_run_hook('item_detail', osc_item() ); ?>
 	<?php echo osc_item_views() ; ?> <?php _e('views', 'bender'); ?>
        <p class="contact_button">
            <?php if( !osc_item_is_expired () ) { ?>
            <?php if( !( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) ) { ?>
                <?php     if(osc_reg_user_can_contact() && osc_is_web_user_logged_in() || !osc_reg_user_can_contact() ) { ?>
                    <a href="#contact" class="ui-button ui-button-middle ui-button-main resp-toogle"><?php _e('Contact seller', 'bender'); ?></a>
                <?php     } ?>
            <?php     } ?>
            <?php } ?>
           <?php watchlist(); ?>
           <?php osclass_pm_link(); ?>
           <a href="<?php echo osc_item_send_friend_url(); ?>" rel="nofollow" class="ui-button ui-button-middle"><?php _e('Share', 'bender'); ?></a>
        </p>
        <?php osc_run_hook('location'); ?>
               
             </article>
			<div class="clear"></div>
			 <?php if( osc_comments_enabled() ) { ?>
        <?php if( osc_reg_user_post_comments () && osc_is_web_user_logged_in() || !osc_reg_user_post_comments() ) { ?>
        <div class="comment_area">
            <h2><?php _e('Comments', 'bender'); ?></h2>
            <ul id="comment_error_list"></ul>
            <?php CommentForm::js_validation(); ?>
            <?php if( osc_count_item_comments() >= 1 ) { ?>
                <div class="comments_list">
                    <?php while ( osc_has_item_comments() ) { ?>
                        <div class="comment">
                            <h3><strong><?php echo osc_comment_title(); ?></strong> <em><?php _e("by", 'bender'); ?> <?php echo osc_comment_author_name(); ?>:</em></h3>
                            <p><?php echo nl2br( osc_comment_body() ); ?> </p>
                            <?php if ( osc_comment_user_id() && (osc_comment_user_id() == osc_logged_user_id()) ) { ?>
                            <p>
                                <a rel="nofollow" href="<?php echo osc_delete_comment_url(); ?>" title="<?php _e('Delete your comment', 'bender'); ?>"><?php _e('Delete', 'bender'); ?></a>
                            </p>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="paginate" style="text-align: right;">
                        <?php echo osc_comments_pagination(); ?>
                    </div>
                </div>
            <?php } ?>
            <h2><?php _e('Leave your comment (spam and offensive messages will be removed)', 'bender'); ?></h2>
                    <form action="<?php echo osc_base_url(true); ?>" method="post" name="comment_form" id="comment_form">
                            <input type="hidden" name="action" value="add_comment" />
                            <input type="hidden" name="page" value="item" />
                            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
                           <?php if(osc_is_web_user_logged_in()) { ?>
                        <input type="hidden" name="authorName" value="<?php echo osc_esc_html( osc_logged_user_name() ); ?>" />
                        <input type="hidden" name="authorEmail" value="<?php echo osc_logged_user_email();?>" />
                            <?php } else {?>
                                        <?php CommentForm::author_input_text(); ?>
                                        <?php CommentForm::email_input_text(); ?>
                            <?php }; ?>
                                       <?php CommentForm::body_input_textarea(); ?>
                            <div class="clear"></div>
                                <button class="share" type="submit"><?php _e('Submit', 'bender'); ?></button>
                    </form>
        </div>
        <?php } ?>
    <?php } ?>

	</section>
	<?php related_listings(); ?>

	<section class="related_box">
	        <?php if( osc_count_items() > 0 ) { ?>
        		<aside class="related_list">
                	<h1><?php _e('Related listings', 'bender'); ?></h1>
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
			
			<?php osc_current_web_theme_path('item-sidebar.php');?>
                <div class="clear"></div>
        </section>
   
    <div class="clear"></div>
</section>

<div class="clear"></div>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>