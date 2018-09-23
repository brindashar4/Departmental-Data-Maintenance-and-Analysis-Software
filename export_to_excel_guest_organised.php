<?php
ob_start();
session_start();
include 'includes/connection.php';
$table = "guestlec"; 
$filename = "guest_lecture_organised"; 
$sql = "SELECT * FROM guestlec where Fac_ID ='".$_SESSION['Fac_ID']."' ;";

$result = mysqli_query($conn,$sql) or die("Couldn't execute query:<br>" . mysqli_error(). "<br>" . mysqli_errno()); 
$file_ending = "xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache"); 
header("Expires: 0");
$sep = "\t"; 
$names = mysqli_fetch_fields($result) ;
echo "Topic".$sep;
echo "Duration from".$sep;
echo "Duration to".$sep;
echo "Name".$sep;
echo "Designation".$sep;
echo "Organization".$sep;
echo "Target Audience".$sep;
echo "Attendance Record".$sep;
echo "Permission Record".$sep;
echo "Certificate Copy".$sep;
echo "Report Copy".$sep;
print("\n");
while($row = mysqli_fetch_row($result)) {
    $schema_insert = "";
    for($j=2; $j<mysqli_num_fields($result);$j++) {
        if(!isset($row[$j]))
            $schema_insert .= "NULL".$sep;
        elseif ($row[$j] != "")
            $schema_insert .= "$row[$j]".$sep;
        else
            $schema_insert .= "".$sep;
    }
    $schema_insert = str_replace($sep."$", "", $schema_insert);
    $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
    $schema_insert .= "\t";
    print(trim($schema_insert));
    print "\n";
}


?>
