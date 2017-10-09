<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php
echo "本当に削除しますか？";
session_start();
$result = outputuser();
//var_dump($result);
if(isset($result)){
    foreach($result as $value=>$key){
        echo "名前:".$key['name']."<br>";
        echo "password:".$key['password']."<br>";
        echo "メール:".$key['mail']."<br>";
        echo "アドレス:".$key['address']."<br>";
        echo "トータル:".$key['total']."<br>";
        echo "日付:".$key['newDate'];
        echo "<br>";
        ?>
        <a href=<?php echo "my_history.php"; ?>>購入履歴</a>
        <a href=<?php echo "my_update.php"; ?>>登録情報の更新</a>
        <a href=<?php echo "my_delete.php";?>>アカウント削除</a>
        <?php
    }
}
?>
<form action="my_delete_result.php">
    <input type="submit" value ="はい">
</form>
<?php
logindec();
/* 対象のレコードの全データを表示したのちに、「このユーザーをマジで削除しますか？」という質問があり、「はい」と「いいえ」が直リンクとして設置してある。「はい」ならmy_delete_result.phpへ、そうでないならトップページへ遷移する
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>