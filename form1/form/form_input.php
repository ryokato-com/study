
<?php
// 不正アクセスチェック
if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}
?>
 
<div style="color:red;">
<?php // エラーメッセージがあったら表示する
echo ($error_mes)? $error_mes:"";?>
</div>


<form name="toiawase" action="#contact" method="post" enctype="multipart/form-data">
<?php /*<form name="toiawase" action="#contact" method="post" enctype="multipart/form-data" onsubmit="return Fnk_DoubleSubmit();">*/?>

<div class="form">
	<table>
		<tr>
			<th><span class="required">＊</span>氏名</th>

			<td>
				<input type="text" name="your_name" placeholder="氏名を入力してください" value="<?php echo ($your_name)?$your_name:"";?>" required>
			</td>
		</tr>

		<tr>
			<th><span class="required">＊</span>メールアドレス</th>

			<td>
				<input type="email" name="email" placeholder="メールアドレスを入力してください" value="<?php echo ($email)?$email:"";?>" required>
			</td>
		</tr>

		<tr>
			<th><span class="required">＊</span>電話番号</th>

			<td>
				<input type="tel" name="tel" placeholder="電話番号を入力してください" value="<?php echo ($tel)?$tel:"";?>" required>
			</td>
		</tr>

		<tr>
			<th>住所</th>

			<td>
				<input type="text" name="address" placeholder="住所を入力してください" value="<?php echo ($address)?$address:"";?>">
			</td>
		</tr>

		<tr>
			<th><span class="required">＊</span>お問い合わせ内容</th>

			<td>
				<div class="checkbox">
					<div class="list">
						<label><input type="checkbox" name="matter[]" value="カーポート"> カーポート</label>
						<label><input type="checkbox" name="matter[]" value="リウッドデッキ"> リウッドデッキ</label>
						<label><input type="checkbox" name="matter[]" value="テラス囲い"> テラス囲い</label>
						<label><input type="checkbox" name="matter[]" value="物置"> 物置</label>
						<label><input type="checkbox" name="matter[]" value="人工芝"> 人工芝</label>
						<label><input type="checkbox" name="matter[]" value="その他"> その他</label>
					</div>
				</div>

				<textarea name="message" rows="10" placeholder="その他／ご要望" required><?php echo ($message)?$message:"";?></textarea>
			</td>
		</tr>
	</table>
</div><!-- form -->

<div class="contact_btn confirm"><input id="kakunin" type="submit" name="confirm" value="確認する"><input type="hidden" name="action" value="confirm"></div>

<?php /*<div class="submit"><input id="sousin" type="submit" name="submit" value="送信する"></div>*/?>


</form>

