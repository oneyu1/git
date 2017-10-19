<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>


<?php
SESSION_START(); //入力まで完了 
echo "変更する項目に入力してください"
?>


<form  action="my_update_result.php" method="POST">
    名前:
    <input type ="text" name="name" value="<?php echo $_SESSION["UserName"]; ?>">
    <br> <?php //インデント整える  ?>
    pass:<input type ="text" name="pass" value="<?php echo $_SESSION["UserPass"]; ?>"> <br>
    mail:<input type ="text" name="mail" value="<?php echo $_SESSION["UserMail"]; ?>"> <br>
    address:<input type ="text" name="address" value="<?php echo $_SESSION["UserAdd"]; ?>"><br>
    <input type="submit" name="送信">
</form>
<?php
/* フォームから入力するデータで既にあるデータを更新できる
  画面構成はregistration.phpと同じ。フォーム内に直接記入された状態である。このフォームの内容を書き換えていくことでデータの更新ができる
  送信ボタン付き
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
top();
echo LOGINOUT();
?>