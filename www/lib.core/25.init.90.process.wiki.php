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
  global $WISE_MODE_WIKI;
  global $WISE_SITE_DIRECTORY_WIKI;

  if($WISE_MODE==$WISE_MODE_WIKI){
    $wiki_path="site/$WISE_SITE_DIRECTORY_WIKI/".$WISE_GROUP.'/'.$WISE_TYPE.'/'.$WISE_PAGE;
    if(wise_check_security($WISE_MODE, $wiki_path)){
      wise_include_if_exist("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_GROUP.php");
      wise_include_if_exist("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_GROUP.$WISE_TYPE.php");

      $s=wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/Header").
         wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE Header").
         wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE/$WISE_PAGE").
         wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE Footer").
         wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/Footer");
  	
	    global $WISE_ALIAS;  // alias, to use in %%xxx%%
	
	    $WISE_ALIAS['WISE_GROUP']=$WISE_GROUP;
	    $WISE_ALIAS['WISE_TYPE']=$WISE_TYPE;
	    $WISE_ALIAS['WISE_PAGE']=$WISE_PAGE;
         
      global $WISE_PAGE_CONTENT;

      $WISE_PAGE_CONTENT=wise_process_wiki($s);
    }
  }
?>