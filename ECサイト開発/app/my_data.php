<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

session_start();
$result = outputuser();
//var_dump($result);
if(isset($result)){
    foreach($result as $value=>$key){
        echo "名前:".$_SESSION["UserName"] = $key['name'];
        echo "<br>";
        echo "password:".$_SESSION["UserPass"] = $key['password'];
        echo "<br>";
        echo "メール:".$_SESSION["UserMail"] = $key['mail'];
        echo "<br>";
        echo "アドレス:".$_SESSION["UserAdd"] = $key['address'];
        echo "<br>";
        echo "トータル:".$key['total']."<br>";
        echo "<br>";
        echo "日付:".$key['newDate'];
        echo "<br>";
        ?>
        <a href=<?php echo "my_history.php"; ?>>購入履歴</a>
        <a href=<?php echo "my_update.php"; ?>>登録情報の更新</a>
        <a href=<?php echo "my_delete.php";?>>アカウント削除</a>
        <?php
    }
}

/* 登録したユーザー情報が閲覧できる(ユーザーID以外全て)
購入履歴へのリンクあり
登録情報を更新する、削除するリンクあり
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>