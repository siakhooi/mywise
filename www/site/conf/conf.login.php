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

  global $WISE_LOGIN_DEFAULT;
  $WISE_LOGIN_DEFAULT="N"; //by default, check login?
  
  global $WISE_LOGIN_EXCLUDE_GROUPS;
  $WISE_LOGIN_EXCLUDE_GROUPS=array(
    array("group"=>"Digest", "type"=>"Admin")
  );
  
  global $WISE_LOGIN_PASSWORD;
  $WISE_LOGIN_PASSWORD="25582899";
  
  global $WISE_LOGIN_LOGOUT_GROUP;
  global $WISE_LOGIN_LOGOUT_TYPE;
  global $WISE_LOGIN_LOGOUT_PAGE;
  $WISE_LOGIN_LOGOUT_GROUP="";      //group to go to after logout
  $WISE_LOGIN_LOGOUT_TYPE="Admin";  // type to go to after logout
  $WISE_LOGIN_LOGOUT_PAGE="";       // page to go to after logout
  
  // display
  global $WIKI_TAG_LOGOUT_TEXT;
  global $WIKI_TAG_LOGIN_TEXT;
  global $WIKI_TAG_PASSWORD_TEXT;
  global $WISE_LOGIN_PAGE_TITLE;
  
  $WIKI_TAG_LOGOUT_TEXT="Logout";
  $WIKI_TAG_LOGIN_TEXT="Login";
  $WIKI_TAG_PASSWORD_TEXT="Password: ";
  $WISE_LOGIN_PAGE_TITLE="Login Required";
  
  global $WISE_LOGIN_HASHSEED;
  global $WISE_LOGIN_COOKIE;
  $WISE_LOGIN_HASHSEED="C8oGiT14e66B4qX9i7aY";
  $WISE_LOGIN_COOKIE="626XuR8Bc0Xym1yUlCWY1";

  global $WISE_LOGIN_COMMAND;
  global $WISE_LOGIN_CMD_LOGIN;
  global $WISE_LOGIN_CMD_LOGOUT;
  $WISE_LOGIN_COMMAND="Ci9L9eI2V9XSOZoK188B1";
	$WISE_LOGIN_CMD_LOGIN="L9eoI2V9XSOZCi9K188B1";
	$WISE_LOGIN_CMD_LOGOUT="2V9XSOZoK188B1Ci9L9eI";
  
  global $WISE_LOGIN_FIELD_PASSWORD;
  $WISE_LOGIN_FIELD_PASSWORD="1yUlCWY1R626Xuc0Xym8B";
  
  

?>