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

  function wise_tag_external_link($matches){
	  global $WIKI_TAG_EXTERNAL_LINK_TYPES;
  	global $WIKI_TAG_EXTERNAL_LINK_STYLE_PREFIX;
	  
	  $title="";
	  $url_prefix="";
	  $url_target="";
	  $url_style="";
	  $url_class="";
	  
	  $s=$matches[1];
	  $v=preg_split("/:/", $s, 2);
    if(count($v)==2){
	    $url_style=$v[0];
	    $s=$v[1];
  	}
  	$url_prefix=$url_style.":";
  	$url_label_prefix=$url_style.":";
  	
	  $v=preg_split("/\\|/", $s, 2);
    if(count($v)==2){
	    $title=$v[1];
	    $s=$v[0];
  	  $url_label_prefix="";
  	}else{
	  	$title=$s;
  	}
  	$url_target=$s;
	  foreach($WIKI_TAG_EXTERNAL_LINK_TYPES as $st){
		  $t=$st['tag'];
		  if($url_style==$t) {
			  $url_prefix=$st["prefix"];
			  $url_class=$st["style"];
			  $url_label_prefix=$st["label-prefix"];
			  break;
		  }
	  }
  	$uc="";
  	if($url_class!="") $uc=" $WIKI_TAG_EXTERNAL_LINK_STYLE_PREFIX-$url_class";
 	
	  $s="<A HREF='$url_prefix$url_target' class='wise-wiki-external-link$uc' title='$url_label_prefix$title'>$url_label_prefix$title</A>";
	  return $s;
  }
?>