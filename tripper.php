<?php
/* vim: set fileencoding=cp932 ai et ts=4 sw=4 sts=4 fdm=marker: */
/* mi: charset=Shift_JIS */

/* トリップ・メーカー */

include_once './conf/conf.inc.php';  // 基本設定ファイル

$_login->authorize(); // ユーザ認証

echo P2Util::mkTrip($_GET['tk']);

?>
