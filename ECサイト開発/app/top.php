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

        <?php echo "このサービスは、そんなフラストレーションを解消するために生まれた、<br>

        『金銭取引が絶対に発生しない』<br>
        『いくらでも、どんなものでも購入できる(気分になれる)』<br>
        『ECサイト』<br>

        です。"; ?>
         <?php
        /* このシステムの簡単な説明が記載されている。テキストは自由
          キーワード検索フォームが設置されている。検索の遷移先はsearchで、GETメソッド。未入力ならエラーを表示
         * 
         */
        ?>
            <form action ="<?php echo SEARCH ?>" method="GET">
                商品検索:<input type="text" name="query">
                <input type="submit">

                <?php  
                //未入力の時エラー表示 ?>
            </form>
            
        <?php 
            echo LOGINOUT();
        ?>

    </body>
</html>
