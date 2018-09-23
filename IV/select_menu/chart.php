<?php
 ob_start();
//session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
	include_once("includes/connection.php");
	include_once('head.php'); 
	include_once('header.php'); 
	if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('sidebar_hod.php');

  }
  else
	  include_once('sidebar.php');
 
	//$sqlses = $_SESSION['sql'] ;
	//$mysqli=mysqli_query($conn,$sqlses);
	
 
?>

<!DOCTYPE HTML>
<html>
<head>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!--<style>
	div.scroll {
		overflow:scroll;
	}
	</style>-->
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
								<a href="menu.php?menu=4 "> <u>Back to Industrial Visit Attended/Organised Activities Menu</u></a>
				</div><br>
				
				<form name="form1" method="post" action="http://localhost/extc/IV.php?x=IV/select_menu/chart.php" >
                  <div class="box-body">
						<div class="form-group col-md-2">
							<label for="type">Select Type:</label>
							<select required name='type' id='type' class='form-control input-lg'>
								<option value="Attended">Attended</option>
								<option value="Organised">Organised</option>
							</select>
						<br>
                    <input type="submit" class="btn btn-primary" name="disp" value = "Display chart" style="height:40px; width:120px ; font-size:18px"></input></div><br><br>
					<?php 
					if(isset($_POST['disp'])) {
						if($_POST['type']=='Organised'){
?>                   <?php 
$mysqli = $conn;
	$sql11="SELECT * FROM iv_organized WHERE t_from>='2014-07-1' && t_to<='2015-6-30'";
	if($res = $mysqli->query($sql11)) {
		
			$res11=$res->num_rows;
		    $temp[0]= array("y" => $res11, "label" => "2014-15" );  
	}
	$sql12="SELECT * FROM iv_organized WHERE t_from>='2015-07-1' && t_to<='2016-6-30'";
	if($res = $mysqli->query($sql12)) {
		
			$res22=$res->num_rows;
			$temp[1]= array("y" => $res22, "label" => "2015-16" );
		
	}
	$sql13="SELECT * FROM iv_organized WHERE t_from>='2016-07-1' && t_to<='2017-6-30'";
	if($res = $mysqli->query($sql13)) {
		
			$res33=$res->num_rows;
			$temp[2]= array("y" => $res33, "label" => "2016-17" );
		
	}
	$sql14="SELECT * FROM iv_organized WHERE t_from>='2017-07-1' && t_to<='2018-6-30'";
	if($res = $mysqli->query($sql14)) {
		
			$res44=$res->num_rows;
			$temp[3]= array("y" => $res44, "label" => "2017-18" );
		
	}
	$sql15="SELECT * FROM iv_organized WHERE t_from>='2018-07-1' && t_to<='2019-6-30'";
	if($res = $mysqli->query($sql15)) {
		
			$res55=$res->num_rows;
            $temp[4]= array("y" => $res55, "label" => "2018-19" );		
	}
	$sql16="SELECT * FROM iv_organized WHERE t_from>='2019-07-1' && t_to<='2020-6-30'";
	if($res = $mysqli->query($sql16)) {
		
			$res66=$res->num_rows;
		    $temp[5]= array("y" => $res66, "label" => "2019-20" );
	}
	$sql17="SELECT * FROM iv_organized WHERE t_from>='2020-07-1' && t_to<='2021-6-30'";
	if($res = $mysqli->query($sql17)) {
		
			$res77=$res->num_rows;
		    $temp[6]= array("y" => $res77, "label" => "2020-21" );
	}
	
	$dataPoints = array(array("y" => $res11, "label" => "2014-15" ));
	$z= idate ('Y');
	$z= $z - 2014;
    for ($x=1;$x<$z;$x++)
	{
	   array_push ($dataPoints,$temp[$x]);	
	}


	?>

                <br><br><br>
				<h2> Industrial Visits Organised </h2>
				<br>
				<div id="chartContainer" style="height: 350px; width: 70%"></div>
				<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: " "
	},
	axisY: {
		title: "Count of organised IV"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## IV(s)",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
chart = {};

}
</script>
				<!--<div class="box box-success"> -->
                <div class="box-header with-border">
                <!--  <h3 class="box-title">Bar Chart</h3>-->
                  <div class="box-tools pull-right">
                  </div>
                </div>
				<div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 100px;"></div>
                <!-- /.box-body -->
              <!-- </div><!-- /.box -->

</div> 
						<?php } 
						else if($_POST['type']=='Attended'){ ?>
<?php
 ob_start();
//session_start();
/*if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
	include_once("includes/connection.php");
	include_once('head.php'); 
	include_once('header.php'); 
	if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('sidebar_hod.php');

  }
  else
	  include_once('sidebar.php');*/
 
	//$sqlses = $_SESSION['sql'] ;
	//$mysqli=mysqli_query($conn,$sqlses);
	$mysqli = $conn;
	
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2014-07-1' && t_to<='2015-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res1=$res->num_rows;
			$temp[0]= array("y" => $res1, "label" => "2014-15" );
		
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2015-07-1' && t_to<='2016-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res2=$res->num_rows;
		    $temp[1]= array("y" => $res2, "label" => "2015-16" );
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2016-07-1' && t_to<='2017-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res3=$res->num_rows;
			$temp[2]= array("y" => $res3, "label" => "2016-17" );
		
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2017-07-1' && t_to<='2018-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res4=$res->num_rows;
			$temp[3]= array("y" => $res4, "label" => "2017-18" );
		
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2018-07-1' && t_to<='2018-12-31'";
	if($res = $mysqli->query($sql1)) {
		
			$res5=$res->num_rows;
			$temp[4]= array("y" => $res5, "label" => "2018-19" );
		
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2019-01-1' && t_to<='2019-12-31'";
	if($res = $mysqli->query($sql1)) {
		
			$res6=$res->num_rows;
		    $temp[5]= array("y" => $res6, "label" => "2019-20" );
	}
	$sql1="SELECT * FROM iv_attended WHERE t_from>='2020-01-1' && t_to<='2020-12-31'";
	if($res = $mysqli->query($sql1)) {
		
			$res7=$res->num_rows;
		    $temp[6]= array("y" => $res7, "label" => "2020-21" );
	}
 
	 $dataPoints = array(array("y" => $res1, "label" => "2014-15" ));
	$z= idate ('Y');
	$z= $z - 2014;
    for ($x=1;$x<$z;$x++)
	{
	   array_push ($dataPoints,$temp[$x]);	
	} 
 
?>

<br><br><br>
				<h2> Industrial Visits Attended </h2>
				<br>
				<div id="chartContainer" style="height: 350px; width: 70%"></div>
				<!--<div class="box box-success"> -->
				<script>
window.onload = function() {
	var chart1 = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: " "
	},
	axisY: {
		title: "Count of attended IV"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## IV(s)",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart1.render();
}
</script>
                <div class="box-header with-border">
                <!--  <h3 class="box-title">Bar Chart</h3>-->
                  <div class="box-tools pull-right">
                  </div>
                </div>
				<div class="box-body chart-responsive">
                  <div class="chart" id="bar-chart" style="height: 100px;"></div>
                <!-- /.box-body -->
               
					<?php }} ?>

</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
<?php include_once('footer.php'); ?>

</head>
</html>

