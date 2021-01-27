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

  function wise_tag_inline_htm($matches){
    $n1=$matches[1];
    return wise_add_to_wiklet($n1);
  }
  function wise_tag_inline_pre($matches){
    $n1=$matches[1];
    return wise_add_to_wiklet("<PRE class='wise-wiki'>$n1</PRE>");
  }
  function wise_tag_inline_html_php($matches){
    $n1=$matches[1];
    $s=wise_get_evaluated_content_from_code($n1);
    return wise_add_to_wiklet($s);
  }
  function wise_tag_inline_wiki_php($matches){
    $n1=$matches[1];
    $s=wise_get_evaluated_content_from_code($n1);
    return $s;
  }
?>