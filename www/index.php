<?PHP
// *****************************************************************************
// MyWISE - My Wiki Inside Site Engine
// Copyright (C) 2008 - 2010 GQR Solutions. All rights reserved.
// http://www.mywise.org
//
// Unless you have purchased a commercial license agreement from GQR Solutions,
// the following license terms apply:
//
// This program is part of MyWISE.
//
// MyWISE is released under the terms of the GNU Lesser General Public License 
// as published by the Free Software Foundation, either version 3 of the 
// License, or any later version.
//
// You should have received a copy of the GNU Lesser General Public License
// along with MyWISE.
// If not, see http://www.gnu.org/licenses/.
//
// *****************************************************************************

  $mtime = microtime();
  $mtime = explode(" ",$mtime);
  $mtime = $mtime[1] + $mtime[0];
  $starttime = $mtime;

  set_include_path(get_include_path() . PATH_SEPARATOR . './site/lib/');

  require_once('lib.core/00.includeAllInPath.php');
  includeAllInPath('lib.functions/', '', '.php');
  includeAllInPath('lib.core/', '10.func.', '.php');
  includeAllInPath('site/conf.site/', 'pre.conf.', '.php');
  includeAllInPath('site/conf/', 'conf.', '.php');
  includeAllInPath('site/conf.site/', 'conf.', '.php');
  includeAllInPath('lib.core/', '20.init.', '.php');
  includeAllInPath('site/lib/', 'init.', '.php');
  includeAllInPath('lib.core/', '25.init.', '.php');
  includeAllInPath('lib.core/', '30.html.header.', '.php');
  includeAllInPath('site/lib/', 'html.', '.php');
  includeAllInPath('lib.core/', '40.body.header.', '.php');

  $mtime = microtime();
  $mtime = explode(" ",$mtime);
  $mtime = $mtime[1] + $mtime[0];
  $endtime = $mtime;
  $totaltime = ($endtime - $starttime);

  echo $WISE_POWERED_BY_TEXT;
  if($WISE_LOADTIME_SHOW=="Y"){
    echo $WISE_LOADTIME_PREFIX.sprintf($WISE_LOADTIME_FORMAT, $totaltime).$WISE_LOADTIME_SUFFIX;
  }
  includeAllInPath('lib.core/', '50.html.footer.', '.php');
?>