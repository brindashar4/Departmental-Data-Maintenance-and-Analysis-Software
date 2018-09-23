<?php
ob_start();
session_start();
 include_once('head.php'); 
 include_once('header.php'); 
//check if user has logged in or not

if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
//connect ot database
include_once("includes/connection.php");

//include custom functions files 
include_once("includes/functions.php");
include_once("includes/scripting.php");



//setting error variables
$topic="";
$durationf=$durationt="";
$invited=$invitation=$invitation2 =$invitation3=$invitation4=$name=$designation=$organisation="";
$flag= 0;
$success = 0;
		$fid = $_SESSION['Fac_ID'];
	$count1 = $_SESSION['count'];
	
        $faculty_name= $_SESSION['loggedInUser'];

$query="SELECT * from faculty where Fac_ID = $fid ";
    $result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
		
	}
//check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

if(isset($_POST['add'])){

    //the form was submitted
    
	$topic_array = $_POST['topic'];
	$durationf_array= $_POST['durationf'];
	$durationt_array = $_POST['durationt'];
		$invited_array = $_POST['invited'];
		$name_array = $_POST['name'];
		$designation_array = $_POST['designation'];
			$organisation_array = $_POST['organisation'];
		
$invitation_array = $_POST['invitation'];
$invitation2_array = $_POST['invitation2'];
	$invitation3_array = $_POST['invitation3'];
$invitation4_array = $_POST['invitation4'];
	
		$fdc_array = $_POST['fdc'];

    		
for($i=0; $i<count($topic_array);$i++)
{
$topic = mysqli_real_escape_string($conn,$topic_array[$i]);
$durationf = mysqli_real_escape_string($conn,$durationf_array[$i]);
$durationt = mysqli_real_escape_string($conn,$durationt_array[$i]);
$invited = mysqli_real_escape_string($conn,$invited_array[$i]);
$name = mysqli_real_escape_string($conn,$name_array[$i]);
$designation = mysqli_real_escape_string($conn,$designation_array[$i]);
$organisation = mysqli_real_escape_string($conn,$organisation_array[$i]);
$invitation = mysqli_real_escape_string($conn,$invitation_array[$i]);
$invitation2 = mysqli_real_escape_string($conn,$invitation2_array[$i]);
$invitation3 = mysqli_real_escape_string($conn,$invitation3_array[$i]);
$invitation4 = mysqli_real_escape_string($conn,$invitation3_array[$i]);

$fdc = mysqli_real_escape_string($conn,$fdc_array[$i]);
$_SESSION['fdc'] = $fdc;


  if(empty($_POST['topic[]'])){
        $nameError="Please enter a topic";
		$flag = 0;
    }
    else{
        $topic=validateFormData($topic);
        $topic = "'".$topic."'";
		$flag=1;
    }
	if(empty($_POST['invited[]'])){
        $nameError="Please enter invited by address";
		$flag = 0;
    }
    else{
        $invited=validateFormData($invited);
        $invited = "'".$invited."'";
		$flag=1;
    }
	if(empty($_POST['durationf[]'])){
        $nameError="Please enter a start date and time";
		$flag = 0;
    }
    else{
        $durationf=validateFormData($durationf);
        $durationf = "'".$durationf."'";
		$flag=1;
    }	
	if(empty($_POST['durationt[]'])){
        $nameError="Please enter a end date and time";
		$flag = 0;
    }
    else{
        $durationt=validateFormData($durationt);
        $durationt = "'".$durationt."'";
		$flag=1;
    }	

	  
	
	  //checking if there was an error or not
        $query = "SELECT Fac_ID from facultydetails where Email='".$_SESSION['loggedInEmail']."';";
        $result=mysqli_query($conn,$query);
       if($result){
            $row = mysqli_fetch_assoc($result);
            $author = $row['Fac_ID'];
	   }


	   
	   
        $sql="INSERT INTO guestlec(fac_id,topic,durationf,durationt,name,designation,organisation,targetaudience,tdate) VALUES ('$author','$topic','$durationf','$durationt','$name','$designation','$organisation','$invited',CURRENT_TIMESTAMP())";

			if ($conn->query($sql) === TRUE) {
				$success = 1;
			header("location:view_organised_lec.php?alert=success");

					


			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			

			
				
				
		
				
		
 
}//end of for
		

			        
}

}


