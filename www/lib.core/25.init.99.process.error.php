<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_ERROR;
global $WISE_ERROR_TITLE;
global $WISE_ERROR_MESSAGE;

if ($WISE_ERROR == "Y") {
    global $WISE_PAGE_TITLE;
    global $WISE_PAGE_CONTENT;
    $WISE_PAGE_TITLE = "Error - " . $WISE_ERROR_TITLE;
    $WISE_PAGE_CONTENT = "<H1 class='wise-error'>Error - " . $WISE_ERROR_TITLE . "</H1><P class='wise-error'>" . $WISE_ERROR_MESSAGE . "</P>";
}
?>