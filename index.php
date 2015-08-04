<!DOCTYPE html>
<?php require "Scripts/logFile.php" ?>
<?php
    $result = mysqli_query($conn,"SELECT * FROM readings ORDER BY time_server DESC LIMIT 1");
    $resultsArray = mysqli_fetch_array($result);
?>
<html>
    <head>
        <title>Automated Climate Control System</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <!--navbar starts-->
        <?php require "Scripts/navbar.php";?>
        <!--/navbar ends-->
        <div class="container-fluid">
            <div class="row-fluid">
                <!--sidebar starts-->
                <?php require "Scripts/sidebar.php";?>
                <!--/sidebar ends-->
                <div class="span9" id="content">
                    <div class="row-fluid">
                        <div class='alert alert-success'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <h4>Logged In Successfully</h4>
                            </div>
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                </ul>
                            	</div>
                        	</div>
                    	</div>

                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">CurrentTemperature</div>
                                    <div class="pull-right"><span class="badge badge-info"> </span>

                                    </div>
                                </div>
                                <div class="block-content collapse in" style="margin-left: 160px">
                                    <div class="span3">
                                        <div class="chart" data-percent=" <?php echo $resultsArray['temp'];?>"><?php echo $resultsArray['temp']." C"; ?></div>
                                        <div class="chart-bottom-heading"><span class="label label-info"></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                       </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Target Temperature</div>
                                    <div class="pull-right"><span class="badge badge-info"></span>
                                    </div>
                                </div>
                                <div class="block-content collapse in" style="margin-left: 160px">
                                    <div class="span3">
                                        <div class="chart" data-percent=" <?php echo $resultsArray['humidity'];?> "><?php echo $resultsArray['humidity']."%";?></div>
                                        <div class="chart-bottom-heading"><span class="label label-info"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Current Humidity</div>
                                    <div class="pull-right"><span class="badge badge-info"> <?php echo ""; ?></span>

                                    </div>
                                </div>
                                <div class="block-content collapse in" style="margin-left: 160px">
                                    <div class="span3">
                                        <div class="chart" data-percent=" <?php echo $resultsArray['humidity'];?> "><?php echo $resultsArray['humidity']."%";?></div>
                                        <div class="chart-bottom-heading"><span class="label label-info"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Current Luminosity</div>
                                    <div class="pull-right"><span class="badge badge-info"><?php echo ""; ?></span>
                                    </div>
                                </div>
                                <div class="block-content collapse in" style="margin-left: 160px">
                                    <div class="span3">
                                        <div class="chart" data-percent="<?php echo $resultsArray['luminosity'];?> "><?php echo $resultsArray['luminosity']." lux";?></div>
                                        <div class="chart-bottom-heading"><span class="label label-info"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <!--Past readings Starts -->
                    <div class="row-fluid">
                        <!-- morris stacked chart Starts-->
                        <div class="row-fluid">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Latest Temperature Readings</div>
                                    <div class="pull-right"><span class="badge badge-warning">-</span>
                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <div id="hero-area" style="height: 250px;"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <!-- morris stacked chart Ends-->
                    </div>
                    <!--Past readings Ends -->
                </div>
            </div>
            <?php require "Scripts/footer.php"; ?>
        </div>
        <!--/.fluid-container-->
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/scripts.js"></script>
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="assets/scripts.js"></script>
        <link rel="stylesheet" href="vendors/morris/morris.css">
        <script src="vendors/jquery.knob.js"></script>
        <script src="vendors/raphael-min.js"></script>
        <script src="vendors/morris/morris.min.js"></script>
        <script src="vendors/flot/jquery.flot.js"></script>
        <script src="vendors/flot/jquery.flot.categories.js"></script>
        <script src="vendors/flot/jquery.flot.pie.js"></script>
        <script src="vendors/flot/jquery.flot.time.js"></script>
        <script src="vendors/flot/jquery.flot.stack.js"></script>
        <script src="vendors/flot/jquery.flot.resize.js"></script>
        <script>
            $(function() {
                // Easy pie charts
                $('.chart').easyPieChart({animate: 1000});
            });
        </script>

        <?php  //access db and take readings
        $x = 0;

        $result = mysqli_query($conn,"SELECT * FROM readings ORDER BY time_server DESC LIMIT 5");
        $resultsArray = mysqli_fetch_array($result);
        $rowCount = $result->num_rows;

        $strData = "<script>
                    $(function() {
                    // Morris Area Chart
                    Morris.Area({
                    element: 'hero-area',
                    data: [";
        while($resultsArray = mysqli_fetch_array($result)){
            $strData .= "{period: '".$resultsArray['time_server']."', temperature: ".$resultsArray['temp']."}";
            if($x != $rowCount){
                $strData .= ",";
            }
            $x++;
        }
        $strData .="],
                    xkey: 'period',
                    ykeys: ['temperature'],
                    labels: ['temperature'],
                    lineWidth: 2,
                    hideHover: 'auto',
                    lineColors: ['#67bdf8']
                });
            });
            </script>";
        echo $strData;
        echo $rowCount;
        echo $x;
        mysqli_free_result($result);
        ?>
    </body>
    <?php
     /*
      * {period: '2011-1-1', temperature: 2666, humidity: null, luminosity: 2647},
        {period: '2011-1-2', temperature: 2778, humidity: 2294, luminosity: 2441},
        {period: '2011-1-3', temperature: 4912, humidity: 1969, luminosity: 2501},
        {period: '2011-1-3', temperature: 4912, humidity: 1969, luminosity: 2501},
        {period: '2011-1-4', temperature: 3767, humidity: 3597, luminosity: 5689},
        {period: '2011-1-5', temperature: 6810, humidity: 1914, luminosity: 2293},
        {period: '2011-1-6', temperature: 5670, humidity: 4293, luminosity: 1881},
        {period: '2011-1-7', temperature: 4820, humidity: 3795, luminosity: 1588},
        {period: '2011-1-8', temperature: 15073,humidity: 5967, luminosity: 5175},
        {period: '2011-1-9', temperature: 10687,humidity: 4460, luminosity: 2028},
        {period: '2011-1-10',temperature: 8432,humidity: 5713, luminosity: 1791}
     $(function() {
                // Morris Area Chart
                Morris.Area({
                    element: 'hero-area',
                    data: [
                        {period: '2011-1-1 11:01:00', temperature: 26, humidity: 25, luminosity: 16},
                        {period: '2011-1-1 11:01:30', temperature: 27, humidity: 22, luminosity: 14},
                        {period: '2011-1-1 11:03:00', temperature: 29, humidity: 19, luminosity: 15},
                        {period: '2011-1-1 11:04:00', temperature: 29, humidity: 19, luminosity: 15},
                        {period: '2011-1-1 11:05:00', temperature: 27, humidity: 25, luminosity: 16},
                        {period: '2011-1-1 11:06:00', temperature: 28, humidity: 19, luminosity: 12},
                        {period: '2011-1-1 11:07:00', temperature: 26, humidity: 22, luminosity: 18},
                        {period: '2011-1-1 11:08:00', temperature: 28, humidity: 27, luminosity: 15},
                        {period: '2011-1-1 11:09:00', temperature: 25, humidity: 19, luminosity: 15},
                        {period: '2011-1-1 11:10:00', temperature: 20, humidity: 24, luminosity: 12},
                        {period: '2011-1-1 11:11:00', temperature: 28, humidity: 27, luminosity: 17}
                   {period: '2011-1-1 11:01:30', temperature: 27},
                        {period: '2011-1-1 11:03:00', temperature: 29},
                        {period: '2011-1-1 11:04:00', temperature: 29},
                        {period: '2011-1-1 11:05:00', temperature: 27},
                        {period: '2011-1-1 11:06:00', temperature: 28},
                        {period: '2011-1-1 11:07:00', temperature: 26},
                        {period: '2011-1-1 11:08:00', temperature: 28},
                        {period: '2011-1-1 11:09:00', temperature: 25},
                        {period: '2011-1-1 11:10:00', temperature: 20},
                        {period: '2011-1-1 11:11:00', temperature: 28}
                    ],
                    xkey: 'period',
                    ykeys: ['temperature', 'humidity', 'luminosity'],
                    labels: ['temperature', 'humidity', 'luminosity'],
                    lineWidth: 1,
                    hideHover: 'auto',
                    lineColors: ["#81d5d9", "#a6e182", "#67bdf8"]
                });
            });
      *
      *
      *
      *
      *
      * this works
      echo "<script>
            $(function() {
                // Morris Area Chart
                Morris.Area({
                    element: 'hero-area',
                    data: [
                        {period: '".$resultsArray['time_workstation']."', temperature: ".$resultsArray['temp']."}
                    ],
                    xkey: 'period',
                    ykeys: ['temperature'],
                    labels: ['temperature'],
                    lineWidth: 2,
                    hideHover: 'auto',
                    lineColors: ['#67bdf8']
                });
            });
            </script>";
      */
    ?>
</html>