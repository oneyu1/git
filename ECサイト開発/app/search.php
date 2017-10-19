<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>

<?php
if (empty($_GET['query'])) {
    echo "未入力です<br>";
    logindec();
} else {
    $hits = array();
    $query = !empty($_GET["query"]) ? $_GET["query"] : ""; //queryに格納
    $sort = !empty($_GET["sort"]) && array_key_exists($_GET["sort"], $sortOrder) ? $_GET["sort"] : "-score";
    $category_id = ctype_digit($_GET["category_id"]) && array_key_exists($_GET["category_id"], $categories) ? $_GET["category_id"] : 1;

    if ($query != "") {
        $query4url = rawurlencode($query);
        $sort4url = rawurlencode($sort);
        //appid=アプリケーショーンID query=検索内容 
        $url = "http://shopping.yahooapis.jp/ShoppingWebService/V1/itemSearch?appid=$appid&query=$query4url&category_id=$category_id&sort=$sort4url&hits=10";
        $xml = simplexml_load_file($url);
        if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
            $hits = $xml->Result->Hit;
        }
    }
    ?>
    <html>
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
            <title>ショッピングデモサイト - 商品を検索する</title>
            <link rel="stylesheet" type="text/css" href="../css/prototype.css"/>
        </head>
        <body>
            <h1><a href="<?php SEARCH ?>">ショッピングデモサイト - 商品を検索する</a></h1>
            <form action="<?php SEARCH ?>" class="Search">
                <?php /*   表示順序:
                  <select name="sort">
                  <?php foreach ($sortOrder as $key => $value) { ?>
                  <option value="<?php echo h($key); ?>" <?php if($sort == $key) echo "selected=\"selected\""; ?>><?php echo h($value);?></option>
                  <?php } ?>
                  </select>
                  キーワード検索：
                  <select name="category_id">
                  <?php foreach ($categories as $id => $name) { ?>
                  <option value="<?php echo h($id); ?>" <?php if($category_id == $id) echo "selected=\"selected\""; ?>><?php echo h($name);?></option>
                  <?php } ?>
                  </select> */ ?>
                <input type="text" name="query" value="<?php echo h($query); ?>"/>
                <input type="submit" value="Yahooショッピングで検索"/>
            </form>

            <?php
            //$hitsの配列数は$urlにて受け取る。指定しなければデフォルトは20。今回は10。
            foreach ($hits as $hit) {
                ?>
                <?php //urlの飛ばし先をitemへ。商品IDをGETで渡す。 ?>
                <div class="Item">
                    <h4><a href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"><?php echo h($hit->Name); ?></a></h4>
                    <p><a href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"> <img src="<?php echo h($hit->Image->Medium); ?>"/></a><?php echo h($hit->Price) . "円"; ?></p>

                </div>
            <?php } ?>
            <!-- Begin Yahoo! JAPAN Web Services Attribution Snippet -->
            <a href="http://developer.yahoo.co.jp/about">
                <img src="http://i.yimg.jp/images/yjdn/yjdn_attbtn2_105_17.gif" width="105" height="17" title="Webサービス by Yahoo! JAPAN" alt="Webサービス by Yahoo! JAPAN" border="0" style="margin:15px 15px 15px 15px"></a>
            <!-- End Yahoo! JAPAN Web Services Attribution Snippet -->
        </body>
    </html>

    <?php
    /*
     * topから検索により遷移できる。YahooショッピングAPIに直接検索キーワードを渡し、その結果を受け取り＆表示している
      検索キーワード、検索結果数を表示
      縦のリスト型に表示。サムネイルと、その横に商品名、金額が載っている。クリックでitemへ
      結果は上位10件まで
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
    ?>

    <?php
}
echo LOGINOUT();
?>