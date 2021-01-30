<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_MODE;
global $WISE_MODE_WIKI;
global $WISE_ERROR;

if ($WISE_MODE != $WISE_MODE_WIKI && $WISE_ERROR != "Y") {
    $title = "Unknown/Unimplemented Mode!";
    $object = "25.init.89.process.non-wiki.php";
    $msg = "Unknown/Unimplemented Mode: " . $WISE_MODE;
    wise_log($title, $object, $msg);
    wise_error($title, $msg);
}
?>