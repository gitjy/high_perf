<?php
/**
匹配一行的第一个单词
^\w+
匹配不包含空白符的字符串
\S+
匹配座机号 3/4位区号
0\d{2}-\d{8} | 0\d{3}-\d{7}

匹配座机号 3位区号，其中区号可以用小括号括起来
\(0|\d{2}\)[-]?\d{8}|0\d{2}[-]?\d{8}

匹配IP
((2[0-4]\d|25[0-5]|[01]?\d\d?)\.)){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)

匹配手机号
1\d{10}

匹配email
\w{3,16}@(\w{1,64}\.\w{2,5})+
*/
$str = 'hello world';
$pattern['first_world'] = '#^\w+#';
$matches = [];
preg_match_all($pattern['first_world'], $str, $matches);
print_r($matches);
echo "<br/><br/>";

echo "匹配不包含空白符的字符串";
$matches = [];
$pattern['worlds'] = '#\S+#';
preg_match_all($pattern['worlds'], $str, $matches);
print_r($matches);
echo "<br/><br/>";


echo "匹配座机号 3/4位区号";
$arr = ['010-65542981', '0102-6553241', '0106556338'];
$matches = [];
$pattern['AreaCode'] = '#0\d{2}-\d{8}|0\d{3}-\d{7}#';
//preg_match_all($pattern['AreaCode'], $arr[0], $matches);
$matches = preg_grep($pattern['AreaCode'], $arr);
print_r($matches);
echo "<br/><br/>";

echo "匹配座机号 3位区号";
$arr = ['010-65542981', '0102-6553241', '(010)6556338'];
$matches = [];
$pattern['AreaCode'] = '#\(0|\d{2}\)[-]?\d{8}|0\d{2}[-]?\d{8}#';
//preg_match_all($pattern['AreaCode'], $arr[0], $matches);
$matches = preg_grep($pattern['AreaCode'], $arr);
print_r($matches);
echo "<br/><br/>";


echo "匹配IP";
$arr = ['61.148.202.194', '127.0.0.1', '255.255.255.255'];
$matches = [];
$pattern['AreaCode'] = '#((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)#';
//preg_match_all($pattern['AreaCode'], $arr[0], $matches);
$matches = preg_grep($pattern['AreaCode'], $arr);
print_r($matches);
echo "<br/><br/>";

echo "匹配email";
$arr = ['110798449@qq.com', 'service@exmaple.cn', 'kefu@shou.com.cn'];
$matches = [];
$pattern['AreaCode'] = '#\w{3,16}@(\w{1,64}\.\w{2,5})+#';
//preg_match_all($pattern['AreaCode'], $arr[0], $matches);
$matches = preg_grep($pattern['AreaCode'], $arr);
print_r($matches);
echo "<br/><br/>";

echo "匹配email"; 
$matches = filter_var('admin@example.com', FILTER_VALIDATE_EMAIL);
print_r($matches);
echo "<br/><br/>";





