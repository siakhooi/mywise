<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_link($matches)
{
    global $WIKI_TAG_INTERNAL_LINK_TYPES;
    global $WIKI_TAG_INTERNAL_LINK_STYLE_PREFIX;
    global $WISE_PAGE, $WISE_TYPE, $WISE_GROUP, $WISE_MODE;

    $title = "";
    $url_style = "";
    $gr = $WISE_GROUP;
    $ty = $WISE_TYPE;
    $pg = $WISE_PAGE;
    $md = $WISE_MODE;
    $url_class = "";

    $s = $matches[1];
    $v = preg_split("/:/", $s, 2);
    if (count($v) == 2) {
        $url_style = $v[0];
        $s = $v[1];
    }
    $v = preg_split("/\\|/", $s, 2);
    if (count($v) == 2) {
        $title = $v[1];
        $s = $v[0];
    }

    $v = preg_split("/\\//", $s);
    switch (count($v)) {
        case 1:
            if ($v[0] != '')
                $pg = $v[0];
            break;
        case 2:
            if ($v[0] != '')
                $ty = $v[0];
            if ($v[1] != '')
                $pg = $v[1];
            break;
        case 3:
            if ($v[0] != '')
                $gr = $v[0];
            if ($v[1] != '')
                $ty = $v[1];
            if ($v[2] != '')
                $pg = $v[2];
            break;
        case 4:
            if ($v[0] != '')
                $md = $v[0];
            if ($v[1] != '')
                $gr = $v[1];
            if ($v[2] != '')
                $ty = $v[2];
            if ($v[3] != '')
                $pg = $v[3];
            break;
    }
    foreach ($WIKI_TAG_INTERNAL_LINK_TYPES as $st) {
        $t = $st['tag'];
        if ($url_style == $t) {
            if ($st["mode"] != "")
                $md = $st["mode"];
            if ($st["group"] != "")
                $gr = $st["group"];
            if ($st["type"] != "")
                $ty = $st["type"];
            $url_class = $st["style"];
            break;
        }
    }
    $link_title = wise_getPageTitle($gr, $ty, $pg);
    if ($title == "#")
        $title = $link_title;
    if ($title == "")
        $title = $pg;
    if ($link_title == "")
        $link_title = $pg;
    $uc = "";
    if ($url_class != "")
        $uc = " $WIKI_TAG_INTERNAL_LINK_STYLE_PREFIX-$url_class";
    $u = wise_getURL($md, $gr, $ty, $pg);
    $s = "<A HREF='$u' class='wise-wiki-link$uc' title='$link_title'>$title</A>";
    return $s;
}
?>