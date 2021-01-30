<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_getURL($mode, $group, $type, $page)
{
    global $WISE_URL_STYLE;
    global $WISE_URL_NAME_MODE;
    global $WISE_URL_NAME_GROUP;
    global $WISE_URL_NAME_TYPE;
    global $WISE_URL_NAME_PAGE;
    global $WISE_MODE_WIKI;
    global $WISE_MODE_CSS;
    global $WISE_MODE_IMG;
    global $WISE_PATH_SEPARATOR;

    $m = $mode;
    $g = $group;
    $t = $type;
    $p = $page;

    $url_prefix = "";
    global $WISE_URL_DO_ENCODE;
    if ($WISE_URL_DO_ENCODE == "Y") {
        $g = urlencode($group);
        $t = urlencode($type);
        $p = urlencode($page);
    }
    if ($WISE_URL_STYLE == "wise-original") {
        return $url_prefix . "?" . $WISE_URL_NAME_MODE . "=" . $m . "&" . $WISE_URL_NAME_GROUP . "=" . $g . "&" . $WISE_URL_NAME_TYPE . "=" . $t . "&" . $WISE_URL_NAME_PAGE . "=" . $p;
    } else if ($WISE_URL_STYLE == "wise-default") {
        switch ($mode) {
            case $WISE_MODE_WIKI:
                return $url_prefix . $g . $WISE_PATH_SEPARATOR . $t . $WISE_PATH_SEPARATOR . $p;
            case $WISE_MODE_CSS:
                return $url_prefix . $p . ".css";
            case $WISE_MODE_IMG:
                return $url_prefix . "img" . $WISE_PATH_SEPARATOR . $g . $WISE_PATH_SEPARATOR . $t . $WISE_PATH_SEPARATOR . $p;
        }
    }
}
?>