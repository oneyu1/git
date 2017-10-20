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
//購入データを受け取り、データベースに記載。
                $_SESSION['i'];
                if (isset($_COOKIE['Loginstate']) && isset($_SESSION['i'])) {
                    $total = sessionroop($_SESSION['i']);
                    insert_buy($_POST['radio']);
                    total($total);
                    echo "合計" . $total . '円';

                    $_session["cart"][0] = null;
                    $_SESSION['i'] = null;

                    //sql buy_tに追加。$_SESSION['i']回そのまま回すのは重くなるので一括でinsert出来るようにする。
                    //buyID(AUTO) userID(user) itemCode(コード) type(発送方法) buyData(現在時刻)
                }

//insert_buy($userID,$itemCode,$type,$buyDate);


                /*
                 * 購入データを保存
                  総購入金額を更新
                  「購入が完了しました」と表示
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                echo top();
                ?>
            </div>
        </div>