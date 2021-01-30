<?PHP

// *****************************************************************************
// This program is part of MyWISE - My Wiki Inside Site Engine
//
// See LICENSE.md in the project root for license information.
// *****************************************************************************
function wise_tag_inline_htm($matches)
{
    $n1 = $matches[1];
    return wise_add_to_wiklet($n1);
}

function wise_tag_inline_pre($matches)
{
    $n1 = $matches[1];
    return wise_add_to_wiklet("<PRE class='wise-wiki'>$n1</PRE>");
}

function wise_tag_inline_html_php($matches)
{
    $n1 = $matches[1];
    $s = wise_get_evaluated_content_from_code($n1);
    return wise_add_to_wiklet($s);
}

function wise_tag_inline_wiki_php($matches)
{
    $n1 = $matches[1];
    $s = wise_get_evaluated_content_from_code($n1);
    $s = preg_replace('/\\r/', '', $s);
    return $s;
}
?>