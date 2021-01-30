<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_check_security($mode, $path)
{
    global $WISE_MODE_WIKI;
    global $WISE_MODE_CSS;
    global $WISE_MODE_IMG;
    global $WISE_MODE_SITEMAP;
    global $WISE_MODE_MENU;
    global $WISE_SITE_DIRECTORY_WIKI;
    global $WISE_SITE_DIRECTORY_IMG;
    global $WISE_SITE_DIRECTORY_CSS;

    $f = $_SERVER['SCRIPT_FILENAME'];
    $d1 = dirname(realpath($f));
    // ** TODO issue: change realpath to here to solve dirname not able to handle \ issue. **
    $d2 = $path;
    // $d2=realpath($path);
    // ** end **

    if (! file_exists($d2)) {
        $title = "File Not Exist!";
        $object = "10.func.03.wise_check_security.php";
        $msg = "File Not Exist: $mode:$path";

        wise_log($title, $object, $msg);
        wise_error($title, $msg);
        return FALSE;
    } else {
        switch ($mode) {
            case $WISE_MODE_WIKI:
                $d1 = realpath($d1 . "/site/" . $WISE_SITE_DIRECTORY_WIKI);
                $d2 = dirname(dirname(dirname($d2)));
                break;
            case $WISE_MODE_IMG:
                $d1 = realpath($d1 . "/site/" . $WISE_SITE_DIRECTORY_IMG);
                $d2 = dirname(dirname(dirname($d2)));
                break;
            case $WISE_MODE_CSS:
                $d1 = realpath($d1 . "/site/" . $WISE_SITE_DIRECTORY_CSS);
                $d2 = dirname(dirname($d2));
                break;
            case $WISE_MODE_SITEMAP:
            case $WISE_MODE_MENU:
            // nothing to check.
        }
        // ** TODO issue: change realpath to here to solve dirname not able to handle \ issue. **
        $d2 = realpath($d2);
        // ** end **

        if ($d1 != $d2) {
            wise_error("Illegal Access", $mode . ":" . $path);
            return FALSE;
        }
        return TRUE;
    }
}
?>