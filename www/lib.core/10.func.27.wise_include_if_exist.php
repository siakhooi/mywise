<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_include_if_exist($filepath)
{
    if (file_exists($filepath)) {
        include ($filepath);
    }
}
?>