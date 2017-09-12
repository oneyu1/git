<?php
//define定義 30分

const ROOT_URL ='http://localhost/kagoyume/top.php'; //topディレクトリへのURL
const TOP_PHP ='top.php';               //top.php
const LOGIN = "login.php";              //ログインページへ飛ばす
const LOGOUT ='logout.php';
const REGISTRATION = "registration.php";
const ADD = 'add.php';                  //ADD
const BUY_CONFIRM = 'buy.confirm.php'; // BUY_CONFIRM
const SEARCH = 'search.php';
const REGISTRATION_CONFIRM = 'registration_confirm.php';

const sqlID = "isshiki";               //sqlid
        
/* システム内で使われる具体的な定数(topページなどのURLや、MySQLユーザー名、パスワード)などをまとめて定義しておく場所。ここで定義しておき全.phpでrequireすれば、いちいち変数を宣言する必要がなくなる
const $~~=・・・; という表記のみが記述されている。
 * このシステムの簡単な説明が記載されている。テキストは自由
キーワード検索フォームが設置されている。検索の遷移先はsearchで、GETメソッド。未入力ならエラーを表示
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

