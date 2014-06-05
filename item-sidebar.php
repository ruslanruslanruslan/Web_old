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
<script type="text/javascript"  src="<?php echo osc_current_web_theme_url('js/jquery.validate.min.js'); ?>"></script>

<script>
$=jQuery.noConflict();
$( document ).ready(function() {
  $('#mask_as_form select').on('change',function(){
        $('#mask_as_form').submit();
        $('#mask_as_form').submit();
    });
});

	</script>
<aside class="contact_pub">
    <?php if(!osc_is_web_user_logged_in() || osc_logged_user_id()!=osc_item_user_id()) { ?>
        <form action="<?php echo osc_base_url(true); ?>" method="post" name="mask_as_form" id="mask_as_form">
            <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
            <input type="hidden" name="as" value="spam" />
            <input type="hidden" name="action" value="mark" />
            <input type="hidden" name="page" value="item" />
            <select name="as" id="as" class="mark_as">
                    <option><?php _e("Mark as...", 'isha'); ?></option>
                    <option value="spam"><?php _e("Mark as spam", 'isha'); ?></option>
                    <option value="badcat"><?php _e("Mark as misclassified", 'isha'); ?></option>
                    <option value="repeated"><?php _e("Mark as duplicated", 'isha'); ?></option>
                    <option value="expired"><?php _e("Mark as expired", 'isha'); ?></option>
                    <option value="offensive"><?php _e("Mark as offensive", 'isha'); ?></option>
            </select>
        </form>
    <?php } ?>
                <h1><?php _e("Contact publisher", 'isha'); ?></h1>
                <ul>
				  <?php if( osc_item_is_expired () ) { ?>
            <li>
                <?php _e("The listing is expired. You can't contact the publisher.", 'isha'); ?>
            </li>
        <?php } else if( ( osc_logged_user_id() == osc_item_user_id() ) && osc_logged_user_id() != 0 ) { ?>
            <li>
                <?php _e("It's your own listing, you can't contact the publisher.", 'isha'); ?>
            </li>
        <?php } else if( osc_reg_user_can_contact() && !osc_is_web_user_logged_in() ) { ?>
            <li>
                <?php _e("You must log in or register a new account in order to contact the advertiser", 'isha'); ?>
            </li>
            <li class="contact_button">
                <strong><a href="<?php echo osc_base_url(); ?>"><?php _e('Login', 'isha'); ?></a></strong>
                <strong><a href="<?php echo osc_base_url(); ?>"><?php _e('Register for a free account', 'isha'); ?></a></strong>
            </li>
        <?php } else { ?>
            <?php if( osc_item_user_id() != null ) { ?>
                <p class="name"><?php _e('Name', 'isha') ?>: <a href="<?php echo osc_user_public_profile_url( osc_item_user_id() ); ?>" ><?php echo osc_item_contact_name(); ?></a></p>
            <?php } else { ?>
                <p class="name"><?php printf(__('Name: %s', 'isha'), osc_item_contact_name()); ?></p>
            <?php } ?>
            <?php if( osc_item_show_email() ) { ?>
                <p class="email"><?php printf(__('E-mail: %s', 'isha'), osc_item_contact_email()); ?></p>
            <?php } ?>
            <?php if ( osc_user_phone() != '' ) { ?>
                <p class="phone"><?php printf(__("Phone: %s", 'isha'), osc_user_phone()); ?></p>
            <?php } ?>
			 <ul id="error_list"></ul>
			    <form action="<?php echo osc_base_url(true); ?>" method="post" name="contact_form" id="contact_form">
                	 <?php osc_prepare_user_info(); ?>
                    <input type="hidden" name="action" value="contact_post" />
                    <input type="hidden" name="page" value="item" />
                    <input type="hidden" name="id" value="<?php echo osc_item_id(); ?>" />
					<li>
                    	<label><?php _e('Your name:', 'isha') ?></label>
                        <?php ContactForm::your_name(); ?>
                    </li>
                	<li>
                    	<label><?php _e('Your e-mail address:', 'isha') ?></label>
                       <?php ContactForm::your_email(); ?>
                    </li>
                	<li>
                    	<label><?php _e('Phone number (optional):', 'isha') ?></label>
                       <?php ContactForm::your_phone_number(); ?>
                    </li>
                	<li>
                    	<label><?php _e('Message:', 'isha') ?></label>
                        <?php ContactForm::your_message(); ?>
                    </li>
                    <li> <button type="submit" class="share ui-button ui-button-middle ui-button-main"><?php _e("Send", 'isha');?></button></li>
				</form>
                </ul>
				<?php 
				}?>
                </aside>