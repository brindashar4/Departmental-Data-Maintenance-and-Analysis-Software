<?php 
ob_start();

session_start();
 if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
include_once("includes/connection.php");


include_once('head.php'); ?>
<?php include_once('header.php'); ?>
<?php 
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
                  <h3 class="box-title">Guest Lectures Invited for/Organised Analysis</h3>
                </div><!-- /.box-header -->
				<div style="text-align:right">
								<a href="menu.php?menu=4 "> <u>Back to Invited for/Organised Guest Lecture Menu</u></a>
				</div>
                <!-- form start -->
              <form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <div class="box-body">
				  <div class="form-group col-md-12">
                    <div class="form-group col-md-2">
						   <label for="InputName">Enter faculty's name :</label>
						<input type="text" placeholder="" name="fn">
                    </div>
                   
					<div class="form-group col-md-2">
                        <label for="InputDateFrom">Date from :</label>
					<input type="date" name="min_date">
					</div>
					<div class="form-group col-md-2">
 						<label for="InputDateTo">Date To :</label>
						<input type="date" name="max_date"></p>
					</div>
					<div class="form-group col-md-2">
							<label for="type">Select Type:</label>
							<select required name='type' id='type' class='form-control input-lg'>
								<option value="Invited">Invited</option>
								<option value="Organised">Organised</option>
							</select>
						</div>
                   </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <input type="submit" class="btn btn-primary" name="count" value = "Count lectures"></input>
                            <a href="view_invited_hod_lec.php" type="button" class="btn btn-primary">Back to View Mode </a><br>
           
 
                  </div>
				   		
						   <?php 
						  
   							$display = 0;
							$Fac_ID = $_SESSION['Fac_ID'];	
							$a=0;
							
							$dateset=0;
							$flag=1;
							
							$count = 0;
							$set = 0;
							
											

						if(isset($_POST['count']))
						{
							 $_SESSION['type'] = $_POST['type'];
							//searching datewise
								if (!empty($_POST['min_date']) && !empty($_POST['max_date']) && empty($_POST['fn']))
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
												$sql1 = $sql1 = "SELECT * from invitedlec inner join facultydetails on invitedlec.fac_id = facultydetails.Fac_ID  and  invitedlec.durationf >= '$from_date' and invitedlec.durationt <= '$to_date' ";
											}
											else if($_POST['type']=='Organised'){
												$sql1 = $sql1 = "SELECT * from guestlec inner join facultydetails on guestlec.fac_id = facultydetails.Fac_ID  and  guestlec.durationf >= '$from_date' and guestlec.durationt <= '$to_date' ";
										
											}
											$_SESSION['sql'] = $sql1;
											$display = 1;
											$_SESSION['display'] = $display;
										}
								}
							//searching namewise

								else if (!empty($_POST['fn']) && empty($_POST['min_date']) && empty($_POST['max_date'])) 
								{

										$sname=$_POST['fn'];
										if($_POST['type']=='Invited'){
										$sql1 = "SELECT * from invitedlec inner join facultydetails on invitedlec.fac_id = facultydetails.Fac_ID and facultydetails.F_NAME like '%$sname%' ";
										}
										else if($_POST['type']=='Organised'){
											$sql1 = "SELECT * from guestlec inner join facultydetails on guestlec.fac_id = facultydetails.Fac_ID and facultydetails.F_NAME like '%$sname%' ";
										
										}
										$_SESSION['sql'] = $sql1;
								 $display = 2;
								$_SESSION['display'] = $display;
								}
								
								
							//searching name and datewise

								else if (!empty($_POST['min_date']) && !empty($_POST['max_date'])&& !empty($_POST['fn']))
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
											
											$sname=$_POST['fn'];
											if($_POST['type']=='Invited'){
												$sql1 = "SELECT * from invitedlec inner join facultydetails on invitedlec.fac_id = facultydetails.Fac_ID and facultydetails.F_NAME like '%$sname%' and  invitedlec.durationf >= '$from_date' and invitedlec.durationt <= '$to_date' ";
											}
											else if($_POST['type']=='Organised'){
												$sql1 = "SELECT * from guestlec inner join facultydetails on guestlec.fac_id = facultydetails.Fac_ID and facultydetails.F_NAME like '%$sname%' and  guestlec.durationf >= '$from_date' and guestlec.durationt <= '$to_date' ";
											
											}
											$_SESSION['sql'] = $sql1;

											$display = 3;
											$_SESSION['display'] = $display;
										}
								}
								else if (empty($_POST['min_date']) && empty($_POST['max_date'])&& empty($_POST['fn']))

								{
									$result="<strong>Please provide either Name , Date or both</strong><br>";
									echo '<div class="error">'.$result.'</div>';

								}

						
			
					if($_SESSION['display'] == 1)
					{
						$sql1 = $_SESSION['sql'];
						$res1 = mysqli_query($conn,$sql1);
						while($row = $res1->fetch_assoc()) 
									{
										$count = $count + 1;
									}
						$_SESSION['count'] = $count;			
						if($count > 0 )
						{			
						echo "<strong>Number of " . $_SESSION['type']. " Guest Lectures are: " . $count ."</strong></br><br>" ;
						
							if($_SESSION['type'] == 'Invited')
							{
									echo "<div class='scroll'><table  class='table table-stripped table-bordered ' id = 'example1'>
										<thead><tr> 
										<td><strong>From Date</strong></td>
										<td><strong>To Date</strong></td>
							            <td><strong>Faculty Name</font></strong></td>
										<td><strong>Topic</font></strong></td>
										<td><strong>Resource person for</strong></td>
										
										<td><strong>Invited by</font></strong></td>										

										</tr></thead>";
										
									$res1 = mysqli_query($conn,$sql1);
									while($row = $res1->fetch_assoc()) 
									{

										echo "<tr>";
										echo "<td>".$row['durationf']."</td>";
										echo "<td>".$row['durationt']."</td>";
										echo "<td>".$row['F_NAME']."</td>";
										echo "<td>".$row['topic']."</td>";
										echo "<td>".$row['res_type']."</td>";
										
										echo "<td>".$row['invited']."</td>";

										echo "</tr>";
										
									}	
									echo "</table></div>";
							}//type if
							else if($_SESSION['type'] == 'Organised')
							{
									echo "<div class='scroll'><table  class='table table-stripped table-bordered ' id = 'example1'>
										<thead><tr> 
							            <td><strong>From Date</strong></td>
										<td><strong>To Date</strong></td>
										td><strong>Faculty Name</font></strong></td>
										<td><strong>Topic</font></strong></td>
										
										
										<td><strong>Resource Person</font></strong></td>										
										<td><strong>Organisation</font></strong></td>										
										<td><strong>Target Audience</font></strong></td>										

										</tr></thead>";
										
									$res1 = mysqli_query($conn,$sql1);

									while($row = $res1->fetch_assoc()) 
									{
										echo "<tr>";
										echo "<td>".$row['durationf']."</td>";
										echo "<td>".$row['durationt']."</td>";
										echo "<td>".$row['F_NAME']."</td>";
										echo "<td>".$row['topic']."</td>";
										
										echo "<td>".$row['name']."</td>";
										echo "<td>".$row['organisation']."</td>";
										echo "<td>".$row['targetaudience']."</td>";

										echo "</tr>";
										
									}	
									echo "</table></div>";
							}//type if
						}//count if
						else
						{
							$result="<strong>No records to display</strong><br>";
							echo '<div class="error">'.$result.'</div>';
						}
					}//display if
					if($_SESSION['display'] == 2 || $_SESSION['display'] == 3)
					{
						$sql1 = $_SESSION['sql'];
						$res1 = mysqli_query($conn,$sql1);
						while($row = $res1->fetch_assoc()) 
									{
										$count = $count + 1;
									}
						$_SESSION['count'] = $count;			
						if($count > 0 )
						{		
							echo "<strong>Number of " . $_SESSION['type']. " Guest Lectures are: " . $count ."</strong></br>" ;

							if($_SESSION['type'] == 'Invited')
							{
									echo "<div class='scroll'><table  class='table table-stripped table-bordered ' id = 'example1'>
										<thead><tr> 
										<td><strong>From Date</strong></td>
										<td><strong>To Date</strong></td>
										<td><strong>Faculty Name</font></strong></td>

										<td><strong>Topic</font></strong></td>
										<td><strong>Resource person for</strong></td>
										
										<td><strong>Invited by</font></strong></td>										

										</tr></thead>";
										
									$res1 = mysqli_query($conn,$sql1);
									while($row = $res1->fetch_assoc()) 
									{

										echo "<tr>";
										echo "<td>".$row['durationf']."</td>";
										echo "<td>".$row['durationt']."</td>";
										echo "<td>".$row['F_NAME']."</td>";

										echo "<td>".$row['topic']."</td>";
										echo "<td>".$row['res_type']."</td>";
										
										echo "<td>".$row['invited']."</td>";

										echo "</tr>";
										
									}	
									echo "</table></div>";
							}//type if
							else if($_SESSION['type'] == 'Organised')
							{
									echo "<div class='scroll'><table  class='table table-stripped table-bordered ' id = 'example1'>
										<thead><tr> 
										<td><strong>From Date</strong></td>
										<td><strong>To Date</strong></td>
										<td><strong>Faculty Name</font></strong></td>
							
										<td><strong>Topic</font></strong></td>
										
										
										<td><strong>Resource Person</font></strong></td>										
										<td><strong>Organisation</font></strong></td>										
										<td><strong>Target Audience</font></strong></td>										

										</tr></thead>";
										
									$res1 = mysqli_query($conn,$sql1);

									while($row = $res1->fetch_assoc()) 
									{
										echo "<tr>";
										echo "<td>".$row['durationf']."</td>";
										echo "<td>".$row['durationt']."</td>";
										echo "<td>".$row['F_NAME']."</td>";

										echo "<td>".$row['topic']."</td>";
										
										echo "<td>".$row['name']."</td>";
										echo "<td>".$row['organisation']."</td>";
										echo "<td>".$row['targetaudience']."</td>";

										echo "</tr>";
										
									}	
									echo "</table></div>";
							}//type if
						}//count if
						else
						{
							$result="<strong>No records to display</strong><br>";
							echo '<div class="error">'.$result.'</div>';
						}
					}//display if
					
					
							
		
				}//button count if
								
				if($display != 0)
				{		?>	
				
							
            <!--  <a href="print_your1.php" type="button" class="btn btn-primary" target="_blank">Print</a> -->

				<?php }		?>
			
			
                </form>
                
                </div>
              </div>
           </div>      
        </section>
	</div>	
	
	   
    
<?php include_once('footer.php'); ?>