<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php';?>

<?php
session_start();
echo $_SESSION["userID"];
$result = buyhistory();
if(isset($result)){
    foreach($result as $value=>$key){
        $itemCode = $key["itemCode"];
        //itemcodeよりアイテム名を参照して表示
        itemcode_select($key["itemCode"]);
        echo "配送方法:";
        if($key["type"] == 1){
            echo "郵便"."<br>";
        }elseif($key["type"] == 2){
            echo "徒歩"."<br>";
        }
        echo "購入日時".$key["buyDate"]."<br><br>";
    }
}
logindec();
/* これまで購入した商品の履歴が見れる
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>