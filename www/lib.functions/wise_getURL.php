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

	function wise_getURL($mode, $group, $type, $page){ 
		global $WISE_URL_STYLE;
	  global $WISE_URL_NAME_MODE;
	  global $WISE_URL_NAME_GROUP;
	  global $WISE_URL_NAME_TYPE;
	  global $WISE_URL_NAME_PAGE;
	  global $WISE_MODE_WIKI;
  	global $WISE_MODE_CSS;
  	global $WISE_MODE_IMG;
		
  	$m=$mode;
  	$g=$group;
  	$t=$type;
  	$p=$page;
  	global $WISE_URL_DO_ENCODE;
  	if($WISE_URL_DO_ENCODE=="Y"){
	  	$g=urlencode($group);
	  	$t=urlencode($type);
	  	$p=urlencode($page);
  	}
  	
		if($WISE_URL_STYLE=="wise-original"){
			return "?".$WISE_URL_NAME_MODE."=".$m.
			       "&".$WISE_URL_NAME_GROUP."=".$g.
			       "&".$WISE_URL_NAME_TYPE."=".$t.
			       "&".$WISE_URL_NAME_PAGE."=".$p;
		}else if($WISE_URL_STYLE=="wise-default"){
			switch($mode){
			  case $WISE_MODE_WIKI:
				  return $g."-".$t."-".$p;
			  case $WISE_MODE_CSS:
				  return $p.".css";
			  case $WISE_MODE_IMG:
				  return "img-".$g."-".$t."-".$p;
			}
		}
	}
?>