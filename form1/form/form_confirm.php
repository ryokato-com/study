
<?php
/*
if(isset($_POST['confirm'])) {
    $_SESSION['your_name'] = $_POST['your_name'];
    $_SESSION['your_tel'] = $_POST['your_tel'];
    $_SESSION['your_mail'] = $_POST['your_mail'];
    $_SESSION['item'] = $_POST['item'];
    $_SESSION['message'] = $_POST['message'];
    $_SESSION['confirm'] = $_POST['confirm'];
}*/

if(!$noindexaccess){
    header("HTTP/1.0 404 Not Found");exit();
}
 
?>


<script>
//2重送信防止スクリプト
var flg_Submit = false;
function Fnk_DoubleSubmit(){
  if(flg_Submit){
    alert("処理中です。");return false;
  }
  else{
    flg_Submit = true;return true;
  }
}
</script>





<form name="toiawase2" action="#contact" method="post" enctype="multipart/form-data" onsubmit="return Fnk_DoubleSubmit();">


<div class="form form_confirm">
	<table>
		<tr>
			<th>お名前<span class="required">*</span></th>

			<td>
				<?php echo ($your_name)?$your_name:"";?>
				<input name="your_name" type="hidden" value="<?php echo ($your_name)?$your_name:"";?>" />
			</td>
		</tr>

		<tr>
			<th>メールアドレス<span class="required">*</span></th>

			<td>
				<?php echo ($email)?$email:"";?>
				<input name="email" type="hidden" value="<?php echo ($email)?$email:"";?>" />
			</td>
		</tr>

		<tr>
			<th>電話番号<span class="required">*</span></th>

			<td>
				<?php echo ($tel)?$tel:"";?>
				<input name="tel" type="hidden" value="<?php echo ($tel)?$tel:"";?>" />
			</td>
		</tr>

		<tr>
			<th>ご住所</th>

			<td>
				<?php echo ($address)?$address:"";?>
				<input name="address" type="hidden" value="<?php echo ($address)?$address:"";?>" />
			</td>
		</tr>
		
		<tr>
			<th>お問い合わせ内容</th>

			<td>
				<div class="checkbox">
				<?php $matter=$_POST['matter']; foreach ((array)$matter as $value){ $a .=$value."、"; } echo $a;?>
				<input name="matter" type="hidden" value="<?php $matter=$_POST['matter']; echo $a;?>"/>
				</div>

				<?php echo ($message)?nl2br($message):"";?>
				<input name="message" type="hidden" value="<?php echo ($message)?$message:"";?>" />
			</td>
		</tr>
	</table>
</div><!-- form -->


<div class="contact_btn">
	<div class="li back"><button id="modoru" type="button" name="back" onclick="javascript:history.back();">戻って編集</button></div>

	<div class="li submit"><input id="sousin" type="submit" name="submit" value="送信する"></div>

	<div><input type="hidden" name="action" value="submit"></div>
</div>


</form>