<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php

/* 
 * 「カートに追加」でクッキーやセッションに保存された登録情報が登録古い順に表示される
商品の写真と名前(リンクつき)、金額を表示。
画面下部に全額の合計金額を表示する
「購入する」ボタンあり
各商品には「削除」のリンクあり。このリンクをクリックすることで、カートから商品を削除する
カートの中身はユーザー毎に切り替えられる
ログインしていない状態ならばログインページに遷移、そこでログインに成功した場合、非ログイン状態で「カートに追加」操作をしていた商品はそのユーザー用のカートに移る
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>