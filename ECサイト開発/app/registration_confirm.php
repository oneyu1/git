<?php require_once '../util/defineUtil.php'; ?>
<?php require_once '../util/dbaccessUtil.php'; ?>
<?php require_once '../util/scriptUtil.php'; ?>

<?php
session_start();

$confirm_values = array(
    'name' => bind_p2s('name'),
    'pass' => bind_p2s('pass'),
    'mail' => bind_p2s('mail'),
    'address' => bind_p2s('address')
);

if(!in_array(null,$confirm_values,true)){
    ?>
    <h1>登録確認画面</h1><br>
        名前:<?php echo $confirm_values['name'];?><br>
        パスワード:<?php echo $confirm_values['pass'];?><br>
        メールアドレス:<?php echo $confirm_values['mail'];?><br>
        住所:<?php echo $confirm_values['address']; ?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo REGISTRATION_COMPLETE ?>" method="POST">
            <input type="hidden" name="mode" value="RESULT">
            <input type="submit" name="yes" value="はい">
        </form>
        <?php
    }else {
        ?>
        <h1>入力項目が不完全です</h1><br>
        再度入力を行ってください<br>
        <h3>不完全な項目</h3>
        <?php
        
        foreach ($confirm_values as $key => $value){
            if($value == null){
                if($key == 'name'){
                    echo '名前';
                }
                if($key == 'pass'){
                    echo 'pass';
                }
                if($key == 'mail'){
                    echo 'mail';
                }
                if($key == 'address'){
                    echo 'address';
                }
            echo 'が未記入です。<br>';
            }
        }
        ?>
        <?php //データリターン ?> 
        <form action="<?php echo REGISTRATION ?>" method="POST">
            <input type="hidden" name="mode" value="REINPUT" >
            <input type="submit" name="no" value= "登録画面に戻る">
        </form>
        <?php
        }
        

/* 
 * フォームで入力された文字や選択を表示し、「上記の内容で登録いたします。よろしいですか？」と表示。 「はい」でregistration_complete「いいえ」でregistrationに値を保持したまま(戻った時にフォーム入力済みになっている)遷移
もし入力が不足していた場合はどの項目のデータが不足しているのかを表示。insertに値を保持したまま遷移するリンクを表示
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo LOGINOUT(); ?>