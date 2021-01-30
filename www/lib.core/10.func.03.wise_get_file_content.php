<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_get_file_content($filepath)
{
    if (file_exists($filepath)) {
        global $WISE_NRCR;
        return file_get_contents($filepath) . $WISE_NRCR;
    } else {
        return "";
    }
}
?>