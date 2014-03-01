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
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','bender_nofollow_construct');
    } else {
        osc_add_hook('header','bender_follow_construct');
    }

    bender_add_body_class('search');
    $listClass = '';
    $buttonClass = '';
    if(osc_search_show_as() == 'gallery'){
          $listClass = 'listing-grid';
          $buttonClass = 'active';
    }
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('search-sidebar.php');
    }
    osc_add_hook('footer','autocompleteCity');
    function autocompleteCity(){ ?>
    <script type="text/javascript">
    $(function() {
                    function log( message ) {
                        $( "<div/>" ).text( message ).prependTo( "#log" );
                        $( "#log" ).attr( "scrollTop", 0 );
                    }

                    $( "#sCity" ).autocomplete({
                        source: "<?php echo osc_base_url(true); ?>?page=ajax&action=location",
                        minLength: 2,
                        select: function( event, ui ) {
                            $("#sRegion").attr("value", ui.item.region);
                            log( ui.item ?
                                "<?php _e('Selected', 'modern'); ?>: " + ui.item.value + " aka " + ui.item.id :
                                "<?php _e('Nothing selected, input was', 'modern'); ?> " + this.value );
                        }
                    });
					
                });
    </script>
    <?php
    }
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<div class="page">
<section class="wrapper result_outer">
    <?php osc_run_hook('before-main');?>
    <section class="result_box">
    	<h1 class="result"><?php _e('Search Results for :- ','bender'); ?><?php echo search_title(); ?></h1>
		<?php osc_run_hook('search_ads_listing_top'); ?>
			<div class="my_page" style="margin-top:10px">
    	<?php echo osc_search_pagination(); ?>
		</div>
        <div class="clear"></div>
		<?php if(osc_count_items() == 0) { ?>
                 <div class="refine_result"><p><?php printf(__('There are no results matching "%s"', 'bender'), osc_search_pattern()) ; ?></p></div>
            <?php } else { 
			 $search_number = bender_search_number();
				echo '<div class="refine_result"><p>';
                printf(__('%1$d to %2$d of <span> %3$d </span> listings', 'bender'), $search_number['from'], $search_number['to'], $search_number['of']);
				echo '</p>';
			?>
            <div class="sort">
            <span>	<?php _e('Sort by', 'bender'); ?>:</span>
				 <?php
              $orders = osc_list_orders();
              $current = '';
              foreach($orders as $label => $params) {
                  $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1';
                  if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) {
                      $current = $label;
                  }
              }
              ?>
			  <label>Newly listed <b class="arrow-down"></b></label>
                <ul class="price_drop">
                	  <?php
                  foreach($orders as $label => $params) {
                      $orderType = ($params['iOrderType'] == 'asc') ? '0' : '1'; ?>
                      <?php if(osc_search_order() == $params['sOrder'] && osc_search_order_type() == $orderType) { ?>
                          <li><a class="current" href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                      <?php } else { ?>
                          <li><a href="<?php echo osc_esc_html(osc_update_search_url($params)); ?>"><?php echo $label; ?></a></li>
                      <?php } ?>
                      <?php $i++; ?>
                  <?php } ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
		        <?php
            $i = 0;
            osc_get_premiums();
            if(osc_count_premiums() > 0) {
            
                while ( osc_has_premiums() ) {
                    $class = '';
                    if($i%3 == 0){
                        $class = 'first';
                    }
                    bender_draw_item_search($class,false,true);
                    $i++;
                    if($i == 3){
                        break;
                    }
                }
        
            }
        ?>
		     <?php if(osc_count_items() > 0) { ?>
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
		  <div class="my_page" style="margin-top:10px">
    	<?php echo osc_search_pagination(); ?>
		</div> 
     <div class="clear"></div>
      <?php
      if(osc_rewrite_enabled()){
      $footerLinks = osc_search_footer_links();
      if(count($footerLinks)>0) {
      ?>
      <div id="related-searches">
        <h5><?php _e('Other searches that may interest you','bender'); ?></h5>
        <ul class="footer-links">
          <?php foreach($footerLinks as $f) { View::newInstance()->_exportVariableToView('footer_link', $f); ?>
          <?php if($f['total'] < 3) continue; ?>
            <li><a href="<?php echo osc_footer_link_url(); ?>"><?php echo osc_footer_link_title(); ?></a></li>
          <?php } ?>
        </ul>
      </div>
      <?php } 
      } 
	  } ?>
       
       <?php }?>
    </section>
    <div class="clear"></div>
</section>
        </div>
<?php osc_current_web_theme_path('footer.php') ; ?>