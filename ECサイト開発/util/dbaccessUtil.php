<?php

//SQL接続するメソッド
function connect2MySQL() {
    try {
        //Xdomainサーバにあるホスト、ユーザ、パスは別です。
        //ローカル環境のパス
        //$pdo = new PDO('mysql:dbname=kagoyume_db;host=localhost', 'isshiki', 'rel8Asd');
        $pdo = new PDO('mysql:dbname=ymytest_kagoyume;host=mysql1.php.xdomain.ne.jp', 'ymytest_isshiki', 'rel8Asd1');
        //SQL実行時のエラーをtry-catchで取得できるように設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die('DB接続に失敗しました。次記のエラーにより処理を中断します:' . $e->getMessage());
    }
}

//mysqlより入力されたユーザネームとパスワードを照合しログインする関数
function login($name, $password) {
    $login_db = connect2MySQL();

    $login_sql = "SELECT userID,name,deleteFlg FROM user_t WHERE name = :name AND password = :password";

    $login_query = $login_db->prepare($login_sql);

    $login_query->bindValue(':name', $name);
    $login_query->bindValue(':password', $password);
    try {
        $login_query->execute();
    } catch (PDOException $e) {
        $login_query = null;
        return $e->getMessage();
    }
    return $login_query->fetchAll(PDO::FETCH_ASSOC);
}

//mysqlへユーザデータをインサートする関数
function insert($name, $pass, $mail, $address) {
    $insert_db = connect2MySQL();

    //IDとパスワードの重複登録は考慮していない。もしするならば一旦nameでSELECTをかけてテーブルになければtrueのメソッドを構築する。
    $insert_sql = "INSERT INTO user_t(name,password,mail,address,newDate)VALUES(:name,:pass,:mail,:address,:newDate)";

    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d h:i:s');

    $insert_query = $insert_db->prepare($insert_sql);

    $insert_query->bindValue(':name', $name);
    $insert_query->bindValue(':pass', $pass);
    $insert_query->bindValue(':mail', $mail);
    $insert_query->bindValue(':address', $address);
    $insert_query->bindValue(':newDate', $date);

    try {
        $insert_query->execute();
    } catch (PDOException $e) {
        $insert_db = null;
        return $e->getMessage();
    }
    $insert_db = null;
    return null;
}

//購入情報をデータベースに挿入
function insert_buy($type) {
    $insert_db = connect2MySQL();
    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d h:i:s');
    for ($i = 1; $i <= $_SESSION['i']; $i++) {
        $insert_sql = "insert into buy_t(userID,itemCode,type,buyDate)VALUES";
        $insert_sql .= "(:userID,:itemCode,:type,:date);";
        $insert_query = $insert_db->prepare($insert_sql);
        $insert_query->bindValue(':userID', $_SESSION['userID']);
        $insert_query->bindValue(':itemCode', $_SESSION["cart"][$i]);
        $insert_query->bindValue(":type", $type);
        $insert_query->bindValue(':date', $date);
        try {
            $insert_query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

function total($total) {
    $db = connect2MySQL();
    $sql = "update user_t set total = total + :total where userID = :userID";
    $que = $db->prepare($sql);
    $que->bindValue(":userID", $_SESSION["userID"]);
    $que->bindValue(":total", $total);
    try {
        $que->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

//ユーザデータを出力
function outputuser() {
    if (isset($_SESSION['userID'])) {
        $db = connect2MySQL();
        $sql = "select name,password,mail,address,total,newDate from user_t where userID = :userID";
        $que = $db->prepare($sql);
        $que->bindValue(":userID", $_SESSION["userID"]);
        try {
            $que->execute();
        } catch (PDOException $e) {
            $que = null;
            return $e->getMessage();
        }
        return $que->fetchAll(PDO::FETCH_ASSOC);
        $que = null;
        return null;
    } else {
        echo "ログアウトされています。";
    }
}

function deletedb() {
    $db = connect2MySQL();
    $sql = "update user_t set deleteFlg = 1 where userID = :userID";
    $que = $db->prepare($sql);
    $que->bindValue(":userID", $_SESSION["userID"]);
    try {
        $que->execute();
    } catch (PDOException $e) {
        $que = null;
        return $e->getMessage();
    }
    $que = null;
    return null;
}

function buyhistory() {
    $db = connect2MySQL();
    $sql = "select itemCode,type,buyDate from buy_t where userID = :userID;";
    $que = $db->prepare($sql);
    $que->bindValue(":userID", $_SESSION["userID"]);
    try {
        $que->execute();
    } catch (Exception $e) {
        $que = null;
        return $e->getMessage();
    }
    return $que->fetchAll(PDO::FETCH_ASSOC);
    $que = null;
    return null;
}

function update_user($name, $pass, $mail, $address) {
    $insert_db = connect2MySQL();

    //IDとパスワードの重複登録は考慮していない。もしするならば一旦nameでSELECTをかけてテーブルになければtrueのメソッドを構築する。
    //もしくはデータベースで重複判断をする。
    $insert_sql = "update user_t set name = :name,password = :pass,mail = :mail,address = :address ,newDate = :newDate where userID = :userID";

    $datetime = new DateTime();
    $date = $datetime->format('Y-m-d h:i:s');

    $insert_query = $insert_db->prepare($insert_sql);

    $insert_query->bindValue(':name', $name);
    $insert_query->bindValue(':pass', $pass);
    $insert_query->bindValue(':mail', $mail);
    $insert_query->bindValue(':address', $address);
    $insert_query->bindValue(':newDate', $date);
    $insert_query->bindValue(":userID", $_SESSION["userID"]);

    try {
        $insert_query->execute();
    } catch (PDOException $e) {
        $insert_db = null;
        return $e->getMessage();
    }
    $insert_db = null;
    return null;
}

/* データベースアクセス系のユーザー定義関数を格納する
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

