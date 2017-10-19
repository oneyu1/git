<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

session_start();
//現在接続中のIDのdeleteFlgを1にする。
deletedb();
echo "削除しました";
setcookie('Loginstate', "", time() - 4500);
session_destroy();
top();
/* ここにアクセスした段階で、IDによる削除が実行される(外部キー制約により直接DELETEは出来ないので、削除フラグを0から1に変更する)
  「削除しました」という一文が表示される
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT();
?>