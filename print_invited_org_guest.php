
<?php
ob_start();
session_start();
 if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
				include_once 'dompdf/dompdf_config.inc.php';
				include_once("includes/connection.php");

				   
				$Fac_ID = $_SESSION['Fac_ID'];	
				
				//$type = $_SESSION['type'] ;
				$sql1 = $_SESSION['sql'] ;
				$count = 0;
				
						$display = 1;
						$result=mysqli_query($conn,$sql1);
						if(mysqli_num_rows($result)>0){
							$count = mysqli_num_rows($result); 
							$op="<p align='center'  style='font-size:20px'><strong>K.J.Somaiya College of Engineering</strong></p>"."<p align='center'>(Autonomous College affiliated to University of Mumbai)</p>"."<p align='center'>Faculty Interaction Activities</p>";
							$op.="
							<p align='center'><strong> Number of Faculty Interaction Activities: $count</strong>
							<table border='1' cellspacing='0' id = 'example1' class='table table-stripped table-bordered' align='center'>
								
								<tr><td><strong>Organized by</strong></td>
								<td><strong>Date from</strong></td>
								<td><strong>Date to</strong></td>
								<td><strong>Awards</strong></td>
								<td><strong>Topic</strong></td>
								<td><strong>Details</strong></td>
								<td><strong>Last Updated On</strong></td></tr>
									";
							while($row =mysqli_fetch_assoc($result)){
								$topic = $row['topic'];
								$organized = $row['organized'];
								$durationf = $row['durationf'];
								$durationt = $row['durationt'];
								$details = $row['details'];
								$award = $row['award'];
								$tdate = $row['tdate'];
							
								
								$op.= "<tr>";
								
								$op.="<td><strong>".$organized."</strong></td>";
								$op.="<td><strong>".$durationf."</strong></td>";
								$op.="<td><strong>".$durationt."</strong></td>";
								$op.="<td><strong>".$award."</strong></td>";
								$op.="<td><strong>".$topic."</strong></td>";
								$op.="<td><strong>".$details."</strong></td>";
								$op.="<td><strong>".$tdate."</strong></td>";

								$op.="</tr>";
								
							}
							$op.= "</table>";
						}
						echo $op;
						$dompdf = new DOMPDF();
				$dompdf->load_html($op);
				$dompdf->set_paper('a4', 'portrait');
				$dompdf->render();

				$dompdf->stream('hi',array('Attachment'=>0));
				
				/*else if($type =='Organised'){
						$display = 2;
						$result=mysqli_query($conn,$sql1);
						if(mysqli_num_rows($result)>0){
							$count = mysqli_num_rows($result); 

							$op="<p align='center'  style='font-size:20px'><strong>K.J.Somaiya College of Engineering</strong></p>"."<p align='center'>(Autonomous College affiliated to University of Mumbai)</p>"."<p align='center'>Guest Lecture Invited/Organised</p>";
							$op.="
							<strong> $type Guest Lecture is : $count</strong>
							<table border='1' cellspacing='0' id = 'example1' class='table table-stripped table-bordered'>
								<tr><td><strong>Topic</strong></td>
								<td><strong>Date from</strong></td>
								<td><strong>Date to</strong></td>
								<td><strong>Organised by</strong></td>
								<td><strong>Target Audience</strong></td></tr>
									
									";
							while($row =mysqli_fetch_assoc($result)){
								$topic = $row['topic'];
								$durationf = $row['durationf'];
								$durationt = $row['durationt'];
								$o=$row['organisation'];
								$t = $row['targetaudience'];							
								
								$op.= "<tr>";
								$op.="<td><strong>".$topic."</strong></td>";
								$op.="<td><strong>".$durationf."</strong></td>";
								$op.="<td><strong>".$durationt."</strong></td>";
								$op.="<td><strong>".$o."</strong></td>";
								$op.="<td><strong>".$t."</strong></td>";

								$op.="</tr>";
								
							}
							$op.= "</table>";
						}
						echo $op;
						$dompdf = new DOMPDF();
				$dompdf->load_html($op);
				$dompdf->set_paper('a4', 'portrait');
				$dompdf->render();

				$dompdf->stream('hi',array('Attachment'=>0));
				}*/
				
				

?>