<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_print_r($r)
{
    ob_start();
    print_r($r);
    $contents = ob_get_contents();
    ob_end_clean();
    return "<PRE>$contents</PRE>";
}
?>