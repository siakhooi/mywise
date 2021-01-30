<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_br($s)
{
    global $WISE_NRCR;
    echo $s . "<BR class='wise-wiki' />" . $WISE_NRCR;
}
?>