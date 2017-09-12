<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php



/* 
 * serchまたはcartから遷移できる。商品IDをGETメソッドにより受け渡す
YahooショッピングAPIから取得したデータで、より詳細な情報(概要や評価値)、が表示される
「カートに追加する」ボタンがあり、クリックするとadd.phpに遷移する。
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>