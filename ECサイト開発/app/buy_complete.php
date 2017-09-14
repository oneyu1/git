<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>

    <?php
    //購入データを受け取り、データベースに記載。
    session_start();
    if(isset($_COOKIE['Loginstate'])){
        if(isset($_SESSION['i'])){
            for($i=1;$i<=$_SESSION['i'];$i++){
                if(isset($_SESSION['cart'][$i])){
                    //scriptUtil
                    itemserch($i);
                    $total = $total + $_SESSION['Price'][$i];
                }
            }
        }
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