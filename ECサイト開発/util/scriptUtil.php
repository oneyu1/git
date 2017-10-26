<?php
require_once '../util/defineUtil.php';
require_once '../util/common.php';

/* よく使うユーザー定義関数をまとめておく
  例えば、トップへのリンクを挿入する処理をまとめておけば、すべてのページでこのリンクを使用するときにそのユーザー定義関数を挿入するだけでよくなる
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function nomalLOGINOUT() {
    if (empty($_COOKIE['Loginstate'])) {
        ?> <a href=login.php>ログイン</a> <?php
    } else {
        ?> <a href=login.php>ログアウト</a> <?php
    }
    //ログインステートfalseの時に表示、trueの時ログアウト、買い物かご、ようこそ $nameさんを表示
}

function LOGINOUT() {
    if (empty($_COOKIE['Loginstate'])) {
        ?> <a href=login.php style="color:#ffffff;text-decoration:none">ログイン</a> <?php
    } else {
        ?> <a href=login.php style="color:#ffffff;text-decoration:none">ログアウト</a> <?php
    }
    //ログインステートfalseの時に表示、trueの時ログアウト、買い物かご、ようこそ $nameさんを表示
}

function logindec() {
    if (isset($_POST["url"])) {
        ?><a href=<?php echo $_POST['url']; ?>>元いたページへ戻る</a> <?php
    } else {
        ?><a href=<?php echo $_SERVER['HTTP_REFERER']; ?>>元いたページへ戻る</a> <?php
    }
}

function cart() {
    ?>
    <a href= " <?php echo "../app/cart.php" ?>" style="color:#ffffff;text-decoration:none">カート</a>
    <?php
}

function top() {
    ?>
    <a href= " <?php echo "../app/top.php" ?>">トップに戻る</a>
    <?php
}

/**
 * フォームの再入力時に、すでにセッションに対応した値があるときはその値を返却する
 * @param type $name formのname属性
 * @return type セッションに入力されていた値
 */
function form_value($name) {
    if (isset($_POST['mode']) && $_POST['mode'] == 'REINPUT') {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }
}

/**
 * ポストからセッションに存在チェックしてから値を渡す。
 * 二回目以降のアクセス用に、ポストから値の上書きがされない該当セッションは初期化する
 * @param type $name
 * @return type
 */
//セッションに書き込んでPOSTに返すメソッド
//2度目に呼び出した時はセッションを開放する。
function bind_p2s($name) {
    if (!empty($_POST[$name])) {
        $_SESSION[$name] = $_POST[$name];
        return $_POST[$name];
    } else {
        $_SESSION[$name] = null;
        return null;
    }
}

function getitem() {
    $item = array();
    $itemcode = $_GET['itemcode'];
    $url = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
    $xml = simplexml_load_file($url);
    //Result/Hit　検索された結果。アロー演算子を用いる。
    $item = $xml->Result->Hit;
    //var_dumpで要素をチェック、帰ってきた値を見てアロー演算子でクラスを指定する。
}

function sessionroop($SNo) {
    $total = 0;
    for ($i = 1; $i <= $SNo; $i++) {
        if (isset($SNo)) {
            itemserch($i);
            $total = $total + $_SESSION['Price'][$i];
        }
    }
    return $total;
}

//SESSIONに格納されている['cart']['i']配列を取り出す。
function itemserch($i) {
    $itemcode = $_SESSION['cart'][$i];
    echo " ";
    $appid = "dj00aiZpPXNudVQ4eEtLUlZmUCZzPWNvbnN1bWVyc2VjcmV0Jng9ZjQ-";
    $rss = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
    $data = curl($rss);
    $xml = simplexml_load_string($data);
    $item = $xml->Result->Hit; //メソッド化？
    ?><tr>

        <td><?php echo $_SESSION['Name'][$i]; ?></td>
        <td><?php echo $_SESSION['Price'][$i] . "円"; ?></td>
    </tr>
    <?php
}

function itemcode_select($itemcode) {
    $appid = "dj00aiZpPXNudVQ4eEtLUlZmUCZzPWNvbnN1bWVyc2VjcmV0Jng9ZjQ-";
    $rss = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
    $data = curl($rss);
    $xml = simplexml_load_string($data);
    $item = $xml->Result->Hit;
    foreach ($item as $key) {
        ?><td><?php echo h($key->Name); ?></td><?php
    }
}

function kagoyume() {
    ?><a href=top.php style="color:#ffffff;text-decoration:none">かごゆめ　スキル確認用ECサイト</a> <?php
}

function mydata() {
    if (isset($_COOKIE['Loginstate'])) {
        ?><a href=../app/my_data.php style="color:#ffffff;text-decoration:none">マイデータ</a><?php
    }
}

function curl($rss) {
    $cp = curl_init();

    curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($cp, CURLOPT_HEADER, false);
    curl_setopt($cp, CURLOPT_URL, $rss);
    curl_setopt($cp, CURLOPT_TIMEOUT, 60);
    $data = curl_exec($cp);
    curl_close($cp);
    return $data;
}

function item_foreach($hits) {
    foreach ($hits as $hit) {
        //urlの飛ばし先をitemへ。商品IDをGETで渡す。   
        ?>
        <tr>
            <td><a class ="img" href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"> <img src="<?php echo h($hit->Image->Medium); ?>"/></a></td>
            <td><a class ="title" href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"><?php echo h($hit->Name); ?></a></td>
            <td><?php echo h($hit->Price) . "円"; ?></td>
        </tr>
        <?php
    }
}

function item_reqest($query, $appid) {
    if ($query != "") {
        $sort = "-score";
        $category_id = 1;
        //rawurlencode　unicode等で書かれた文字列をURLで読み取れる値にエンコード
        $query4url = rawurlencode($query);
        $sort4url = rawurlencode($sort);
        //appid=アプリケーショーンID query=検索内容
        $rss = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url&hits=10";

        $data = curl($rss);

        try {
            $xml = simplexml_load_string($data);
        } catch (Exception $e) {
            
        }

        if ($xml["totalResultsReturned"] != 0) {
            return $xml->Result->Hit;
        }
    }
}

function parsonal_null() {
    $_SESSION['name'] = null;
    $_SESSION['pass'] = null;
    $_SESSION['mail'] = null;
    $_SESSION['address'] = null;
}

function item_add_get($appid) {
    $itemcode = $_GET['itemcode'];
    $rss = "https://shopping.yahooapis.jp/ShoppingWebService/V1/itemLookup?appid=$appid&itemcode=$itemcode";
    $data = curl($rss);
    $xml = simplexml_load_string($data);
    //Result/Hit　検索された結果。アロー演算子を用いる。
    $item = $xml->Result->Hit;
    //保存するのはitemcode、表示するのはitemcodeを利用した商品名
    //配列iにしてセッションに保存。

    if (!isset($_SESSION['i'])) {
        $_SESSION['i'] = 1;
    } else {
        $_SESSION['i'] = ++$_SESSION['i'];
    }

    $i = $_SESSION['i'];

    $_SESSION['cart'][$i] = $_GET["itemcode"];
    foreach ($item as $key) {
        ?>
        <td><p><img src="<?php echo h($key->Image->Small); ?>"/></p></td>
        <td><?php echo $_SESSION['Name'][$i] = h($key->Name); ?></td>
        <td><?php echo $_SESSION['Price'][$i] = h($key->Price); ?>円</td>

        <?php
    }
}
