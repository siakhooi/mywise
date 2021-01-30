<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_back($matches)
{
    global $WIKI_TAG_BACK_TEXT;

    return "<A class='wise-wiki-back' HREF='javascript:history.go(-1);'>$WIKI_TAG_BACK_TEXT</A>";
}
?>