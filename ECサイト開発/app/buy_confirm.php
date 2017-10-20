<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>

        <div id="header-fixed">
            <div id="header-bk">
                <div id="header"><?php kagoyume(); ?></div>
                <div id="header-util">
                    <?php
                    
                    //カートへ飛ぶ関数。購入もここから行う。
                    if (isset($_SESSION['name'])) {
                        ?><a href=../app/my_data.php style="color:#ffffff;text-decoration:none">マイデータ</a><?php
                    }

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
                $item = array();

                if (isset($_COOKIE['Loginstate']) && isset($_SESSION['i'])) {
                    //sessionroop()は$_SESSION['i']に格納されているカートのアイテム数分、アイテムを表示させる関数
                    //returnでアイテムの価格を合算した総合計$totalを返す。
                    $total = sessionroop($_SESSION['i']);
                    if (isset($total)) {
                        echo "<br> 合計" . $total . "円<br>";
                        echo "<br>以上の内容で購入します";

                        echo "<br>発送方法<br>";
                        ?>
                        <form action="buy_complete.php" method="POST">
                            郵便:<input type="radio" name="radio" value="1" checked><br>
                            徒歩:<input type="radio" name="radio" value="2"><br>
                            <input type="submit" value="送信"><br>
                        </form>
                        <?php
                    } else {
                        echo "カートの中身がありません<br>";
                    }
                } elseif (empty($_COOKIE['Loginstate'])) {
                    echo "ログインされていません<br>";
                }
                /* カートに追加順で商品の名前(リンクなし)、金額が表示される
                  合計金額が表示され、その下に発送方法を選択するラジオボタンがある。
                  「上記の内容で購入する」ボタンと「カートに戻る」ボタンがある。
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                nomalLOGINOUT();
                echo top();
                ?>
            </div>
        </div>
