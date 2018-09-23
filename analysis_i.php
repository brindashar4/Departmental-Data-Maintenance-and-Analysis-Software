<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <title>AdminLTE 2 | Morris.js Charts</title> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Morris charts -->
    <link rel="stylesheet" href="../../plugins/morris/morris.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

<?php 
ob_start();

session_start();
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
 ?>
 
 <style>
	div.scroll {
		overflow:scroll;
	}
	</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Analysis</h3>
                </div><!-- /.box-header -->
				<div style="text-align:right">
								<a href="menu.php?menu=4 "> <u>Back to Invited for/Organised Guest Lecture Menu</u></a>
				</div>
                <!-- form start -->
              <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                  <div class="box-body">
						<div class="form-group col-md-2">
							<label for="type">Select Type:</label>
							<select required name='type' id='type' class='form-control input-lg'>
								<option value="Invited">Invited</option>
								<option value="Organised">Organised</option>
							</select>
						</div>
					 <div class="form-group col-md-2">
                        <label for="InputDateFrom">Date from :</label>
											<input required type="date" name="min_date">

						</div>
						<div class="form-group col-md-2">
 						<label for="InputDateTo">Date To :</label>
						<input required type="date" name="max_date">
                    </div>
                   
                   
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary" name="count_total" value = "Count Guest Lecture Activities"></input>
                   

                  </div>
				   <?php 
   							$display = 0;
							$Fac_ID = $_SESSION['Fac_ID'];	
							$a=0;
							$dateset=0;
							$flag=1;
							$count2 = 0;
							$count3 = 0;
							$set = 0;
							$_SESSION['count1'] = 0;
							$display_print = 0;
										$count = 0;			

						if(isset($_POST['count_total']))
						{
							
								if (!empty($_POST['min_date']) && !empty($_POST['max_date']))
								{
										$set = 1;
										if((strtotime($_POST['min_date']))>(strtotime($_POST['max_date'])))
										{
												$result="Incorrect date entered. Date from cannot be greater than Date to<br>";
												echo '<div class="error">'.$result.'</div>';
												$a=1;
												$dateset = 1;
										}
										
										if($a == 1)
										{	
											echo '<div class="error">'.$result.'</div>';
										}
													
								
										else if($dateset== 0 && $a == 0)
										{
											$_SESSION['from_date'] = $_POST['min_date'];
											$_SESSION['to_date'] = $_POST['max_date'];
										
										
											$from_date =  $_SESSION['from_date'] ;
											$to_date = $_SESSION['to_date'] ;
											if($_POST['type']=='Invited'){
											$sql1 = "select * from invitedlec where durationf >= '$from_date' and durationt <= '$to_date' and fac_id = $Fac_ID ";
											}
											else if($_POST['type']=='Organised'){
											$sql1 = "select * from guestlec where durationf >= '$from_date' and durationt <= '$to_date' and fac_id = $Fac_ID ";

											}
											$_SESSION['sql'] = $sql1;

											$display = 1;
										}
								}
								else
								{
									$result="Date fields cannot be empty<br>";
									echo '<div class="error">'.$result.'</div>';

								}
							$_SESSION['type'] = $_POST['type'];
								if($res1 = mysqli_query($conn,$sql1)){
									
									if(mysqli_num_rows($res1) > 0){
										$count = mysqli_num_rows($res1); 
									if($_POST['type']=='Invited'){ 

										?>
											
									

									<table  class='' id = 'example1'>
									<tr> 
												
												<td><strong>Total <?php echo " ".$_POST['type']." "."for Guest Lecture"." "; ?>Count is :</strong></td>
												<td><strong><?php echo " ".$count; ?></strong></td>

									</tr>	
							
						
								</table>
								
								 <div class="box-body">
								<div class="scroll">

									<table  class='table table-stripped table-bordered' id='example1'>

										<thead>
											<tr>
											<th>Duration from</th>
											<th>Duration to</th>
											<th>Invited by</th>
											<th>Topic</th>
											<th>As a resource person for</th>
											<th>Awards</th>				


											</tr>
											</thead>
			
								<?php	while($row = $res1->fetch_assoc()) 
									{   ?>
								
								

										<?php $topic = $row['topic'];
											$invited = $row['invited'];
											$durationf = $row['durationf'];
											$durationt = $row['durationt'];
											$resource = $row['res_type'];
											$award = $row['award'];
										$_SESSION['count1'] = mysqli_num_rows($res1);?>
									
										
					
										<?php 
										
										echo "<tr>"; 
										
										
										 
										echo "<td>$durationf </td>";
										echo "<td>$durationt </td>";
										echo "<td>$invited </td>";
										echo "<td>$topic </td>";
										echo "<td>$resource </td>";
										echo "<td>$award </td>";
										
										echo "</tr>";	?>
							
								
												

								<?php	}//while
								
									$display_print = 1;?>
									</table>
									</div>
									</div>
								<?php	}//invited
									
								else if($_POST['type']=='Organised'){ 

										?>
											
									

									<table  class='' id = 'example1'>
									<tr> 
												
												<td><strong>Total <?php echo " ".$_POST['type']." "."Guest Lecture"." "; ?>Count is :</strong></td>
												<td><strong><?php echo " ".$count; ?></strong></td>

									</tr>	
							
						
									</table>
								<?php	while($row = $res1->fetch_assoc()) 
									{   ?>
								
								
												<div class="scroll">

										<table  class='table table-stripped table-bordered' id='example1'>
										<?php $topic = $row['topic'];
											$durationf = $row['durationf'];
											$durationt = $row['durationt'];
											$o=$row['organisation'];
											$t = $row['targetaudience'];
										$_SESSION['count1'] = mysqli_num_rows($res1);?>
									
										<thead>
											<tr>
											<th>Topic</th>
											<th>Duration from</th>
											<th>Duration to</th>
											<th>Organised by</th>
											<th>Target Audience</th>
										

											</tr>
											</thead>
			
					
										<?php echo "<tr>"; 
										
										
										 
										
										echo "<td>$topic </td>";
										echo "<td>$durationf </td>";
										echo "<td>$durationt </td>";
										echo "<td>$o </td>";
										echo "<td>$t </td>";

										echo "</tr>";	?>
							
								</table>
							</div>
												

								<?php	}//while
								
									$display_print = 2;
									}//invited
								
								}//inner if
								else
										echo "No records to display";
								}//outer if		
								
						}
						
						
						
				if($display_print == 1 || $display_print == 2)
				{					?>	
				
				
			
               <a href="print_invited_org_guest.php" type="button" class="btn btn-primary" target="_blank">Print</a>
			   <?php 
					if($_POST['type']=='Invited'){	?>		   
				<a href='export_to_excel_invited.php' type='button' class="btn btn-primary" target='_blank'>Export To Excel</a>
				
					<?php }
					else if($_POST['type']=='Organised'){ ?>
				<a href='export_to_excel_organised.php' type='button' class="btn btn-primary" target='_blank'>Export To Excel</a>
				
					<?php } } ?>
				
			   </form>
			   </div>
			   </div>
			   </div>
			   </section>
			   </div>
			   
    
<?php include_once('footer.php'); ?>
</html>