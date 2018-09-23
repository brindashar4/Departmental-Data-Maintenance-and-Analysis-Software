<?php
ob_start();
session_start();
//check if user has logged in or not
 include_once('head.php'); 
 include_once('header.php'); 
if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
//connect ot database
include_once("includes/connection.php");

//include custom functions files 
include_once("includes/functions.php");
include_once("includes/scripting.php");


if($_SESSION['username'] == ('hodextc@somaiya.edu') || $_SESSION['username'] == ('member@somaiya.edu') || $_SESSION['username'] == ('hodcomp@somaiya.edu') )
  {
	    include_once('sidebar_hod.php');

  }
  else
	  include_once('sidebar.php');

//setting error variables
$topic=$award=$organized=$details="";
$durationf=$durationt="";
$invitation=$invitation2 = "";
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
		$organized_array = $_POST['organized'];
		$details_array = $_POST['details'];
//$invitation_array = $_POST['invitation'];
//$invitation2_array = $_POST['invitation2'];
	$resource_array = $_POST ['resource'];
	$award_array = $_POST['award'];
	
		//$fdc_array = $_POST['fdc'];

    		
for($i=0; $i<count($topic_array);$i++)
{
$topic = mysqli_real_escape_string($conn,$topic_array[$i]);
//$invitation = mysqli_real_escape_string($conn,$invitation_array[$i]);
//$invitation2 = mysqli_real_escape_string($conn,$invitation2_array[$i]);
$durationf = mysqli_real_escape_string($conn,$durationf_array[$i]);
$details = mysqli_real_escape_string($conn,$details_array[$i]);
$durationt = mysqli_real_escape_string($conn,$durationt_array[$i]);
$organized = mysqli_real_escape_string($conn,$organized_array[$i]);
$resource = mysqli_real_escape_string($conn,$resource_array[$i]);
$award = mysqli_real_escape_string($conn,$award_array[$i]);

//$fdc = mysqli_real_escape_string($conn,$fdc_array[$i]);
//$_SESSION['fdc'] = $fdc;


  /*if(empty($_POST['topic[]'])){
        $nameError="Please enter a topic";
		$flag = 0;
    }
    else{
        $topic=validateFormData($topic);
        $topic = "'".$topic."'";
		$flag=1;
    }*/
	if(empty($_POST['organized[]'])){
        $nameError="Please enter person who organized";
		$flag = 0;
    }
    else{
        $organized=validateFormData($organized);
        $organized = "'".$organized."'";
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
	if(empty($_POST['resource[]'])){
        $nameError="Please enter the type of resource person invited as";
		$flag = 0;
    }
    else{
        $resource=validateFormData($resource);
        $resource = "'".$resource."'";
		$flag=1;
    }	
	if(empty($_POST['award[]'])){
        $nameError="Please enter the awards of the invited person";
		$flag = 0;
    }
    else{
        $award=validateFormData($award);
        $award = "'".$award."'";
		$flag=1;
    }	
	/*if(empty($_POST['details[]'])){
        $nameError="Please enter the details of the activity";
		$flag = 0;
    }
    else{
        $details=validateFormData($details);
        $details = "'".$details."'";
		$flag=1;
    }	*/
	
	
	  //checking if there was an error or not
        $query = "SELECT Fac_ID from facultydetails where Email='".$_SESSION['loggedInEmail']."';";
        $result=mysqli_query($conn,$query);
       if($result){
            $row = mysqli_fetch_assoc($result);
            $author = $row['Fac_ID'];
	   }

	    echo $author."<-->".$organized."<br/>";
        $sql="INSERT INTO invitedlec(Fac_ID,organized,durationf,durationt,award,topic,details,tdate) VALUES ('$author','$organized','$durationf','$durationt','$award','$topic','$details',CURRENT_TIMESTAMP())";

			if ($conn->query($sql) === TRUE) {
				$success = 1;
			header("location:view_invited_lec.php?alert=success");

					


			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
 
}//end of for
		
			        
}

}


//close the connection
//mysqli_close($conn);
?>
<script>

function yesnoCheck() {
    if (document.getElementById('lec').checked) {
        document.getElementById('ifYesLec').style.visibility = 'visible';
		document.getElementById('ifYesOther').style.visibility = 'hidden';
    }
    else if (document.getElementById('other').checked) {
		document.getElementById('ifYesLec').style.visibility = 'hidden';
		document.getElementById('ifYesOther').style.visibility = 'visible';
	}

}
</script>

<div class="content-wrapper">    
    <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Faculty Interaction Details</h3><br>
				  <h2 class="box-title" align="center"> Last updated on: 
				  <?php
				    $query = "SELECT Fac_ID from facultydetails where Email='".$_SESSION['loggedInEmail']."';";
					
                    $result=mysqli_query($conn,$query);
					
                    if($result){
                    $row = mysqli_fetch_assoc($result);
                    $author = $row['Fac_ID'];
	                }
					
				    $sql= "SELECT tdate from invitedlec where fac_id = '".$author."' ORDER BY p_id DESC LIMIT 1;";
					
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
				   </h2>	
				 
                </div><!-- /.box-header -->
                <!-- form start -->
	
				<div class="form-group col-md-6">

                         <label for="faculty-name">Faculty Name</label>
                         <input required type="text" class="form-control input-lg" id="faculty-name" name="facultyName" value="<?php echo $faculty_name; ?>" readonly>
                     </div><br /><br /><br /><br />
	<?php
			
					for($k=1; $k<=$_SESSION['count'] ; $k++)
					{

				?>
            <p>   ****************************************************************************************** <br>
			
			<?php echo "<b> <font color='red'>Form ". $k. ":</b></font>" ?><br />
			<form role="form" method="POST" class="row" action ="guest2.php" style= "margin:10px;" >
					
				
                     <div class="form-group col-md-6">
					 
                         <label for="organized">Organized By *</label>
                      <!--   <input required type="text" class="form-control input-lg" id="paper-title" name="paperTitle[]">-->
					  <input  type="text" class="form-control input-lg"  name="organized[]"><br></div>
					  
					  
						
						<div class="form-group col-md-6">
                                <label for="durationf">Duration From *</label>
                         <input required type="date" class="form-control input-lg" id="durationf" name="durationf[]" value=""><br> </div>
						
						<br>
                    <div class="form-group col-md-6">
   						
                         <label for="durationt"> Duration To *</label>
                         <input required type="date" class="form-control input-lg" id="durationt" name="durationt[]" value=""><br></div>
						 <div class="form-group col-md-6">
						
					     <label for="award">Awards, If Any *</label>
                         <textarea required class="form-control input-lg" id="award" name="award[]" rows="2"></textarea> </div>
				
                    <br>
					 <div class="form-group col-md-6">
					
					     <label for="resource">Invited As A Resource Person For *</label><br>
                         
						 <input type = "radio" name = "resource[]" id= "lec" onClick= "javascript:yesnoCheck();">
						<label for= "lec">Lecture/Talk/Workshop/Conference </label><br>
						<input type = "radio" name = "resource[]" id= "other" onClick= "javascript:yesnoCheck();">
						<label for= "other">Any Other </label></div><br />
						 
						 <div id="ifYesLec" style="visibility:hidden" class="form-group col-md-6">
                    <label> Topic Of Lecture * </label><br>
					<input type= "text" id= "topic" name="topic[]" >
						
                    </div>
					 
					<div id="ifYesOther" style="visibility:hidden" class= "form-group col-md-6">
                    <label> Details Of The Activity * </label>
					<textarea class="form-control input-lg" id= "details" name="details[]" rows="2" ></textarea>
						
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

