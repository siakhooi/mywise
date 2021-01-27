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
  global $WISE_GROUP;
  global $WISE_TYPE;
	global $WISE_MODE_IMG;
	global $WISE_SITE_DIRECTORY_IMG;
	
  if($WISE_MODE==$WISE_MODE_IMG){
		$img_path="site/".$WISE_SITE_DIRECTORY_IMG."/".$WISE_GROUP.'/'.$WISE_TYPE.'/'.$WISE_PAGE;
		if(wise_check_security($WISE_MODE, $img_path)){
			header('Content-type: image/jpg');
			//header('Content-Disposition: attachment; filename="'.$NAME.'"');
		  readfile($img_path);
		  exit;
	  }
  }
?>