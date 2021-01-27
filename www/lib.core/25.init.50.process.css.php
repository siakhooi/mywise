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

  global $WISE_MODE;
  global $WISE_PAGE;
	global $WISE_THEME;
	global $WISE_MODE_CSS;
	global $WISE_SITE_DIRECTORY_CSS;
	
  if($WISE_MODE==$WISE_MODE_CSS){
		$css_path="site/$WISE_SITE_DIRECTORY_CSS/$WISE_THEME/$WISE_PAGE/";
		if(wise_check_security($WISE_MODE, $css_path)){
			if(is_dir($css_path)){
	  		header('Content-type: text/css');
				$dh = opendir($css_path);
				while (false !== ($filename = readdir($dh))) {
					if($filename!="." && $filename!=".."){
	 					$a=file($css_path.$filename);
	 					foreach($a as $line_num => $line){
		 					// remove line start with // and /*//
		 					if(preg_match('/^\/\/.*$/', $line)==0 && preg_match('/^\/\*\/\/.*$/', $line)==0)
	 					    echo $line;
						}
					}
				}
			}
		}
	  exit;
  }
?>