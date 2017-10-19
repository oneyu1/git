<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>

<?php
SESSION_START();
$total = NULL;
$item = array();
//Result/Hit　検索された結果。アロー演算子を用いる。
//保存するのはitemcode、表示するのはitemcodeを利用した商品名
//配列iにしてセッションに保存。
//削除IDが来た時に選択された商品をnullにする
if (isset($_POST["id"])) {
    $a = $_POST["id"];
    $_SESSION['cart'][$a] = null;
    //スワップ処理
    if ($a = $_SESSION["i"] == false) {
        while ($a < $_SESSION["i"]) {
            echo $_SESSION['cart'][$a] = $_SESSION["cart"][$a++];
        }
        $_SESSION["i"] = $_SESSION["i"] --;
    }
    //SESSION['i']まである
    //○盤目削除
    //while $a < session["i"]
    ///session["cart"]["a++"]をsession["cart"]["a"]に
    //処理が完了したらsession["i"]を-1
}

if (isset($_SESSION['i'])) {
    for ($i = 1; $i <= $_SESSION['i']; $i++) {
        if (isset($_SESSION['cart'][$i])) {
            $itemcode = $_SESSION['cart'][$i];
            echo " ";
            $url = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
            $xml = simplexml_load_file($url);
            $item = $xml->Result->Hit; //メソッド化？
            echo $_SESSION['Name'][$i] . "<br>";
            foreach ($item as $key) {
                ?><img src="<?php echo h($key->Image->Small); ?>"/><br><?php
                echo $_SESSION['Price'][$i] . "円<br><br>";
            }
            $total = $total + $_SESSION['Price'][$i];
            ?><form action ="cart.php"method="POST">
                <input type="hidden" name="id" value="<?php echo $i ?>">
                <input type="submit" value="削除">
            </form>
            <?php
        }
    }
    echo $total . "円";
    ?>
    <p><form action="buy_confirm.php" name="buy" method="POST"><input type="submit" value="購入する"></from></p>
        <?php
    } else {
        echo "カートになにもありません<br>";
    }
    /*
     * 「カートに追加」でクッキーやセッションに保存された登録情報が登録古い順に表示される
      商品の写真と名前(リンクつき)、金額を表示。
      画面下部に全額の合計金額を表示する
      「購入する」ボタンあり
      各商品には「削除」のリンクあり。このリンクをクリックすることで、カートから商品を削除する
      カートの中身はユーザー毎に切り替えられる
      ログインしていない状態ならばログインページに遷移、そこでログインに成功した場合、非ログイン状態で「カートに追加」操作をしていた商品はそのユーザー用のカートに移る
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    echo top();
    echo LOGINOUT();
    ?>