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

  function wise_tag_field($matches){
    global $$WISE_WIKI_FORM_DATA;
    $fieldtype=$matches[1];
    if($fieldtype=='text'){
	    $lbl=$matches[2];
	    $nme=$matches[3];
	    $v1=$_POST[$nme];
	    $v2=$$WISE_WIKI_FORM_DATA[$nme];
	    $v=($v1!='')?$v1:$v2;
	    $size=$matches[4];
	    
	    $s="<TR class='wiki-form'><TD class='wiki-form' style='text-align: right'>";
	    $s.=$lbl.": ";
	    $s.="<TD class='wiki-form'><INPUT  class='wiki-form' TYPE=text name='$nme' size='$size' value='$v'>";
		  return $s;
    }else if($fieldtype=='submit'){
	    $n=$matches[2];
	    $v=$matches[3];
	    return "<TR class='wiki-form'><TD class='wiki-form'><TD class='wiki-form'><INPUT TYPE=submit name='$n' value='$v'>";	    
	  }
    return "fielderror:$fieldtype";
  }
?>