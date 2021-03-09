<?php
$check = $_GET['plan_check'];
$datee = $_GET['plan_datee'];
$goal = $_GET['plan_goal'];

$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");

$sql = "UPDATE plan
SET plan_check='$check'
WHERE plan_goal='$goal'";

$url = 'https://planner.01b4n.com/search?plan_date_show='.$datee;

if ($conn->query($sql) === TRUE) {
    echo("<script>location.replace('$url');</script>");
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}
?>