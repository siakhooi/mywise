<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_include_wiki($matches)
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
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$n1";
    if (file_exists($f)) {
        $s = file_get_contents($f);
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$n1";
    if (file_exists($f)) {
        $s = file_get_contents($f);
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
}

function wise_tag_include_wiki_php($matches)
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
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$gr/$n1";
    if (file_exists($f)) {
        $s = wise_get_include_content_from_file($f);
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
    $f = "site/$WISE_SITE_DIRECTORY_LIB/$n1";
    if (file_exists($f)) {
        $s = wise_get_include_content_from_file($f);
        $s = preg_replace('/\\r/', '', $s);
        return $s;
    }
}
?>