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

  function wise_tag_include_wiki($matches){
	  global $WISE_GROUP, $WISE_TYPE;
  	global $WISE_SITE_DIRECTORY_WIKI;
	  
  	$gr=$WISE_GROUP;
  	$ty=$WISE_TYPE;
    $n1=$matches[1];
    $s="";
    $f="site/$WISE_SITE_DIRECTORY_WIKI/$gr/$ty/$n1";
    if(file_exists($f)) {
	    $s=file_get_contents($f);
      return $s;
    }
    $f="site/$WISE_SITE_DIRECTORY_WIKI/$gr/$n1";
    if(file_exists($f)) {
	    $s=file_get_contents($f);
      return $s;
    }
    $f="site/$WISE_SITE_DIRECTORY_WIKI/$n1";
    if(file_exists($f)) {
	    $s=file_get_contents($f);
      return $s;
    }
  }
  function wise_tag_include_wiki_php($matches){
	  global $WISE_GROUP, $WISE_TYPE;
  	global $WISE_SITE_DIRECTORY_LIB;
	  
  	$gr=$WISE_GROUP;
  	$ty=$WISE_TYPE;
    $n1=$matches[1];
    $s="";
    $f="site/$WISE_SITE_DIRECTORY_LIB/$gr/$ty/$n1";
    if(file_exists($f)) {
	    $s=wise_get_include_content_from_file($f);
      return $s;
    }
    $f="site/$WISE_SITE_DIRECTORY_LIB/$gr/$n1";
    if(file_exists($f)) {
	    $s=wise_get_include_content_from_file($f);
      return $s;
    }
    $f="site/$WISE_SITE_DIRECTORY_LIB/$n1";
    if(file_exists($f)) {
	    $s=wise_get_include_content_from_file($f);
      return $s;
    }
  }
?>