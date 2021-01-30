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
global $WISE_MODE_IMG;
global $WISE_SITE_DIRECTORY_IMG;

if ($WISE_MODE == $WISE_MODE_IMG) {
    $img_path = "site/" . $WISE_SITE_DIRECTORY_IMG . "/" . $WISE_GROUP . '/' . $WISE_TYPE . '/' . $WISE_PAGE;
    if (wise_check_security($WISE_MODE, $img_path)) {
        header('Content-type: image/jpg');
        // header('Content-Disposition: attachment; filename="'.$NAME.'"');
        readfile($img_path);
        exit();
    }
}
?>