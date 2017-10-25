<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php session_start();?>

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
                    //ログインの時はログアウト、ログアウト時はログイン表示させる関数。ログイン処理、ログアウト処理自体は飛んだあとに行う。
                    echo LOGINOUT();
                    ?>
                </div>
            </div>
        </div>
        <div id = "body-bk">
            <div id = "body">
                <?php
                echo "このサービスは、そんなフラストレーションを解消するために生まれた、<br>

                『金銭取引が絶対に発生しない』<br>
                『いくらでも、どんなものでも購入できる(気分になれる)』<br>
                『ECサイト』<br>

                です。<br>";

                echo "スキル確認用のデモとして作成されています。<br>";
                echo "長期更新がない場合広告が入ります。ご了承下さい。<br>";
                ?>

                <?php
                ?>
                <form action ="<?php echo SEARCH ?>" method="GET">
                    商品検索:<input type="text" name="query">
                    <input hidden="text" name="category_id" value="1">
                    <input type="submit">

                </form>
                <?php
//$_SESSIONにnameが格納されている場合(ログインしている場合)マイデータを表示させる。


                /* このシステムの簡単な説明が記載されている。テキストは自由
                  キーワード検索フォームが設置されている。検索の遷移先はsearchで、GETメソッド。未入力ならエラーを表示
                 * フォームの再送信が必要なページは設定が必要
                 * 
                 */
                ?>
            </div>
        </div>

    </body>

</div>
</html>
