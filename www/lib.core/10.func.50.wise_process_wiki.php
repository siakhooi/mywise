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

	function wise_process_wiki($wiki_text){
		global $WISE_GROUP, $WISE_TYPE, $WISE_PAGE;
		global $WISE_PAGE_TITLE;
		$WISE_PAGE_TITLE=$WISE_PAGE; //set default page title
    global $WISE_WIKLET; // temporary space to replace back
    $WISE_WIKLET=array();

		//remove \r if any. use \n for newline only
    $wiki_text=preg_replace('/\\r/', '', $wiki_text);

		//header level:
    $wiki_text=preg_replace_callback('/^conf:hidetitle$/mU', 'wise_tag_title_hide', $wiki_text);
    $wiki_text=preg_replace_callback('/^title\\:(.*)$/mU', 'wise_tag_title_find', $wiki_text);
    $wiki_text=wise_tag_title($wiki_text);

    $wiki_text=preg_replace_callback('/^metadesc\\:(.*)$/mU', 'wise_tag_metadesc', $wiki_text);
    $wiki_text=preg_replace_callback('/^metakey\\:(.*)$/mU', 'wise_tag_metakey', $wiki_text);

    //field set
    $wiki_text=preg_replace_callback('/^\\[([^\\~\\n]+)\\~\\~$(.*)?^\\~\\]$/smU', 'wise_tag_fieldset_pre', $wiki_text);


		//inline
    $wiki_text=preg_replace_callback('/^\\<\\?htm$(.*)?^\\?\\>$/smU', 'wise_tag_inline_htm', $wiki_text);
    $wiki_text=preg_replace_callback('/^\\<\\?pre$(.*)?^\\?\\>$/smU', 'wise_tag_inline_pre', $wiki_text);
    $wiki_text=preg_replace_callback('/^\\<\\?php$(.*)?^\\?\\>$/smU', 'wise_tag_inline_html_php', $wiki_text);
    $wiki_text=preg_replace_callback('/^\\<\\?wiki\\.php$(.*)?^\\?\\>$/smU', 'wise_tag_inline_wiki_php', $wiki_text);
    
    $wiki_text=preg_replace_callback('/^\\[([^\\~\\n]+)\\~\\~$(.*)?^\\~\\]$/smU', 'wise_tag_fieldset_pre', $wiki_text);
    
    $wiki_text=preg_replace_callback("/%%(.*?)%%/", 'wise_tag_alias', $wiki_text);
    
		//external file
    $wiki_text=preg_replace_callback('/\\{\\{html\\:(.*?)\\}\\}/', 'wise_tag_include_html', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{html\\.php\\:(.*?)\\}\\}/', 'wise_tag_include_html_php', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{wiki\\.php\\:(.*?)\\}\\}/', 'wise_tag_include_wiki_php', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{wiki\\:(.*?)\\}\\}/', 'wise_tag_include_wiki', $wiki_text);

    //set
    $wiki_text=preg_replace_callback('/^\\[([^\\~\\n]+)\\~$(.*)?^\\~\\]$/smU', 'wise_tag_fieldset_wiki', $wiki_text);

    //inline text
//     $wiki_text=preg_replace_callback('/\\[\\^(.*?)\\^\\]/', 'wise_tag_inline_text_superscript', $wiki_text);
//     $wiki_text=preg_replace_callback('/\\[_(.*?)_\\]/', 'wise_tag_inline_text_subscript', $wiki_text);
//     $wiki_text=preg_replace_callback('/\\[\\>(.*?)\\<\\]/', 'wise_tag_inline_text_small', $wiki_text);
//     $wiki_text=preg_replace_callback('/\\[\\<(.*?)\\>\\]/', 'wise_tag_inline_text_big', $wiki_text);
//     $wiki_text=preg_replace_callback('/\\[\\+(.*?)\\+\\]/', 'wise_tag_inline_text_insert', $wiki_text);
//     $wiki_text=preg_replace_callback('/\\[\\-(.*?)\\-\\]/', 'wise_tag_inline_text_delete', $wiki_text);
//     $wiki_text=preg_replace_callback('', 'wise_tag_inline_text_underline', $wiki_text);
//     $wiki_text=preg_replace_callback('', 'wise_tag_inline_text_bold', $wiki_text);
//     $wiki_text=preg_replace_callback('', 'wise_tag_inline_text_italic', $wiki_text);
     $wiki_text=preg_replace_callback("/'''(.*?)'''/", 'wise_tag_inline_text_strong', $wiki_text);
     $wiki_text=preg_replace_callback("/''(.*?)''/", 'wise_tag_inline_text_em', $wiki_text);
