<?php
session_start();
setcookie('Loginstate', "", time() - 4500);
session_destroy();
echo "ログアウトしました<br>";
echo "1秒後topへ戻ります";

?> <meta http-equiv="refresh"content="1; URL=top.php"> <?php
