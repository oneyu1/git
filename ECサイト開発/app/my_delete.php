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
                echo "本当に削除しますか？<br>";
                $result = outputuser();
//データベースより取得した現在のデータを表示。
//var_dump($result);
                if (isset($result)) {
                    foreach ($result as $value => $key) {
                        echo "名前:" . $key['name'] . "<br>";
                        echo "password:" . $key['password'] . "<br>";
                        echo "メール:" . $key['mail'] . "<br>";
                        echo "アドレス:" . $key['address'] . "<br>";
                        echo "トータル:" . $key['total'] . "<br>";
                        echo "日付:" . $key['newDate'];
                        echo "<br>";
                    }
                }
                ?>
                <form action="my_delete_result.php">
                    <input type="submit" value ="はい">
                </form>
                <?php
                logindec();
                /* 対象のレコードの全データを表示したのちに、「このユーザーをマジで削除しますか？」という質問があり、「はい」と「いいえ」が直リンクとして設置してある。「はい」ならmy_delete_result.phpへ、そうでないならトップページへ遷移する
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>