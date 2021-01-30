<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_title_find($matches)
{
    global $WISE_PAGE_TITLE;
    $WISE_PAGE_TITLE = $matches[1];
}

function wise_tag_title_add_alias()
{
    global $WISE_PAGE_TITLE, $WISE_ALIAS;
    $WISE_ALIAS['PAGE_TITLE'] = "$WISE_PAGE_TITLE";
}

function wise_tag_title($wiki_text)
{
    global $WISE_PAGE_TITLE, $WISE_NRCR, $WISE_PAGE_TITLE_HIDE;

    if ($WISE_PAGE_TITLE_HIDE == "yes")
        return $wiki_text;
    return "<H1 class='wise-wiki-title'>" . $WISE_PAGE_TITLE . "</H1>" . $WISE_NRCR . $wiki_text;
}

function wise_tag_title_hide($matches)
{
    global $WISE_PAGE_TITLE_HIDE;
    $WISE_PAGE_TITLE_HIDE = "yes";
}
?>