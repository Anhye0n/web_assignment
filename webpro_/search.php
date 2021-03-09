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
        if ($row['plan_check'] == 1) {
            $tre += 1; //완료한거
        }
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

$date_re = $date_h . ":" . $date_i;

/*if ($date_re == "13:27") {*/
$conn_ = new mysqli("localhost", "root", "xhdka2256", "webpro");

$sql_ = "SELECT * FROM plan_sum WHERE plan_date = '$date_'";

$result_ = mysqli_query($conn_, $sql_);

$ssum = 0;
while ($data = mysqli_fetch_array($result_)) {
    $ssum += 1;
};


if ($ssum > 0) {
    $sql_1 = "UPDATE plan_sum SET plan_amount='$acc', plan_ok='$tre', plan_aver='$re' WHERE plan_date='$date_';";

    if ($conn_->query($sql_1) === TRUE) {
        /*/*echo("<script>alert('Upload successfully');</script>");*/
    } else {
        echo "Error: " . $sql_1 . "<br>" . $conn_->error;
    }
} else {
    $sql_1 = "INSERT INTO plan_sum (plan_date, plan_month,plan_week, plan_amount, plan_ok, plan_aver) VALUES ('$date_', '$date_m','$date_w', '$acc', '$tre', '$re')";

    if ($conn_->query($sql_1) === TRUE) {
        /*/*echo("<script>alert('Upload successfully');</script>");*/
    } else {
        echo "Error: " . $sql_1 . "<br>" . $conn_->error;
    }
    /*}*/
}
?>

<?php
$conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
$sql = "SELECT * FROM plan ORDER BY plan_number DESC";
$sql_ = "SELECT * FROM plan ORDER BY plan_number DESC";
$result = $conn->query($sql);
$result_ = $conn->query($sql);
$acc = 0;
$tre = 0;
$korean = 0;
$math = 0;
$english = 0;
$etc = 0;

$plan_today = date("20y-m-d");

while ($row = mysqli_fetch_assoc($result)) {
    if ($plan_today == $row['plan_date']) {
        $acc += 1; //전체
    }
    if ($row['plan_check'] == 1) {
        $tre += 1; //완료한거
    }
}

