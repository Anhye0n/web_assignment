<!--12시에 실행해서 다음날 값 구하기-->

<?php
//------------------------------------------------------------------------------------------
//평균과 갯수 구하기
/*$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
$sql = "SELECT * FROM plan ORDER BY plan_number DESC";
$result = $conn->query($sql);
$acc = 0;
$tre = 0;

$plan_today = date("20y-m-d");

while ($row = mysqli_fetch_assoc($result)) {
    if ($plan_today == $row['plan_date']) {
        $acc += 1; //전체
        if ($row['plan_check'] == 1) {
            $tre += 1; //완료한거
        }
    }
}
$re = $tre / $acc * 100;
//------------------------------------------------------------------------------------------

$date_ = Date("Y-m-d", time());
/*$date_h = Date(H); //시간
$date_i = Date(i); //분

$date_m = Date(m); //요일 글자
$date_d = Date(D); //요일 글자
$date_w = Date(w); //요일 숫자*/
/*

echo $date_;
echo '<br>';
echo $date_d;
echo '<br>';
echo $date_w;
echo '<br>';
echo $date_i;
echo '<br>';
echo $date_h . ":" . $date_i;*/

/*$date_re = $date_h . ":" . $date_i;*/

/*if ($date_re == "13:27") {*/
/*$conn_ = new mysqli("localhost", "root", "xhdka2256", "webpro");

$sql_ = "SELECT * FROM plan_sum WHERE plan_date = '$date_'";

$result_ = mysqli_query($conn_, $sql_);

$ssum = 0;
while ($data = mysqli_fetch_array($result_)) {
    $ssum += 1;
};


if ($ssum > 0) {
    $sql_1 = "UPDATE plan_sum SET plan_amount='$acc', plan_ok='$tre', plan_aver='$re' WHERE plan_date='$date_';";

    if ($conn_->query($sql_1) === TRUE) {*/
        /*/*echo("<script>alert('Upload successfully');</script>");*/
    /*} else {
        echo "Error: " . $sql_1 . "<br>" . $conn_->error;
    }
} else {
    $sql_1 = "INSERT INTO plan_sum (plan_date, plan_month,plan_week, plan_amount, plan_ok, plan_aver) VALUES ('$date_', '$date_m','$date_w', '$acc', '$tre', '$re')";

    if ($conn_->query($sql_1) === TRUE) {
        /*echo("<script>alert('Upload successfully');</script>");
    } else {
        echo "Error: " . $sql_1 . "<br>" . $conn_->error;
    }*/
    /*}
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>고3 플래너</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/moonspam/NanumSquare@1.0/nanumsquare.css">
    <!--{ font-family: 'NanumSquare', sans-serif; }-->

    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet"/>

    <!-- JS Files -->
    <script src="assets/js/date.js"></script>
    <script src="assets/js/Dday.js"></script>


    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/menubar.css">

    <!--script-->


    <style>
        #select_box {
            transition: 0.3s;
        }

        #select_box:hover {
            border: none !important;
            transition: 0.3s;
        }
    </style>
</head>

<body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="blue">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
        <!--<div class="logo">
            <a id="user" class="simple-text logo-normal">3615 안정현</a>
        </div>-->
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li style="text-align: center; padding-bottom: 50px; padding-top: 20px;">
                    <a href="#">
                        <i class="now-ui-icons education_hat"
                           style="font-size: 70px; margin-left: -14%; color: #fff;"></i>
                        <!--<p style="padding-left: 10px;">계획 삽입</p>-->
                    </a>
                </li>

                <hr style="border: 0.5px solid #fff; width: 60%;">

                <p id="date"></p>
                <p id="date_mon"></p>

                <hr style="border: 0.5px solid #fff; width: 60%;">
                <li class="active" style="text-align: center">
                    <!--<a href="javascript:menuClick('insert');">-->
                    <a href="insert">
                        <i class="now-ui-icons arrows-1_minimal-right" style="font-size: 30px;"></i>
                        <p style="display: inline-block;">계획 삽입</p>
                        <!--<p style="padding-left: 10px;">계획 삽입</p>-->
                    </a>
                </li>
                <li style="text-align: center">
                    <!--<a href="javascript:menuClick('tables');">-->
                    <a href="tables">
                        <i class="now-ui-icons design_bullet-list-67" style="padding-left: 17%; font-size: 30px;"></i>
                        <p style="display: inline-block;">진행 현황</p>
                        <!--<p>진행 현황</p>-->
                    </a>
                </li>
                <li style="text-align: center">
                    <!--<a href="javascript:menuClick('evaluation');">-->
                    <a href="evaluation">
                        <i class="now-ui-icons education_atom" style="padding-left: 17%; font-size: 30px;"></i>
                        <p style="display: inline-block;">총 평가</p>
                        <!--<p>총 평가</p>-->
                    </a>
                </li>
                <li style="text-align: center">
                    <!--<a href="javascript:menuClick('tables');">-->
                    <a href="search">
                        <i class="now-ui-icons ui-1_zoom-bold" style="padding-left: 18%; font-size: 30px;"></i>
                        <p style="display: inline-block;">계획 수정</p>
                        <!--<p>진행 현황</p>-->
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        /*var menuClick = function (url) {
            if (url == '/') {
                location.reload(true);
                return;
            }
            $.ajax({
                type: 'POST',
                url: url,
                async: false,
                data: "",
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                success: function (data) {
                    $('body').html(data);
                    if (isMenuHide) menuOff();
                },
                error: function (request, status, error) {
                    alert(error);
                }
            });
        };*/
    </script>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top"
             style="padding-right: 0px;">
            <div class="container-fluid" style="display: unset;">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="">계획삽입</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div style="text-align: center">
                    <p id="top_title">수능까지</p>
                    <p id="Dday"></p>
                </div>
            </div>

        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-lg">
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-11" style="padding-left: 4%">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">&nbsp;계획 삽입</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary" style="font-family: NanumR_B">
                                    <th>
                                        날짜
                                    </th>
                                    <th>
                                        <span style="margin-left: 10px;">목표</span>
                                    </th>
                                    <th>
                                        분량
                                    </th>
                                    <th>
                                        과목
                                    </th>
                                    </thead>
                                    <tbody>
                                    <form action="insert_" method="post">
                                        <tr style="font-family: NanumR_R">
                                            <td style="width: 10%">
                                                <input style="width: 80%;" class="form-control insert_table" type="date"
                                                       id="example-date-input" name="plan_date" autocomplete="off"
                                                       required>
                                            </td>
                                            <td style="width: 40%;">
                                                <input name="plan_goal" style="width: 90%; margin-left: 10px;"
                                                       type="text"
                                                       class="form-control insert_table" placeholder="목표를 입력하세요."
                                                       autocomplete="off" required autofocus>
                                            </td>
                                            <td style="width: 20%;">
                                                <input name="plan_amount" style="width: 90%" type="text"
                                                       class="form-control insert_table"
                                                       placeholder="분량를 입력하세요." autocomplete="off" required>
                                            </td>
                                            <td>
                                                <select name="plan_subject" style="width: 50%; height: unset"
                                                        type="text"
                                                        class="form-control insert_table" id="select_box"
                                                        placeholder="과목을 입력하세요." autocomplete="off" required>
                                                    <option value="국어">국어</option>
                                                    <option value="수학">수학</option>
                                                    <option value="영어">영어</option>
                                                    <option value="과탐">과탐</option>
                                                    <option value="직탐">직탐</option>
                                                    <option value="수행">수행</option>
                                                    <option value="IT">IT</option>
                                                    <option value="기타">기타</option>
                                                </select>

                                                <input name="plan_check" style="display: none" type="text"
                                                       class="form-control insert_table" value="0">
                                            </td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <script>
                                        var aasdf = new Date();
                                        var bbasdf = aasdf.getFullYear();
                                        var ccasdf = aasdf.getMonth();
                                        var ddasdf = aasdf.getDate() + 1;
                                        var dayset = new Date(bbasdf, ccasdf, ddasdf);

                                        document.getElementById('example-date-input').valueAsDate = dayset;
                                    </script>
                                </table>
                                <button type="submit" class="btn btn-outline-dark" id="tables_button"><span
                                            id="tables_button_id">올리기</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-11" style="padding-left: 4%">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="date_1" style="display: inline-block;"></h4>
                            <span class="card-title">&nbsp;계획</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary" style="font-family: NanumR_B">
                                    <th>
                                        날짜
                                    </th>
                                    <th>
                                        <span style="margin-left: 10px;">목표</span>
                                    </th>
                                    <th>
                                        분량
                                    </th>
                                    <th>
                                        과목
                                    </th>
                                    <th>
                                        삭제
                                    </th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
                                    $sql = "SELECT * FROM plan ORDER BY plan_number DESC";
                                    $result = $conn->query($sql);

                                    $plan_today = date("20y-m-d");

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($plan_today == $row['plan_date']) {
                                            ?>
                                            <tr style="font-family: NanumR_R">
                                                <td style="width: 10%">
                                                    <p style="width: 80%;">
                                                        <?php echo $row['plan_date'] ?></p>
                                                </td>
                                                <td style="width: 40%">
                                                    <p style="width: 90%;">
                                                        <?php echo $row['plan_goal'] ?></p>
                                                </td>
                                                <td style="width: 20%">
                                                    <p style="width: 90%;">
                                                        <?php echo $row['plan_amount'] ?></p>
                                                </td>
                                                <td>
                                                    <p style="width: 50%;">
                                                        <?php echo $row['plan_subject'] ?></p>
                                                </td>
                                                <td>
                                                    <form action="insert_" method="post">
                                                        <input name="delete_date" type="text" style="display: none"
                                                               value="<?php echo $row['plan_goal'] ?>">
                                                        <button type="submit" class="btn btn-danger">X</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>

<script type="text/javascript">
    document.getElementById("date").innerHTML = m_d_today;
    document.getElementById("date_mon").innerHTML = m_today;
</script>

<script type="text/javascript">
    document.getElementById("Dday").innerHTML = Ddayy;
</script>

</html>
