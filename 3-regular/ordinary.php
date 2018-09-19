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
$pattern['email'] = '#\w{3,16}@(\w{1,64}\.\w{2,5})+#';
//preg_match_all($pattern['AreaCode'], $arr[0], $matches);
$matches = preg_grep($pattern['email'], $arr);
print_r($matches);
echo "<br/><br/>";

echo "匹配email"; 
$matches = filter_var('admin@example.com', FILTER_VALIDATE_EMAIL);
print_r($matches);
echo "<br/><br/>";


echo '表达式中包含^、$至少一个且字符串中有换行符”\n”时，m修饰符才起作用';
echo "<br/>";
$str = "this is reg
Reg
this is
regexp turtor,oh reg";
if (preg_match_all('%.*reg%mi',$str, $matches)) {
    print_r($matches);
} else {
    echo "no match";
}

echo "<br/>";
if (preg_match_all('%.*reg$%mi',$str, $matches)) {
    print_r($matches);
} else {
    echo "no match";
}


echo "<br/>";
if (preg_match_all('%^t.*$%mi',$str, $matches)) {
    print_r($matches);
} else {
    echo "no match";
}
echo "<br/><br/>";


/**
html匹配
匹配所有HTML标签
<\/?\b[^>]+>

匹配所有HTML标签，排除p标签
<(?!/?p\b)[^]b+>

<title>.*</\title>
匹配a标签
<a[^>]+>

匹配成对的a标签
<a[^>]*>([^<>])*<\/a>


匹配div标签里的内容
(?<=<div>).*(?=</div>)

匹配所有的HTML标签
</?\b[^>]+>
*/

/*
echo "html匹配<pre>";
$str = file_get_contents('mask.html');
$matches = [];
$pattern['htmlTag'] = '#<\/?\b[^>]+>#';
preg_match_all($pattern['htmlTag'], $str, $matches);
//$matches = preg_grep($pattern['htmlTag'], $arr);
print_r(array_map('htmlspecialchars', $matches[0]));
//print_r($matches);
echo "</pre><br/><br/>";*/


/*echo "匹配所有HTML标签，排除p标签<pre>";
$str = file_get_contents('mask.html');
$matches = [];
$pattern['htmlTag'] = '#<(?!/?p\b)[^>]+>#';
preg_match_all($pattern['htmlTag'], $str, $matches);
//$matches = preg_grep($pattern['htmlTag'], $arr);
print_r(array_map('htmlspecialchars', $matches[0]));
//print_r($matches);
echo "</pre><br/><br/>";*/

echo "匹配div标签<pre>";
$str = file_get_contents('mask.html');
$matches = [];
$pattern['htmlTag'] = '#<(?=/?div\b)[^>]+>#';
preg_match_all($pattern['htmlTag'], $str, $matches);
//$matches = preg_grep($pattern['htmlTag'], $arr);
print_r(array_map('htmlspecialchars', $matches[0]));
//print_r($matches);
echo "</pre><br/><br/>";


echo "匹配成对的div标签<pre>";
$str = file_get_contents('mask.html');
$matches = [];
$pattern['a'] = '#<div[^>]*>([^<>]*)<\/div>#';
//$pattern['a'] = '#<div[^>]*>(.*?)<\/div>#s';
preg_match_all($pattern['a'], $str, $matches);
//$matches = preg_grep($pattern['htmlTag'], $arr);
print_r(array_map('htmlspecialchars', $matches[0]));
//print_r($matches);
echo "</pre><br/><br/>";


echo "匹配div标签里的内容<pre>";
$str = file_get_contents('mask.html');
$matches = [];
$pattern['a'] = '#(?<=<div)(?!>*?>).*?(?=</div>)#s';
//$pattern['a'] = '#<div[^>]*>(.*?)<\/div>#s';
preg_match_all($pattern['a'], $str, $matches);
//$matches = preg_grep($pattern['htmlTag'], $arr);
print_r(array_map('htmlspecialchars', $matches[0]));
//print_r($matches);
echo "</pre><br/><br/>";


echo "量词检测<pre>";
$arr = ['123123', '1231', '321234'];
$matches = [];
$pattern['repeat'] = '#(123)+#s';
preg_match_all($pattern['repeat'], $arr[0], $matches);
//$matches = preg_grep($pattern['repeat'], $arr);
print_r($matches);
echo "</pre><br/><br/>";