while ($row_ = mysqli_fetch_assoc($result_)) {
    if ($row_['plan_subject'] == '국어') {
        $korean += 1;
    } else if ($row_['plan_subject'] == '수학') {
        $math += 1;
    } else if ($row_['plan_subject'] == '영어') {
        $english += 1;
    } else {
        $etc += 1;
    }
}
$re = $tre / $acc * 100;
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

    <style>
        .main-panel > .content {
            margin-top: -30px
        }

        .btn-primary {
            color: #fff !important;
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        input:focus {
            background-color: rgba(255, 255, 0, 0) !important;
        }
    </style>
</head>

<body class="">
<div class="wrapper">
    <div class="sidebar" data-color="blue">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
-->
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
                <li style="text-align: center">
                    <!--<a href="javascript:menuClick('insert');">-->
                    <a href="insert">
                        <i class="now-ui-icons arrows-1_minimal-right" style="padding-left: 20%;font-size: 30px;"></i>
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
                <li class="active" style="text-align: center">
                    <!--<a href="javascript:menuClick('tables');">-->
                    <a href="search">
                        <i class="now-ui-icons ui-1_zoom-bold" style="padding-left: 28%; font-size: 30px;"></i>
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
        <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="">진행현황</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                </button>

                <!--<div style="text-align: center">
                    <p id="Dday" style="font-size: 50px!important; margin-bottom: -10px;"></p>
                    <br>
                    <hr style="margin-top: -5px; border: 1px solid #fff; width: 5%">
                    <p id="eval">60%</p>
                    <p id="eval_text">&nbsp; 달성!</p>
                </div>-->
            </div>

        </nav>

        <!--<script>
            myChart.data(data[2, 2, 2, 2, 2, 6, 10]);
        </script>-->
        <!-- End Navbar -->
        <div class="panel-header panel-header-lg">
            <div class="chart-container" style="position: relative; height:38vh; text-align: center;">
                <!--<p id="eval"><?php /*echo substr($re, 0, 5) */ ?>% <span id="eval_text">달성!</span></p>-->
                <!--<p id="eval_sub"><?php /*echo $acc */ ?> <span id="eval_text_sub" style="margin-right: 20px;">개 중</span><?php /*echo $tre */ ?> <span id="eval_text_sub">개 달성!</span></p>-->
                <?php
                $plan_todayy = date("20y-m-d");
                if (!empty($_GET['plan_date_show'])) {
                    $a = $_GET['plan_date_show'];
                } else {
                    $a = "<script>var aasdf = new Date();
                                        var bbasdf = aasdf.getFullYear();
                                        var ccasdf = aasdf.getMonth();
                                        var ddasdf = aasdf.getDate() + 1;
                                        var dayset = new Date(bbasdf, ccasdf, ddasdf);
                                        document.getElementById('example-date-input').valueAsDate = dayset;</script>;";
                }

                ?>
                <form action="search" method="get">
                    <input style="width: 40%; display: inline-block; color: #fff; height: 50px; font-size: 35px; text-align: center; padding-left: 4%; border-bottom: 2px solid #fff; border-top: none; border-left: none; border-right: none;"
                           class="form-control insert_table"
                           type="date"
                           id="example-date-input" name="plan_date_show" autocomplete="off" required
                           value="<?php echo $a ?>">
                    <br>
                    <button type="submit" class="btn btn-outline-dark" id="tables_button"><span
                                id="tables_button_id"
                                style="padding: 2px 10px 5px 10px !important;">조회</span></button>
                </form>
                <!--<div style="margin-top: 100px; margin-left: 5px;">
                    <table style="margin: auto; text-align: center;">
                        <tr>
                            <td><p class="tables_text">국어</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p class="tables_text">수학</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p class="tables_text">영어</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p class="tables_text">ETC.</p></td>
                        </tr>
                        <tr>
                            <td><p style="margin-top: -30px;" class="tables_num"><?php /*echo $korean */ ?> 개</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p style="margin-top: -30px;" class="tables_num"><?php /*echo $math */ ?> 개</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p style="margin-top: -30px;" class="tables_num"><?php /*echo $english */ ?> 개</p></td>
                            <td style="padding-left: 10px; padding-right: 10px"></td>
                            <td><p style="margin-top: -30px;" class="tables_num"><?php /*echo $etc */ ?> 개</p></td>
                        </tr>
                    </table>
                </div>-->
            </div>
        </div>
        <div class="content">
            <div class="row">
                <!--조회-->
                <div class="col-md-11" style="padding-left: 4%">
                    <div class="card">

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
                                        Check
                                    </th>
                                    <th>
                                        O / X
                                    </th>
                                    <th>
                                        삭제
                                    </th>
                                    </thead>
                                    <tbody>
                                    <script>
                                        /*var aasdf = new Date();
                                        var bbasdf = aasdf.getFullYear();
                                        var ccasdf = aasdf.getMonth();
                                        var ddasdf = aasdf.getDate() + 1;
                                        var dayset = new Date(bbasdf, ccasdf, ddasdf);

                                        document.getElementById('example-date-input').valueAsDate = dayset;*/
                                        /*function storage(var date_val) {
                                            sessionStorage.setItem('date_name', date_val);
                                            var get_val = sessionStorage.getItem('date_name');
                                            var bbasdf = get_val.split('-');
                                            var ccasdf = parseInt(get_val[0]);
                                            var ddasdf = parseInt(get_val[1]);
                                            var eeasdf = parseInt(get_val[2]);
                                            var dayset = new Date(ccasdf, ddasdf, eeasdf);
                                            document.getElementById('example-date-input').valueAsDate = dayset;
                                        }*/
                                    </script>
                                    <?php
                                    $conn_show = new mysqli("localhost", "root", "xhdka2256", "webpro");
                                    $sql_show = "SELECT * FROM plan ORDER BY plan_number DESC";
                                    $result_show = $conn_show->query($sql_show);
                                    if (isset($_GET['plan_date_show']) == true) {
                                        $show_date = $_GET['plan_date_show'];
                                    } else {

                                    }
                                    $acc = 0;
                                    $tre = 0;

                                    $plan_today = date("20y-m-d");

                                    while ($row_show = mysqli_fetch_assoc($result_show)) {
                                        if ($show_date == $row_show['plan_date']) {
                                            $acc += 1;
                                            ?>
                                            <tr style="font-family: NanumR_R">
                                                <td style="width: 10%">
                                                    <p style="width: 80%;">
                                                        <?php echo $row_show['plan_date'] ?></p>
                                                </td>
                                                <td style="width: 40%">
                                                    <p style="width: 90%;">
                                                        <?php echo $row_show['plan_goal'] ?></p>
                                                </td>
                                                <td style="width: 20%">
                                                    <p style="width: 90%;">
                                                        <?php echo $row_show['plan_amount'] ?></p>
                                                </td>
                                                <td>
                                                    <p style="width: 50%;">
                                                        <?php echo $row_show['plan_subject'] ?></p>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <?php
                                                            if ($row_show['plan_check'] == 0) {
                                                                echo "<input class='form-check-input'type='checkbox'disabled>";
                                                            } elseif ($row_show['plan_check'] == 1) {
                                                                echo "<input class='form-check-input' type='checkbox'checked disabled>";
                                                            }
                                                            ?>
                                                            <!--checked=""를 사용하면 체크가 됨-->
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="check_search" method="get"
                                                          style="display: inline-block">
                                                        <input name="plan_goal" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_goal'] ?>">
                                                        <input name="plan_check" type="text" style="display: none"
                                                               value="1">
                                                        <input name="plan_datee" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_date'] ?>">
                                                        <button type="submit" class="btn btn-primary"
                                                                id="tables_button tables_button_id"><span>O</span>
                                                        </button>
                                                    </form>
                                                    <form action="check_search" method="get"
                                                          style="display: inline-block">
                                                        <input name="plan_goal" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_goal'] ?>">
                                                        <input name="plan_check" type="text" style="display: none"
                                                               value="0">
                                                        <input name="plan_datee" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_date'] ?>">
                                                        <button type="submit" class="btn btn-danger"
                                                                id="tables_button tables_button_id"><span>X</span>
                                                        </button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <form action="insert_ser" method="post">
                                                        <input name="delete_date" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_goal'] ?>">
                                                        <input name="plan_datee" type="text" style="display: none"
                                                               value="<?php echo $row_show['plan_date'] ?>">
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


                <!------->
                <div class="col-md-11" style="padding-left: 4%">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="date_1" style="display: inline-block;"></h4>
                            <span class="card-title">&nbsp;총 계획</span>
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
                                        Check
                                    </th>
                                    <th>
                                        O / X
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
                                    $acc = 0;
                                    $tre = 0;

                                    $plan_today = date("20y-m-d");

                                    while ($row = mysqli_fetch_assoc($result)) {
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
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <?php
                                                            if ($row['plan_check'] == 0) {
                                                                echo "<input class='form-check-input'type='checkbox'disabled>";
                                                            } elseif ($row['plan_check'] == 1) {
                                                                echo "<input class='form-check-input' type='checkbox'checked disabled>";
                                                            }
                                                            ?>
                                                            <!--checked=""를 사용하면 체크가 됨-->
                                                            <span class="form-check-sign"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="check_ser" method="post" style="display: inline-block">
                                                        <input name="plan_goal" type="text" style="display: none"
                                                               value="<?php echo $row['plan_goal'] ?>">
                                                        <input name="plan_check" type="text" style="display: none"
                                                               value="1">
                                                        <button type="submit" class="btn btn-primary"
                                                                id="tables_button tables_button_id"><span>O</span>
                                                        </button>
                                                    </form>
                                                    <form action="check_ser" method="post" style="display: inline-block">
                                                        <input name="plan_goal" type="text" style="display: none"
                                                               value="<?php echo $row['plan_goal'] ?>">
                                                        <input name="plan_check" type="text" style="display: none"
                                                               value="0">
                                                        <button type="submit" class="btn btn-danger"
                                                                id="tables_button tables_button_id"><span>X</span>
                                                        </button>
                                                    </form>

                                                </td>
                                                <td>
                                                    <form action="insert_ser" method="post">
                                                        <input name="delete_date" type="text" style="display: none"
                                                               value="<?php echo $row['plan_goal'] ?>">
                                                        <button type="submit" class="btn btn-danger">X</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
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
<!--<script src="assets/js/demo_1.js"></script>-->


<script>
    document.getElementById("date").innerHTML = m_d_today;
    document.getElementById("date_mon").innerHTML = m_today;
</script>

<script type="text/javascript">
    document.getElementById("Dday").innerHTML = Ddayy;
</script>

</html>