//     $wiki_text=preg_replace_callback("", 'wise_tag_inline_text_code', $wiki_text);

    $wiki_text=preg_replace_callback('/\\[\\!(.*?)\\!\\]/', 'wise_tag_external_link', $wiki_text);

    $wiki_text=preg_replace_callback('/\\[\\[([^\\]]*?\\])\\]\\]/', 'wise_tag_link', $wiki_text);
    $wiki_text=preg_replace_callback('/\\[\\[(.*?)\\]\\]/', 'wise_tag_link', $wiki_text);

    $wiki_text=preg_replace_callback('/\\[([^%\\[]+)%(.*?)%\\]/', 'wise_tag_inline_text_span', $wiki_text);

	  //comments:
    $wiki_text=preg_replace_callback('/^;(.*)$/mU', 'wise_tag_comment', $wiki_text);

		//paragraph:
    $wiki_text=preg_replace_callback('/^h([1-6])\\:(.*)$/mU', 'wise_tag_hn', $wiki_text);
    $wiki_text=preg_replace_callback('/^-----*$/mU', 'wise_tag_hr', $wiki_text); //4 and above
    $wiki_text=preg_replace_callback('/^--*$/mU', 'wise_tag_br', $wiki_text); //1 or 2

    //not able to handle group/type/page.img
    $wiki_text=preg_replace_callback('/^img\\:(.*?)$/m', 'wise_tag_img', $wiki_text);
    $wiki_text=preg_replace_callback('/^thumbnail\\:(.*?)$/m', 'wise_tag_thumbnail', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{img\\:(.*?)\\}\\}/', 'wise_tag_img_inline', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{thumbnail\\:(.*?)\\}\\}/', 'wise_tag_thumbnail_inline', $wiki_text);
    $wiki_text=preg_replace_callback('/\\{\\{icon\\:(.*?)\\}\\}/', 'wise_tag_img_icon', $wiki_text);

    $wiki_text=preg_replace_callback('/\\{\\{br\\}\\}/', 'wise_tag_br', $wiki_text);

    $wiki_text=preg_replace_callback('/\\{\\{back\\}\\}/', 'wise_tag_back', $wiki_text);

    $wiki_text=preg_replace_callback('/\\{\\{menu\:(.*)\\}\\}/', 'wise_tag_menu', $wiki_text);

    $wiki_text=preg_replace_callback('/\\{\\{sitemap\:(.*)\\}\\}/', 'wise_tag_sitemap', $wiki_text);

    //need to be after {{ tags.
    $wiki_text=preg_replace_callback('/^p:([^\\{\\n]*)\\{\\n(.*)\\n\\}/smU', 'wise_tag_p2', $wiki_text);
    $wiki_text=preg_replace_callback('/^p:(.*)$/mU', 'wise_tag_p', $wiki_text);
	  //list
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);
    $wiki_text=preg_replace_callback('/^([#|\\*]+ .*\n)+/m', 'wise_tag_list', $wiki_text);

    //experimental
			## form
		global $WISE_WIKI_FORM_DATA;
		$WISE_WIKI_FORM_DATA=array();

    $wiki_text=preg_replace('/^\\{form$/m','<FORM class="wiki-form" METHOD=POST><TABLE class="wiki-form">', $wiki_text);
    $wiki_text=preg_replace('/^form}$/m','</TABLE></FORM>', $wiki_text);
    $wiki_text=preg_replace_callback('/^field\\:(.*?)\\:(.*?)\\/(.*?)\\/(.*?)\\/(.*?)$/m', 'wise_tag_field', $wiki_text);
    $wiki_text=preg_replace_callback('/^field\\:(.*?)\\:(.*?)\\/(.*?)\\/(.*?)$/m', 'wise_tag_field', $wiki_text);
    $wiki_text=preg_replace_callback('/^field\\:(.*?)\\:(.*?)\\/(.*?)$/m', 'wise_tag_field', $wiki_text);
    $wiki_text=preg_replace_callback('/^field\\:(.*?)\\:(.*?)$/m', 'wise_tag_field', $wiki_text);

//  $s=preg_replace('/^field\\:text\\:(.*?)\\/(.*?)\\/(.*?)$/m','<TR><TD style="text-align: right">$1: <TD><INPUT TYPE=text name=$2 size=$3><NBR>', $s);
//  $s=preg_replace('/^field\\:submit\\:(.*?)\\/(.*?)$/m','<TR><TD><TD><INPUT TYPE=submit name=$1 value=$2><NBR>', $s);

		foreach($WISE_WIKLET as $n => $d){
    	$wiki_text=preg_replace('/'.$n.'/', $d, $wiki_text);
		}
		return $wiki_text;
	}
?>