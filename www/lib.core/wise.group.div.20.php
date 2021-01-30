<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_MENU_SHOW;
global $WISE_GROUP;
if ($WISE_MENU_SHOW == "Y") {
    echo "<DIV id=\"wise-menu-group-" . $WISE_GROUP . "\"></DIV>";
}
?>