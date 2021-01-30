<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_metakey($matches)
{
    global $WISE_WEBSITE_META_KEYWORDS;
    $WISE_WEBSITE_META_KEYWORDS = $matches[1];
}
?>