//close the connection
//mysqli_close($conn);
?>






<?php 
if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('sidebar_hod.php');

  }
  else
	  include_once('sidebar.php');

?>
 



<div class="content-wrapper">
    
    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Guest Lecture Organised</h3><br>
				   <h2 class="box-title" align="right"> Last updated on: 
				  <?php
				    $query = "SELECT Fac_ID from facultydetails where Email='".$_SESSION['loggedInEmail']."';";
					
                    $result=mysqli_query($conn,$query);
					
                    if($result){
                    $row = mysqli_fetch_assoc($result);
                    $author = $row['Fac_ID'];
	                }
					
				    $sql= "SELECT tdate from guestlec where fac_id = '".$author."' ORDER BY p_id DESC LIMIT 1;";
					
					$result1= mysqli_query($conn,$sql);
					if ($result1)
					{
						$row1= mysqli_fetch_assoc ($result1);
						$latest= $row1['tdate'];
						echo $latest;
					}
					else
					{
						echo "No entries added yet";
					}
					mysqli_close($conn);
					?>
				 
                </div><!-- /.box-header -->
                <!-- form start -->
	
				<div class="form-group col-md-6">

                         <label for="faculty-name">Faculty Name</label>
                         <input required type="text" class="form-control input-lg" id="faculty-name" name="facultyName" value="<?php echo $faculty_name; ?>" readonly>
                     </div><br/> <br/> <br/> <br/> 
	<?php
			
					for($k=1; $k<=$_SESSION['count'] ; $k++)
					{

				?>
            <p>   ********************************************************************* <br>
			<?php echo "<font color='red'><b> Form ".$k." </b></font>" ?>
			<form role="form" method="POST" class="row" action ="" style= "margin:10px;" >
					
				
                     <div class="form-group col-md-6">
                         <label for="topic">Topic Of Lecture*</label>
                      <!--   <input required type="text" class="form-control input-lg" id="paper-title" name="paperTitle[]">-->
					  <input  type="text" class="form-control input-lg"  name="topic[]">
					  <br>
                   
                                <label for="durationf">Duration From *</label>
                         <input required type="date" class="form-control input-lg" id="durationf" name="durationf[]"
                         value="">
                 
				 
				 
				  <br> <label for="durationt"> Duration To *</label>
                         <input required type="date" class="form-control input-lg" id="durationt" name="durationt[]"
                         value="">
					 
					 <br>
					 
       <label for="name">Resource Person Name*</label>
                      <!--   <input required type="text" class="form-control input-lg" id="paper-title" name="paperTitle[]">-->
					  <textarea required class="form-control input-lg" id="name"  name="name[]" rows="2"></textarea>
					  <br>
                   
                           
      <br> <label for="designation">Designation*</label>
                      <!--   <input required type="text" class="form-control input-lg" id="paper-title" name="paperTitle[]">-->
					  <input  type="text" class="form-control input-lg"  name="designation[]">
					  <br>
					  
					  
					<br>   <label for="organisation">Organisation*</label>
                      <!--   <input required type="text" class="form-control input-lg" id="paper-title" name="paperTitle[]">-->
					  <input  type="text" class="form-control input-lg"  name="organisation[]">
					  <br>
					  
                       
					 
                      <br>   <label for="invited">Target Audience</label>
                         <textarea required class="form-control input-lg" id="invited" name="invited[]" rows="2"></textarea>
                    
					
					<br>
					
					 
                  
                     </div>
                    
                    
                   <?php
					}
					?>
					<br/>
                    <div class="form-group col-md-12">
                        

                         <input type="submit" name="add" class="btn btn-success btn-lg" value = "Submit" />
						 
						 <a href="menu.php?menu=11" type="button" class="btn btn-warning pull-right btn-lg">Cancel</a>
                    </div>
                </form>
                </div>
              </div>
           </div>      
        </section>

    
</div>
   
    
    
    
<?php include_once('footer.php'); ?>