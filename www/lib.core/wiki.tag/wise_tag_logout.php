<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_logout($matches)
{
    global $WIKI_TAG_LOGOUT_TEXT;
    global $WISE_LOGIN_COMMAND;
    global $WISE_LOGIN_CMD_LOGOUT;

    return "<A class='wise-wiki-logout' HREF='?$WISE_LOGIN_COMMAND=$WISE_LOGIN_CMD_LOGOUT'>$WIKI_TAG_LOGOUT_TEXT</A>";
}
?>