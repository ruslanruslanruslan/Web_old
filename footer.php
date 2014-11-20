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
<div class="mask9" id="mask8">
     
</div>

<div class="preloader9">
     <div class="wraper" id="mask7">
          <div class="dots">
               
          </div>
     </div>
</div>
<script type="text/javascript">
     document.getElementById("mask7").style.display = 'block';
     document.getElementById("mask8").style.display = 'block';
</script>
 </div>{

}
<!-- Drag and Drop -->
<script>
$(document).ready(function(){
  $(".dropzone").dropzone({ url: "http://playandbay.com/betaPlayandBay3/oc-content/themes/isha/img" });
  var heig_m = $(window).height() - 120;
  $('.service_area').height(heig_m);
  $(window).scroll(function() {
    var xPos = $(window).scrollTop() * 0.8;
    $('.service').css({"left": xPos});
    $('.instrument:first-child').css({"right": xPos});
  }) 
})
 
</script>
<?php osc_run_hook('footer'); ?>
<script src="http://playandbay.com/betaplayandbay3/oc-content/themes/isha/js/dropzone.js"></script>
</body></html>