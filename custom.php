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
    $param=Params::getParam('file');
    $param1=Params::getParam('p1');
      bender_add_body_class('custom');
  if((($param!='osclass_pm/user-send.php')AND($param!='osclass_pm/user-inbox.php')AND($param!='osclass_pm/user-outbox.php')AND($param!='osclass_pm/user-messages.php'))OR($param1==''))
    {

    osc_current_web_theme_path('header.php') ;
    }
    else
    osc_current_web_theme_path('common/head.php');
?>
<?php osc_render_file(); ?>
<?php
if ((($param!='osclass_pm/user-send.php')AND($param!='osclass_pm/user-inbox.php')AND($param!='osclass_pm/user-outbox.php')AND($param!='osclass_pm/user-messages.php'))OR($param1==''))
osc_current_web_theme_path('footer.php') ;
 ?>