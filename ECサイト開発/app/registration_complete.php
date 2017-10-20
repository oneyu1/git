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
                if (!$_POST['mode'] == "RESULT") {
                    echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
                    top();
                } else {

                    $name = $_SESSION['name'];
                    $pass = $_SESSION['pass'];
                    $mail = $_SESSION['mail'];
                    $address = $_SESSION['address'];

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
                        $_SESSION['name'] = null;
                        $_SESSION['pass'] = null;
                        $_SESSION['mail'] = null;
                        $_SESSION['address'] = null;
                    } else {
                        
                    }
                }
//insert()

                /*
                 * プロフィール用のDBに値を挿入。この際、現在時(年日時分)を組み込み関数で取得し、追加。
                  「以上の内容で登録しました。」とregistration_confirmのようにフォームで入力された値を表示
                  「トップページへ戻る」のリンクが、目立つ場所に設置されている
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                top();
                ?>
            </div>
        </div>
