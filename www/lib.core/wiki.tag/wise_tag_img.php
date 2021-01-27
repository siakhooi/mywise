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

  function wise_tag_img($matches){
    global $WISE_GROUP, $WISE_TYPE;
    
    $pg=$matches[1];
    $f=wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
        
    $s='<DIV class="wise-wiki-image">';
		$s.='<IMG SRC="'.$f.'" class="wise-wiki-image">';
		$s.='</DIV>';
    return $s;
  }
  function wise_tag_thumbnail($matches){
    global $WISE_GROUP, $WISE_TYPE;
	  global $WIKI_TAG_THUMBNAIL_TOOLTIPS;
    
    $pg=$matches[1];
    $f=wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
        
    $s="";
    $s='<DIV class="wise-wiki-thumbnail">';
    $s.='<A HREF="'.$f.'" class="wise-wiki-thumbnail" title="'.$WIKI_TAG_THUMBNAIL_TOOLTIPS.'">';
		$s.='<IMG SRC="'.$f.'" class="wise-wiki-thumbnail">';
		$s.="</A>";
    return $s;
  }
  function wise_tag_img_inline($matches){
    global $WISE_GROUP, $WISE_TYPE;
    
    $pg=$matches[1];
    $f=wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
        
		$s='<IMG SRC="'.$f.'" class="wise-wiki-image">';
    return $s;
  }
  function wise_tag_thumbnail_inline($matches){
    global $WISE_GROUP, $WISE_TYPE;
	  global $WIKI_TAG_THUMBNAIL_TOOLTIPS;
    
    $pg=$matches[1];
    $f=wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
        
    $s="";
    $s.='<A HREF="'.$f.'" class="wise-wiki-thumbnail" title="'.$WIKI_TAG_THUMBNAIL_TOOLTIPS.'">';
		$s.='<IMG SRC="'.$f.'" class="wise-wiki-thumbnail">';
		$s.="</A>";
    return $s;
  }
  function wise_tag_img_icon($matches){
    global $WISE_GROUP, $WISE_TYPE;
    
    $pg=$matches[1];
    $f=wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
		$s.='<IMG SRC="'.$f.'" class="wise-wiki-image-icon">';
    return $s;
  }
?>