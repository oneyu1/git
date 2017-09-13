<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php';?>

<?php
//appid取得

$item = array();
$itemcode = $_GET['itemcode'];
$url = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
$xml = simplexml_load_file($url);
//Result/Hit　検索された結果。アロー演算子を用いる。
$item = $xml->Result->Hit;
//var_dumpで要素をチェック、帰ってきた値を見てアロー演算子でクラスを指定する。
//var_dump($item);

foreach ($item as $key){
?>
<div class="Item">
        <p><?php echo h($key->Name);?></p>
        <p><img src="<?php echo h($key->Image->Small); ?>"/><?php echo h($key->Headline); ?></p>
        <p><?php echo "評価".h($key->Ratings->DetailRate); ?></p>
        <form action = "add.php" method = "GET">
            <input type="hidden" name="itemcode" value="<?php echo $itemcode?>">
            <input type="submit" value="カートに追加する">
        </form><p>
</div>
<?php
    }
?>
<?php
/* 
 * serchまたはcartから遷移できる。商品IDをGETメソッドにより受け渡す
YahooショッピングAPIから取得したデータで、より詳細な情報(概要や評価値)、が表示される
「カートに追加する」ボタンがあり、クリックするとadd.phpに遷移する。
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT();