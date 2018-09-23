<?php
ob_start();
session_start();
include 'includes/connection.php';
$table = "invitedlec"; 
$filename = "invited_for_guest_lecture"; 
$sql = "SELECT * FROM invitedlec where Fac_ID ='".$_SESSION['Fac_ID']."' ;";

$result = mysqli_query($conn,$sql) or die("Couldn't execute query:<br>" . mysqli_error(). "<br>" . mysqli_errno()); 
$file_ending = "xls";
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$filename.xls");
header("Pragma: no-cache"); 
header("Expires: 0");
$sep = "\t"; 
$names = mysqli_fetch_fields($result) ;
/*foreach($names as $name){
	if($name->name != 'p_id' && $name->name != 'fac_id' ) 

    print ($name->name . $sep);
    }*/
	
echo "Organized By".$sep;
echo "Duration from".$sep;
echo "Duration to".$sep;
echo "Awards".$sep;
echo "Topic".$sep;
echo "Details".$sep;
echo "Last Updated On".$sep;
echo "Invitation Letter".$sep;
echo "Certificate".$sep;

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
