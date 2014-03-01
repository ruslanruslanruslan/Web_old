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
<footer>
	<p>&copy; Copyright 2012-2013, All Rights Reserved, playandbay.com</p>
</footer>
 <div class="chose-langu">
	 <a class="search-btn" href="javascript:void(0)"></a>
	 <?php if ( osc_count_web_enabled_locales() > 1) { ?>
	 <?php $i = 0;  ?>
	  <?php while ( osc_has_web_enabled_locales() ) {
if($i=="0"){ 
?>
	 <a class="english-btn" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><img src="<?php echo osc_current_web_theme_url('images/english-flag.png');?>" alt=" "></a>
	 <?php }elseif($i=='1'){?>
	 <a class="rusiian-btn" href="<?php echo osc_change_language_url ( osc_locale_code() ); ?>"><img src="<?php echo osc_current_web_theme_url('images/russian-flag.png');?>" alt=" "></a>
	 <?php } ?>
	 <?php $i++; ?>
	 <?php }}?>
 </div>
<?php osc_run_hook('footer'); ?>
</body></html>