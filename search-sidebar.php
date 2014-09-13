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
$category = __get("category");
if (!isset($category['pk_i_id'])) {
    $category['pk_i_id'] = isset($_REQUEST['sCategory']) ? (is_array($_REQUEST['sCategory']) ? (int) $_REQUEST['sCategory'][0] : (int) $_REQUEST['sCategory']) : null;
}
?>

<section class="cent_srch_left_main">
    <section class="cent_srch_left">
        <div class="shwmain">
            <?php if (osc_images_enabled_at_items()) { ?>
                <div class="shwmain">
                    <div class="srctxt"><?php _e('Show only', 'isha'); ?></div>
                    <label class="listxt"> <input type="checkbox" name="b_active" id="b_active" value="1" <?php echo (Params::getParam('b_active') ? 'checked' : ''); ?> ><?php _e('Active', 'isha'); ?></label>
                    <label class="listxt"> <input type="checkbox" name="bPic" id="withPicture" value="1" <?php echo (osc_search_has_pic() ? 'checked' : ''); ?> ><?php _e('With pictures', 'isha'); ?></label>
                </div>
            <?php } ?>
            <div class="srctxt"><?php _e('City', 'isha'); ?></div>
            <input type="text" class="srchbox mrbv" id="sCity" name="sCity" value="<?php echo osc_esc_html(osc_search_city()); ?>" placeholder="<?php _e('Enter city here', 'isha'); ?>">
            <div class="clear"></div>

            <?php if (osc_price_enabled_at_items()) { ?>
                <div class="for_price">
                <div class="shwmain">
                    <div class="srctxt pcc"><?php _e('Price', 'isha'); ?></div>
                    <div class="minmain">
                        <label class="listxt"><input type="text" class="srchbox minbox" id="priceMin" name="sPriceMin" value="<?php echo osc_esc_html(osc_search_price_min()); ?>" placeholder="<?php _e('Min', 'isha'); ?>"></label>
                    </div>
                    <span class="shwmid">-</span>
                    <div class="minmain minmain_right">
                        <label class="listxt"><input type="text" class="srchbox minbox" id="priceMax" name="sPriceMax" value="<?php echo osc_esc_html(osc_search_price_max()); ?>" placeholder="<?php _e('Max', 'isha'); ?>"></label>
                    </div>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php } ?>

            <div class="plugin-hooks">
                <?php
                if (osc_search_category_id()) {
                    osc_run_hook('search_form', osc_search_category_id());
                } else {
                    osc_run_hook('search_form');
                }
                ?>
            </div>
            <?php
            $aCategories = osc_search_category();
            foreach ($aCategories as $cat_id) {
                ?>
                <input type="hidden" name="sCategory[]" value="<?php echo osc_esc_html(end(explode('/',$cat_id))); ?>"/>
            <?php } ?>
            <input type="submit" class="srchbtn apply" value="Apply">
            <div class="clear"></div>

    </section>

    <section class="cent_srch_left mrschr padzero">
        <div class="allcat"><?php _e('Categories', 'isha'); ?></div>   
        <?php isha_sidebar_category_search($category['pk_i_id']); ?>
        <div class="clear"></div>
    </section>
    <div class="clear"></div>
    </br>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- test9 -->
    <ins class="adsbygoogle"
         style="display:block"
         data-ad-client="ca-pub-3021368859777537"
         data-ad-slot="4641428007"
         data-ad-format="auto"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>

</section>