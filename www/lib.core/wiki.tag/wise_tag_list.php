<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_list($matches)
{
    $m = $matches[0];
    $t = substr($m, 0, strpos($m, ' '));

    $tag = substr($t, 0, 1) == "#" ? "OL" : "UL";
    $t1 = str_replace('*', '\\*', $t);

    $s = "<$tag class='wise-wiki'>";
    $m = preg_replace('/^' . $t1 . ' /m', '<LI>', $m);
    $s .= $m;
    $s .= "</$tag>";

    return $s;
}
?>