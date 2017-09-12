<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

    <?php
        if(empty($_COOKIE['Loginstate'])){
    ?>
    <form action="login.php" method="post">
        ユーザー名:<input type="text" name="name"><br>
        パスワード:<input type="text" name="pass"><br>
        <input type="hidden" value="<?php echo $_SERVER['HTTP_REFERER'];?>" name="url">
        <input type="submit">
    </form>
        <?php
        //データベース接続
        //ID
        if (isset($_POST['name']) && isset($_POST['pass'])){
            $name = $_POST['name'];
            $password = $_POST['pass'];
            //デリートフラグ1の時の判定 後日実装
        }
        
        if(isset($name) && isset($password)){
            //　echo "動きました";
            $login_profile = login($name,$password);
            if(empty($login_profile)){
                echo "nullです";
            } else {
                echo "ログインしました<br>";
                setcookie('Loginstate',true,time() + 3000);
            }
        }
        
         ?>
        <a href="<?php echo REGISTRATION ?>">新規登録</a>

        <?php
        //ログインページリターン判定
        logindec();
 //ログインしたときにこのページに戻すので戻れるように。
    }else{
        echo "ログアウトしました<br>";
        setcookie('Loginstate',"",time() - 4500);
        
        ////ログインページリターン判定
        logindec();
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