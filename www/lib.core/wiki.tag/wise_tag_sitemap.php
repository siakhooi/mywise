<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $wise_sitemap_temporary;
global $wise_sitemap_heading;

function wise_sitemap_get_heading()
{
    global $wise_sitemap_heading;
    return $wise_sitemap_heading;
}

function wise_sitemap_add_heading()
{
    global $wise_sitemap_heading;
    $wise_sitemap_heading ++;
    if ($wise_sitemap_heading > 6)
        $wise_sitemap_heading = 6;
}

function wise_sitemap_minus_heading()
{
    global $wise_sitemap_heading;
    $wise_sitemap_heading --;
    if ($wise_sitemap_heading < 1)
        $wise_sitemap_heading = 1;
}

function wise_sitemap_init()
{
    global $wise_sitemap_temporary;
    $wise_sitemap_temporary = "";
    global $wise_sitemap_heading;
    $wise_sitemap_heading = 1;
}

function wise_sitemap_add($s)
{
    global $wise_sitemap_temporary;
    $wise_sitemap_temporary .= $s;
}

function wise_tag_sitemap($matches)
{
    $id = $matches[1];
    global $WISE_SITEMAP;
    wise_sitemap_init();

    if (is_array($WISE_SITEMAP)) {
        foreach ($WISE_SITEMAP as $a) {
            if ($a['id'] == $id) {
                if (is_array($a['menutrees'])) {
                    wise_sitemap_add("<DIV class='wise-wiki-sitemap'>");
                    foreach ($a['menutrees'] as $mt) {
                        wise_generate_sitemap($mt);
                    }
                    wise_sitemap_add("</DIV>");
                }
                break;
            }
        }
    }
    global $wise_sitemap_temporary;
    return $wise_sitemap_temporary;
}

function wise_generate_sitemap($parent)
{
    global $WISE_MENU_TYPE_LINK;
    global $WISE_MENU_TYPE_LINK_DIRECT;
    global $WISE_MENU_TYPE_CAT;
    global $WISE_MODE_WIKI;
    global $WISE_DEFAULT_GROUP;
    global $WISE_DEFAULT_TYPE;
    global $WISE_DEFAULT_PAGE;

    $c = "class='wise-wiki-sitemap'";
    wise_sitemap_add("<UL $c>");
    foreach ($parent as $i) {
        $menutype = $i['menutype'];
        $label = $i['label'];
        $value = $i['value'];
        $group = $i['group'];
        $type = $i['type'];
        $page = $i['page'];
        $mode = $i['mode'];
        $url = $i['url'];
        if ($mode == "")
            $mode = $WISE_MODE_WIKI;
        if ($group == "")
            $mode = $WISE_DEFAULT_GROUP;
        if ($type == "")
            $mode = $WISE_DEFAULT_TYPE;
        if ($page == "")
            $mode = $WISE_DEFAULT_PAGE;
        if ($label == "")
            $label = wise_getPageTitle($group, $type, $page);
        if ($label == "")
            $label = $page;

        $h = wise_sitemap_get_heading();
        if ($menutype == $WISE_MENU_TYPE_LINK) {
            wise_sitemap_add("<LI $c><H$h $c><A $c HREF=\"" . wise_getURL($mode, $group, $type, $page) . "\">" . $label . "</A></H$h></LI>");
        } else if ($menutype == $WISE_MENU_TYPE_LINK_DIRECT) {
            wise_sitemap_add("<LI $c><H$h $c><A $c HREF=\"" . $url . "\">" . $label . "</A></H$h></LI>");
        } else if ($menutype == $WISE_MENU_TYPE_CAT) {
            wise_sitemap_add("<LI $c><H$h $c>" . $label . "</H$h></LI>");
            wise_sitemap_add_heading();
            wise_generate_sitemap($value);
            wise_sitemap_minus_heading();
        }
    }
    wise_sitemap_add("</UL>");
}
?>