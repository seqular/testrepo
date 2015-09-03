<?php
session_start()
if ($_SESSION['captcha'] === $_POST['captcha'])
	{
		$to      = 'seqular@litl-admin.ru';
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
include_once('form.php');
?>
