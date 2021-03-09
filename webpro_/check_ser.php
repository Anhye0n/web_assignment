<?php


$check = $_POST['plan_check'];
$goal = $_POST['plan_goal'];

$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");

$sql = "UPDATE plan
SET plan_check='$check'
WHERE plan_goal='$goal'";

if ($conn->query($sql) === TRUE) {
    echo("<script>location.replace('search');</script>");
} else {

    echo "Error: " . $sql . "<br>" . $conn->error;

}
?>