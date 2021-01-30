<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_MODE;
global $WISE_PAGE;
global $WISE_THEME;
global $WISE_MODE_CSS;
global $WISE_SITE_DIRECTORY_CSS;

if ($WISE_MODE == $WISE_MODE_CSS) {
    $css_path = "site/$WISE_SITE_DIRECTORY_CSS/$WISE_THEME/$WISE_PAGE/";
    if (wise_check_security($WISE_MODE, $css_path)) {
        if (is_dir($css_path)) {
            header('Content-type: text/css');
            $dh = opendir($css_path);
            while (false !== ($filename = readdir($dh))) {
                if ($filename != "." && $filename != "..") {
                    $a = file($css_path . $filename);
                    foreach ($a as $line_num => $line) {
                        // remove line start with // and /*//
                        if (preg_match('/^\/\/.*$/', $line) == 0 && preg_match('/^\/\*\/\/.*$/', $line) == 0)
                            echo $line;
                    }
                }
            }
        }
    }
    exit();
}
?>