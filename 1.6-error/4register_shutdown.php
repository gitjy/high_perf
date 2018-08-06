<?php
class Shutdown
{
	public function stop()
	{
		if (error_get_last()) {
			print_r(error_get_last());
		}
		die('Stop.');
	}
}

register_shutdown_function(array(new Shutdown(), 'stop'));

$a = new a();
echo '必须终止';