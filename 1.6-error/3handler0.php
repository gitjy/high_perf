<?php
//错误处理函数
function customEroor($errno, $errstr, $errfile, $errline) {
	echo "<b>错误代码：</b>[($errno)]($errstr)\r\n";
	echo "错误所在行：{$errline} 文件{$errfile}\r\n";
	echo "PHP版本", PHP_VERSION, "(", PHP_OS, ")\r\n";
	//die()
}

set_error_handler("customEroor", E_ALL|E_STRICT);

$a = ['o' => 2, 4, 6, 8];
echo $a[o];