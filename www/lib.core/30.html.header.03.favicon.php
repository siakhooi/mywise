<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
global $WISE_FAVICON_SHOW;
global $WISE_FAVICON_SITE_ICON;
global $WISE_FAVICON_GROUP;
global $WISE_GROUP;

if ($WISE_FAVICON_SHOW == 'Y') {
    $favicon_url = $WISE_FAVICON_SITE_ICON;
    foreach ($WISE_FAVICON_GROUP as $r) {
        if ($r["group"] == $WISE_GROUP) {
            $favicon_url = $r["icon"];
            break;
        }
    }
    if ($favicon_url != '') {
        ?><link rel="shortcut icon" href="<?PHP echo $favicon_url; ?>" />
<link rel="apple-touch-icon" href="<?PHP echo $favicon_url; ?>" />
<?PHP
    }
}
?>