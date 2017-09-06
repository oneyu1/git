<?php require_once '../common/dbaccesUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<html>
    <head>
        <title>
            データベースインプット・アウトプット
        </title>
    </head>
    <body>
        <?php
        //データベース接続データ
        $insert_db = connect2MySQL();
        
        //sql文
        $sql = "insert into user(name,birth,kind,tell,appeal,newDate)values(:name,:birth,:kind,:tell,:appeal,:newDate);";
        
        //接続データをprepare
        $pdo_st = $insert_db->prepare($sql);
        
        //入力データを変数定義
        $name = filter_input(INPUT_POST,'Name');
        $birth = filter_input(INPUT_POST,'year')."-".filter_input(INPUT_POST,'month')."-".filter_input(INPUT_POST,'day');
        $kind = filter_input(INPUT_POST,'rdoSample');
        $tell = filter_input(INPUT_POST,'tell');
        $appeal = filter_input(INPUT_POST,'appeal');
        
        //入力データをsql文に挿入
        $pdo_st -> bindValue(":name",$name, PDO::PARAM_STR);
        $pdo_st -> bindValue(':birth',$birth, PDO::PARAM_STR);
        $pdo_st -> bindValue(':kind',$kind, PDO::PARAM_STR);
        $pdo_st -> bindValue(':tell',$tell, PDO::PARAM_STR);
        $pdo_st -> bindValue(':appeal',$appeal, PDO::PARAM_STR);
        $pdo_st -> bindValue(':newDate',date("Y/m/d"), PDO::PARAM_STR);
        
        //データベースにsql文実行
        $pdo_st->execute();
         
        ?>
        
        <?php
        $insert_db = null;
        ?>
        <?php
            //登録リターン
            echo "下記内容で登録しました<br>";
            echo "名前:".filter_input(INPUT_POST,'Name')."<br>";
            echo "生年月日:".filter_input(INPUT_POST,'year')."年";
            echo filter_input(INPUT_POST,'month')."月";
            echo filter_input(INPUT_POST,'day')."日"."<br>";
            echo "種別:".filter_input(INPUT_POST,'rdoSample')."<br>";
            echo "電話番号:".filter_input(INPUT_POST,'tell')."<br>";
            echo "自己紹介:".filter_input(INPUT_POST,'appeal')."<br><br>";
        ?>
        
        <?php echo return_top(); ?>
        
        
    </body>
    
</html>