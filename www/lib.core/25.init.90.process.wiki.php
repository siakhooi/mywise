<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_MODE;
global $WISE_PAGE;
global $WISE_GROUP;
global $WISE_TYPE;
global $WISE_MODE_WIKI;
global $WISE_SITE_DIRECTORY_WIKI;

if ($WISE_MODE == $WISE_MODE_WIKI) {
    $wiki_path = "site/$WISE_SITE_DIRECTORY_WIKI/" . $WISE_GROUP . '/' . $WISE_TYPE . '/' . $WISE_PAGE;
    if (wise_check_security($WISE_MODE, $wiki_path)) {
        if (wise_login_checkLogin()) {
            wise_include_if_exist("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_GROUP.php");
            wise_include_if_exist("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_GROUP.$WISE_TYPE.php");

            $s = wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/Header") . wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE Header") . wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE/$WISE_PAGE") . wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/$WISE_TYPE Footer") . wise_get_file_content("site/$WISE_SITE_DIRECTORY_WIKI/$WISE_GROUP/Footer");

            global $WISE_ALIAS; // alias, to use in %%xxx%%

            $WISE_ALIAS['WISE_GROUP'] = $WISE_GROUP;
            $WISE_ALIAS['WISE_TYPE'] = $WISE_TYPE;
            $WISE_ALIAS['WISE_PAGE'] = $WISE_PAGE;

            global $WISE_PAGE_CONTENT;
            $WISE_PAGE_CONTENT = wise_process_wiki($s);
        }
    }
}
?>