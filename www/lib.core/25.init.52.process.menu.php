<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function addUrl($mode, $group, $type, $page)
{
    $HOME_URL = dirname($_SERVER['SCRIPT_NAME']);
    if ($HOME_URL == "/")
        $HOME_URL = ".";
    return "\"" . $HOME_URL . "/" . wise_getURL($mode, $group, $type, $page) . "\"";
}

function addUrl1($url)
{
    return "\"" . $url . "\"";
}

function generate($parent)
{
    global $WISE_MENU_TYPE_LINK_DIRECT;
    global $WISE_MENU_TYPE_LINK;
    global $WISE_MENU_TYPE_CAT;
    global $WISE_MODE_WIKI;
    global $WISE_DEFAULT_GROUP;
    global $WISE_DEFAULT_TYPE;
    global $WISE_DEFAULT_PAGE;

    wise_pr("[{");
    $w = 0;
    foreach ($parent as $i) {
        $menutype = $i['menutype'];
        $label = $i['label'] ?? wise_getPageTitle($group, $type, $page);
        $group = $i['group'] ?? $WISE_DEFAULT_GROUP;
        $type = $i['type'] ?? $WISE_DEFAULT_TYPE;
        $page = $i['page'] ?? $WISE_DEFAULT_PAGE;
        $mode = $i['mode'] ?? $WISE_MODE_WIKI;
        $url = $i['url'] ?? "";
        $value = $i['value'] ?? "";
        if ($label == "")
            $label = $page;

        if ($w != 0)
            wise_pr("},{");
        if ($menutype == $WISE_MENU_TYPE_LINK) {
            echo "\"label\": \"$label\", ";
            echo "\"type\": \"a\", ";
            echo "\"value\": " . addUrl($mode, $group, $type, $page);
        } else if ($menutype == $WISE_MENU_TYPE_LINK_DIRECT) {
            echo "\"label\": \"$label\", ";
            echo "\"type\": \"a\", ";
            echo "\"value\": " . addUrl1($url);
        } else if ($menutype == $WISE_MENU_TYPE_CAT) {
            echo "\"label\": \"$label\", ";
            echo "\"type\": \"c\", ";
            echo "\"value\": ";
            generate($value);
        }
        $w ++;
    }
    wise_pr("}]");
}

function addMenu($id, $parents)
{
    wise_pr("{");
    wise_pr("\"id\": \"" . $id . "\",");
    wise_pr("\"menuitem\": ");
    generate($parents);
    wise_pr("}");
}

global $WISE_MODE_MENU;
global $WISE_MENU_SITE;
global $WISE_MENU_GROUP;

if ($WISE_MODE == $WISE_MODE_MENU) {
    // $menu_separator="";
    $url = dirname($_SERVER['SCRIPT_NAME']);
    wise_pr("{");
    // wise_pr("\"allmenu\" : [");
    $menu_separator = "\"allmenu\" : [";

    if (is_array($WISE_MENU_SITE)) {
        wise_pr($menu_separator);
        addMenu("wise-menu-site", $WISE_MENU_SITE);
        $menu_separator = ", ";
    }
    if (is_array($WISE_MENU_GROUP)) {
        foreach ($WISE_MENU_GROUP as $mg) {
            wise_pr($menu_separator);
            addMenu("wise-menu-group-" . $mg['group'], $mg['menutree']);
            $menu_separator = ", ";
        }
    }
    global $WISE_MENU_CUSTOM;
    if (is_array($WISE_MENU_CUSTOM)) {
        foreach ($WISE_MENU_CUSTOM as $mg) {
            wise_pr($menu_separator);
            addMenu("wise-menu-custom-" . $mg['id'], $mg['menutree']);
            $menu_separator = ", ";
        }
    }
    wise_pr("]");
    wise_pr("}");
    exit();
}
?>