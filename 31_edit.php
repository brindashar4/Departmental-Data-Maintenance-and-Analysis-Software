<?php
ob_start();
session_start();
//check if user has logged in or not

if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
 include_once('head.php'); 
 include_once('header.php'); 

 if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('sidebar_hod.php');

  }
  else
	  include_once('sidebar.php');
  
//connect ot database
include_once("includes/connection.php");

//include custom functions files 
include_once("includes/functions.php");




//setting error variables
$nameError="";
$emailError="";


if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = "SELECT * from invitedlec where invited_id = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $Fac_ID = $row['Fac_ID'];

    //$topic = $row['topic'];
    $startDate = $row['durationf'];
    $endDate = $row['durationt'];
    $organized = $row['organized'];
    


}

			
			$query2 = "SELECT * from facultydetails where Fac_ID = $Fac_ID";
			$result2 = mysqli_query($conn,$query2);
			if($result2)
			{
	            $row = mysqli_fetch_assoc($result2);
				$F_NAME = $row['F_NAME'];

			}
	   

//check if the form was submitted
if(isset($_POST['update'])){

    
    
    //check for any blank input which are required
    
   /*if(!$_POST['topic']){
        $nameError="Please enter a Title<br>";
    }
    else{
        $topic1=validateFormData($_POST['topic']);
        $topic1 = "'".$topic1."'";
    }*/
    
   if(!$_POST['startDate']){
        $nameError="Please enter a start date<br>";
    }
    else{
        $startDate1=validateFormData($_POST['startDate']);
        $startDate1 = "'".$startDate1."'";
    }
    if(!$_POST['endDate']){
        $nameError="Please enter an end date<br>";
    }
 

  else{
        $endDate1=validateFormData($_POST['endDate']);
        $endDate1 = "'".$endDate1."'";
    }
	
    if(!$_POST['organized']){
        $nameError="Please select paper type<br>";
    }
    else{
        $organized1=validateFormData($_POST['organized']);
        $organized1 = "'".$organized1."'";
    }
   
 


    //checking if there was an error or not
  $query = "SELECT Fac_ID from facultydetails where Email='".$_SESSION['loggedInEmail']."';";
        $result=mysqli_query($conn,$query);
       if($result){
            $row = mysqli_fetch_assoc($result);
            $author = $row['Fac_ID'];
	   }
				$succ = 0;
				$success1 = 0;

	$sql = "update invitedlec set organized=$organized1,durationf=$startDate1,durationt=$endDate1, tdate= CURRENT_TIMESTAMP() WHERE invited_id = $id";
							

			if ($conn->query($sql) === TRUE) 
			{
				if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
					{
					   header("location:view_invited_hod_lec.php?alert=update");

					}
					else
					{
						header("location:view_invited_lec.php?alert=update");

					}
				
				
				}	
					
				
					
			 else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			
			
		
					
			

}

//close the connection
mysqli_close($conn);
?>












<div class="content-wrapper">
    
    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Faculty Interaction Activities</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" class="row" action ="" style= "margin:10px;" >
                    <input type = 'hidden' name ='id' value = '<?php echo $id; ?>'>
                     <div class="form-group col-md-6">
                         <label for="paper-title">Organized By *</label>
                         <input required type="text" class="form-control input-lg" id="organized" name="organized" value = '<?php echo $organized; ?>' >
                     </div>
                     
                     <div class="form-group col-md-6">
                         <label for="start-date">Start Date *</label>
                         <input 
                             <?php echo "value = '$startDate'"; ?>
                           required type="date" class="form-control input-lg" id="start-date" name="startDate"
                         placeholder="">
                     </div>

                    <div class="form-group col-md-6">
                         <label for="end-date">End Date *</label>
                         <input
                             <?php echo "value = '$endDate'"; ?>
                           required type="date" class="form-control input-lg" id="end-date" name="endDate"
                         placeholder="">
                     </div>
                    
                    <br>

                  
                    

                    <div class="form-group col-md-12">
                         

                         <button name="update"  type="submit" class="btn btn-success btn-lg">Submit</button>
						 
						 <a href="view_invited_lec.php" type="button" class="btn btn-warning pull-right btn-lg">Cancel</a>

                    </div>
                </form>
                
                </div>
              </div>
           </div>      
        </section>

    
</div>
   
    
    
    
<?php include_once('footer.php'); ?>
   
   