<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>

<?php

session_start();
$item = array();

if(isset($_COOKIE['Loginstate']) && isset($_SESSION['i'])){
    $total = sessionroop($_SESSION['i']);
    if(isset($total)){
        echo "<br> 合計".$total."円<br>";
        echo "<br>以上の内容で購入します";

        echo "<br>発送方法<br>";
        ?>
        <form action="buy_complete.php" method="POST">
            郵便:<input type="radio" name="radio" value="1" checked><br>
            徒歩:<input type="radio" name="radio" value="2"><br>
            <input type="submit" value="送信"><br>
        </form>
        <?php
        }else{
            echo "カートの中身がありません<br>";
        }
}else{
    echo "ログインされていません<br>";
}
/* カートに追加順で商品の名前(リンクなし)、金額が表示される
合計金額が表示され、その下に発送方法を選択するラジオボタンがある。
「上記の内容で購入する」ボタンと「カートに戻る」ボタンがある。
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
echo top();
echo LOGINOUT(); ?>
