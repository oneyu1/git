<?php
    //SQL接続するメソッド
    function connect2MySQL(){
        try{
            $pdo = new PDO('mysql:host=localhost;dbname=kagoyume_db;charset=utf8','isshiki','rel8Asd');
            //SQL実行時のエラーをtry-catchで取得できるように設定
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die('DB接続に失敗しました。次記のエラーにより処理を中断します:'.$e->getMessage());
        }
    }
    
    //mysqlより入力されたユーザネームとパスワードを照合しログインする関数
        function login($name,$password){
        $login_db = connect2MySQL();
        
        
        $login_sql = "SELECT userID,name FROM user_t WHERE name = :name AND password = :password";
        
        $login_query = $login_db->prepare($login_sql);
        
        $login_query->bindValue(':name',$name);
        $login_query->bindValue(':password',$password);
        try{
            $login_query->execute();
        } catch (PDOException $e) {
            $login_query=null;
            return $e->getMessage();
        }
        return $login_query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    //mysqlへユーザデータをインサートする関数
    function insert($name,$pass,$mail,$address){
        $insert_db = connect2MySQL();
        
        //IDとパスワードの重複登録は考慮していない。もしするならば一旦nameでSELECTをかけてテーブルになければtrueのメソッドを構築する。
        $insert_sql ="INSERT INTO user_t(name,password,mail,address,newDate)VALUES(:name,:pass,:mail,:address,:newDate)";
        
        $datetime= new DateTime();
        $date = $datetime->format('Y-m-d h:i:s');
        
        $insert_query = $insert_db->prepare($insert_sql);
        
        $insert_query->bindValue(':name',$name);
        $insert_query->bindValue(':pass',$pass);
        $insert_query->bindValue(':mail',$mail);
        $insert_query->bindValue(':address',$address);
        $insert_query->bindValue(':newDate',$date);
        
        try{
            $insert_query->execute();
        }catch (PDOException $e){
            $insert_db = null;
            return $e->getMessage();
        }
        $insert_db=null;
        return null;
    }

    
    function insert_buy($type){
        $insert_db = connect2MySQL();
        $datetime= new DateTime();
        $date = $datetime->format('Y-m-d h:i:s');
        for($i=1;$i<=$_SESSION['i'];$i++){
        $insert_sql = "insert into buy_t(userID,itemCode,type,buyDate)VALUES";
        $insert_sql .= "(:userID,:itemCode,1,:date);";
        $insert_query = $insert_db->prepare($insert_sql);
            $insert_query->bindValue(':userID',$_SESSION['userID']);
            $insert_query->bindValue(':itemCode',$_SESSION["cart"][$i]);
            $insert_query->bindValue(':date',$date);
            try{
                $insert_query->execute();
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }
    
    function outputuser(){
        $db = connect2MySQL();
        $sql = "select name,password,mail,address,total,newDate from user_t;";
        $que = $db->prepare($sql);
        try{
        echo "test";
        $que->execute();
        
        }catch (PDOException $e){
            $insert_db = null;
            return $e->getMessage();
        }
        return $que->fetchAll(PDO::FETCH_ASSOC);
        $insert_db=null;
        return null;
    }

    
/* データベースアクセス系のユーザー定義関数を格納する
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

