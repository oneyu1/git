<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>登録完了画面</title>
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
                if (!$_POST['mode'] == "RESULT") {
                    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
                    top();
                } else {
                    //一旦sessionで受け取り、nullで帳消し。スマートではない。
                    $name = $_SESSION['name'];
                    $pass = $_SESSION['pass'];
                    $mail = $_SESSION['mail'];
                    $address = $_SESSION['address'];

                    parsonal_null();

                    $result = insert($name, $pass, $mail, $address);

                    if (!isset($result)) {
                        ?>
                        名前:<?php echo $name; ?><br>
                        パスワード:<?php echo $pass; ?><br>
                        メールアドレス:<?php echo $mail; ?><br>
                        住所:<?php echo $address; ?><br>

                        上記の内容で登録しました。

                        <h1><a href="<?php echo TOP_PHP ?>" >トップに戻る</a></h1>
                        <?php
                    } else {
                        echo "登録名が重複しているか、未確認のエラーです。";
                    }
                    //一旦sessionで受け取り、nullで帳消し。スマートではない。
                    parsonal_null();
                }
                ?>
            </div>
        </div>
