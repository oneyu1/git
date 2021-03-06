<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php' ?>
<?php session_start(); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ログイン</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>


    <body>
        <div id = "body-bk">
            <div id = "body">
                <?php
//クッキーでログインしているかどうか判定。
                if (empty($_COOKIE['Loginstate'])) {
                    //データベース接続
                    //ID
                    if (isset($_POST['name']) && isset($_POST['pass'])) {
                        $name = $_POST['name'];
                        $password = $_POST['pass'];
                    }

                    if (isset($name) && isset($password)) {
                        //.dbaccessUtil
                        $login_profile = login($name, $password);
                        if (empty($login_profile)) {
                            echo "名前が存在しないかパスワードが間違っています";
                        } else {
                            //セッションIDを現在のものと置き換え、ログイン。それまで保持していたセッションはキープする。
                            //
                            //下記、Xdomain環境で動かない為、オミット
                            //$sessionID = session_regenerate_id(true);
                           
                            foreach ($login_profile as $key) {
                                if ($key["deleteFlg"] == 0) {
                                    //デリートフラグが立っていないアカウントであった場合
                                    //セッションにIDと名前を保存しクッキーをスタート。
                                    $_SESSION['userID'] = $key['userID'];
                                    $_SESSION['name'] = $key['name'];

                                    ?>
                                    　<meta http-equiv="refresh"content="0; URL=login_setcookie.php">
                                     <?php
                                } elseif ($key["deleteFlg"] == 1) {
                                    //デリートフラグが1で削除されているアカウントの場合
                                    echo"削除されたuserIDです";
                                    break;
                                }
                            }
                        }
                    }
                    //ログインしていない場合、このifを通す。nameとpassを入力しログインする。データベースに存在する場合、ログイン。

                        ?>
                        <form action="login.php" method="post">
                            ユーザー名:<input type="text" name="name"><br>
                            パスワード:<input type="text" name="pass"><br>
                            <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER']; ?>" name="url">
                            <input type="submit">
                        </form>
                        <a href = "<?php echo REGISTRATION ?>">新規登録</a>
                        <?php
                    ?>

                    <?php
                    //ログインページリターン判定
                    logindec();
                    //ログインしたときにこのページに戻すので戻れるように。
                } else {
                    //ログアウト処理。クッキーとセッションを破棄する。
                    ?>
                    <meta http-equiv="refresh"content="0; URL=logout.php">
                    <?php
                    /*  飛ばし先ログアウト処理
                    echo "ログアウトしました<br>";
                    setcookie('Loginstate', "", time() - 4500);
                    session_destroy();
                    top();
                    logindec();
                    */
                }

                /*
                 * どのページからも遷移できる。ログインしているかいないかで処理が分岐する
                  ログインしていない状態(各ページの「ログイン」というリンクから)で遷移してきた場合は、ユーザー名とパスワードを入力するフォームが表示される。また、「新規会員登録」というリンクも表示される。
                  ログインに成功すると、その情報をログイン状態を管理できるセッションに書き込み、そのまま直前まで閲覧していたページに遷移する
                  ログインしている状態で(各ページの「ログアウト」というリンクから)遷移してきた場合は、ログアウト処理を行う(セッションの破棄、クッキーに保存されたセッションIDを破棄)その後topへ
                  ユーザーデータの削除フラグが1の場合は削除されたユーザーとして処理すること
                 * To change this license header, choose License Headers in Project Properties.
                 * To change this template file, choose Tools | Templates
                 * and open the template in the editor.
                 */
                ?>
                <div id="header-fixed">
                    <div id="header-bk">
                        <div id="header"><?php kagoyume(); ?></div>
                    </div>
                </div>
            </div>
        </div>