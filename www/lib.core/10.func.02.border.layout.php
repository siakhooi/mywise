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

	function BorderLayout($top, $bot, $center, $left, $right, $after_top, $before_bot, $cssclass=""){ 
	  $cid="";
	  if($cssclass!="") $cid="-".$cssclass;
	  echo "<TABLE width=100% class=borderlayout$cid>";
	  if($top<>'' && is_file($top)) {
	  	echo "<TR class=borderlayout$cid><TD class=borderlayout-top$cid colspan=3>";
	  	include($top);
	  	echo "</TD></TR>";
	  }
	  if($after_top<>'' && is_file($after_top)) {
	  	echo "<TR class=borderlayout$cid><TD class=borderlayout-after-top$cid colspan=3>";
	  	include($after_top);
	  	echo "</TD></TR>";
	  }
	  
	  if($left<>'' || $right<>'' || $center<>''){
		  echo "<TR class=borderlayout$cid>";
		  echo "<TD class=borderlayout-left$cid>"; if($left<>'' && is_file($left)) include($left); echo "</TD>";
		  echo "<TD class=borderlayout-center$cid width=100%>"; if($center<>'' && is_file($center)) include($center); echo "</TD>";
		  echo "<TD class=borderlayout-right$cid>"; if($right<>'' && is_file($right)) include($right); echo "</TD>";
		  echo "</TR>";
	  }
	  if($before_bot<>'' && is_file($before_bot)){
	  	echo "<TR class=borderlayout$cid><TD class=borderlayout-before-bot$cid colspan=3>";
	  	include($before_bot);
	  	echo "</TD></TR>";
	  }
	  if($bot<>'' && is_file($bot)){
	  	echo "<TR class=borderlayout$cid><TD class=borderlayout-bot$cid colspan=3>";
	  	include($bot);
	  	echo "</TD></TR>";
	  }
	  echo "</TABLE>";
	}
?>