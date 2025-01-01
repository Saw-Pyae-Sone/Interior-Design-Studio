<?php
    include_once('connection.php');
    session_start();
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Index</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

   <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 150px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        }

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>

<body>
</body>

    <?php include_once("header.php"); ?>

     <div id="right-panel" class="right-panel">
        <!-- Header-->
         <?php include_once ('sidebar.php'); ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <?php
                                            $cyear = date("Y");

                                            $income = "SELECT SUM(Totalamount) as total_earnings
                                            FROM P_Order
                                            WHERE YEAR(O_Date) = '$cyear'
                                            AND Status = 'Confirmed'";
                                            $run = mysqli_query($con,$income);
                                            $get = mysqli_fetch_assoc($run);
                                        ?>
                                        <div class="text-left dib">
                                            <div class="stat-text">$<span class="count"><?php echo $get['total_earnings'] ?></span></div>
                                            <div class="stat-heading">Revenue</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <?php

                                            $sales = "SELECT COUNT(Order_ID) as Y_sales FROM P_Order WHERE YEAR(O_Date) = '$cyear'";
                                            $run = mysqli_query($con,$sales);
                                            $fetch = mysqli_fetch_assoc($run);
                                        ?>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $fetch['Y_sales'] ?></span></div>
                                            <div class="stat-heading">Sales</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <?php 
                                            $prod = "SELECT COUNT(*) as NP FROM ProductDetail";
                                            $run = mysqli_query($con,$prod);
                                            $gg = mysqli_fetch_assoc($run);
                                        ?>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $gg['NP']; ?></span></div>
                                            <div class="stat-heading">Product</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <?php
                                            $customer = "SELECT COUNT(*) as NCU FROM Customer";
                                            $run = mysqli_query($con,$customer);
                                            $take = mysqli_fetch_assoc($run);
                                        ?>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $take['NCU'];?></span></div>
                                            <div class="stat-heading">Clients</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                               <?php 
                                    $cyear = date("Y");
                                  
                                    $fetchP = "SELECT Name FROM ProductDetail";
                                    $resultP = mysqli_query($con,$fetchP);

                                    while($p = mysqli_fetch_assoc($resultP))
                                    {
                                    $pname = $p['Name'];

                                    $fetch = "
                                        SELECT COUNT(od.ProductDetail_ID) as Selling_Products, p.Name 
                                        FROM OrderDetail od, P_Order po, ProductDetail p 
                                        WHERE od.Order_ID = po.Order_ID AND od.ProductDetail_ID = p.ProductDetail_ID
                                        AND YEAR(po.O_Date) = '$cyear' AND p.Name = '$pname' AND po.Status = 'Confirmed' 
                                    ";

                                    $result = mysqli_query($con, $fetch);
                                    $r = mysqli_fetch_assoc($result);

                                      if($r['Selling_Products']>0)
                                      {
                                        $dataPoints[] = array('y' => $r['Selling_Products'], 'label' => array($r['Name']));
                                      }
                                    }
                                    sort($dataPoints);
                                ?>
                            
                                    <div id="chartContainer" style="height: 400px; width: 100%;"></div>

                           </div>
                           <div class="card-body">
                               <?php

                                    $income = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);

                                    foreach ($income as $key => $value)
                                    {
                                      $fetch = "SELECT SUM(Totalamount) as total_earnings
                                      FROM P_Order
                                      WHERE YEAR(O_Date) = '$cyear'
                                      AND Status = 'Confirmed'
                                      AND MONTH(O_Date) = '$key'";

                                      $run = mysqli_query($con,$fetch);
                                      $row = mysqli_fetch_assoc($run);
                                      if($row['total_earnings']>0)
                                        $income[$key] = $row['total_earnings'];
                                    }

                                    foreach($income as $key => $value)
                                    {
                                      $idataPoints[] = array('y' => $value, 'label' => date("M", mktime(0, 0, 0, $key)));
                                    }
                                ?>

                                    <div id="ichartContainer" style="height: 370px; width: 100%;"></div>

                           </div>
                           <div class="card-body">
                               <?php

                                    $income = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0);

                                    foreach ($income as $key => $value)
                                    {
                                      $fetch = "SELECT COUNT(Customer_ID) as C_Quantity FROM Customer WHERE  MONTH(C_Date) = $key AND YEAR(C_Date) = '$cyear'";

                                      $run = mysqli_query($con,$fetch);
                                      $row = mysqli_fetch_assoc($run);
                                      if($row['C_Quantity']>0)
                                        $income[$key] = $row['C_Quantity'];
                                    }

                                    foreach($income as $key => $value)
                                    {
                                      $ydataPoints[] = array('y' => $value, 'label' => date("M", mktime(0, 0, 0, $key)));
                                    }
                                ?>

                                <div id="ychartContainer" style="height: 400px; width: 100%;"></div>

                           </div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?php include_once("footer.php"); ?>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/init/weather-init.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!-- Chart Link -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- barchart -->
    <script>
    window.onload = function() {
         
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                text: "Most Selling Products"
            },
            axisY: {
                title: "Range of numbers",
                includeZero: true,
            },
            data: [{
                type: "bar",
                yValueFormatString: "# Times",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

        var chart = new CanvasJS.Chart("ychartContainer", {
            animationEnabled: true,
            theme: "light2",
            title:{
                text: " Yearly Customers "
            },
            axisY: {
                title: "Range"
            },
            data: [{
                type: "column",
                yValueFormatString: "# people",
                dataPoints: <?php echo json_encode($ydataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
         
         var chart = new CanvasJS.Chart("ichartContainer", {
           title: {
             text: "Yearly Earnings"
           },
           axisY: {
             title: "Price Range",
             prefix: "$"
           },
           axisX: {
             title: "Months"
           },
           data: [{
             type: "line",
             yValueFormatString: "$#,##0",
             dataPoints: <?php echo json_encode($idataPoints, JSON_NUMERIC_CHECK); ?>
           }]
         });
         chart.render();
          
         }
     </script>
    
</body>
</html>
