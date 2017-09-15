<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>

    <?php
    
    //購入データを受け取り、データベースに記載。
    session_start();
    $_SESSION['i'];
    if(isset($_COOKIE['Loginstate']) && isset($_SESSION['i'])){
        $total =& sessionroop($_SESSION['i']);
        insert_buy($_POST['radio']);
        echo "合計".$total.'円';
        //sql buy_tに追加。$_SESSION['i']回そのまま回すのは重くなるので一括でinsert出来るようにする。
        //buyID(AUTO) userID(user) itemCode(コード) type(発送方法) buyData(現在時刻)
    }

    //insert_buy($userID,$itemCode,$type,$buyDate);
    
    
/* 
 * 購入データを保存
総購入金額を更新
「購入が完了しました」と表示
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>