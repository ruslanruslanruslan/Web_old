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

    bender_add_body_class('user user-items');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_current_web_theme_path('header.php') ;

    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Alerts', 'isha');;
    }
  $osc_user = osc_user();

  if(osc_is_web_user_logged_in() ) {
   $pm_id = Params::getParam('message');
   switch(Params::getParam('box')) {
      case 'inbox':
         $pm = ModelPM::newInstance()->getRecipientMessage(osc_logged_user_id(), 1, 0, $pm_id );
    //echo "danish"; print_r($pm); die;
         if($pm['recipNew'] == 1) {
            ModelPM::newInstance()->updateMessageAsRead($pm['pm_id']);
         }
      break;
      case 'outbox':
         $pm = ModelPM::newInstance()->getSenderMessage(osc_logged_user_id(), 1, $pm_id );
      break;
   }
   $words[] = array('[quote]','[/quote]', '[quoteAuthor]','[/quoteAuthor]');
   $words[] = array('<div class="messQuote">','</div>', '<div class="quoteAuthor">','</div>');
  /* $message  = osc_mailBeauty($pm['pm_message'], $words) ;*/

 /*if($pm['sender_id'] != 0){
                     $user = User::newInstance()->findByPrimaryKey($pm['sender_id']);
                  } else { */$user['s_name'] = pmAdmin(); /*} */

   }
$i_userId = osc_logged_user_id();

?>
   <script>
    (function($){



    })(jQuery)

    </script>
<?php osc_run_hook('search_ads_listing_top'); ?>
<section class="wrapper result_outer account_outer">

