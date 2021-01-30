<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_add_to_wiklet($content)
{
    global $WISE_WIKLET;
    $n = time() . 'h' . rand();
    $WISE_WIKLET[$n] = $content;
    return $n;
}
?>