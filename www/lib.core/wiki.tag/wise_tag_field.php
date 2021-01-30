<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_field($matches)
{
    // global $WISE_WIKI_FORM_DATA;
    global $_WIKIFORM;
    $fieldtype = $matches[1];
    if ($fieldtype == 'text') {
        $lbl = $matches[2];
        $nme = $matches[3];
        $v1 = $_POST[$nme];
        // $v2=$WISE_WIKI_FORM_DATA[$nme];
        $v2 = $_WIKIFORM[$nme];
        $v = ($v1 != '') ? $v1 : $v2;
        $size = $matches[4];

        $s = "<TR class='wiki-form'><TD class='wiki-form' style='text-align: right'>";
        $s .= $lbl . ": ";
        $s .= "<TD class='wiki-form'><INPUT  class='wiki-form' TYPE=text name='$nme' size='$size' value='$v'>";
        return $s;
    } else if ($fieldtype == 'submit') {
        $n = $matches[2];
        $v = $matches[3];
        return "<TR class='wiki-form'><TD class='wiki-form'><TD class='wiki-form'><INPUT TYPE=submit name='$n' value='$v'>";
    }
    return "fielderror:$fieldtype";
}
?>