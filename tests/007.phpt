--TEST--
Check for timecop.sync_request_time=0 and $_SERVER['REQUEST_TIME']
--SKIPIF--
<?php
	extension_loaded('timecop') or die('skip timecop not available');
	$required_func = array("timecop_freeze", "timecop_travel", "timecop_return");
	foreach ($required_func as $func_name) {
		if (!function_exists($func_name)) {
			die("skip $func_name() function is not available.");
		}
	}
?>
--INI--
timecop.sync_request_time=0
--FILE--
<?php
$orig_request_time = $_SERVER['REQUEST_TIME'];
timecop_freeze(1234);
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
timecop_travel(12345);
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
timecop_return();
var_dump($orig_request_time === $_SERVER['REQUEST_TIME']);
--EXPECT--
bool(true)
bool(true)
bool(true)
