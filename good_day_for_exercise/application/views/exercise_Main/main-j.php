<?php
if (isset($_SESSION["user_info"])) {
    $user_info = $_SESSION["user_info"];
} else {
    $user_info = false;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/public/js/vendor/jquery.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="/public/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="/public/icon/foundation-icons.css">
    <link rel="stylesheet" href="/public/css/foundation.min.css">
    <link rel="stylesheet" href="/public/css/foundation.css">
    <script src="/public/jquery-2.2.0/jquery-2.2.0.min.js"></script>
    <script>
        $(function () {

            $('#slide-submenu').on('click', function () {
                $(this).closest('.list-group').fadeOut('slide', function () {
                    $('.mini-submenu').fadeIn();
                });

            });

            $('.mini-submenu').on('click', function () {
                $(this).next('.list-group').toggle('slide');
                $('.mini-submenu').hide();
            })
        })

    </script>


    <style>
        @font-face {
            font-family: bokutachi;
            src: url('../../../public/fonts/bokutachi.otf'); format('truetype');
        }

        body {
        @import url(http://fonts.googleapis.com/css?family=Noto+Sans);
            overflow-y: hidden;
            font-family: 'Noto Sans', sans-serif;
        }

        .liquidFillGaugeText {
            font-family: Helvetica;
            font-weight: bold;
        }

        .menu_shadow:hover {
            text-decoration: none;
            text-shadow: 1px 1px #2d2d2d;
        }

        .mini-submenu {
            display: none;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid rgba(0, 0, 0, 0.9);
            border-radius: 4px;
            padding: 9px;
            /*position: relative;*/
            width: 42px;

        }

        .mini-submenu:hover {
            cursor: pointer;
        }

        .mini-submenu .icon-bar {
            border-radius: 1px;
            display: block;
            height: 2px;
            width: 22px;
            margin-top: 3px;
        }

        .mini-submenu .icon-bar {
            background-color: #000;
        }

        #slide-submenu {
            background: rgba(0, 0, 0, 0.45);
            display: inline-block;
            padding: 0 8px;
            border-radius: 4px;
            cursor: pointer;
        }
        .navbar-fat {
            position: absolute;
            background: -webkit-linear-gradient(0deg,rgba(0,0,0,0) 0,rgba(0,0,0,.5) 100%);
            background: linear-gradient(0deg,rgba(0,0,0,0) 0,rgba(0,0,0,.5) 100%);
            padding: 20px 60px 20px 20px;
        }
        .navbar-clean {
            background: 0 0;
        }
    </style>
</head>
<body>

<head>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="../../../public/img/main/mainPage-j.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="../../../public/img/main/mainPage2-j.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

        <div class="item">
            <img src="../../../public/img/main/mainPage3-j.jpg" alt="...">

            <div class="carousel-caption">
            </div>
        </div>

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="row expanded callout primary"
     style="border-color:#5f5f5f; background-color: #5f5f5f;">

    <div class="small-2 large-4 columns">
        <!--    <a href="/main_j/exercise_Plan"><p class="text-center" style="color : WHITE; font-size: 20px" ;">운동 계획</p></a>
     --> <a data-target="#layerpop" data-toggle="modal" class="menu_shadow">
            <p class="text-center"
               style="color : palevioletred; font-size: 33px; letter-spacing:-2px; font-family: bokutachi">
                <img src="../../../public/img/main/calendar.png">
                運動計画
            </p>
        </a>

        <div class="modal fade" id="layerpop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                                class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"style="font-family: bokutachi">運動計画</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <a class="selectPlan" href="/main_j/exercise_Plan">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/myself.jpg" style="height: 20%">

                                        <div class="caption">
                                            <h3 style="text-align: center;font-family: bokutachi;color: #337ab7">一人で計画を立てる</h3>

                                            <p class="lead" style="font-size: 23px;font-family: bokutachi">運動についての基本知識をお持ちですか。それでは、自分で運動計画を立ててみてください!</p>
                                        </div>
                                    </div>
                                </div>
                            </a>

                            <a class="selectPlan" href="/main_j/exercise_date">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail">
                                        <img src="/public/img/exercise/calendar.jpg" style="height: 20%">

                                        <div class="caption">
                                            <h3 style="text-align: center;font-family: bokutachi;color: #337ab7">運動の日にちを確認する</h3>

                                            <p class="lead" style="font-size: 23px;font-family: bokutachi">計画した運動の確認や、修正、削除などがしたいでしょうか?　ここでご確認ください!</p>
                                        </div>
                                    </div>
                                </div>
                            </a>


                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" style="font-family: bokutachi" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="small-2 large-4 columns">
        <a href="/main_j/exercise_Go" class="menu_shadow">
            <p class="text-center"
               style="letter-spacing:-2px; color: palevioletred; font-size: 33px; font-family: bokutachi">
                <img src="../../../public/img/main/exericseStart.png">
                運動開始
            </p>
        </a>
    </div>

    <div class="small-2 large-4 columns">
        <a href="/main_j/exercise_Bodycheck" class="menu_shadow">
            <p class="text-center"
               style="color : palevioletred; font-size: 33px; letter-spacing:-2px;  font-family: bokutachi">
                <img src="../../../public/img/main/chart.png">
                運動記録</p>
        </a>
    </div>
</div>

<script src="/public/graph/highcharts.js" language="JavaScript"></script>
<script src="/public/graph/drilldown.js" language="JavaScript"></script>

<script src="/public/js/bootstrap.min.js"></script>

</body>

</html>