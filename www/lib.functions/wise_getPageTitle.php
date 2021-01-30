<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_getPageTitle($gr, $ty, $pg)
{
    global $WISE_SITE_DIRECTORY_WIKI;
    $wiki_path = "site/$WISE_SITE_DIRECTORY_WIKI/" . $gr . '/' . $ty . '/' . $pg;
    $s = wise_get_file_content($wiki_path);
    preg_match('/^title\\:(.*)$/U', $s, $matches);
    return $matches[1];
}
?>