<section class="account_box">
      <h1 class="result"><?php _e('My Account', 'isha') ; ?></h1>
        <ul class="resuult_ul">
          <li>
                <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/listing_icon.png')?>">
          <h2><?php _e('Listings', 'isha') ; ?><span><?php _e('Your Selected Listings', 'isha') ; ?></span></h2>
        <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>
                <div class="wishlist" style="display: none;">
                  <h1><?php _e('My Listings', 'isha') ; ?></h1>
           <?php if(osc_count_items() == 0) { ?>
                    <p><?php _e('No listings have been added yet', 'isha') ; ?></p>
          <?php } else {
          while(osc_has_items()) {
           $search_number = bender_search_number();

        echo '<p>';
                printf(__('%1$d to %2$d of <span> %3$d </span> listings', 'isha'), $search_number['from'], $search_number['to'], $search_number['of']);
        echo '</p>';
          ?>

                    <article class="list_result">
              <figure class="list_figure">
                        <?php if( osc_images_enabled_at_items() ) { ?>
        <?php if(osc_count_item_resources()) { ?>
     <a class="fir_title_img" href="<?php echo osc_item_url() ; ?>" title="<?php echo osc_item_title() ; ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="50" height="50"></a>
        <?php } else { ?>
           <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="<?php echo osc_item_title() ; ?>" width="50" height="50">
        <?php } ?>
    <?php } ?>
                    

                </figure>
                <div class="list_textbox list_text11">
                  <div class="obiava_text">
                    <h1><?php echo osc_item_title() ; ?>(<?php echo osc_item_category() ; ?>)</h1>
                        <h3><?php echo osc_item_city(); //osc_item()['s_city'];?> - (<?php echo osc_item_region(); ?>) - <?php echo osc_format_date(osc_item_pub_date()); ?>.</h3>
                        </div>                        
                        <div class="obiave_buttons">
            <a class="com_but" href="<?php echo osc_item_edit_url(); ?>" rel="nofollow"><?php _e('Edit item', 'isha'); ?></a>
            <a class="delete com_but" onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can not be undone. Are you sure you want to continue?', 'isha')); ?>')" href="<?php echo osc_item_delete_url();?>" ><?php _e('Delete', 'isha'); ?></a>
                      <?php if(osc_item_is_active()) {?>

                                            <a class="com_but" href="<?php echo osc_item_deactivate_url();?>" ><?php _e('Deactivate', 'isha'); ?></a>
                                            <?php
                                            }
                                            elseif (!osc_item_is_active())
                                            {
                                            ?>
                                            <a class="com_but" href="<?php echo osc_item_activate_url();?>" ><?php _e('Activate', 'isha'); ?></a>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            <div class="for_price"><a class="rate" href="#"><?php if (osc_price_enabled_at_items()) { echo osc_item_formated_price(); ?><?php }?></a></div>
                </div>
                <div class="account_list_text">
                  <p><?php echo osc_highlight( strip_tags( osc_item_description()) ,250) ; ?></p>
                </div>
                <div class="clear"></div>

          <div class="clear"></div>


    </article>
          <?php }
      }?>
                </div>
            </li>

            <li>
              <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/alert.png')?>">
        <h2><?php _e('Alert', 'isha') ; ?><span><?php _e('Your Important Alerts', 'isha') ; ?></span></h2>
        <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>
                 <div class="wishlist" style="display: none;">
                  <h1><?php _e('Alerts', 'isha') ; ?></h1>
          <?php if(osc_count_alerts() <= 0) { ?>
                    <p><?php _e('You do not have any alerts yet.', 'isha') ; ?></p>
          <?php } else { ?>
              <?php
    $i = 1;
    while(osc_has_alerts()) { ?>
        <div class="userItem" >
            <div class="title-has-actions">
                <h3><?php _e('Alert', 'isha'); ?> <?php echo $i; ?></h3> <a onclick="javascript:return confirm('<?php echo osc_esc_js(__('This action can\'t be undone. Are you sure you want to continue?', 'benderw')); ?>');" href="<?php echo osc_user_unsubscribe_alert_url(); ?>"><?php _e('Delete this alert', 'isha'); ?></a><div class="clear"></div></div>
            <div>
            <?php while(osc_has_items()) {
                bender_draw_item();
            } ?>
            <?php if(osc_count_items() == 0) { ?>
                    <br />
                    0 <?php _e('Listings', 'isha'); ?>
            <?php } ?>
            </div>
        </div>
        <br />
    <?php
    $i++;
    }
    ?>
          <?php }?>
                </div>
            </li>
            <li>
      <?php
       $recipPMs = ModelPM::newInstance()->getRecipientMessages(osc_logged_user_id(), 1, 0, 'pm_id', 'DESC');
             $recipCount = count($recipPMs);
             $odd = 1;

              $newPMs = ModelPM::newInstance()->getRecipientMessages(osc_logged_user_id(), 1, 1, 'pm_id', 'DESC');
         $countPMs = count($newPMs);
             //echo  '$recipCount: '.$recipCount;
      ?>
              <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/inbox.png')?>">
        <h2><?php _e('Inbox', 'isha'); ?> (<?php echo ' всего: '.$recipCount.' не прочитанных: '.$countPMs; ?>)<span><?php _e('Your Incoming Messages', 'isha'); ?></span></h2>
        <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>
                <div class="wishlist inbox" style="display: none;overflow:auto">
                  <table cellspacing="0" cellpadding="0">
                      <tbody><tr>
                          <th><input id="all_inbox" type="checkbox"></th>
                            <th><?php _e('Date', 'isha'); ?></th>
                            <th><?php _e('Subject', 'isha'); ?></th>
                            <th><?php _e('From', 'isha'); ?></th>
              <th><?php _e('Action', 'isha'); ?></th>
                        </tr>
             <?php if($recipCount == 0) { ?>
                  <tr class="odd">
                     <td></td>
                     <td></td>
                     <td><?php _e('You have no messages', 'osclass_pm'); ?></td>
                     <td></td>
                  </tr>
                  <?php }else{
          foreach($recipPMs as $recipPM){

           if($odd==1) {
                      $odd_even = "odd";
                      $odd = 0;
                      } else {
                        $odd_even = "even";
                        $odd = 1;
                      }
                      if($recipPM['recipNew'] == 1) {
                         $styleNew = 'font-weight: bold;';
                      } else {
                         $styleNew = '';
                      }

            ?>
                        <tr class="<?php echo $odd_even;?>">
                          <!--<td><input type="checkbox"></td> -->
                          <td class="pmCheckboxes"><input class="delChecks1" type="checkbox" id="delete<?php echo $recipPM['pm_id']; ?>" name="pms[]" value="<?php echo $recipPM['pm_id']; ?>" /></td>
                            <td style="<?php echo $styleNew; ?>"><?php echo osc_format_date($recipPM['message_date']) . ', ' . osclass_pm_format_time($recipPM['message_date']); ?></td>
                            <td style="<?php echo $styleNew; ?>"><!--<a class="mesLink" href="<?php echo osc_render_file_url('osclass_pm/' . 'user-messages.php?message=' . $recipPM['pm_id'] . '&box=inbox'); ?>">--><?php echo $recipPM['pm_subject']; ?><!--</a>--></td>
                            <td style="<?php echo $styleNew; ?>"><?php  /*print_r($recipPM);*/$user = User::newInstance()->findByPrimaryKey($recipPM['sender_id']); echo $user['s_name'];  ?></td>
              <td>
              <li class="read">

              <a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-messages.php&box=inbox&message=' . $recipPM['pm_id'] ; ?>&p1=1" class="fancybox fancybox.iframe" >Читать</a>
              </li>
              <li class="reply">

              <a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-send.php&mType=reply&messId=' . $recipPM['pm_id'] . '&userId=' . $recipPM['sender_id'] ; ?>&p1=1" class="fancybox fancybox.iframe" ><?php _e('Reply','osclass_pm'); ?></a></li>
                  <li class="quote"><a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-send.php&mType=quote&messId=' . $recipPM['pm_id'] . '&userId=' . $recipPM['sender_id']; ?>&p1=1" class="fancybox fancybox.iframe"><?php _e('Quote','osclass_pm'); ?></a></li>
                       <li class="del">
                                    <a onclick="if (!confirm('Вы уверены, что хотите удалить это личное сообщение?')) return false;" href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-proc.php&pms=' . $recipPM['pm_id'].'&option=delMessages&box=inbox' ; ?>&p1=1" class="fancybox fancybox.iframe">
                             Удалить</a></li>
                  </td>
                        </tr>
          <?php }
          } ?>
                    </tbody></table>
                  <!--<input type="button" onclick="if (!confirm('<?php _e('Are you sure you want to delete all selected personal messages?','osclass_pm'); ?>')) return false;" class="delete apply pmDeleteButton" value="Delete Selected">
                  -->
                  <!--
                  <input id="btn1" type="button" onclick="if (!confirm('<?php _e('Are you sure you want to delete all selected personal messages?','osclass_pm'); ?>')) return false;"  href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=inbox&p1=1' ; ?>" class="fancybox fancybox.iframe delete apply" value="Delete Selected">
                  -->
                  <a id="btn1"  onclick="if (!confirm('<?php _e('Are you sure you want to delete all selected personal messages?','osclass_pm'); ?>')) return true;"  href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=inbox&p1=1' ; ?>" class="fancybox fancybox.iframe" >Delete Selected</a>

          <div class="admin subscribe send_but"> <a  href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-send.php&userId=0&mType=new';?>&p1=1" class="fancybox fancybox.iframe"><?php echo __('Send PM to the ','osclass_pm') . ' ' . pmAdmin(); ?></a></div>
                </div>
            </li>
            <li>
            <?php $recipPMs = ModelPM::newInstance()->getSenderMessages(osc_logged_user_id(), 1, 'pm_id', 'DESC');
                        $recipCount = count($recipPMs); ?>
              <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/outbox.png')?>"><h2>
              <?php _e('Outbox', 'osclass_pm'); ?> (<?php echo ' всего: '.$recipCount;  ?>)<span><?php _e('Your Outgoing Messages', 'isha'); ?></span></h2> <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>
                <div class="wishlist inbox" style="display: none;overflow:auto">
                  <table cellspacing="0" cellpadding="0">
                      <tbody><tr>
                          <th><input id="all_outbox" type="checkbox"></th>
                            <th><?php _e('Date', 'osclass_pm'); ?></th>
                            <th><?php _e('Subject', 'osclass_pm'); ?></th>
                            <th><?php _e('Sent To', 'osclass_pm'); ?></th>
              <th><?php _e('Action', 'osclass_pm'); ?></th>
                        </tr>
            <?php
                        if($recipCount == 0) {?>
            <tr class="odd">
                     <td></td>
                     <td></td>
                     <td><?php _e('You have no messages', 'osclass_pm'); ?></td>
                     <td></td>
                  </tr>
          <?php }else{
                   foreach($recipPMs as $recipPM){
                    ?>

                        <tr>
                          <!--<td><input type="checkbox"></td> -->
                          <td class="pmCheckboxes"><input class="delChecks2" type="checkbox" id="delete<?php echo $recipPM['pm_id']; ?>" name="pms[]" value="<?php echo $recipPM['pm_id']; ?>" /></td>
                            <td><?php echo osc_format_date($recipPM['message_date']) . ', ' . osclass_pm_format_time($recipPM['message_date']); ?></td>
                            <td><!--<a class="mesLink" href="<?php echo osc_render_file_url('osclass_pm/' . 'user-messages.php?message=' . $recipPM['pm_id'] . '&box=outbox'); ?>">--><?php echo $recipPM['pm_subject'];
                            //http://test.playandbay.com/index.php?page=custom&file=osclass_pm/user-proc.php&pms=79&option=delMessages&box=inbox&p1=1
                             ?><!--</a>--></td>
                            <td><?php  /*print_r($recipPM);*/$user = User::newInstance()->findByPrimaryKey($recipPM['recip_id']);/*print_r($user);*/echo $user['s_name']; if ($user['s_name']=='') echo 'Admin';?></td>
              <td>
              <li class="read">

              <a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-messages.php&box=outbox&message=' . $recipPM['pm_id'] ; ?>&p1=1" class="fancybox fancybox.iframe" >Читать</a>
              </li>
              <li class="del">
                                    <a onclick="if (!confirm('Вы уверены, что хотите удалить это личное сообщение?')) return false;" href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-proc.php&pms=' . $recipPM['pm_id'].'&option=delMessages&box=outbox' ; ?>&p1=1" class="fancybox fancybox.iframe">
                             Удалить</a></li>
                            <!--
              <li class="reply">

              <a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-send.php&mType=reply&messId=' . $recipPM['pm_id'] . '&userId=' . $recipPM['sender_id'] ; ?>&p1=1" class="fancybox fancybox.iframe" ><?php _e('Reply','osclass_pm'); ?></a>
              </li>
                  <li class="quote">
                  <a href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-send.php&mType=quote&messId=' . $recipPM['pm_id'] . '&userId=' . $recipPM['sender_id']; ?>&p1=1" class="fancybox fancybox.iframe" ><?php _e('Quote','osclass_pm'); ?></a>
                  </li>-->

                  </td>
                        </tr>
            <?php
            }
            } ?>
                    </tbody></table>
                    <a id="btn2"  onclick="if (!confirm('<?php _e('Are you sure you want to delete all selected personal messages?','osclass_pm'); ?>')) return true;"  href="<?php echo osc_base_url(true) . '?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=outbox&p1=1' ; ?>" class="fancybox fancybox.iframe" >Delete Selected</a>

                </div>
            </li>
            <li>
      <?php

  if(Params::getParam('delete') != '' && osc_is_web_user_logged_in()){
    delete_item(Params::getParam('delete'), $i_userId);
  }

    $itemsPerPage = (Params::getParam('itemsPerPage') != '') ? Params::getParam('itemsPerPage') : 5;
    $iPage        = (Params::getParam('iPage') != '') ? Params::getParam('iPage') : 0;

    Search::newInstance()->addConditions(sprintf("%st_item_watchlist.fk_i_user_id = %d", DB_TABLE_PREFIX, $i_userId));
    Search::newInstance()->addConditions(sprintf("%st_item_watchlist.fk_i_item_id = %st_item.pk_i_id", DB_TABLE_PREFIX, DB_TABLE_PREFIX));
    Search::newInstance()->addTable(sprintf("%st_item_watchlist", DB_TABLE_PREFIX));
    Search::newInstance()->page($iPage, $itemsPerPage);

    $aItems      = Search::newInstance()->doSearch();
    $iTotalItems = Search::newInstance()->count();
    $iNumPages   = ceil($iTotalItems / $itemsPerPage) ;

    View::newInstance()->_exportVariableToView('items', $aItems);
    View::newInstance()->_exportVariableToView('search_total_pages', $iNumPages);
    View::newInstance()->_exportVariableToView('search_page', $iPage) ;

  // delete item from watchlist
  function delete_item($item, $uid){
    $conn = getConnection();
    $conn->osc_dbExec("DELETE FROM %st_item_watchlist WHERE fk_i_item_id = %d AND fk_i_user_id = %d LIMIT 1", DB_TABLE_PREFIX , $item, $uid);
  }

