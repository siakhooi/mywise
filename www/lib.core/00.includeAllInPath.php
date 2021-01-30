<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function includeAllInPath($path, $prefix, $suffix)
{
    $dh = opendir($path);
    while (false !== ($filename = readdir($dh))) {
        $f[] = $filename;
    }
    sort($f);
    foreach ($f as $file) {
        if (substr(strtolower($file), 0, strlen($prefix)) == $prefix && (strlen($suffix) == 0 || substr(strtolower($file), - strlen($suffix)) == $suffix)) {
            include ($path . $file);
        }
    }
}
?>