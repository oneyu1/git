<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>かごゆめ</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>
        <div id="header-fixed">
            <div id="header-bk">
                <div id="header"><?php kagoyume(); ?></div>
                <div id="header-util">
                    <?php
                    mydata();
                    cart();
                    echo LOGINOUT();
                    ?>
                </div>
            </div>
        </div>
        <div id = "body-bk">
            <div id = "body">
                <?php
                echo "このサービスは<br>

                『<strong>金銭取引が絶対に発生しない</strong>』<br>
                『いくらでも、どんなものでも<strong>購入できる(気分になれる)</strong>』<br>
                『ECサイト』<br>

                です。<br>";

                echo "スキル確認用のデモとして作成されています。<br>";
                echo "スマートフォンもしくはタブレットからのアクセスだと広告が入ります。ご了承下さい。<br>";
                ?>
                <form action ="<?php echo SEARCH ?>" method="GET">
                    商品検索:<input type="text" name="query">
                    <input hidden="text" name="category_id" value="1">
                    <input type="submit">

                </form>
                <?php
                ?>
            </div>
        </div>
        <footer>
            <a href="https://github.com/oneyu1/git/tree/master/EC%E3%82%B5%E3%82%A4%E3%83%88%E9%96%8B%E7%99%BA">github</a>
        </footer>
    </body>

</div>
</html>
