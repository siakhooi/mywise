<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_fieldset_wiki($matches)
{
    global $WIKI_TAG_FIELDSET_TYPES_WIKI;
    return wise_tag_fieldset('DIV', $WIKI_TAG_FIELDSET_TYPES_WIKI, $matches);
}

function wise_tag_fieldset_pre($matches)
{
    global $WIKI_TAG_FIELDSET_TYPES_PRE;
    $fc = $matches[2];
    $matches[2] = wise_add_to_wiklet($fc);

    return wise_tag_fieldset('PRE', $WIKI_TAG_FIELDSET_TYPES_PRE, $matches);
}

function wise_tag_fieldset($tag, $type, $matches)
{
    global $WIKI_TAG_FIELDSET_STYLE_PREFIX;

    $ft = $matches[1];
    $fc = $matches[2];
    $style = "";
    $title = "";
    foreach ($type as $st) {
        $t = $st['tag'];
        if ($ft == $t) {
            $style = $st["style"];
            $title = $st["title"];
            break;
        }
    }
    $uc = "";
    if ($style != "")
        $uc = " $WIKI_TAG_FIELDSET_STYLE_PREFIX-$style";
    $s = "";
    $s .= "<DIV class='wise-wiki$uc'>";
    $s .= "<FIELDSET class='wise-wiki$uc'>";
    $s .= "<LEGEND class='wise-wiki$uc'>";
    $s .= $title;
    $s .= "</LEGEND>";
    $s .= "<$tag class='wise-wiki-fieldset$uc'>";
    $s .= $fc;
    $s .= "</$tag>";
    $s .= "</FIELDSET>";
    $s .= "</DIV>";
    return $s;
}
?>