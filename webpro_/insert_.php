<?php
$date = $_POST['plan_date'];
$in_date = $_POST['delete_date'];
if (isset($date) == true) {
    $goal = $_POST['plan_goal'];
    $amount = $_POST['plan_amount'];
    $subject = $_POST['plan_subject'];
    $check = $_POST['plan_check'];

    $conn = new mysqli("localhost", "root", "xhdka2256", "webpro");

    $sql = "INSERT INTO plan (plan_date, plan_goal, plan_amount, plan_subject, plan_check)
    VALUES ('$date', '$goal', '$amount', '$subject', $check)";

    if ($conn->query($sql) === TRUE) {

        /*echo("<script>alert('Upload successfully');</script>");*/

        echo("<script>location.replace('insert');</script>");
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}

else if (isset($in_date) == true){
    $conn = new mysqli("localhost", "root", "xhdka2256", "webpro");

    $sql = "DELETE FROM plan WHERE plan_goal='$in_date'";

    if ($conn->query($sql) === TRUE) {

        /*echo("<script>alert('Delete successfully');</script>");*/

        echo("<script>location.replace('insert');</script>");
    } else {

        echo "Error: " . $sql . "<br>" . $conn->error;

    }
}
else{
    echo("<script>alert('wrong_access')</script>");
    echo("<script>location.replace('insert');</script>");
}
?>