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

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="assets/css/demo.css" rel="stylesheet"/>
    <link rel="stylesheet" href="assets/css/menubar.css">
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
                <li style="text-align: center">
                    <!--<a href="javascript:menuClick('insert');">-->
                    <a href="insert">
                        <i class="now-ui-icons arrows-1_minimal-right" style="padding-left: 20%; font-size: 30px;"></i>
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
                <li class="active" style="text-align: center">
                    <!--<a href="javascript:menuClick('evaluation');">-->
                    <a href="evaluation">
                        <i class="now-ui-icons education_atom" style="padding-left: 29%; font-size: 30px;"></i>
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
                    <a class="navbar-brand" href="#pablo">총 평가</a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                    <span style="display: none;" class="navbar-toggler-bar navbar-kebab"></span>
                </button>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="panel-header panel-header-lg">
            <canvas id="bigDashboardChart"></canvas>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-md-11" style="padding-left: 4%">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">&nbsp;월 별 총 공부 시간 / 실행 유무</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary" style="font-family: NanumR_B">
                                    <th>
                                        월
                                    </th>
                                    <th>
                                        올린 계획 수
                                    </th>
                                    <th>
                                        완료 수
                                    </th>
                                    <th>
                                        평균
                                    </th>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $conn = new mysqli("localhost", "root", "xhdka2256", "webpro");
                                    $sql = "SELECT * FROM plan_sum ORDER BY plan_sum_number DESC";
                                    $result = $conn->query($sql);
                                    $jan = 0;
                                    $feb = 0;
                                    $mar = 0;
                                    $apr = 0;
                                    $may = 0;
                                    $jun = 0;

                                    $jan_okok = 0;
                                    $feb_okok = 0;
                                    $mar_okok = 0;
                                    $apr_okok = 0;
                                    $may_okok = 0;
                                    $jun_okok = 0;

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['plan_month'] == '01') {
                                            $jan += $row['plan_amount'];
                                            $jan_okok += $row['plan_ok'];

                                        } else if ($row['plan_month'] == '02') {
                                            $feb += $row['plan_amount'];
                                            $feb_okok += $row['plan_ok'];

                                        } else if ($row['plan_month'] == '03') {
                                            $mar += $row['plan_amount'];
                                            $mar_okok += $row['plan_ok'];

                                        } else if ($row['plan_month'] == '04') {
                                            $apr += $row['plan_amount'];
                                            $apr_okok += $row['plan_ok'];

                                        } else if ($row['plan_month'] == '05') {
                                            $may += $row['plan_amount'];
                                            $may_okok += $row['plan_ok'];

                                        } else if ($row['plan_month'] == '06') {
                                            $jun += $row['plan_amount'];
                                            $jun_okok += $row['plan_ok'];

                                        }
                                    }
                                    ?>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">1월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $jan ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $jan_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($jan_okok/$jan * 100, 0, 5) ?></p>
                                        </td>
                                    </tr>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">2월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $feb ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $feb_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($feb_okok/$feb * 100, 0, 5) ?></p>
                                        </td>
                                    </tr>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">3월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $mar ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $mar_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($mar_okok/$mar * 100, 0, 5)?></p>
                                        </td>
                                    </tr>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">4월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $apr ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $apr_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($apr_okok/$apr * 100, 0, 5)?></p>
                                        </td>
                                    </tr>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">5월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $may ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $may_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($may_okok/$may * 100, 0, 5)?></p>
                                        </td>
                                    </tr>
                                    <tr style="font-family: NanumR_R">
                                        <td style="width: 10%">
                                            <p style="width: 80%;">6월</p>
                                        </td>
                                        <td style="width: 40%">
                                            <p style="width: 90%;">
                                                <?php echo $jun ?></p>
                                        </td>
                                        <td style="width: 20%">
                                            <p style="width: 90%;">
                                                <?php echo $jun_okok ?></p>
                                        </td>
                                        <td>
                                            <p style="width: 50%;">
                                                <?php echo substr($jun_okok/$jun * 100, 0, 5)?></p>
                                        </td>
                                    </tr>

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
<?php

$conn_ = new mysqli("localhost", "root", "xhdka2256", "webpro");
$sql_ = "SELECT * FROM plan_sum ORDER BY 'plan_sum_number' DESC;";
$result_gul = $conn_->query($sql_);

