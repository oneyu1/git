<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>
<?php ini_set("allow_url_fopen", 1); ?>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>商品情報</title>
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
                <?php
//appid取得

                $itemcode = $_GET['itemcode'];
//PHP5.6だとSSL承認が通らない為、PHP7を使用する。
                $rss = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=dj00aiZpPUxXNEk3SFZLc05ZQyZzPWNvbnN1bWVyc2VjcmV0Jng9YmY-&itemcode=$itemcode";
                $data = curl($rss);

                $xml = simplexml_load_string($data);
//Result/Hit　検索された結果。アロー演算子を用いる。
                $item = $xml->Result->Hit;
//var_dumpで要素をチェック、帰ってきた値を見てアロー演算子でクラスを指定する。
//var_dump($item);
                ?>
                <table border="1">
                    <tr>
                        <th>画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>評価</th>
                    </tr>
                    <?php
                    foreach ($item as $key) {
                        ?>
                        <div class="Item">
                            <td><p><img src="<?php echo h($key->Image->Small); ?>"/></p></td>
                            <td><p><?php echo h($key->Name); ?></p></td>
                            <td><p><?php echo h($key->Price) . "円"; ?></p></td>
                            <td><p><?php echo h($key->Ratings->DetailRate); ?></p></td>

                    </table>
                    <form action = "add.php" method = "GET">
                        <input type="hidden" name="itemcode" value="<?php echo $itemcode ?>">
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

            top();
            ?>
        </div>
    </div>