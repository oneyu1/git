<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php SESSION_START(); //入力まで完了 ?>

<form  action="<?php echo REGISTRATION_CONFIRM ?>" method="POST">
    名前:
    <input type ="text" name="name" value="<?php echo form_value('name'); ?>">
    <br> <?php //インデント整える   ?>
    pass:<input type ="text" name="pass" value="<?php echo form_value('pass'); ?>"> <br>
    mail:<input type ="text" name="mail" value="<?php echo form_value('mail'); ?>"> <br>
    address:<input type ="text" name="address" value="<?php echo form_value('addless'); ?>"><br>
    <input type="submit" name="送信">
</form>
<?php

//デリートフラグ実装する必要アリ？　デフォルト値でいい？
/*
 * loginからのみ遷移

  フォームがあり、入力するのは以下の要素


  ユーザー名
  パスワード
  メールアドレス
  住所
  registration_confirmから戻ってきた場合は、値を保持して記入済みにできる
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
top();
echo LOGINOUT();

