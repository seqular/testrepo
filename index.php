<?php
if ($_SESSION['captcha'] === $_POST['captcha'])
	{

		$subject = 'Оставлено новое сообщение';
		$message = 'NAME:'.@mysql_real_escape_string($_POST['name'])."\r\n";
		$message .= 'MAIL:'.@mysql_real_escape_string($_POST['mail'])."\r\n";
		$message .= 'TEXT:'.@mysql_real_escape_string($_POST['text'])."\r\n\r\n";
		$headers = 'From: webmaster@example.com' . "\r\n" .
			'Reply-To: webmaster@example.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
		echo "Обращение успешно отправлено";
	}
else
	{
	if (!isset($_SESSION['captcha'])) {
	echo "<div style=\"color:red;\">Вы неправильно ввели код CAPTHCA</div>";
	}
	}
?>

<form method="POST">
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr>
<td width="30%" align="right">Ваше имя: </td><td><input type="text" name="name" tabindex="<?php $tabindex++; echo $tabindex; ?>"></td>
<tr>
<tr>
<td align="right">Обратный E-mail: </td><td><input type="text" name="mail" tabindex="<?php $tabindex++; echo $tabindex; ?>"></td>
</tr>
<tr>
<td align="right">Текст сообщения: </td><td><textarea name="text" cols="50" rows="12" tabindex="<?php $tabindex++; echo $tabindex; ?>" ></textarea></td>
</tr>
<tr>
<td align="right">Контрольное слово: </td><td><input type="text" name="captcha" maxlength="5" size="5" tabindex="<?php $tabindex++; echo $tabindex; ?>"><img src="captcha.php" alt="защитный код"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Отправить"></td>
</tr>
</table>
</form>