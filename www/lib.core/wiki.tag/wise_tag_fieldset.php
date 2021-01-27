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

  function wise_tag_fieldset_wiki($matches){
	  global $WIKI_TAG_FIELDSET_TYPES_WIKI;
	  return wise_tag_fieldset('DIV', $WIKI_TAG_FIELDSET_TYPES_WIKI, $matches);
  }
  function wise_tag_fieldset_pre($matches){
	  global $WIKI_TAG_FIELDSET_TYPES_PRE;
  	$fc=$matches[2];
  	$matches[2]=wise_add_to_wiklet($fc);
	  
	  return wise_tag_fieldset('PRE', $WIKI_TAG_FIELDSET_TYPES_PRE, $matches);
  }
  function wise_tag_fieldset($tag, $type, $matches){
  	global $WIKI_TAG_FIELDSET_STYLE_PREFIX;
  	
  	$ft=$matches[1];
  	$fc=$matches[2];
  	$style="";
  	$title="";
	  foreach($type as $st){
		  $t=$st['tag'];
		  if($ft==$t) {
			  $style=$st["style"];
			  $title=$st["title"];
			  break;
		  }
	  }
  	$uc="";
  	if($style!="") $uc=" $WIKI_TAG_FIELDSET_STYLE_PREFIX-$style";
	  $s="";
    $s.="<FIELDSET class='wise-wiki$uc'>";
    $s.="<LEGEND class='wise-wiki$uc'>";
		$s.=$title;    
    $s.="</LEGEND>";
    $s.="<$tag class='wise-wiki-fieldset$uc'>";
    $s.=$fc;
    $s.="</$tag>";
    $s.="</FIELDSET>";
	 return $s;  	
  }
?>