<!--12시에 실행해서 다음날 값 구하기-->

<?php
//------------------------------------------------------------------------------------------
//평균과 갯수 구하기
$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
$sql = "SELECT * FROM plan ORDER BY plan_number DESC";
$result = $conn->query($sql);
$acc = 0;
$tre = 0;

$plan_today = date("20y-m-d");

while ($row = mysqli_fetch_assoc($result)) {
    if ($plan_today == $row['plan_date']) {
        $acc += 1; //전체
    }
    if ($row['plan_check'] == 1) {
        $tre += 1; //완료한거
    }
}
$re = $tre / $acc * 100;
//------------------------------------------------------------------------------------------

$date_ = Date("Y-m-d", time());
$date_h = Date(H); //시간
$date_i = Date(i); //분

$date_m = Date(m); //요일 글자
$date_d = Date(D); //요일 글자
$date_w = Date(w); //요일 숫자


echo $date_;
echo '<br>';
echo $date_d;
echo '<br>';
echo $date_w;
echo '<br>';
echo $date_i;
echo '<br>';
echo $date_h . ":" . $date_i;

$date_re = $date_h . ":" . $date_i;

/*if ($date_re == "13:27") {*/
    $conn_ = new mysqli("localhost", "root", "xhdka2256", "webpro");

    $sql_ = "SELECT * FROM plan_sum WHERE plan_date = '$date_'";

    $result_ = mysqli_query($conn_, $sql_);

    $ssum = 0;
    while($data = mysqli_fetch_array($result_)){
        $ssum += 1;
    };


    if ($ssum > 0) {
        $sql_1 = "UPDATE plan_sum SET plan_amount='$acc', plan_ok='$tre', plan_aver='$re' WHERE plan_date='$date_';";

        if ($conn_->query($sql_1) === TRUE) {
            /*/*echo("<script>alert('Upload successfully');</script>");*/
        } else {
            echo "Error: " . $sql_1 . "<br>" . $conn_->error;
        }
    }
    else{
        $sql_1 = "INSERT INTO plan_sum (plan_date, plan_month,plan_week, plan_amount, plan_ok, plan_aver) VALUES ('$date_', '$date_m','$date_w', '$acc', '$tre', '$re')";

        if ($conn_->query($sql_1) === TRUE) {
            /*/*echo("<script>alert('Upload successfully');</script>");*/
        } else {
            echo "Error: " . $sql_1 . "<br>" . $conn_->error;
        }
    /*}*/
}
?>