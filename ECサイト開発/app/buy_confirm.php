<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

/* カートに追加順で商品の名前(リンクなし)、金額が表示される
合計金額が表示され、その下に発送方法を選択するラジオボタンがある。
「上記の内容で購入する」ボタンと「カートに戻る」ボタンがある。
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>