?>
              <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/wishlist.png')?>">
        <h2><?php _e('Watchlist', 'isha') ; ?><span><?php _e('Your Selected Watchlist', 'isha') ; ?></span></h2>
        <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>

                <div class="wishlist" style="display: none;">
        <?php if (osc_count_items() == 0) { ?>
        <h3><?php _e('You don\'t have any items yet', 'watchlist'); ?></h3>
        <?php } else { ?>
    <h3><?php printf(_n('You are watching %d item', 'You are watching %d items', $iTotalItems, 'watchlist'), $iTotalItems) ; ?></h3>
    <?php while ( osc_has_items() ) { ?>
                  <article class="list_result">
              <figure>
              <?php if (osc_images_enabled_at_items()) { ?>
             <?php if (osc_count_item_resources()) { ?>
                                <a href="<?php echo osc_item_url(); ?>"><img src="<?php echo osc_resource_thumbnail_url(); ?>" width="75px" height="56px" title="" alt="" /></a>
                            <?php } else { ?>
                                <img src="<?php echo osc_current_web_theme_url('images/no_photo.gif'); ?>" title="" alt="" />
                            <?php } ?>
            <?php }?>
                        

                </figure>
                <div class="list_textbox list_t12">
                  <a class="rate" href="#"><?php if (osc_price_enabled_at_items()) { echo osc_item_formated_price(); ?> - <?php }?></a>
                       <!-- <a class="other" href="#">Other currencies
                              <ul>
                                  <li>378 EUR</li>
                                  <li>320 GBP</li>
                                  <li>4231 UAH</li>
                                  <li>516 USD</li>
                                </ul>
                       </a>-->
                    <h1> <a href="<?php echo osc_item_url(); ?>"><?php echo osc_item_title(); ?></a></h1>
                        <h3><?php echo osc_item_city();?> - (<?php echo osc_item_region(); ?>) - <?php echo osc_format_date(osc_item_pub_date()); ?>.</h3>
                        <p><?php echo osc_highlight(strip_tags(osc_item_description())); ?></p>
                </div>
                <div class="clear"></div>
            </article>
      <?php }
      }?>

                </div>
            </li>
            <li>
              <a href="javascript:void(0)"><img class="icon" alt="" src="<?php echo osc_current_web_theme_url('images/account.png')?>">
        <h2><?php _e('Settings', 'isha') ; ?><span><?php _e('View Full Account', 'isha') ; ?></span></h2>
        <div class="plus_min">

        <img class="minus opaci" alt="" src="<?php echo osc_current_web_theme_url('images/minus_dropdown.png')?>">
        <img class="pluss" alt="" src="<?php echo osc_current_web_theme_url('images/plus_dropdown.png')?>">
        </div></a>
                <div class="wishlist account" style="display: none;">
                  <h1><?php _e('Update account', 'isha') ; ?></h1>
          <?php
          $osc_user = osc_user();
          ?>
          <form action="<?php echo osc_base_url(true); ?>" method="post">
                     <input type="hidden" name="page" value="user" />
                               <input type="hidden" name="action" value="profile_post" />
                  <ul>
                      <li><label><?php _e('Name', 'isha') ; ?></label><?php UserForm::name_text(osc_user()); ?></li>
                      <li><label><?php _e('User Type', 'isha') ; ?></label> <?php UserForm::is_company_select(osc_user()); ?></li>
                      <li><label><?php _e('Cell Phone', 'isha') ; ?></label><?php UserForm::mobile_text(osc_user()); ?></li>
                      <li><label><?php _e('Phone', 'isha') ; ?></label><?php UserForm::phone_land_text(osc_user()); ?></li>
                        <li><label><?php _e('Country', 'isha') ; ?></label><?php UserForm::country_select(osc_get_countries(), osc_user()); ?></li>
                        <li><label><?php _e('Region', 'isha') ; ?></label> <?php UserForm::region_select(osc_get_regions(), osc_user());?></li>

                        <li><label><?php _e('City', 'isha') ; ?></label>  <?php UserForm::city_select(osc_get_cities(), osc_user()); ?></li>
                      <li><label><?php _e('City Area', 'isha') ; ?></label> <?php UserForm::city_area_text(osc_user()); ?></li>

                      <li><label><?php _e('Address', 'isha') ; ?></label><?php UserForm::address_text(osc_user()); ?></li>
                      <li><label><?php _e('Website', 'isha') ; ?></label><?php UserForm::website_text(osc_user()); ?></li>
                      <li><label><?php _e('Description', 'isha') ; ?></label> <?php UserForm::info_textarea('s_info', osc_locale_code(), @$osc_user['locale'][osc_locale_code()]['s_info']); ?></li>
                        <li> <button type="submit" class="Update apply ui-button ui-button-middle ui-button-main"><?php _e("Update", 'isha');?></button></li>

             <?php //osc_run_hook('user_form'); ?>
             <?php osc_run_hook('user_form', osc_user()); ?>
                    </ul>
          </form>
          <?php
            if(osc_is_web_user_logged_in()){
            $userSettings = ModelPM::newInstance()->getUserPmSettings(osc_logged_user_id());
            ?>
                    <h1><?php _e('PM Settings', 'isha') ; ?></h1>
           <form action="<?php echo osc_base_url() . 'oc-content/plugins/osclass_pm/user-proc.php'; ?>" method="POST">
            <input type="hidden" name="page" value="custom" />
      <input type="hidden" name="file" value="osclass_pm/user-proc.php" />
      <input type="hidden" name="option" value="userSettings" />
      <input type="hidden" name="user_id" value="<?php echo osc_logged_user_id(); ?>" />
                  <ul class="pm">
                      <li><label><?php _e('Notify by email every time you get a new personal message', 'isha') ; ?>?</label>
                           <select name="emailAlert">
                  <option value="1" <?php if($userSettings['send_email'] == 1) { echo 'selected';}?>><?php _e('Always','osclass_pm'); ?></option>
                  <option value="0" <?php if($userSettings['send_email'] == 0) { echo 'selected';}?>><?php _e('Never','osclass_pm'); ?></option>
               </select>
                        </li>
                      <li><label><?php _e('Show a flash message when you have new personal messages', 'isha') ; ?>?</label>
                           <select name="flashAlert">
                  <option value="1" <?php if($userSettings['flash_alert'] == 1) { echo 'selected';}?>><?php _e('Always','osclass_pm'); ?></option>
                  <option value="0" <?php if($userSettings['flash_alert'] == 0) { echo 'selected';}?>><?php _e('Never','osclass_pm'); ?></option>
               </select>
                        </li>
                        <!--
                      <li><label><?php _e('Notify by email every time you get a new personal message', 'isha') ; ?>?</label>
                          <select name="saveSent">
                  <option value="1" <?php if($userSettings['save_sent'] == 1) { echo 'selected';}?>><?php _e('Always','osclass_pm'); ?></option>
                  <option value="0" <?php if($userSettings['save_sent'] == 0) { echo 'selected';}?>><?php _e('Never','osclass_pm'); ?></option>
               </select>
                        </li>  -->
             <?php if( pmSent() ) { ?>
             <li><label><?php _e('Save a copy of each personal message in your outbox by default', 'isha') ; ?>?</label>
                          <select name="saveSent">
                  <option value="1" <?php if($userSettings['save_sent'] == 1) { echo 'selected';}?>><?php _e('Always','osclass_pm'); ?></option>
                  <option value="0" <?php if($userSettings['save_sent'] == 0) { echo 'selected';}?>><?php _e('Never','osclass_pm'); ?></option>
               </select>
                        </li>
             <?php } ?>
                        <li><button type="submit" class="Update apply ui-button ui-button-middle ui-button-main"><?php _e("Save Settings", 'isha');?></button>
            </li>
                    </ul>
           </form>
          <?php } ?>
            <form action="<?php echo osc_base_url(true); ?>" method="post">
                    <h1><?php _e('Change your Username', 'isha') ; ?></h1>
           <input type="hidden" name="page" value="user" />
            <input type="hidden" name="action" value="change_username_post" />
                  <ul>
                      <li><label><?php _e('User Name', 'isha') ; ?></label><input type="text" name="s_username" id="s_username" value="" /></li>
            <li><button type="submit" class="Update apply ui-button ui-button-middle ui-button-main"><?php _e("Update", 'isha');?></button></li>
                      </ul>
          </form>
          <h1><?php _e('Change your Email', 'isha') ; ?></h1>
           <form action="<?php echo osc_base_url(true); ?>" method="post">
           <input type="hidden" name="page" value="user" />
            <input type="hidden" name="action" value="change_email_post" />
                  <ul>
                      <li><label><?php _e('Current Email', 'isha') ; ?></label><?php echo osc_logged_user_email(); ?></li>
                      <li><label><?php _e('New Email*', 'isha') ; ?></label><input type="text" name="new_email" id="new_email" value="" /></li>

                        <li><button type="submit" class="Update apply ui-button ui-button-middle ui-button-main"><?php _e("Update", 'isha');?></button></li>
                    </ul>
          </form>
          <h1><?php _e('Change your Password', 'isha') ; ?></h1>
           <form action="<?php echo osc_base_url(true); ?>" method="post">
            <input type="hidden" name="page" value="user" />
            <input type="hidden" name="action" value="change_password_post" />
                  <ul>
              <li><label class="control-label" for="password"><?php _e('Current password', 'isha'); ?> *</label>
                <input type="password" name="password" id="password" value="" /></li>
                      <li> <label class="control-label" for="new_password"><?php _e('New password', 'isha'); ?> *</label><input type="password" name="new_password" id="new_password" value="" /></li>
                      <li> <label class="control-label" for="new_password2"><?php _e('Repeat new password', 'isha'); ?> *</label><input type="password" name="new_password2" id="new_password2" value="" /></li>
                        <li><button type="submit" class="Update apply ui-button ui-button-middle ui-button-main"><?php _e("Update", 'isha');?></button></li>
                    </ul>
          </form>
                    <?php /*$options = array();
      $options[] = array('name'  => __('Delete account', 'isha'),
                         'url'   => '#',
                         'class' => 'opt_delete_account');
      $options = osc_apply_filter('user_menu_filter', $options);
      echo '<ul><li class="' . $options[0]['class'] . '" ><a href="' . $options[0]['url'] . '" >' . $options[0]['name'] . '</a></li></ul>';   */
