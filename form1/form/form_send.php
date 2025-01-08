<?php
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}

//言語と文字コードの使用宣言
mb_language("uni");
mb_internal_encoding("UTF-8");


#-------------------------------------------------------------------------------------------
# メール送信処理１（お客様への返信メール）
#-------------------------------------------------------------------------------------------
// メール本文
$mailbody = "この度は、".WEBMST_NAME."にお問い合わせいただきまして誠にありがとうございました。
改めて担当者よりご連絡をさせていただきます。
数日たっても返信メールが届かない場合は、お手数ですがお電話でお問合せください。

────────────────────────────────

【ご入力内容】

お名前: $your_name
メールアドレス: $email
電話番号: $tel
ご住所: $address

お問い合わせ内容:
$matter
$message

────────────────────────────────
このメールに心当たりのない場合は、
第三者がメールアドレスを誤って入力された可能性があります。
お手数ですが下記にてお問い合わせください。

tel:027-289-9679
https://garden-one.net/
────────────────────────────────";

// 件名とフッター
$subject = "【自動送信】".WEBMST_NAME."にお問い合わせいただきありがとうございます。";
//$headers = "Reply-To: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "Return-Path: ".WEBMST_MAIL."<".WEBMST_MAIL.">\n";
$headers .= "From:".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";

// メール送信（失敗時：強制終了）
$usrmail_result = mb_send_mail($email,$subject,$mailbody,$headers);
if(!$usrmail_result)die("お客様へのメール送信に失敗しました。<br />\n
                         誠に申し訳ございませんがこちらまでご連絡ください。“".WEBMST_MAIL."”");

#-------------------------------------------------------------------------------------------
# メール送信処理２（送信先は $mailto宛）
#-------------------------------------------------------------------------------------------
// 件名を設定
$subject = "お問い合わせ";

// Headerとbodyとsubjectを設定（送信元はお客様 $email）
$headers = "Reply-To: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "Return-Path: ".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";
$headers .= "From:".mb_encode_mimeheader(WEBMST_NAME)."<".WEBMST_MAIL.">\n";

// メール本文
$mailbody = "".WEBMST_NAME."よりお問い合わせがありました。

────────────────────────────────

お名前: $your_name
メールアドレス: $email
電話番号: $tel
ご住所: $address

お問い合わせ内容:
$matter
$message

────────────────────────────────
";

// メール送信実行
if(!empty($mailto)){
    $sendmail_result = mb_send_mail($mailto,$subject,$mailbody,$headers);

    if(!$sendmail_result){
        die("<p>メール送信に失敗しました。<br>\n誠に申し訳ございませんが最初から操作をやり直してください。</p>");
    }
}
else{
    die("<p>メールを送信する事が出来ませんでした。<br>\n誠に申し訳ございませんが“".WEBMST_MAIL."”へ直接メールにて<br>お問い合わせしていただけますようお願い申し上げます。</p>");
}

/*if(!empty($mailto2)){
    $sendmail_result = mb_send_mail($mailto2,$subject,$mailbody,$headers);

    if(!$sendmail_result){
        die("<p>メール送信に失敗しました。<br>\n誠に申し訳ございませんが最初から操作をやり直してください。</p>");
    }
}
else{
    die("<p>メールを送信する事が出来ませんでした。<br>\n誠に申し訳ございませんが“".WEBMST_MAIL."”へ直接メールにて<br>お問い合わせしていただけますようお願い申し上げます。</p>");
}*/
?>