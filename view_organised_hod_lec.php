<?php
ob_start();
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send them to login page
    header("location:index.php");
}
//connect to database
include("includes/connection.php");
$fid = $_SESSION['Fac_ID'];
//query and result
$query = "SELECT * from guestlec inner join facultydetails on guestlec.fac_id = facultydetails.Fac_ID ";
$_SESSION['query']=$query;

$result = mysqli_query($conn,$query);
$successMessage="";
if(isset($_GET['alert'])){
    if($_GET['alert']=="success"){
        $successMessage='<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
        <strong>Record added successfully</strong>
        </div>';  

    }
    elseif($_GET['alert']=="update"){
        $successMessage='<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
        <strong>Record updated successfully</strong>
        </div>';  

    }
    elseif($_GET['alert']=="delete"){
        $successMessage='<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
            </button>
        <strong>Record deleted successfully</strong>
        </div>';  

    }
}
?>





<?php include_once('head.php'); ?>
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
div.scroll
{
overflow:scroll;

}


</style>



<div class="content-wrapper">
    <?php 
        {
        echo $successMessage;
    }
    ?>
    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h2 class="box-title">Organised Guest Lecture Details</h2>
                </div><!-- /.box-header -->
				<div style="text-align:right">
								<a href="menu.php?menu=4 "> <u>Back to Invited for/Organised Guest Lecture Menu</u></a>
				</div>
                <div class="box-body">
				<div class="scroll">
    <table  class="table table-stripped table-bordered " id = 'example1'>
        <thead>
            <tr>
		<th>Faculty</th>
                <th>Topic</th>
               
                <th>Duration from (YYYY/MM/DD)</th>
                <th>Duration to (YYYY/MM/DD)</th>
                <th>Name</th>
				<th>Designation</th>
				<th>Organisation</th>
				<th>Target Audience</th>
				<th>Last Updated on</th>
                
			
            <th>Attendance Record</th>
                <th>Permission Record</th>
            <th>Certificate Copy</th>
				<th>Report Copy</th>
				
		<?php 
				if($_SESSION['username'] == 'hodextc@somaiya.edu' || $_SESSION['username'] == 'hodcomp@somaiya.edu' )
				{
			?>			
				<th>Upload Attendance Record</th>
                <th>Upload Permission Record</th>
				<th>Upload Certificate Copy</th>
                <th>Upload Reoprt Copy</th>
				
                <th>Edit</th>
                <th>Delete</th>
			<?php }?>
            </tr>
        </thead>
        <?php
        if(mysqli_num_rows($result)>0){
            //we have data to display 
            while($row =mysqli_fetch_assoc($result)){
                echo "<tr>";
           //  echo "<td>".$row['p_id']."</td>";
			 //   echo "<td>".$row['fac_id']."</td>";
			 
			 echo "<td>".$row['F_NAME']."</td>";
                echo "<td>".$row['topic']."</td>";
                echo "<td>".$row['durationf']."</td>";
                echo "<td>".$row['durationt']."</td>";
                echo "<td>".$row['name']."</td>";
				 echo "<td>".$row['designation']."</td>";
				 	 echo "<td>".$row['organisation']."</td>";
					 
				 echo "<td>".$row['targetaudience']."</td>";
				  echo "<td>".$row['tdate']."</td>";
         

				$_SESSION['P_ID'] = $row['p_id'];

				
           if(($row['attendance_path']) != "")
				{
						if(($row['attendance_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['attendance_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['attendance_path']."'>View attendance</td>";
				}
				else
						echo "<td>no status </td>";
				
				if(($row['permission_path']) != "")
				{
						if(($row['permission_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['permission_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['permission_path']."'>View permission</td>";
				}
				else
						echo "<td>no status </td>";
				
				if(($row['certificate1_path']) != "")
				{
						if(($row['certificate1_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['certificate1_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['certificate1_path']."'>View permission</td>";
				}
				else
						echo "<td>no status </td>";
							
           if(($row['report_path']) != "")
				{
						if(($row['report_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['report_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['report_path']."'>View attendance</td>";
				}
				else
						echo "<td>no status </td>";
				
				
				
		if($_SESSION['username'] == 'hodextc@somaiya.edu' || $_SESSION['username'] == 'hodcomp@somaiya.edu' )
				{			
				
                echo "<td>
                    <form action = 'upload_attendance_glec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
				
				
				
				
				
				   echo "<td>
                    <form action = 'upload_permission_glec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
				
				
				
                echo "<td>
                    <form action = 'upload_certificate_glec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
				
				
			
			
				
             
                echo "<td>
                    <form action = 'upload_report_glec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
			
			
                echo "<td>
                    <form action = '41_edit.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-edit'></span>
                        </button>
                    </form>
                </td>";
                echo "<td>
                    <form action = '4_delete_org_lec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['p_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-trash'></span>
                        </button>
                    </form>
                </td>";
                echo"</tr>";
				}
			}
        }
        else{
            //if ther are no entries
            echo "<div class='alert alert-warning'>You have no papers</div>";
        }
        ?>
        
    </table>
	
       
	</div>
	            <div class="text-left"><a href="orglec.php"type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus">Add Activity</span></a>
	            <a href="count_all_invited.php" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Count Guest Lecture Invited/Organised</span></a> 
	            <a href="export_to_excel_org_lec_all.php" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Export to Excel</span></a> 
                <a href="menu.php?menu=4.php" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Cancel</span></a>
    </div>
	
              </div>
             </div>
            </div>
          </section>
    
</div>
   
    
    
<?php include_once('footer.php'); ?>