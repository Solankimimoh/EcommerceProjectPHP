<?php

date_default_timezone_set("Asia/Calcutta");
echo date("h:i a");
echo "<br>";
$time_in_12_hour_format = date("g:i a", strtotime("23:00"));
echo $time_in_12_hour_format;
echo "<br>";

echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";

