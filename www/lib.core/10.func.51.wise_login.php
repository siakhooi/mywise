<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_login_getSessionKey($pwd)
{
    global $WISE_LOGIN_HASHSEED;
    return wise_login_hash($pwd . $WISE_LOGIN_HASHSEED . $pwd . $WISE_LOGIN_HASHSEED);
}

function wise_login_LoginRequired()
{
    global $WISE_LOGIN_DEFAULT;
    global $WISE_LOGIN_EXCLUDE_GROUPS;
    $t = wise_getType();
    $g = wise_getGroup();
    $needLogin = ($WISE_LOGIN_DEFAULT == "Y");
    $inExclude = false;
    foreach ($WISE_LOGIN_EXCLUDE_GROUPS as $e) {
        if ($e['group'] == $g && $e['type'] == $t) {
            $inExclude = true;
            break;
        }
    }
    return ($needLogin && ! $inExclude) || (! $needLogin && $inExclude);
}

function wise_login_checkLogin()
{
    wise_logout();
    if (wise_login_LoginRequired()) {
        if (! wise_login_isLogin()) {
            if (wise_login()) {
                return true;
            }
            global $WISE_PAGE_CONTENT;
            $WISE_PAGE_CONTENT = wise_login_getLoginForm();
            return false;
        }
    }
    return true;
}

function wise_login_isLogin()
{
    global $WISE_LOGIN_COOKIE;
    $s1 = $_COOKIE[$WISE_LOGIN_COOKIE];
    global $WISE_LOGIN_PASSWORD;
    $s2 = wise_login_getSessionKey($WISE_LOGIN_PASSWORD);
    return $s1 == $s2;
}

function wise_login()
{
    global $WISE_LOGIN_COMMAND;
    $cmd = $_POST[$WISE_LOGIN_COMMAND];

    global $WISE_LOGIN_CMD_LOGIN;
    global $WISE_LOGIN_FIELD_PASSWORD;

    if ($cmd == $WISE_LOGIN_CMD_LOGIN) {
        $pwd = $_POST[$WISE_LOGIN_FIELD_PASSWORD];
        $s1 = wise_login_getSessionKey($pwd);
        global $WISE_LOGIN_PASSWORD;
        $s2 = wise_login_getSessionKey($WISE_LOGIN_PASSWORD);
        if ($s1 == $s2) {
            global $WISE_LOGIN_COOKIE;
            $s = wise_login_getSessionKey($pwd);
            setcookie($WISE_LOGIN_COOKIE, $s, 0, "/");
            return true;
        } else {
            global $WISE_LOGIN_MESSAGE;
            $WISE_LOGIN_MESSAGE = "Invalid Password!";
            wise_log("ERROR", "10.func.51.wise_login.php", $WISE_LOGIN_MESSAGE . ":" . $pwd);
        }
    }
    return false;
}

function wise_logout()
{
    global $WISE_LOGIN_COMMAND;
    $cmd = $_GET[$WISE_LOGIN_COMMAND] ?? "";
    global $WISE_LOGIN_CMD_LOGOUT;

    if ($cmd == $WISE_LOGIN_CMD_LOGOUT) {
        global $WISE_LOGIN_COOKIE;
        setcookie($WISE_LOGIN_COOKIE, "x", 0, "/");
        $_COOKIE[$WISE_LOGIN_COOKIE] = "x";

        global $WISE_LOGIN_LOGOUT_GROUP;
        global $WISE_LOGIN_LOGOUT_TYPE;
        global $WISE_LOGIN_LOGOUT_PAGE;

        if ($WISE_LOGIN_LOGOUT_GROUP != "")
            wise_setGroup($WISE_LOGIN_LOGOUT_GROUP);
        if ($WISE_LOGIN_LOGOUT_TYPE != "")
            wise_setType($WISE_LOGIN_LOGOUT_TYPE);
        if ($WISE_LOGIN_LOGOUT_PAGE != "")
            wise_setPage($WISE_LOGIN_LOGOUT_PAGE);

        return true;
    }
    return false;
}

function wise_login_getLoginForm()
{
    global $WIKI_TAG_LOGIN_TEXT;
    global $WIKI_TAG_PASSWORD_TEXT;
    global $WISE_LOGIN_FIELD_PASSWORD;
    global $WISE_LOGIN_COMMAND;
    global $WISE_LOGIN_CMD_LOGIN;

    global $WISE_LOGIN_PAGE_TITLE;
    wise_setPageTitle($WISE_LOGIN_PAGE_TITLE);
    global $WISE_LOGIN_MESSAGE;
    $s = "";
    $s .= "<H1 class='wise-wiki-title'>$WISE_LOGIN_PAGE_TITLE</H1>";
    $s .= "<P class='wise-wiki'>$WISE_LOGIN_MESSAGE</P>";
    $s .= "<FORM METHOD=POST>";
    $s .= $WIKI_TAG_PASSWORD_TEXT . "<INPUT TYPE=PASSWORD NAME=$WISE_LOGIN_FIELD_PASSWORD>";
    $s .= "<INPUT TYPE=HIDDEN NAME=$WISE_LOGIN_COMMAND VALUE=$WISE_LOGIN_CMD_LOGIN>";
    $s .= "<INPUT TYPE=SUBMIT value=" . $WIKI_TAG_LOGIN_TEXT . "></FORM>";
    return $s;
}

function wise_login_hash($s)
{
    if (in_array("hash", get_loaded_extensions())) {
        return hash('md5', $s);
    }
    if (in_array("mhash", get_loaded_extensions())) {
        return bin2hex(mhash(MHASH_MD5, $s));
    }
    return bin2hex($s);
}
?>