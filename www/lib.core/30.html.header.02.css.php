<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_THEME;
$css_path = "site/theme/" . $WISE_THEME . '/';
$dh = opendir($css_path);
while (false !== ($filename = readdir($dh))) {
    if (is_dir($css_path . $filename) && $filename != "." && $filename != "..") {
        $fn = wise_getURL("css", "", "", $filename);
        echo "<link href=\"$fn\" rel=\"stylesheet\" type=\"text/css\" />\n";
    }
}
?>