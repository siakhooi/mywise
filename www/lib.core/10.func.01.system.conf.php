<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_MODE_WIKI;
global $WISE_MODE_CSS;
global $WISE_MODE_IMG;
global $WISE_MODE_SITEMAP;
global $WISE_MODE_MENU;

$WISE_MODE_WIKI = "wiki";
$WISE_MODE_CSS = "css";
$WISE_MODE_IMG = "img";
$WISE_MODE_SITEMAP = "sitemap";
$WISE_MODE_MENU = "menu"; // TODO: getmenu.php doesn't use this, hardcoded

global $WISE_SITE_DIRECTORY_WIKI;
global $WISE_SITE_DIRECTORY_IMG;
global $WISE_SITE_DIRECTORY_CSS;
global $WISE_SITE_DIRECTORY_LIB;

$WISE_SITE_DIRECTORY_WIKI = "wiki";
$WISE_SITE_DIRECTORY_IMG = "img";
$WISE_SITE_DIRECTORY_CSS = "theme";
$WISE_SITE_DIRECTORY_LIB = "lib";

global $WISE_MENU_TYPE_LINK_DIRECT;
global $WISE_MENU_TYPE_LINK;
global $WISE_MENU_TYPE_CAT;
$WISE_MENU_TYPE_LINK_DIRECT = "d";
$WISE_MENU_TYPE_LINK = "l";
$WISE_MENU_TYPE_CAT = "c";

global $WISE_URL_NAME_MODE;
global $WISE_URL_NAME_GROUP;
global $WISE_URL_NAME_TYPE;
global $WISE_URL_NAME_PAGE;

// if you change the following, you have to change the /.htaccess file.
$WISE_URL_NAME_MODE = "md";
$WISE_URL_NAME_GROUP = "gr";
$WISE_URL_NAME_TYPE = "ty";
$WISE_URL_NAME_PAGE = "pg";

global $WISE_DEFAULT_MODE;
$WISE_DEFAULT_MODE = $WISE_MODE_WIKI;

global $WISE_NRCR;
$WISE_NRCR = "\n";

global $WISE_PATH_SEPARATOR;
$WISE_PATH_SEPARATOR = "/";

global $WISE_POWERED_BY_TEXT;
global $WISE_COPYRIGHT_TEXT;
$WISE_COPYRIGHT_TEXT = "Copyright &copy; MyWISE. All rights reserved";
$WISE_POWERED_BY_TEXT = "<HR style='height: 1px; ' /><DIV style='text-align: right; font-size: 10px; font-weight: bold;'>Copyright &copy; <H1 style='display: inline; font-size: 10px; '><A HREF=https://github.com/siakhooi/mywise/>MyWISE</A>. All rights reserved</H1>.</DIV>";
?>