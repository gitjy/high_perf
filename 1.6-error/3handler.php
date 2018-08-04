<?php
//自定义错误处理事，手动抛出异常
function customEroor($errno, $errstr, $errfile, $errline) {
	//自定义错误处理事，手动抛出异常
	throw new Exception($errno . '|' . ($errstr));
}

set_error_handler("customEroor", E_ALL|E_STRICT);

try
{
	$a = 5/0;
} catch (Exception $e) {
	echo '错误信息', $e->getMessage();
}