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

	function includeAllInPath($path, $prefix, $suffix){
		$dh = opendir($path);
		while (false !== ($filename = readdir($dh))) {
			$f[] = $filename;
		}
		sort($f);
		foreach($f as $file){
			if(
			  substr(strtolower($file), 0, strlen($prefix))==$prefix &&
			  (strlen($suffix)==0 || substr(strtolower($file), -strlen($suffix))==$suffix)){
				include($path.$file);
			}
		}
	}
?>