?>
<input id="dialog-delete-account" class="delete_account subscribe" title="Delete Account" onclick="return confirm('Are you sure you want to delete your account?');" value="<?php _e('Delete account', 'isha'); ?>"/>
                    <div class="clear"></div>
                </div>
            </li>
        </ul>
    </section>
    <script>
    (function($){

      $( "#all_inbox" ).click(function() {

        if($('.delChecks1').prop('checked')) {
            // something when checked
            $( ".delChecks1" ).prop( "checked", false );
             var href1='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=inbox&p1=1';
     //console.log(href1);
     $('#btn1').attr('href',href1);
        } else {
            // something else when not
             $( ".delChecks1" ).prop( "checked", true);
                var tt1='&';
              $('.delChecks1').each(function(i,elem)
     {

    tt1=tt1+'pms[]='+$(elem).val()+'&';

     }
     );
        //console.log(tt1);
         var href1='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=inbox&p1=1'+ tt1;
     //console.log(href1);
     $('#btn1').attr('href',href1);
        }

        });

        $( "#all_outbox" ).click(function() {

        if($('.delChecks2').prop('checked')) {
            // something when checked
            $( ".delChecks2" ).prop( "checked", false );
              var href2='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=outbox&p1=1';
     //console.log(href2);
     $('#btn2').attr('href',href2);
        } else {
            // something else when not
             $( ".delChecks2" ).prop( "checked", true);

             var tt2='&';
     $('.delChecks2').each(function(ii,elemi)
     {

      //if ($(elemi).attr('checked')=='checked')
    tt2=tt2+'pms[]='+$(elemi).val()+'&';
     }
     );
     //console.log(tt2);
     var href2='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=outbox&p1=1'+ tt2;
     //console.log(href2);
     $('#btn2').attr('href',href2);

        }

        });

      var url='';var pos='';   var pos2=''; var pos1='';
       // $( ".account_box ul li" ).click(function() {
        $( ".account_box ul li a" ).click(function() {
            //$(this).children(".wishlist").slideToggle( "slow", function() {});
            $(this).parent().children(".wishlist").slideToggle( "slow", function() {});
        });

              $('.delChecks1').on('change', function() {
    // From the other examples
    var tt1='&';
     $('.delChecks1').each(function(i,elem)
     {
      if ($(elem).attr('checked')=='checked')
      {
    // //console.log($(elem).val());
    tt1=tt1+'pms[]='+$(elem).val()+'&';
     }
     }
     );
        //console.log(tt1);
         var href1='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=inbox&p1=1'+ tt1;
     //console.log(href1);
     $('#btn1').attr('href',href1);
     });

         $('.delChecks2').on('change', function() {
    // From the other examples
     var tt2='&';
     $('.delChecks2').each(function(ii,elemi)
     {

      if ($(elemi).attr('checked')=='checked')
    tt2=tt2+'pms[]='+$(elemi).val()+'&';
     }
     );
     //console.log(tt2);
     var href2='/index.php?page=custom&file=osclass_pm/user-proc.php&option=delMessages&box=outbox&p1=1'+ tt2;
     //console.log(href2);
     $('#btn2').attr('href',href2);
});

var url='';var pos='';   var pos2=''; var pos1='';var pos3='';

        $('.fancybox').fancybox({

        afterShow : function(){
   url= $(this.element).attr("href");
   //console.log(url);
   pos =url.indexOf('option=delMessages&box=inbox&p1=1');
   pos1 =url.indexOf('option=delMessages&box=outbox&p1=1');
   pos2 =url.indexOf('page=custom&file=osclass_pm/user-messages.php&box=inbox&message');
   pos3 =url.indexOf('page=custom&file=osclass_pm/user-send.php&box=inbox&message');
    pos4 =url.indexOf('page=custom&file=osclass_pm/user-proc.php');
     if ((pos===-1)&&(pos1===-1)&&(pos2===-1)&&(pos3===-1)&&(pos4===-1))
            {

            }
            else
            window.location.reload();

 // this.href = url;

 },
          afterClose:function() {


        }
        });

    })(jQuery)

    </script>
    </section>
<?php osc_current_web_theme_path('footer.php') ; ?>