//1월
$ok_jan = 0;
$amount_jan = 0;
//2월
$ok_feb = 0;
$amount_feb = 0;
//3월
$ok_mar = 0;
$amount_mar = 0;
//4월
$ok_apr = 0;
$amount_apr = 0;
//5월
$ok_may = 0;
$amount_may = 0;
//6월
$ok_jun = 0;
$amount_jun = 0;
//7월
$ok_jul = 0;
$amount_jul = 0;
//8월
$ok_aug = 0;
$amount_aug = 0;
//9월
$ok_sep = 0;
$amount_sep = 0;
//10월
$ok_oct = 0;
$amount_oct = 0;
//11월
$ok_nov = 0;
$amount_nov = 0;
//12월
$ok_dec = 0;
$amount_dec = 0;

while ($data = mysqli_fetch_array($result_gul)) {
    if ($data['plan_month'] == '01') {
        $amount_jan += $data['plan_amount'];
        $ok_jan += $data['plan_ok'];
    } else if ($data['plan_month'] == '02') {
        $amount_feb += $data['plan_amount'];
        $ok_feb += $data['plan_ok'];
    } else if ($data['plan_month'] == '03') {
        $amount_mar += $data['plan_amount'];
        $ok_mar += $data['plan_ok'];
    } else if ($data['plan_month'] == '04') {
        $amount_apr += $data['plan_amount'];
        $ok_apr += $data['plan_ok'];
    } else if ($data['plan_month'] == '05') {
        $amount_may += $data['plan_amount'];
        $ok_may += $data['plan_ok'];
    } else if ($data['plan_month'] == '06') {
        $amount_jun += $data['plan_amount'];
        $ok_jun += $data['plan_ok'];
    } else if ($data['plan_month'] == '07') {
        $amount_jul += $data['plan_amount'];
        $ok_jul += $data['plan_ok'];
    } else if ($data['plan_month'] == '08') {
        $amount_aug += $data['plan_amount'];
        $ok_aug += $data['plan_ok'];
    } else if ($data['plan_month'] == '09') {
        $amount_sep += $data['plan_amount'];
        $ok_sep += $data['plan_ok'];
    } else if ($data['plan_month'] == '10') {
        $amount_oct += $data['plan_amount'];
        $ok_oct += $data['plan_ok'];
    } else if ($data['plan_month'] == '11') {
        $amount_nov += $data['plan_amount'];
        $ok_nov += $data['plan_ok'];
    } else if ($data['plan_month'] == '12') {
        $amount_dec += $data['plan_amount'];
        $ok_dec += $data['plan_ok'];
    }
};

