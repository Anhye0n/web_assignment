<?php

$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
$date = 06;
$day = 1;
$re = '2019-' . '06' . '-' . '21';
$sql = "DELETE FROM plan_sum WHERE plan_date='$re'";
$result = $conn->query($sql);

?>