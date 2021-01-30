<?PHP
// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

set_include_path(get_include_path() . PATH_SEPARATOR . './site/lib/');

require_once ('lib.core/00.includeAllInPath.php');
includeAllInPath('lib.functions/', '', '.php');
includeAllInPath('lib.core/', '10.func.', '.php');
includeAllInPath('site/conf.site/', 'pre.conf.', '.php');
includeAllInPath('site/conf/', 'conf.', '.php');
includeAllInPath('site/conf.site/', 'conf.', '.php');
includeAllInPath('lib.core/', '20.init.', '.php'); // TODO : this is still loaded?
includeAllInPath('site/lib/', 'init.', '.php');
includeAllInPath('lib.core/', '25.init.', '.php');
includeAllInPath('lib.core/', '30.html.header.', '.php');
includeAllInPath('site/lib/', 'html.', '.php');
includeAllInPath('lib.core/', '40.body.header.', '.php');

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);

echo $WISE_POWERED_BY_TEXT;
if ($WISE_LOADTIME_SHOW == "Y") {
    echo $WISE_LOADTIME_PREFIX . sprintf($WISE_LOADTIME_FORMAT, $totaltime) . $WISE_LOADTIME_SUFFIX;
}
includeAllInPath('lib.core/', '50.html.footer.', '.php');
?>