$jan_re = $ok_jan / $amount_jan * 100;
$feb_re = $ok_feb / $amount_feb * 100;
$mar_re = $ok_mar / $amount_mar * 100;
$apr_re = $ok_apr / $amount_apr * 100;
$may_re = $ok_may / $amount_may * 100;
$jun_re = $ok_jun / $amount_jun * 100;
$jul_re = $ok_jul / $amount_jul * 100;
$aug_re = $ok_aug / $amount_aug * 100;
$sep_re = $ok_sep / $amount_sep * 100;
$oct_re = $ok_oct / $amount_oct * 100;
$nov_re = $ok_nov / $amount_nov * 100;
$dec_re = $ok_dec / $amount_dec * 100;
?>
<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script>
    demo = {
        initPickColor: function () {
            $('.pick-class-label').click(function () {
                var new_class = $(this).attr('new-class');
                var old_class = $('#display-buttons').attr('data-class');
                var display_div = $('#display-buttons');
                if (display_div.length) {
                    var display_buttons = display_div.find('.btn');
                    display_buttons.removeClass(old_class);
                    display_buttons.addClass(new_class);
                    display_div.attr('data-class', new_class);
                }
            });
        },

        initDocChart: function () {
            chartColor = "#FFFFFF";

            // General configuration for the charts with Line gradientStroke
            gradientChartOptionsConfiguration = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                layout: {
                    padding: {left: 0, right: 0, top: 15, bottom: 15}
                }
            };

        },

        initDashboardPageCharts: function () {

            chartColor = "#FFFFFF";

            // General configuration for the charts with Line gradientStroke
            gradientChartOptionsConfiguration = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                responsive: 1,
                scales: {
                    yAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                layout: {
                    padding: {left: 0, right: 0, top: 15, bottom: 15}
                }
            };

            gradientChartOptionsConfigurationWithNumbersAndGrid = {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    bodySpacing: 4,
                    mode: "nearest",
                    intersect: 0,
                    position: "nearest",
                    xPadding: 10,
                    yPadding: 10,
                    caretPadding: 10
                },
                responsive: true,
                scales: {
                    yAxes: [{
                        gridLines: 0,
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawBorder: false
                        }
                    }],
                    xAxes: [{
                        display: 0,
                        gridLines: 0,
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            zeroLineColor: "transparent",
                            drawTicks: false,
                            display: false,
                            drawBorder: false
                        }
                    }]
                },
                layout: {
                    padding: {left: 0, right: 0, top: 15, bottom: 15}
                }
            };

            var ctx = document.getElementById('bigDashboardChart').getContext("2d");

            var gradientStroke = ctx.createLinearGradient(500, 0, 100, 0);
            gradientStroke.addColorStop(0, '#80b6f4');
            gradientStroke.addColorStop(1, chartColor);

            var gradientFill = ctx.createLinearGradient(0, 200, 0, 20);
            gradientFill.addColorStop(0, "rgba(128, 182, 244, 0)");
            gradientFill.addColorStop(1, "rgba(255, 255, 255, 0.24)");

            var jan_re = <?php echo substr($jan_re, 0, 5) ?>;
            var feb_re = <?php echo substr($feb_re, 0, 5) ?>;
            var mar_re = <?php echo substr($mar_re, 0, 5) ?>;
            var apr_re = <?php echo substr($apr_re, 0, 5) ?>;
            var may_re = <?php echo substr($may_re, 0, 5) ?>;
            var jun_re = <?php echo substr($jun_re, 0, 5) ?>;


            /*var asdf_1 = "var jun_re = <?php echo substr($jun_re, 0, 5) ?>;"*/
            var asdf_1 = "var jul_re = <?php echo substr($jul_re, 0, 5) ?>;"
            var asdf_1 = "var aug_re = <?php echo substr($aug_re, 0, 5) ?>;"
            var asdf_1 = "var sep_re = <?php echo substr($sep_re, 0, 5) ?>;"
            var asdf_1 = "var oct_re = <?php echo substr($oct_re, 0, 5) ?>;"
            var asdf_1 = "var nov_re = <?php echo substr($nov_re, 0, 5) ?>;"
            var asdf_1 = "var dec_re = <?php echo substr($dec_re, 0, 5) ?>;"

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC", "GOAL"],
                    datasets: [{
                        label: "Data",
                        borderColor: chartColor,
                        pointBorderColor: chartColor,
                        pointBackgroundColor: "#1e3d60",
                        pointHoverBackgroundColor: "#1e3d60",
                        pointHoverBorderColor: chartColor,
                        pointBorderWidth: 1,
                        pointHoverRadius: 7,
                        pointHoverBorderWidth: 2,
                        pointRadius: 5,
                        fill: true,
                        backgroundColor: gradientFill,
                        borderWidth: 2,
                        data: [jan_re, feb_re, mar_re, apr_re, may_re, jun_re, 0, 0, 0, 0, 0, 0, 100]
                    }]
                },
                options: {
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 0,
                            bottom: 0
                        }
                    },
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: '#fff',
                        titleFontColor: '#333',
                        bodyFontColor: '#666',
                        bodySpacing: 4,
                        xPadding: 12,
                        mode: "nearest",
                        intersect: 0,
                        position: "nearest"
                    },
                    legend: {
                        position: "bottom",
                        fillStyle: "#FFF",
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                fontColor: "rgba(255,255,255,0.4)",
                                fontStyle: "bold",
                                beginAtZero: true,
                                maxTicksLimit: 5,
                                padding: 10
                            },
                            gridLines: {
                                drawTicks: true,
                                drawBorder: false,
                                display: true,
                                color: "rgba(255,255,255,0.1)",
                                zeroLineColor: "transparent"
                            }

                        }],
                        xAxes: [{
                            gridLines: {
                                zeroLineColor: "transparent",
                                display: false,

                            },
                            ticks: {
                                padding: 10,
                                fontColor: "rgba(255,255,255,0.4)",
                                fontStyle: "bold"
                            }
                        }]
                    }
                }
            });
        },

        initGoogleMaps: function () {
            var myLatlng = new google.maps.LatLng(40.748817, -73.985428);
            var mapOptions = {
                zoom: 13,
                center: myLatlng,
                scrollwheel: false, //we disable de scroll over the map, it is a really annoing when you scroll through page
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{"color": "#dedede"}, {"lightness": 21}]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
                }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
                }]
            };

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title: "Hello World!"
            });

            // To add the marker to the map, call setMap();
            marker.setMap(map);
        },

        showNotification: function (from, align) {
            color = 'primary';

            $.notify({
                icon: "now-ui-icons ui-1_bell-53",
                message: "Welcome to <b>Now Ui Dashboard Pro</b> - a beautiful freebie for every web developer."

            }, {
                type: color,
                timer: 8000,
                placement: {
                    from: from,
                    align: align
                }
            });
        }

    };

</script>
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
</html>
