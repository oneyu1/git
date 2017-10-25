<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php ini_set("allow_url_fopen",1); ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ユーザデータ</title>
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
                $result = outputuser();
//var_dump($result);
                if (isset($result)) {
                    foreach ($result as $value => $key) {
                        //データベースより取得したデータの表示。
                        echo "名前:" . $_SESSION["UserName"] = $key['name'];
                        echo "<br>";
                        echo "password:" . $_SESSION["UserPass"] = $key['password'];
                        echo "<br>";
                        echo "メール:" . $_SESSION["UserMail"] = $key['mail'];
                        echo "<br>";
                        echo "アドレス:" . $_SESSION["UserAdd"] = $key['address'];
                        echo "<br>";
                        echo "トータル:" . $key['total'] . "<br>";
                        echo "<br>";
                        echo "日付:" . $key['newDate'];
                        echo "<br>";
                        //各種処理ページへ飛ぶ。
                        ?>
                        <a href=<?php echo "my_history.php"; ?>>購入履歴</a>
                        <a href=<?php echo "my_update.php"; ?>>登録情報の更新</a>
                        <a href=<?php echo "my_delete.php"; ?>>アカウント削除</a>
                        <?php
                    }
                }

                /* 登録したユーザー情報が閲覧できる(ユーザーID以外全て)
                  購入履歴へのリンクあり
                  登録情報を更新する、削除するリンクあり
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>