--TEST--
Parse 2039-MM-DD
--SKIPIF--
<?php
extension_loaded('timecop') or die('skip timecop not available');
$required_class = array("timecopdatetime");
foreach ($required_class as $class_name) {
    if (!class_exists($class_name)) {
        die("skip $class_name class is not available.");
    }
}
--INI--
date.timezone=America/Los_Angeles
timecop.func_override=0
--FILE--
<?php
$dt = new TimecopDateTime("2039-01-01 12:00:00 GMT");
var_dump($dt->format("c"));
var_dump($dt->getTimestamp());
--EXPECT--
string(25) "2039-01-01T12:00:00+00:00"
int(2177496000)
