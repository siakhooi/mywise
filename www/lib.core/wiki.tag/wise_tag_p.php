<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_p($matches)
{
    $p = $matches[1];
    return "<P class=wise-wiki>" . $p . "</P>";
}

function wise_tag_p2($matches)
{
    global $WIKI_TAG_P_STYLE_PREFIX;

    $s = $matches[1];
    $p = $matches[2];

    $uc = "";
    if ($s != "") {
        $s = wise_get_style_p_mapping($s);
        $uc = " " . $WIKI_TAG_P_STYLE_PREFIX . "-" . $s;
    }

    $p = preg_replace('/^/m', "<P class='wise-wiki" . $uc . "'>", $p);
    $p = preg_replace('/$/m', '</P>', $p);
    return "<DIV class='wise-wiki-p" . $uc . "'>" . $p . "</DIV>";
}

function wise_get_style_p_mapping($s)
{
    global $WIKI_TAG_P_STYLES;
    foreach ($WIKI_TAG_P_STYLES as $st) {
        $t = $st['tag'];
        if ($s == $t)
            return $st['style'];
    }
    return $s;
}
?>