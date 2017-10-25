<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>
<?php require_once '../util/common.php'; ?>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>検索画面</title>
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
    </head>
    <body>
        <div id="header-fixed">
            <div id="header-bk">
                <div id="header"><?php kagoyume(); ?></div>
                <div id="header-util">
                    <?php
                    //カートへ飛ぶ関数。購入もここから行う。
                    mydata();
                    //カートへ飛ぶ関数。購入もここから行う。
                    echo cart();
                    //ログインの時はログアウト、ログアウト時はログイン表示させる関数。ログイン処理、ログアウト処理自体は飛んだあとに行う。
                    echo LOGINOUT();
                    ?>
                </div>
            </div>
        </div>
        <div id = "body-bk">
            <?php
//$_get['query']に値がない場合、未入力であることを表示。ログインのページ
            if (empty($_GET['query'])) {
                ?>
                <form action = "<?php SEARCH ?>" class = "Search">
                    <input type = "text" name = "query"/>
                    <input type = "submit" value = "Yahooショッピングで検索"/>
                </form>
                <?php
                echo "未入力です<br>";
            } else {
                //検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                //あらかじめ配列で宣言
                $hits = array();
                //
                $query = !empty($_GET["query"]) ? $_GET["query"] : ""; //queryに格納
                $sort = "-score";
                $category_id = 1;

                if ($query != "") {
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
                    if ($xml["totalResultsReturned"] != 0) {//検索件数が0件でない場合,変数$hitsに検索結果を格納します。
                        $hits = $xml->Result->Hit;
                    }
                }
                ?>
                <form action="<?php SEARCH ?>" class="Search">
                    <input type="text" name="query" value="<?php echo h($query); ?>"/>
                    <input type="submit" value="Yahooショッピングで検索"/>
                </form>
                <table border="1">
                    <tr>
                        <th>画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                    </tr>

                    <?php
                    foreach ($hits as $hit) {
                        ?>
                        <?php //urlの飛ばし先をitemへ。商品IDをGETで渡す。  ?>
                        <tr>
                            <td><a class ="img" href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"> <img src="<?php echo h($hit->Image->Medium); ?>"/></a></td>
                            <td><a class ="title" href="<?php echo "item.php" . "?itemcode=" . h($hit->Code); ?>"><?php echo h($hit->Name); ?></a></td>
                            <td><?php echo h($hit->Price) . "円"; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
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
            logindec();
            top();
            ?>
        </div>
    </body>