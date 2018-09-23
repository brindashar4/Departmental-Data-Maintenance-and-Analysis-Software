<?php
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send them to login page
    header("location:index.php");
}
//connect to database
include("includes/connection.php");
$fid = $_SESSION['Fac_ID'];
//query and result
$query = "SELECT * from invitedlec inner join facultydetails on invitedlec.fac_id = facultydetails.Fac_ID ";
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
                  <h2 class="box-title">Faculty Interaction Details</h2>
                </div><!-- /.box-header -->
				<div style="text-align:right">
								<a href="menu.php?menu=11 "> <u>Back to Faculty Interaction Menu</u></a>
				</div>
                <div class="box-body">
				<div class="scroll">
    <table  class="table table-stripped table-bordered " id = 'example1'>
        <thead>
            <tr>
	
                <th>Organized By</th>
               
                <th>Duration from(YYYY-MM-DD)</th>
                <th>Duration to(YYYY-MM-DD)</th>
                
			<th> Awards</th>
			
			<th> Topic </th>
			<th> Details </th>
			<th> Last Updated On </th>
            <th>Invitation Letter</th>
                <th>Certificate</th>
				
    <th>Upload invitation</th>
                <th>Upload Certificate</th>
				
                <th>Edit</th>
                <th>Delete</th>
			<!--	<th> Resource person invited for </th>-->

            </tr>
        </thead>
        <?php
        if(mysqli_num_rows($result)>0){
            //we have data to display 
            while($row =mysqli_fetch_assoc($result)){
                echo "<tr>";
             // echo "<td>".$row['invited_id']."</td>";
			   // echo "<td>".$row['fac_id']."</td>";
                echo "<td>".$row['organized']."</td>";
                echo "<td>".$row['durationf']."</td>";
                echo "<td>".$row['durationt']."</td>";
				echo "<td>".$row['award']."</td>";
			//	echo "<td>".$row['resource']."</td>";  				
				echo "<td>".$row['topic']."</td>";
				echo "<td>".$row['details']."</td>";				
				echo "<td>".$row['tdate']."</td>"; 
		
     
				//$_SESSION['invited_id'] = $row['invited_id'];

				
           if(($row['invitation_path']) != "")
				{
						if(($row['invitation_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['invitation_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['invitation_path']."' target='_blank'>View paper</a></td>";
				}
				else
						echo "<td>no status </td>";
				
				if(($row['certificate_path']) != "")
				{
						if(($row['certificate_path']) == "NULL")
							echo "<td>not yet available</td>";
						else if(($row['certificate_path']) == "not_applicable") 
							echo "<td>not applicable</td>";
						else
							echo "<td> <a href = '".$row['certificate_path']."' target='_blank'>View certificate</td>";
				}
				else
						echo "<td>no status </td>";
				
				
				
				
                echo "<td>
                    <form action = 'upload_invitation_ilec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['invited_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
                echo "<td>
                    <form action = 'upload_certificate_ilec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['invited_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-upload'></span>
                        </button>
                    </form>
                </td>";
				
				
			
                echo "<td>
                    <form action = '31_edit.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['invited_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-edit'></span>
                        </button>
                    </form>
                </td>";
                echo "<td>
                    <form action = '4_delete_invited_lec.php' method = 'POST'>
                        <input type = 'hidden' name = 'id' value = '".$row['invited_id']."'>
                        <button type = 'submit' class = 'btn btn-primary btn-sm'>
                            <span class='glyphicon glyphicon-trash'></span>
                        </button>
                    </form>
                </td>";
			//	echo "<td>".$row['res_type']."</td>";  
                echo"</tr>";
            }
        }
        else{
            //if ther are no entries
            echo "<div class='alert alert-warning'>You have no activity</div>";
        }
        ?>
        
    </table>
	
       
	</div>
	            <div class="text-left"><a href="guestlec.php"type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus">Add Activity</span></a>
	            <a href="analysis_f.php" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Count Activities</span></a> 
	            <a href="export_to_excel_invited.php" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Export to Excel</span></a> 
				<a href="menu.php?menu=11" type="button" class="btn btn-success btn-sm"><span class="glyphicon ">Cancel</span></a> 

    </div>
	
              </div>
             </div>
            </div>
          </section>
    
</div>
   
    
    
<?php include_once('footer.php'); ?>