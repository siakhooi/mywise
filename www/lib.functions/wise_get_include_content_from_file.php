<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_get_include_content_from_file($filename)
{
    if (is_file($filename)) {
        ob_start();
        include $filename;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    return "";
}
?>