<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_hn($matches)
{
    $n = $matches[1];
    $t = $matches[2];
    return "<H" . $n . " class=wise-wiki>" . $t . "</H" . $n . ">";
}
?>