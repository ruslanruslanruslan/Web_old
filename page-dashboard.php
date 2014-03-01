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

    bender_add_body_class('user user-profile');
    osc_add_hook('before-main','sidebar');
    function sidebar(){
        osc_current_web_theme_path('user-sidebar.php');
    }
    osc_add_filter('meta_title_filter','custom_meta_title');
    function custom_meta_title($data){
        return __('Alerts', 'bender');;
    }
    osc_current_web_theme_path('header.php') ;
    $osc_user = osc_user();
?>
<div class="page"><section class="wrapper result_outer account_outer">
    
    <section class="account_box">
    	<h1 class="result">My Account</h1>
        <ul>
        	<li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/listing_icon.png"><h2>Listings<span>Your Selected Listings</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                <div class="wishlist">
                	<h1>My listings</h1>
                    <p>No listings have been added yet</p>
                </div>
            </li>
            <li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/alert.png"><h2>Alert<span>Your Important Alerts</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                 <div class="wishlist">
                	<h1>Alerts</h1>
                    <p>You do not have any alerts yet.</p>
                </div>
            </li>
            <li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/inbox.png"><h2>Inbox (0)<span>Your Incoming Messages</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                <div class="wishlist inbox">
                	<table cellspacing="0" cellpadding="0">
                    	<tbody><tr>
                        	<th><input type="checkbox"></th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>From</th>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                    </tbody></table>
                    <input type="button" class="delete apply" value="Delete Selected">
                    <input type="button" class="admin subscribe" value="Send PM to the admin">
                
                </div>
            </li>
            <li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/outbox.png"><h2>Outbox<span>Your Outgoing Messages</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                <div class="wishlist inbox">
                	<table cellspacing="0" cellpadding="0">
                    	<tbody><tr>
                        	<th><input type="checkbox"></th>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>Sent To</th>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                        <tr>
                        	<td><input type="checkbox"></td>
                            <td>24 Oct</td>
                            <td>Lorem Ipsun is dummy text</td>
                            <td>Mike</td>
                        </tr>
                    </tbody></table>
                    <input type="button" class="delete apply" value="Delete Selected">
                
                </div>
            </li>
            <li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/wishlist.png"><h2>Wishlist<span>Your Selected WishList</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                
                <div class="wishlist">
                	<article class="list_result">
            	<figure>
                		<img alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/list_image.png">
                        <a class="rate" href="#">4500 руб</a>
                        <a class="other" href="#">Other currencies
                            	<ul>
                                	<li>378 EUR</li>
                                	<li>320 GBP</li>
                                	<li>4231 UAH</li>
                                	<li>516 USD</li>
                                </ul>
                       </a>
                        
                </figure>
                <div class="list_textbox">
                		<h1>Проводной микрофон Shure SM58 (оригинальный)</h1>
                        <h3>Dynamic - () - October 17, 2013.</h3>
                        <p>Тип - Динамический кардиоидный вокальный микрофон Диапазон частот - 50 Гц &mdash; 15 кГц Диаграмма направленности - кардиоидная, симметричная, равномерная частотная характерис тика в пределах диаграммы направленности Корпус - литой Тип - Динамический кардиоидный вокальный микрофон Диапазон частот - 50 Гц &mdash; 15 кГц Диаграмма направленности...</p>
                </div>
                <div class="clear"></div>
            </article>
                	
                </div>
            </li>
            <li>
            	<a href="#"><img class="icon" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/account.png"><h2>Account<span>View Full Account</span></h2> <img class="plus" alt="" src="http://localhost/osclass.3.2.2/oc-content/themes/spain/images/plus_dropdown.png"></a>
                <div class="wishlist account">
                	<h1>Update account</h1>
                	<ul>
                    	<li><label>Name</label><input type="text" placeholder="Name"></li>
                    	<li><label>User Type</label><select><option>User</option><option>Company</option></select></li>
                    	<li><label>Cell Phone</label><input type="text" placeholder=""></li>
                    	<li><label>Phone</label><input type="text" placeholder=""></li>
                        <li><label>Country</label><select><option>Select a Country...</option><option>Russian</option></select></li>
                        <li><label>Region</label><select><option>Region</option><option>Region</option></select></li>
                        <li><label>City</label><select><option>City</option><option>City</option></select></li>
                    	<li><label>City Area</label><input type="text" placeholder=""></li>
                    	<li><label>Address</label><input type="text" placeholder=""></li>
                    	<li><label>Website</label><input type="text" placeholder=""></li>
                    	<li><label>Description</label><textarea></textarea></li>
                        <li><input type="button" value="Update" class="Update apply"></li>
                    </ul>
                    <h1>PM Settings</h1>
                	<ul class="pm">
                    	<li><label>Notify by email every time you get a new personal message?</label>
                        	<select>
                            	<option>Always</option>
                                <option>Never</option>
                            </select>
                        </li>
                    	<li><label>Show a flash message when you have new personal messages?</label>
                        	<select>
                            	<option>Always</option>
                                <option>Never</option>
                            </select>
                        </li>
                    	<li><label>Notify by email every time you get a new personal message?</label>
                        	<select>
                            	<option>Always</option>
                                <option>Never</option>
                            </select>
                        </li>
                        <li><input type="button" value="Save Settings" class="settings apply"></li>
                    </ul>
                    <h1>Change your Username, Email, Password</h1>
                	<ul>
                    	<li><label>User Name</label><input type="text" placeholder=""></li>
                    	<li><label>New Email*</label><input type="text" placeholder=""></li>
                    	<li><label>Current Password*</label><input type="text" placeholder=""></li>
                    	<li><label>New Password*</label><input type="text" placeholder=""></li>
                    	<li><label>Reapeat New Password*</label><input type="text" placeholder=""></li>
                        <li><input type="button" value="Update" class="Update apply"></li>
                    </ul>
                    <h1>Delete Account</h1>
                    <input type="button" value="Delete Account" class="delete_account subscribe">
                    <div class="clear"></div>
                </div>
            </li>
        </ul>
    </section>
    <div class="clear"></div>
</section>

        </div>
<?php osc_current_web_theme_path('footer.php') ; ?>