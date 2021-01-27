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

	global $WISE_LAYOUT_GROUP_DEFAULT;
  global $WISE_LAYOUT_GROUP;
  global $WISE_GROUP;
  
  $layout=$WISE_LAYOUT_GROUP_DEFAULT;
  foreach($WISE_LAYOUT_GROUP as $c){
	  if($c["group"]==$WISE_GROUP){
		  $layout=$c["layout"];
		  break;
	  }
  }
	
	$layout_path="site/layout/".$layout."/";
	BorderLayout($layout_path.'header.php',         // top
    	         $layout_path.'footer.php',         // bottom
        	     'lib.core/wise.page.content.php',  // center
            	 $layout_path.'left.php',           // left
             	 $layout_path.'right.php',          // right
        	     'lib.core/wise.group.div.20.php',  // after-top
        	     'lib.core/wise.group.div.80.php',  // before-bot
             	 'group'
             	 );
?>