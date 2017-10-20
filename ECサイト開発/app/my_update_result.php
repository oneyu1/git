<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
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
                $name = $_POST["name"];
                $pass = $_POST["pass"];
                $mail = $_POST["mail"];
                $address = $_POST["address"];

                if (isset($name) && isset($pass) && isset($mail) && isset($address)) {
                    $result = update_user($name, $pass, $mail, $address);
                }

                echo "変更完了";

                /*
                 * IDなどを受け取り、DBを更新。
                  「以上の内容で更新しました。」と、フォームで入力された値を表示
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>