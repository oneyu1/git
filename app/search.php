<?php require_once '../common/dbaccesUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<form action="search_result.php" method="get">
名前:<input type="text" name= "Name" value = "<?php echo filter_input(INPUT_POST,'Name')?>" ><br>
生年月日:<select name="year" value="<?php echo filter_input(INPUT_POST,'year')?>">
              <?php optionLoop('1950', date('Y'));?>
              </select>
              年
              <select name="month" value="<?php echo filter_input(INPUT_POST,'month')?>">
              <?php optionLoop('1', '12');?>
              </select>
              月
              <select name="day" value="<?php echo filter_input(INPUT_POST,'day')?>">
              <?php optionLoop('1', '31');?>
              </select>
              日
              <?php
              function optionLoop($start, $end){
              	for($i = $start; $i <= $end; $i++){
              		echo "<option value=\"{$i}\">{$i}</option>";
              	}
              }
              ?>
              <br>
種別:・エンジニア<input type="radio" name="rdoSample" value= "エンジニア" <?php if(filter_input(INPUT_POST,'rdoSample') == "エンジニア" ) :?>checked<?php endif ?>>
・営業<input type="radio" name="rdoSample" value= "営業" <?php if(filter_input(INPUT_POST,'rdoSample') == "営業" ) :?>checked<?php endif ?>>
・その他<input type="radio" name="rdoSample" value= "その他" <?php if(filter_input(INPUT_POST,'rdoSample') == "その他" ) :?>checked<?php endif ?>><br>
<input type="submit" name="btnSubmit"><br>
 </form>