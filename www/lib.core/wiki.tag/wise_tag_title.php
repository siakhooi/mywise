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

  function wise_tag_title_find($matches){
	  global $WISE_PAGE_TITLE;
	  $WISE_PAGE_TITLE=$matches[1];
  }
  function wise_tag_title_add_alias(){
	  global $WISE_PAGE_TITLE, $WISE_ALIAS;
	  $WISE_ALIAS['PAGE_TITLE']="$WISE_PAGE_TITLE";
  }
  function wise_tag_title($wiki_text){
	  global $WISE_PAGE_TITLE, $WISE_NRCR, $WISE_PAGE_TITLE_HIDE;
	  
	  if($WISE_PAGE_TITLE_HIDE=="yes") return $wiki_text;
    return "<H1 class='wise-wiki-title'>".$WISE_PAGE_TITLE."</H1>".$WISE_NRCR.$wiki_text;
  }
  function wise_tag_title_hide($matches){
	  global $WISE_PAGE_TITLE_HIDE;
	  $WISE_PAGE_TITLE_HIDE="yes";
  }
?>