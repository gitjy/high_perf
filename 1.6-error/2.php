<?php
$data = '2012-12-20';
if (preg_match("/([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})/", $data, $regs)) {
	echo "$regs[3].$regs[2].$regs[1]";
} else {
	echo "Invalid data format:$data";
}

if ($i > 5) {
	echo "$i 没有初始化啊" , PHP_EOL;
}

$a = ['o' => 2, 4, 6, 8];
echo $a[o];

$result = array_sum($a, 3);
echo fun();
echo "致命错误后，还会执行吗？";