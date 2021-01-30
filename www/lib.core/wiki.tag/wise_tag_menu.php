<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_menu($matches)
{
    $n1 = "wise-menu-custom-" . $matches[1];
    return "<DIV id=\"$n1\"></DIV>";
}
?>