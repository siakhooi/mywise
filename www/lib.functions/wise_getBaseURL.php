<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_getBaseURL()
{
    $pageURL = 'http';
    $pagePort = '';
    $https = $_SERVER["HTTPS"] ?? "";
    if ($https == "on") {
        $pageURL .= "s";
        if ($_SERVER["SERVER_PORT"] != "443")
            $pagePort = ":" . $_SERVER["SERVER_PORT"];
    } else {
        if ($_SERVER["SERVER_PORT"] != "80")
            $pagePort = ":" . $_SERVER["SERVER_PORT"];
    }
    $pageURL .= "://";
    $pageURL .= $_SERVER["SERVER_NAME"] . $pagePort . $_SERVER["PHP_SELF"];
    return dirname($pageURL) . "/";
}
?>