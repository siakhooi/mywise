<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_LAYOUT_GROUP_DEFAULT;
global $WISE_LAYOUT_GROUP;
global $WISE_GROUP;

$layout = $WISE_LAYOUT_GROUP_DEFAULT;
foreach ($WISE_LAYOUT_GROUP as $c) {
    if ($c["group"] == $WISE_GROUP) {
        $layout = $c["layout"];
        break;
    }
}

$layout_path = "site/layout/" . $layout . "/";
BorderLayout($layout_path . 'header.php', // top
$layout_path . 'footer.php', // bottom
'lib.core/wise.page.content.php', // center
$layout_path . 'left.php', // left
$layout_path . 'right.php', // right
'lib.core/wise.group.div.20.php', // after-top
'lib.core/wise.group.div.80.php', // before-bot
'group');
?>