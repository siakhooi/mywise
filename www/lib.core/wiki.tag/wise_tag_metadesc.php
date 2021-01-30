<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_metadesc($matches)
{
    global $WISE_WEBSITE_META_DESCRIPTION;
    $WISE_WEBSITE_META_DESCRIPTION = $matches[1];
}
?>