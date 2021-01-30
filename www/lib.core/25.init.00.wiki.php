<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_URL_NAME_MODE;
global $WISE_URL_NAME_GROUP;
global $WISE_URL_NAME_TYPE;
global $WISE_URL_NAME_PAGE;
global $WISE_MODE;
global $WISE_GROUP;
global $WISE_TYPE;
global $WISE_PAGE;
global $WISE_DEFAULT_GROUP;
global $WISE_DEFAULT_TYPE;
global $WISE_DEFAULT_PAGE;
global $WISE_DEFAULT_MODE;

$WISE_MODE = $_GET[$WISE_URL_NAME_MODE] ?? $WISE_DEFAULT_MODE;
$WISE_GROUP = $_GET[$WISE_URL_NAME_GROUP] ?? $WISE_DEFAULT_GROUP;
$WISE_TYPE = $_GET[$WISE_URL_NAME_TYPE] ?? $WISE_DEFAULT_TYPE;
$WISE_PAGE = $_GET[$WISE_URL_NAME_PAGE] ?? $WISE_PAGE = $WISE_DEFAULT_PAGE;

global $WISE_URL_DO_ENCODE;
if ($WISE_URL_DO_ENCODE == "Y") {
    $WISE_GROUP = urldecode($WISE_GROUP);
    $WISE_TYPE = urldecode($WISE_TYPE);
    $WISE_PAGE = urldecode($WISE_PAGE);
}

?>