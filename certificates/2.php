<?php
 ob_start();
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
	include_once("C://xampp/htdocs/extc/includes/connection.php");
	include_once('C://xampp/htdocs/extc/head.php'); 
	include_once('C://xampp/htdocs/extc/header.php'); 
	if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('C://xampp/htdocs/extc/sidebar_hod.php');

  }
  else
	  include_once('C://xampp/htdocs/extc/sidebar.php');
 
	//$sqlses = $_SESSION['sql'] ;
	//$mysqli=mysqli_query($conn,$sqlses);
	$mysqli = $conn;
	
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2014-07-1' && durationt<='2015-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res1=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2015-07-1' && durationt<='2016-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res2=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2016-07-1' && durationt<='2017-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res3=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2017-07-1' && durationt<='2018-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res4=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2018-07-1' && durationt<='2019-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res5=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2019-07-1' && durationt<='2020-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res6=$res->num_rows;
		
	}
	$sql1="SELECT * FROM invitedlec WHERE durationf>='2020-07-1' && durationt<='2021-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res7=$res->num_rows;
		
	}
 
$dataPoints = array( 
	array("y" => $res1, "label" => "2014-15" ),
	array("y" => $res2, "label" => "2015-16" ),
	array("y" => $res3, "label" => "2016-17" ),
	array("y" => $res4, "label" => "2017-18" ),
	array("y" => $res5, "label" => "2018-19" ),
	array("y" => $res6, "label" => "2019-20" ),
	array("y" => $res7, "label" => "2020-21" ),
	/*array("y" => $res7, "label" => "2021-22" ),
	array("y" => $res7, "label" => "2022-23" ),
	array("y" => $res7, "label" => "2023-24" )*/
);
 
?>

<!DOCTYPE HTML>
<html>
<head>

<div class="content-wrapper">
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h1 class="box-title">Charts</h1>
                </div><!-- /.box-header -->
				<div style="text-align:right">
								<a href="menu.php?menu=4 "> <u>Back to Invited for/Organised Guest Lecture Menu</u></a>
				</div><br><br>
				
				
				
				<br><br>
				<div id="chartContainer" style="height: 350px; width: 70%;align:right;"></div>
				<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Count of guest lecture activities"
	},
	axisY: {
		title: "Count of guest lectures"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## lecture(s)",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
				<!--<div class="box box-success"> -->
                <div class="box-header with-border">
                <!--  <h3 class="box-title">Bar Chart</h3>-->
                  <div class="box-tools pull-right">
                  </div>
                </div>
				<div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 300px;"></div>
                <!-- /.box-body -->
              <!-- </div><!-- /.box -->

</div>
</div>
</div>
</div>
</div>
</section>
</div>
</head>
<body>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
<?php include_once('C://xampp/htdocs/extc/footer.php'); ?>
</html>  