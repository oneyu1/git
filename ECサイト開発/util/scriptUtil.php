<?php
require_once '../util/defineUtil.php';

/* よく使うユーザー定義関数をまとめておく
例えば、トップへのリンクを挿入する処理をまとめておけば、すべてのページでこのリンクを使用するときにそのユーザー定義関数を挿入するだけでよくなる
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function LOGINOUT(){
    if(empty($_COOKIE['Loginstate'])){
        ?> <form action="login.php" method="POST">
            <input type ="hidden" name ="trans" value ="<?php echo$transition?>"> 
            <a href=login.php >ログイン</a>
        </form>
        <?php

    }else{
        return "<a href='".LOGIN."'>ログアウト</a>";
    }    
    //ログインステートfalseの時に表示、trueの時ログアウト、買い物かご、ようこそ $nameさんを表示
}

function logindec(){
    if (isset($_POST["url"])) {  
            ?><a href=<?php echo $_POST['url']; ?>>元いたページへ戻る</a> <?php
        }else{
            ?><a href=<?php echo $_SERVER['HTTP_REFERER']; ?>>元いたページへ戻る</a> <?php
        }
}

function top(){
            ?>
            <a href= " <?php echo "../app/top.php" ?>">トップに戻る</a>
            <?php
}
 
/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
function form_value($name){
    if(isset($_POST['mode']) && $_POST['mode']=='REINPUT'){
        if(isset($_SESSION[$name])){
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */

//セッションに書き込んでPOSTに返すメソッド
//
function bind_p2s($name){
    if(!empty($_POST[$name])){
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    }else{
        $_SESSION[$name] = null;
        return null;
    }
}