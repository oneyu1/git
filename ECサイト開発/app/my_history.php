<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>
<?php ini_set("allow_url_fopen", 1); ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>購入履歴</title>
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
                <table border ="1">
                    <tr>
                        <th>商品名</th>
                        <th>配送方法</th>
                        <th>購入日時</th>
                    </tr>

                    <?php
                    $_SESSION["userID"];
//購入履歴をデータベースより取得。各種データを表示。
                    $result = buyhistory();
                    if (isset($result)) {
                        foreach ($result as $value => $key) {
                            ?><tr><?php
                                $itemCode = $key["itemCode"];
                                //itemcodeよりアイテム名を参照して表示
                                itemcode_select($key["itemCode"]);
                                if ($key["type"] == 1) {
                                    ?><td> 郵便 </td><?php
                                } elseif ($key["type"] == 2) {
                                    ?><td> 徒歩 </td><?php
                                }
                                ?><td><?php echo $key["buyDate"]; ?></td>
                            </tr><?php
                        }
                    }
                    ?></table>
                <?php
                logindec();
                /* これまで購入した商品の履歴が見れる
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>