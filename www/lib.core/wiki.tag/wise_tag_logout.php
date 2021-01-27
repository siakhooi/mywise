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

  function wise_tag_logout($matches){
	  global $WIKI_TAG_LOGOUT_TEXT;
    global $WISE_LOGIN_COMMAND;
    global $WISE_LOGIN_CMD_LOGOUT;
	  
	  return "<A class='wise-wiki-logout' HREF='?$WISE_LOGIN_COMMAND=$WISE_LOGIN_CMD_LOGOUT'>$WIKI_TAG_LOGOUT_TEXT</A>";
  }
?>