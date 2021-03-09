<?php
$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
$date = 06;
$day = 1;
for ($i = 21; $i <25; $i++) {
    $amount = mt_rand(5, 7);
    $plan_ok = mt_rand(3, 5);
    $plan_aver = $plan_ok / $amount * 100;
    $as = $i;
    $as = $as < 10 ? "0" . $as : $as;
    $re = '2019-' . '06' . '-' . $as;
    $week = mt_rand(1, 7);

    $sql = "SELECT * FROM plan_sum ORDER BY plan_sum_number DESC";
    $result = $conn->query($sql);

    while ($roww = mysqli_fetch_array($result)) {
        /*if ($roww['plan_sum_number'] == $i) {*/
           /* $sql_1 = "UPDATE plan_sum SET plan_amount = '$amount' WHERE plan_sum_number='$i'";
            $sql_2 = "UPDATE plan_sum SET plan_ok = '$plan_ok' WHERE plan_sum_number='$i'";*/
            $sql_1 = "INSERT INTO plan_sum (plan_date, plan_month, plan_week, plan_amount, plan_ok, plan_aver)
                VALUES ('$re', '$date', '$week', '$amount', '$plan_ok', '$plan_aver')";
            $result_2 = $conn->query($sql_1);
      /*}*/
    }



    /*평균값 삽입하기*/
            /*$sql = "SELECT * FROM plan_sum ORDER BY plan_sum_number DESC";
            $as = $i;
            $as = $as < 10 ? "0" . $as : $as;
            $re = '2019-' . '05' . '-' . $as;
            $result = $conn->query($sql);

            while ($roww = mysqli_fetch_array($result)) {
                if ($roww['plan_date'] == $re) {
                    $plan_aver = $roww['plan_ok'] / $roww['plan_amount'] * 100;
                    $sql_ = "UPDATE plan_sum SET plan_aver = '$plan_aver' WHERE plan_date='$re'";
                    $result_ = $conn->query($sql_);
                }
            }*/
}
?>