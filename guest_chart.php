<?php
ob_start();
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send them to login page
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

$_SESSION['currentTab']="research";

//connect to database
include("includes/connection.php");
$fid = $_SESSION['Fac_ID'];
?>
 
 
<html>
<body>
<div>
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
  <div class="box-body">
    <div class="box-title" style="text-align:center">
	  <h3> Charts for Guest Lecture </h3>
	  <div style="text-align:right">
	  <a href="/extc/menu.php?menu=10" ><u>Back to Industrial Visit Attended/Organised Activities Menu</u></a>
	  </div>
	</div>
	<form id="guest" name ="form1" action="#" method="POST" style="text-align:center">
	<div class="box-header with-border">
	  <select id="guestlec" name="select1" class="box-title" style="align:left;" onchange="location = this.value;" >
	   <option id="invited_" value="guest_invited_chart.php"> Invited </option>
	   <option id="organised_" value="guest_organized_chart.php">Organised </option>
	   </select>
	 </div>
	 </form>
	 </div>
	 </div>
	 </div>
	 </div>
	 </section>
	 </div>
 </body>
</html>