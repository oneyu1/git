<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

session_start();
$name = $_POST["name"];
$pass = $_POST["pass"];
$mail = $_POST["mail"];
$address = $_POST["address"];

if (isset($name) && isset($pass) && isset($mail) && isset($address)) {
    $result = update_user($name, $pass, $mail, $address);
}

echo "変更完了";
top();



/*
 * IDなどを受け取り、DBを更新。
  「以上の内容で更新しました。」と、フォームで入力された値を表示
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT();
?>