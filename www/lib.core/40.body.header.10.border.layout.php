<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_LAYOUT_SITE;

$outer_layout_path = "site/layout/" . $WISE_LAYOUT_SITE . "/";

BorderLayout($outer_layout_path . 'header.php', // top
$outer_layout_path . 'footer.php', // bottom
'lib.core/wise.group.layout.php', // center
$outer_layout_path . 'left.php', // left
$outer_layout_path . 'right.php', // right
'lib.core/wise.site.div.20.php', // after-top
'lib.core/wise.site.div.80.php', // before-bot
'site');
?>