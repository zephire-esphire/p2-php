<?php
/* vim: set fileencoding=cp932 ai et ts=4 sw=4 sts=4 fdm=marker: */
/* mi: charset=Shift_JIS */
/**
 * tGrep υπj[
 */

if ($_conf['ktai']) {
    tgrep_print_recent_list_k();
} else {
    tgrep_print_recent_list();
}

/**
 * υππΗέή
 */
function tgrep_read_recent_list()
{
    global $_conf;

    if (file_exists($_conf['expack.tgrep.recent_file'])) {
        return array_filter(array_map('trim', (array) @file($_conf['expack.tgrep.recent_file'])), 'strlen');
    }
    return array();
}

/**
 * PCp\¦
 */
function tgrep_print_recent_list()
{
    global $_conf;

    $tgrep_recent_list = tgrep_read_recent_list();

    if (!defined('TGREP_SMARTLIST_PRINT_ONLY_LINKS')) {
        echo '<div class="menu_cate">' . "\n";
        echo '<b><a class="menu_cate" href="#" onclick="return showHide(\'c_tgrep_recent\');" target="_self">Xυπ</a></b>' . "\n";
        echo '[<a href="#" onclick="return tGrepUpdateList(\'recent\',\'c_tgrep_recent\');" target="_self">X</a>]' . "\n";
        echo '[<a href="#" onclick="return tGrepClearList(\'recent\',\'c_tgrep_recent\');" target="_self">σ</a>]' . "\n";
        echo '<div class="itas" id="c_tgrep_recent">' . "\n";
    }
    if ($tgrep_recent_list) {
        foreach ($tgrep_recent_list as $tgrep_recent_query) {
            $tgrep_recent_query_en =rawurlencode($tgrep_recent_query);
            $tgrep_recent_query_ht = htmlspecialchars($tgrep_recent_query, ENT_QUOTES);
            echo '@<a href="tgrepc.php?Q=' . $tgrep_recent_query_en . '">' . $tgrep_recent_query_ht . '</a><br>' . "\n";
        }
    } else {
        echo 'iΘ΅j' . "\n";
    }
    if (!defined('TGREP_SMARTLIST_PRINT_ONLY_LINKS')) {
        echo "</div>\n</div>\n";
    }
}

/**
 * gΡp\¦
 */
function tgrep_print_recent_list_k()
{
    global $_conf;

    $tgrep_recent_list = tgrep_read_recent_list();

    echo '<h4>υπ</h4>' . "\n";
    if ($tgrep_recent_list) {
        echo '<ul>' . "\n";
        foreach ($tgrep_recent_list as $tgrep_recent_query) {
            $tgrep_recent_query_en = rawurlencode($tgrep_recent_query);
            $tgrep_recent_query_ht = htmlspecialchars($tgrep_recent_query, ENT_QUOTES);
            echo '<li><a href="tgrepc.php?Q=' . $tgrep_recent_query_en . '">' . $tgrep_recent_query_ht . '</a></li>' . "\n";
        }
        echo '</ul>' . "\n";
        echo '<p><a href="tgrepctl.php?file=recent&amp;clear=all">υππΈΨ±</a></p>' . "\n";
    } else {
        echo '<p>iΘ΅j</p>' . "\n";
    }
}

?>
