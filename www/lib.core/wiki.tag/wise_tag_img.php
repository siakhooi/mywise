<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_img($matches)
{
    global $WISE_GROUP, $WISE_TYPE;

    $pg = $matches[1];
    $f = wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);

    $s = '<DIV class="wise-wiki-image">';
    $s .= '<IMG SRC="' . $f . '" class="wise-wiki-image">';
    $s .= '</DIV>';
    return $s;
}

function wise_tag_thumbnail($matches)
{
    global $WISE_GROUP, $WISE_TYPE;
    global $WIKI_TAG_THUMBNAIL_TOOLTIPS;

    $pg = $matches[1];
    $f = wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);

    $s = "";
    $s = '<DIV class="wise-wiki-thumbnail">';
    $s .= '<A HREF="' . $f . '" class="wise-wiki-thumbnail" title="' . $WIKI_TAG_THUMBNAIL_TOOLTIPS . '">';
    $s .= '<IMG SRC="' . $f . '" class="wise-wiki-thumbnail">';
    $s .= "</A>";
    return $s;
}

function wise_tag_img_inline($matches)
{
    global $WISE_GROUP, $WISE_TYPE;

    $pg = $matches[1];
    $f = wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);

    $s = '<IMG SRC="' . $f . '" class="wise-wiki-image">';
    return $s;
}

function wise_tag_thumbnail_inline($matches)
{
    global $WISE_GROUP, $WISE_TYPE;
    global $WIKI_TAG_THUMBNAIL_TOOLTIPS;

    $pg = $matches[1];
    $f = wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);

    $s = "";
    $s .= '<A HREF="' . $f . '" class="wise-wiki-thumbnail" title="' . $WIKI_TAG_THUMBNAIL_TOOLTIPS . '">';
    $s .= '<IMG SRC="' . $f . '" class="wise-wiki-thumbnail">';
    $s .= "</A>";
    return $s;
}

function wise_tag_img_icon($matches)
{
    global $WISE_GROUP, $WISE_TYPE;

    $pg = $matches[1];
    $f = wise_getURL("img", $WISE_GROUP, $WISE_TYPE, $pg);
    $s .= '<IMG SRC="' . $f . '" class="wise-wiki-image-icon">';
    return $s;
}
?>