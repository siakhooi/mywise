<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_log($type, $obj, $msg)
{
    global $WISE_LOG_FILE;
    file_put_contents($WISE_LOG_FILE, date("YmdHis") . ",$type,$obj,$msg\n", FILE_APPEND | FILE_TEXT);
}
?>