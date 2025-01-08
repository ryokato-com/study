<?php
 
// エラーメッセージと不正アクセスフラグ
/*
$error_mes = "";
$noindexaccess = true;
 
// メアドに表示する名前
define('WEBMST_NAME', '株式会社フュージョンズホールディングス');
// お問い合わせ用メアド
define('WEBMST_MAIL', 'info@fusionzhld.co.jp');
// 送信先メールアドレス
//$mailto = WEBMST_MAIL;
//$mailto = 'adg.jmp18.11@gmail.com';
$mailto = 'ise@kuwasan.jp';
*/

include('form_control.php');

#--------------------------------------------------------------
# 全体のコントロール
#--------------------------------------------------------------
switch($_POST["action"]):

case "submit":
/////////////////////////////////////////////////////////////////////////////
//　メール送信処理と完了画面を表示
//  送信完了ページに行かない場合「case "submit"」を表示
    include('form_check.php');
    if(!$error_mes){
        include('form_send.php');
        include('form_thanks.php');
    }
    else{
        die("<p>エラーが発生しました。<br />もう一度送信しなおしてください。</p>");
    }
    break;
case "confirm":
/////////////////////////////////////////////////////////////////////////////
// エラーがあれば再入力、なければ確認画面表示
     
    include('form_check.php');
    if($error_mes):
        include('form_input.php');
    else:
        include('form_confirm.php');
    endif;
 
    break;
default:
/////////////////////////////////////////////////////////////////////////////
// 新規入力画面を表示
 
    include('form_input.php');
 
endswitch;
 
?>

