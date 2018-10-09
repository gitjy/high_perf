<?php
//SMTP测试代码 失败 504
include ("smtp_mail.class.php");

$host = "smtp.exmail.qq.com";
$port = 465;
$user = "jiangyong@iyuedan.com";
$pass = "pass";

$from = "jiangyong@iyuedan.com";
$to =  "1107985549@qq.com";

$subject = "Hello Body";
$content = "This is exaple email for you";

$mail = new smtp_mail($host, $port, $user, $pass, 1, true);
$mail->send_mail($from, $to, $subject, $content);