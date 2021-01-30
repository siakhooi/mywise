<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_error($title, $msg)
{
    global $WISE_ERROR;
    global $WISE_ERROR_TITLE;
    global $WISE_ERROR_MESSAGE;

    $WISE_ERROR = "Y";
    $WISE_ERROR_TITLE = $title;
    $WISE_ERROR_MESSAGE = $msg;
}
?>