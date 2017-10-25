<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php ini_set("allow_url_fopen", 1); ?>
<?php
session_start();
setcookie('Loginstate', "", time() - 4500);
session_destroy();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ユーザ削除確認画面</title>
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
//現在接続中のIDのdeleteFlgを1にする。
                deletedb();
                echo "削除しました";

                top();
                /* ここにアクセスした段階で、IDによる削除が実行される(外部キー制約により直接DELETEは出来ないので、削除フラグを0から1に変更する)
                  「削除しました」という一文が表示される
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                ?>
            </div>
        </div>