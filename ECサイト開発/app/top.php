<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        echo "このサービスは、そんなフラストレーションを解消するために生まれた、<br>

        『金銭取引が絶対に発生しない』<br>
        『いくらでも、どんなものでも購入できる(気分になれる)』<br>
        『ECサイト』<br>

        です。<br>";
        
        echo "スキル確認用のデモとして作成されています。<br>";
        ?>
        <?php
        session_start();
        ?>
        <form action ="<?php echo SEARCH ?>" method="GET">
            商品検索:<input type="text" name="query">
            <input hidden="text" name="category_id" value="1">
            <input type="submit">

        </form>
        <?php
        //$_SESSIONにnameが格納されている場合(ログインしている場合)マイデータを表示させる。
        if (isset($_SESSION['name'])) {
            ?><a href= " <?php echo "../app/my_data.php" ?>">マイデータ</a><?php
        }

        //カートへ飛ぶ関数。購入もここから行う。
        echo cart();
        //ログインの時はログアウト、ログアウト時はログイン表示させる関数。ログイン処理、ログアウト処理自体は飛んだあとに行う。
        echo LOGINOUT();
        
        
        /* このシステムの簡単な説明が記載されている。テキストは自由
          キーワード検索フォームが設置されている。検索の遷移先はsearchで、GETメソッド。未入力ならエラーを表示
         * フォームの再送信が必要なページは設定が必要
         * 
         */
        ?>

    </body>
</html>
