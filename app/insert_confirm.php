<?php require_once '../common/dbaccesUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<html>
  <head>
    <title>大規模テスト</title>
  </head>
  <body>
    <?php
            //入力表示確認
            echo "名前:".filter_input(INPUT_POST,'Name')."<br>";
            echo "生年月日:".filter_input(INPUT_POST,'year')."年";
            echo filter_input(INPUT_POST,'month')."月";
            echo filter_input(INPUT_POST,'day')."日"."<br>";
            echo "種別:".filter_input(INPUT_POST,'rdoSample')."<br>";
            echo "電話番号:".filter_input(INPUT_POST,'tell')."<br>";
            echo "自己紹介:".filter_input(INPUT_POST,'appeal')."<br><br>";
            ?>
           <?php
           
           //未入力判定
           if (filter_input(INPUT_POST,'Name') == null){echo "名前が足りません<br>";}
           if (filter_input(INPUT_POST,'year') == null){echo "年が足りません<br>";}
           if (filter_input(INPUT_POST,'month') == null){echo "月が足りません<br>";}
           if (filter_input(INPUT_POST,'day') == null){echo "日が足りません<br>";}
           if (filter_input(INPUT_POST,'rdoSample') == null){echo "種別が足りません<br>";}
           if (filter_input(INPUT_POST,'tell') == null){echo "電話番号が足りません<br>";}
           if (filter_input(INPUT_POST,'appeal') == null){echo "自己紹介が足りません<br>";}
           ?>
           
           <!--入力充足確認-->
             <?php if (filter_input(INPUT_POST,'Name') != null && filter_input(INPUT_POST,'rdoSample') != null && filter_input(INPUT_POST,'tell') != null && filter_input(INPUT_POST,'appeal') != null) : ?>
           <!--true-->
            上記の内容で登録します。よろしいですか？<br>
            
            <div style="display:inline-flex">
            <!--insert_result.phpへの送信-->
            
            <form action="insert_result.php" method="post">
            
            <input type="hidden" name = "Name" value= <?php echo filter_input(INPUT_POST,'Name')?>>    
            <input type="hidden" name="rdoSample" value="<?php echo filter_input(INPUT_POST,'rdoSample')?>">
            <input type="hidden" name="year" value="<?php echo filter_input(INPUT_POST,"year")?>">
            <input type="hidden" name="month" value="<?php echo filter_input(INPUT_POST,"month")?>">
            <input type="hidden" name="day" value="<?php echo filter_input(INPUT_POST,"day")?>">
            <input type="hidden" name="tell" value="<?php echo filter_input(INPUT_POST,'tell')?>">
            <input type="hidden" name="appeal" value="<?php echo filter_input(INPUT_POST,'appeal')?>">
            <input type = "submit" value = "はい">&emsp;
            </form>
            
            <!--insert.phpへのリターン-->
            <form action="insert.php" method="post">
            <input type="hidden" name = "Name" value= "<?php echo filter_input(INPUT_POST,'Name')?>">
            <input type="hidden" name="rdoSample" value="<?php echo filter_input(INPUT_POST,'rdoSample')?>">
            <input type="hidden" name="year" value="<?php echo filter_input(INPUT_POST,"year")?>">
            <input type="hidden" name="month" value="<?php echo filter_input(INPUT_POST,"month")?>">
            <input type="hidden" name="day" value="<?php echo filter_input(INPUT_POST,"day")?>">
            <input type="hidden" name="tell" value="<?php echo filter_input(INPUT_POST,'tell')?>">
            <input type="hidden" name="appeal" value="<?php echo filter_input(INPUT_POST,'appeal')?>">
            <input type = "submit" value = "いいえ">
            </form>
            </div>
            <br>
      
            <?php else :?>
            <!--false-->
            <form action="insert.php" method="post">
            <input type="hidden" name = "Name" value= "<?php echo filter_input(INPUT_POST,'Name')?>">
            <input type="hidden" name="rdoSample" value="<?php echo filter_input(INPUT_POST,'rdoSample')?>">
            <input type="hidden" name="tell" value="<?php echo filter_input(INPUT_POST,'tell')?>"><br>
            <input type="hidden" name="year" value="<?php echo filter_input(INPUT_POST,"year")?>">
            <input type="hidden" name="month" value="<?php echo filter_input(INPUT_POST,"month")?>">
            <input type="hidden" name="day" value="<?php echo filter_input(INPUT_POST,"day")?>">
            <input type="hidden" name="appeal" value="<?php echo filter_input(INPUT_POST,'appeal')?>"><br>
            <input type = "submit" value = "戻る">
            </form>
            <?php endif; ?>
            
            <?php 
            echo return_top();
            ?>

</body>
</html>
