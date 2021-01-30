<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_include_html($matches)
{
    global $WISE_GROUP, $WISE_TYPE;
    global $WISE_SITE_DIRECTORY_LIB;

    $gr = $WISE_GROUP;
    $ty = $WISE_TYPE;
    $n1 = $matches[1];
    $s = "";
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$ty/$n1";
    if (file_exists($f)) {
        $s = file_get_contents($f);
        return wise_add_to_wiklet($s);
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$n1";
    if (file_exists($f)) {
        $s = file_get_contents($f);
        return wise_add_to_wiklet($s);
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$n1";
    if (file_exists($f)) {
        $s = file_get_contents($f);
        return wise_add_to_wiklet($s);
    }
    return wise_add_to_wiklet($s);
}

function wise_tag_include_html_php($matches)
{
    global $WISE_GROUP, $WISE_TYPE;
    global $WISE_SITE_DIRECTORY_LIB;

    $gr = $WISE_GROUP;
    $ty = $WISE_TYPE;
    $n1 = $matches[1];
    $s = "";
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$ty/$n1";
    if (file_exists($f)) {
        $s = wise_get_include_content_from_file($f);
        return wise_add_to_wiklet($s);
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$n1";
    if (file_exists($f)) {
        $s = wise_get_include_content_from_file($f);
        return wise_add_to_wiklet($s);
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$n1";
    if (file_exists($f)) {
        $s = wise_get_include_content_from_file($f);
        return wise_add_to_wiklet($s);
    }
    return wise_add_to_wiklet($s);
}
?>