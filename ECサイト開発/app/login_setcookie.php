<?php
session_start();
$sessionID = session_regenerate_id(true);
setcookie('Loginstate', true, time() + 3000);
setcookie($sessionID, time() + 3000);

//デリートフラグが立っていないアカウントであった場合
//セッションにIDと名前を保存しクッキーをスタート。
echo "ログインしました。ようこそ";
echo $_SESSION['name'];
echo "さん<br>";
echo "1秒後topへ戻ります";

?> <meta http-equiv="refresh"content="1; URL=top.php"> <?php
//Scocckieをスタートさせる。


