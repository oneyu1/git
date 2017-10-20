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
                <form  action="<?php echo REGISTRATION_CONFIRM ?>" method="POST">
                    名前:
                    <input type ="text" name="name" value="<?php echo form_value('name'); ?>">
                    <br> <?php //インデント整える    ?>
                    pass:<input type ="text" name="pass" value="<?php echo form_value('pass'); ?>"> <br>
                    mail:<input type ="text" name="mail" value="<?php echo form_value('mail'); ?>"> <br>
                    address:<input type ="text" name="address" value="<?php echo form_value('addless'); ?>"><br>
                    <input type="submit" name="送信">
                </form>
                <?php
//デリートフラグ実装する必要アリ？　デフォルト値でいい？
                /*
                 * loginからのみ遷移

                  フォームがあり、入力するのは以下の要素


                  ユーザー名
                  パスワード
                  メールアドレス
                  住所
                  registration_confirmから戻ってきた場合は、値を保持して記入済みにできる
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>
                