<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function BorderLayout($top, $bot, $center, $left, $right, $after_top, $before_bot, $cssclass = "")
{
    $cid = "";
    if ($cssclass != "")
        $cid = "-" . $cssclass;
    echo "<TABLE width=100% class=borderlayout$cid>";
    if ($top != '' && is_file($top)) {
        echo "<TR class=borderlayout$cid><TD class=borderlayout-top$cid colspan=3>";
        include ($top);
        echo "</TD></TR>";
    }
    if ($after_top != '' && is_file($after_top)) {
        echo "<TR class=borderlayout$cid><TD class=borderlayout-after-top$cid colspan=3>";
        include ($after_top);
        echo "</TD></TR>";
    }

    if ($left != '' || $right != '' || $center != '') {
        echo "<TR class=borderlayout$cid>";
        echo "<TD class=borderlayout-left$cid>";
        if ($left != '' && is_file($left))
            include ($left);
        echo "</TD>";
        echo "<TD class=borderlayout-center$cid width=100%>";
        if ($center != '' && is_file($center))
            include ($center);
        echo "</TD>";
        echo "<TD class=borderlayout-right$cid>";
        if ($right != '' && is_file($right))
            include ($right);
        echo "</TD>";
        echo "</TR>";
    }
    if ($before_bot != '' && is_file($before_bot)) {
        echo "<TR class=borderlayout$cid><TD class=borderlayout-before-bot$cid colspan=3>";
        include ($before_bot);
        echo "</TD></TR>";
    }
    if ($bot != '' && is_file($bot)) {
        echo "<TR class=borderlayout$cid><TD class=borderlayout-bot$cid colspan=3>";
        include ($bot);
        echo "</TD></TR>";
    }
    echo "</TABLE>";
}
?>