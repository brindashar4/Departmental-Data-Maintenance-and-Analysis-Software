<script>
//function when redirected from form.php
$(document).ready(function(){
  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

  $(".2").attr("class","active");
  $("button.close").click(function(){
  	var temp = getUrlParameter('type');
  	window.location.replace("IV.php?x=IV/select_menu/edit_menu.php&type="+temp);
  });


  	if(getUrlParameter('type')==="attended")
  	 {
  	 	$('#attended_').attr('selected','selected');
  	 	$('#select2').val("0");
  	 }
  	if(getUrlParameter('type')==="organized")
  	 {
  	 	$('#organized_').attr('selected','selected');
  	 	$('#select2').val("0");
  	 }	
  	 
});

</script>


<?php 
function change()
{
	echo "SELECTED";
}
if(isset($_GET['alert']))
			{
				//header("Refresh:0;url=../includes/IV.php?x=../IV/select_menu/edit_menu.php");
				
			}
?>
<div class="box">
	<div class="box-body">
				<h3 class='box-title'>Industrial Visit Activities</h3>

	<div style="text-align:center">
					<a href="/extc/menu.php?menu=10"> <u>Back to Industrial Visit Attended/Organised Activities Menu</u></a>
	</div>
	
		<form class="view" role='form' id='form' action='IV.php?x=IV/select_menu/edit_menu.php' method='POST'>
			<!-- ===== Select Activity==== -->
			<div class='box-header with-border'>
				<br><br><select id="select1" name="activity" class="box-title" style="margin-left: ;">
					<option id="attended_" value="attended"  <?php if(isset($_POST['activity'])){if($_POST['activity']=="attended") change();}?>>Attended</option>
					<option id="organized_" value="organized" <?php if(isset($_POST['activity'])){if($_POST['activity']=="organized") change();}?>>Organized</option>
				</select>

			</div><!-- /.box-header   -->
<?php
if(isset($_POST['activity'])){
$type=$_POST['activity'];
$_SESSION['type'] = $type;
}
//When HOD
	if($_SESSION['username'] == 'hodextc@somaiya.edu' || $_SESSION['username'] == 'member@somaiya.edu')
	{
?>			<div class='box-header with-border'>
				<h3 class='box-title'>Select Faculty</h3>
				<select id="select2" name="faculty" class="box-title" style="margin-left: 140px;">
				<?php
				echo "<option value = '0'>ALL</option>";
							  $temp="";
                              $temp = getFacultyDetails($temp);
                              while($fac=mysqli_fetch_assoc($temp))
                                {
                                    if($fac[Fac_ID]!=1) //not HOD
                                    {
                          				 if(isset($_POST['faculty']) && $_POST['faculty']==$fac['Fac_ID'])
                          				 {
                          					echo "<option value = '$fac[Fac_ID]' SELECTED >$fac[F_NAME]</option>";	 	
                          				 }
                          				 else
											echo "<option value = '$fac[Fac_ID]'".">$fac[F_NAME]</option>";
									}
                                }
				?>	
				</select>
				
			</div><!-- /.box-header   -->
<?php 
	}
?>			
			<div class='box-footer'>
				<button type='submit' name='submit_view' id='submit' value='' class='btn btn-primary'>View</button>
				<!--<button type='submit' name='cancel' id='cancel' value='' class='btn btn-primary'>Cancel</button> add if needed-->
			</div>
			
		</form>
		
	</div>
	
	<?php 
	if(isset($_GET['type']) && !isset($_POST['submit_view']))
	{
		//if(isset($_POST['faculty']))
	  	 if($_SESSION['username'] == 'hodextc@somaiya.edu' || $_SESSION['username'] == 'member@somaiya.edu')
	  	 	$_SESSION['edit_menu_faculty'] = 0; 
	  	 else
	  	 	$_SESSION['edit_menu_faculty'] = $_SESSION['f_id'];;
		include_once("IV/".$_GET['type']."/edit.php");// $_POST['submit_view']="";	
	} 
	
	if(isset($_POST['submit_view']))
	{		
	  	if(isset($_POST['faculty']))
	  		$_SESSION['edit_menu_faculty'] = $_POST['faculty']; 	
		include_once("IV/".$_POST['activity']."/edit.php");// $_POST['submit_view']="";
	}
	

	if(isset($_POST['cancel']))
	{	
			//add if needed, //add the button as well	
	}
	
	?>