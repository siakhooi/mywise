<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_get_evaluated_content_from_code($code)
{
    ob_start();
    eval($code);
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}
?>