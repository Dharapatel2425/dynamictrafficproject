<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

date_default_timezone_set("Asia/Kolkata");
echo "The time is " . date("h:i:sa");
?>