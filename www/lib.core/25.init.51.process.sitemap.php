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

	global $WISE_MODE_SITEMAP;
  global $WISE_SITEMAP_GROUPS;
  global $WISE_SITE_DIRECTORY_WIKI;
  function wise_init_sitemap(){
		echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		echo "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">";
  }
  function wise_close_sitemap(){
	  echo "</urlset>";
  }
  function wise_get_base_url(){
	  $b='http://';
	  $b.=$_SERVER["SERVER_NAME"];
	  $b.=dirname($_SERVER["SCRIPT_NAME"]);
	  $b.="/";
	  return $b;
  }
  function wise_add_sitemap_entry($gr, $ty, $pg){
	global $WISE_MODE_WIKI;
		global $WISE_SITEMAP_FREQ;
			$value=wise_getURL($WISE_MODE_WIKI, $gr, $ty, $pg);
			echo "<url>\n";
			echo "<loc>".wise_get_base_url()."$value</loc>\n";
			echo "<changefreq>$WISE_SITEMAP_FREQ</changefreq>\n";
			echo "</url>\n";
  }
  function wise_exclude_check($pg){
	  return "N";
  }
  function wise_group_exclude_check($gr, $ty){
	  global $WISE_SITEMAP_EXCLUDE_GROUPS;
		foreach($WISE_SITEMAP_EXCLUDE_GROUPS as $e){
			if($gr==$e["group"] && $ty==$e["type"]) return "Y";
  	}
	  return "N";
  }
  if($WISE_MODE==$WISE_MODE_SITEMAP){
		header('Content-type: text/xml');
		wise_init_sitemap();	  
		$sitemap_path="site/$WISE_SITE_DIRECTORY_WIKI/";
			$dh = opendir($sitemap_path);
			while (false !== ($gr = readdir($dh))) {
				if(is_dir($sitemap_path.$gr) && $gr!="." && $gr!=".."){
					$gr_path=$sitemap_path.$gr;
					$dh2 = opendir($gr_path);
					while (false !== ($ty = readdir($dh2))) {
						if(is_dir($gr_path.'/'.$ty) && $ty!="." && $ty!=".."){
							$ty_path=$gr_path.'/'.$ty;
							if(wise_group_exclude_check($gr, $ty)=="Y") continue;
							$dh3 = opendir($ty_path);
							while (false !== ($pg = readdir($dh3))) {
								if($pg!="." && $pg!=".." && wise_exclude_check($pg)=="N"){
									  wise_add_sitemap_entry($gr, $ty, $pg);
								}
							}
						}
					}
				}
			}
		wise_close_sitemap();	
	  exit;
  }
?>