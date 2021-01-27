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

	function wise_check_security($mode, $path){
		global $WISE_MODE_WIKI;
		global $WISE_MODE_CSS;
		global $WISE_MODE_IMG;
	  global $WISE_MODE_SITEMAP;
		global $WISE_MODE_MENU;
    global $WISE_SITE_DIRECTORY_WIKI;
    global $WISE_SITE_DIRECTORY_IMG;
    global $WISE_SITE_DIRECTORY_CSS;
		
		$f=$_SERVER['SCRIPT_FILENAME'];
		$d1=dirname(realpath($f));
		$d2=realpath($path);

		if(!file_exists ( $d2 )){
		  $title="File Not Exist!";
		  $object="10.func.03.wise_check_security.php";
		  $msg="File Not Exist: $mode:$path";
			
  	  wise_log($title, $object, $msg);
			wise_error($title, $msg);
			return FALSE;
		}else{
			switch($mode){
				case $WISE_MODE_WIKI:
				  $d1=realpath($d1."/site/".$WISE_SITE_DIRECTORY_WIKI);
				  $d2=dirname(dirname(dirname($d2)));	
				  break;
				case $WISE_MODE_IMG:
				  $d1=realpath($d1."/site/".$WISE_SITE_DIRECTORY_IMG);
				  $d2=dirname(dirname(dirname($d2)));	
					break;
				case $WISE_MODE_CSS:
				  $d1=realpath($d1."/site/".$WISE_SITE_DIRECTORY_CSS);
					$d2=dirname(dirname($d2));
			    break;
			  case $WISE_MODE_SITEMAP:
			  case $WISE_MODE_MENU:
			  //nothing to check.
			}
			if($d1!=$d2){
				wise_error("Illegal Access", $mode.":".$path);
				return FALSE;
			}
			return TRUE;
		}
	}
?>