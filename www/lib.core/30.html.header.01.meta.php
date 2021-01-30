<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_WEBSITE_META_DESCRIPTION;
global $WISE_WEBSITE_META_KEYWORDS;
if ($WISE_WEBSITE_META_DESCRIPTION != "") {
    ?><META name="description" content="<?php echo $WISE_WEBSITE_META_DESCRIPTION; ?>" /><?PHP
}
if ($WISE_WEBSITE_META_KEYWORDS != "") {
    ?><META name="keywords" content="<?php echo $WISE_WEBSITE_META_KEYWORDS; ?>" /><?PHP
}
?>