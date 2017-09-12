<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
    
<?php

if(!$_POST['mode']=="RESULT"){
    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
}else{
    
    session_start();
    $name = $_SESSION['name'];
    $pass = $_SESSION['pass'];
    $mail =  $_SESSION['mail'];
    $address = $_SESSION['address'];
            
    echo $result = insert($name,$pass,$mail,$address);
    
    if(!isset($result)){
        ?>
        名前:<?php echo $name;?><br>
        パスワード:<?php echo $pass;?><br>
        メールアドレス:<?php echo $mail;?><br>
        住所:<?php echo $address; ?><br>

        上記の内容で登録しました。
        <?php
    }else{
    }
}
//insert()

/* 
 * プロフィール用のDBに値を挿入。この際、現在時(年日時分)を組み込み関数で取得し、追加。
「以上の内容で登録しました。」とregistration_confirmのようにフォームで入力された値を表示
「トップページへ戻る」のリンクが、目立つ場所に設置されている
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT();