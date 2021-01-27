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

  function wise_tag_inline_text_big($matches){
	  return "<BIG class='wise-wiki'>".$matches[1]."</BIG>";
  }
  function wise_tag_inline_text_small($matches){
	  return "<SMALL class='wise-wiki'>".$matches[1]."</SMALL>";
  }
  function wise_tag_inline_text_superscript($matches){
	  return "<SUP class='wise-wiki'>".$matches[1]."</SUP>";
  }
  function wise_tag_inline_text_subscript($matches){
	  return "<SUB class='wise-wiki'>".$matches[1]."</SUB>";
  }
  function wise_tag_inline_text_insert($matches){
	  return "<INS class='wise-wiki'>".$matches[1]."</INS>";
  }
  function wise_tag_inline_text_delete($matches){
	  return "<DEL class='wise-wiki'>".$matches[1]."</DEL>";
  }
  function wise_tag_inline_text_underline($matches){
	  return "<U class='wise-wiki'>".$matches[1]."</U>";
  }
  function wise_tag_inline_text_bold($matches){
	  return "<B class='wise-wiki'>".$matches[1]."</B>";
  }
  function wise_tag_inline_text_italic($matches){
	  return "<I class='wise-wiki'>".$matches[1]."</I>";
  }
  function wise_tag_inline_text_strong($matches){
	  return "<STRONG class='wise-wiki'>".$matches[1]."</STRONG>";
  }
  function wise_tag_inline_text_em($matches){
	  return "<EM class='wise-wiki'>".$matches[1]."</EM>";
  }
  function wise_tag_inline_text_code($matches){
	  return "<CODE class='wise-wiki'>".$matches[1]."</CODE>";
  }
  function wise_tag_inline_text_span($matches){
  	global $WIKI_TAG_SPAN_STYLE_PREFIX;
	  
	  $s=$matches[1];
	  $p=$matches[2];
	  $uc="";
	  if($s!="") {
		  $s=wise_get_style_span_mapping($s);
		  $uc=" ".$WIKI_TAG_SPAN_STYLE_PREFIX."-".$s;
	  }
	  return "<SPAN class='wise-wiki".$uc."'>".$p."</SPAN>";
  }
  function wise_get_style_span_mapping($s){
	  global $WIKI_TAG_SPAN_STYLES;
	  foreach($WIKI_TAG_SPAN_STYLES as $st){
		  $t=$st['tag'];
		  if($s==$t) return $st['style'];
	  }
	  return $s;
  }
?>