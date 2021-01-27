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

  global $wise_sitemap_temporary;
  global $wise_sitemap_heading;
  function wise_sitemap_get_heading(){
	  global $wise_sitemap_heading;
	  return $wise_sitemap_heading;
  }
  function wise_sitemap_add_heading(){
	  global $wise_sitemap_heading;
	  $wise_sitemap_heading++;
	  if($wise_sitemap_heading>6)$wise_sitemap_heading=6;
  }
  function wise_sitemap_minus_heading(){
	  global $wise_sitemap_heading;
	  $wise_sitemap_heading--;
	  if($wise_sitemap_heading<1)$wise_sitemap_heading=1;
  }

  function wise_sitemap_init(){
	  global $wise_sitemap_temporary;
	  $wise_sitemap_temporary="";
	  global $wise_sitemap_heading;
	  $wise_sitemap_heading=1;
  }
  function wise_sitemap_add($s){
	  global $wise_sitemap_temporary;
	  $wise_sitemap_temporary.=$s;
  }
  function wise_tag_sitemap($matches){
	  $id=$matches[1];
	  global $WISE_SITEMAP;
	  wise_sitemap_init();

	  if(is_array($WISE_SITEMAP)){
		  foreach($WISE_SITEMAP as $a){
			  if($a['id']==$id){
				  if(is_array($a['menutrees'])){
					  foreach($a['menutrees'] as $mt){
						  wise_generate_sitemap($mt);
					  }
				  }
				  break;
			  }
		  }
	  }
  	global $wise_sitemap_temporary;
	  return $wise_sitemap_temporary;
  }
	function wise_generate_sitemap($parent){
		global $WISE_MENU_TYPE_LINK;
		global $WISE_MENU_TYPE_CAT;
	  global $WISE_MODE_WIKI;
		global $WISE_DEFAULT_GROUP;
		global $WISE_DEFAULT_TYPE;
		global $WISE_DEFAULT_PAGE;

		$c="class='wise-wiki-sitemap'";
	  wise_sitemap_add("<UL $c>");
		foreach($parent as $i){
			$menutype=$i['menutype'];
			$label=$i['label'];
			$value=$i['value'];
			$group=$i['group'];
			$type=$i['type'];
			$page=$i['page'];
			$mode=$i['mode'];
			if($mode=="") $mode=$WISE_MODE_WIKI;
			if($group=="") $mode=$WISE_DEFAULT_GROUP;
			if($type=="") $mode=$WISE_DEFAULT_TYPE;
			if($page=="") $mode=$WISE_DEFAULT_PAGE;

			$h=wise_sitemap_get_heading();
			if($menutype==$WISE_MENU_TYPE_LINK){
				wise_sitemap_add("<LI $c><H$h $c><A $c HREF=\"".wise_getURL($mode, $group, $type, $page)."\">".$label."</A></H$h></LI>");
 			}else if($menutype==$WISE_MENU_TYPE_CAT){
 				wise_sitemap_add("<LI $c><H$h $c>".$label."</H$h></LI>");
 				wise_sitemap_add_heading();
 				wise_generate_sitemap($value);
 				wise_sitemap_minus_heading();
			}
		}
		wise_sitemap_add("</UL>");
	}
?>