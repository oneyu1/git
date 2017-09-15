<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

$result = outputuser();
//var_dump($result);
foreach($result as $value=>$key){
echo "名前:".$key['name'];
echo "password:".$key['password'];
echo "メール:".$key['mail'];
echo "アドレス:".$key['address'];
echo "トータル:".$key['total'];
echo "日付:".$key['newDate'];
echo "<br>";

}

/* 登録したユーザー情報が閲覧できる(ユーザーID以外全て)
購入履歴へのリンクあり
登録情報を更新する、削除するリンクあり
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>