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

  function wise_tag_list($matches){
	  $m=$matches[0];
	  $t=substr($m, 0, strpos($m, ' '));
	  
	  $tag=substr($t, 0, 1)=="#"?"OL":"UL";
	  $t1=str_replace('*', '\\*', $t);
	  
	  $s="<$tag class='wise-wiki'>";
	  $m=preg_replace('/^'.$t1.' /m', '<LI>', $m);
	  $s.=$m;
	  $s.="</$tag>";
	  
	  return $s;
  }
?>