<?php require_once '../common/dbaccesUtil.php'; ?>
<?php require_once '../common/scriptUtil.php'; ?>

<?php 
$output_db = connect2MySQL();

//$sql文
//bindValueする時にSTR型で宣言すると''をオートでつけるため:**に''を必要としない
$sql ="select id, name, birth, kind, newDate from user where name like :name or birth = :birth or kind = :kind;";

//prepare
$output_query = $output_db->prepare($sql);

//GETの値を変数へ入力
$name = filter_input(INPUT_GET,'Name');
$birth = filter_input(INPUT_GET,'year')."-".filter_input(INPUT_GET,'month')."-".filter_input(INPUT_GET,'day');
$kind = filter_input(INPUT_GET,'rdoSample');

$output_query -> bindValue(":name",$name, PDO::PARAM_STR);
$output_query -> bindValue(":birth",$birth, PDO::PARAM_STR);
$output_query -> bindValue(":kind",$kind, PDO::PARAM_STR);

$output_query->execute();

$rowcount =0;

while($result = $output_query ->fetch(PDO::FETCH_ASSOC)){
    ?>
    <form action="insert_result.php" method="post">
    <a href="http://localhost/PhpProject1/app/app/result_detail.php"> 
    <input type="hidden" name="ID" value="<?php echo $result['id']?>">
    <?php
    echo $result['name']; ?></a></form><?php //リンクさせてresult_detail.phpへ飛ばす。
    echo $result['birth'];
    echo $result['kind'];
    echo $result['newDate']."<br>";
    $rowcount++;
}
if($rowcount == 0){
    echo "データがありません";
}

$output_db = null;


//検索結果をID昇順でテーブル型
//名前(部分一致)、生年、種別、登録日
//nameクリック可 result_detail.phpへ飛ばす
//検索で何も入力されなかった時は全件表示する。