<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_alias($matches)
{
    global $WISE_ALIAS;
    return $WISE_ALIAS[$matches[1]];
}
?>