<?php
//SMTP测试代码  成功
include ("smtp_mail.class.php");

$host = "ssl://smtp.exmail.qq.com";
$port = 465;
$user = "jiangyong@iyuedan.com";
$pass = $argv[1];	//To do implemnt

$from = "jiangyong@iyuedan.com";
$to =  "1107985549@qq.com";

$subject = "Hello Body";
$content = "This is exaple email for you";

$mail = new smtp_mail($host, $port, $user, $pass, 1, true);
$mail->send_mail($from, $to, $subject, $content);