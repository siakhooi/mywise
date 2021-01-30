<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_setPageTitle($title)
{
    global $WISE_PAGE_TITLE;
    $WISE_PAGE_TITLE = $title;
    wise_tag_title_add_alias();
}
?>