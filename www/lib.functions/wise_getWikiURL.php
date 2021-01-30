<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_getWikiURL($group, $type, $page)
{
    global $WISE_MODE_WIKI;
    return wise_getURL($WISE_MODE_WIKI, $group, $type, $page);
}
?>