<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_alias($matches)
{
    global $WISE_ALIAS;
    if($WISE_ALIAS[$matches[1]]=='') return '%%'.$matches[1].'%%';
    return $WISE_ALIAS[$matches[1]];
}
?>