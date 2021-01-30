<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_islocalhost()
{
    $host = $_SERVER["HTTP_HOST"];
    return ($host == "localhost");
}
?>