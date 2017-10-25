<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>
<?php ini_set("allow_url_fopen", 1); ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>カートに追加</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>

        <div id="header-fixed">
            <div id="header-bk">
                <div id="header"><?php kagoyume(); ?></div>
                <div id="header-util">
                    <?php
                    //カートへ飛ぶ関数。購入もここから行う。
                    mydata();
                    //カートへ飛ぶ関数。購入もここから行う。
                    echo cart();
                    //ログインの時はログアウト、ログアウト時はログイン表示させる関数。ログイン処理、ログアウト処理自体は飛んだあとに行う。
                    echo LOGINOUT();
                    ?>
                </div>
            </div>
        </div>
    <body>
        <div id = "body-bk">
            <div id = "body">
                <table border = 1>
                    <tr>
                        <th>画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                    </tr>
                    <?php
//$_GET['get']に値挿入がなければ値がなくカートにnullが追加される為判定
                    if (isset($_GET['itemcode'])) {
                        $itemcode = $_GET['itemcode'];
                        $rss = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
                        $data = curl($rss);
                        $xml = simplexml_load_string($data);
                        //Result/Hit　検索された結果。アロー演算子を用いる。
                        $item = $xml->Result->Hit;
                        //保存するのはitemcode、表示するのはitemcodeを利用した商品名
                        //配列iにしてセッションに保存。

                        if (!isset($_SESSION['i'])) {
                            $_SESSION['i'] = 1;
                        } else {
                            $_SESSION['i'] = ++$_SESSION['i'];
                        }

                        $i = $_SESSION['i'];

                        $_SESSION['cart'][$i] = $_GET["itemcode"];
                        foreach ($item as $key) {
                            ?>
                            <td><p><img src="<?php echo h($key->Image->Small); ?>"/></p></td>
                            <td><?php echo $_SESSION['Name'][$i] = h($key->Name); ?></td>
                            <td><?php echo $_SESSION['Price'][$i] = h($key->Price); ?>円</td>


                        </table>
                        <?php
                    }
                    echo "カートに追加しました<br>";
                    ?>  <p><form action="cart.php"><input type="submit" value="カートを見る"></form></p>
                    <?php
                } else {
                    echo "値がないかアクセスルートが不正です。";
                }
                /*
                 * 商品の情報を受け取り、クッキーやセッションに追加する
                  画面には「カートに追加しました」という文言が出てくる。
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                echo top();
                ?>
            </div>
        </div>