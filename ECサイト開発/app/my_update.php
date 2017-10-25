<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ユーザ情報変更画面</title>
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
                echo "変更する項目に入力してください"
                ?>


                <form  action="my_update_result.php" method="POST">
                    名前:
                    <input type ="text" name="name" value="<?php echo $_SESSION["UserName"]; ?>">
                    <br> <?php //インデント整える   ?>
                    pass:<input type ="text" name="pass" value="<?php echo $_SESSION["UserPass"]; ?>"> <br>
                    mail:<input type ="text" name="mail" value="<?php echo $_SESSION["UserMail"]; ?>"> <br>
                    address:<input type ="text" name="address" value="<?php echo $_SESSION["UserAdd"]; ?>"><br>
                    <input type="submit" name="送信">
                </form>
                <?php
                /* フォームから入力するデータで既にあるデータを更新できる
                  画面構成はregistration.phpと同じ。フォーム内に直接記入された状態である。このフォームの内容を書き換えていくことでデータの更新ができる
                  送信ボタン付き
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>