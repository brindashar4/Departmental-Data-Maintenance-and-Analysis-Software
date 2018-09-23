<?php
$j=1;
$res[]=0;
$x=1;
for($i=2016;$i<=date("Y");$i++) {
	$res[$j]= $i;
	echo "$res[$j] - <br>";
	$j++;
}
$j=1;
$dataPoints = array(
	for($i=2016;$i<=date("Y")+1;$i++) {
	array("y" => $res[$j], "label" => "$res[$j]-$res[$j+1]" )
	});

	$sql1="SELECT * FROM iv_organized WHERE t_from>=. $res[$j] .'-1-1' && t_to<=. $res[$j+1] .'-12-31''";
	if($res = $mysqli->query($sql1)) {
		
			$resu[$j]=$res->num_rows;
		
	}
	
?>

$sql1="SELECT * FROM iv_organized WHERE t_from>='2014-07-1' && t_to<='2015-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res1=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2015-07-1' && t_to<='2016-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res2=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2016-07-1' && t_to<='2017-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res3=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2017-07-1' && t_to<='2018-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res4=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2018-07-1' && t_to<='2019-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res5=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2019-07-1' && t_to<='2020-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res6=$res->num_rows;
		
	}
	$sql1="SELECT * FROM iv_organized WHERE t_from>='2020-07-1' && t_to<='2021-6-30'";
	if($res = $mysqli->query($sql1)) {
		
			$res7=$res->num_rows;
		
	}

$dataPoints = array( 
	array("y" => $res1, "label" => "2014-15" ),
	array("y" => $res2, "label" => "2015-16" ),
	array("y" => $res3, "label" => "2016-17" ),
	array("y" => $res4, "label" => "2017-18" ),
	array("y" => $res5, "label" => "2018-19" ),
	array("y" => $res6, "label" => "2019-20" ),
	array("y" => $res7, "label" => "2020-21" )
);

$j=1;
	for($i=2016;$i<=date("Y")+1;$i++) {
		$res[$j]= $i;
	$j++;
}
		$k=$j+1;
	$sql1="SELECT * FROM iv_organized WHERE t_from>=. $res[$j] .'-1-1' && t_to<=. $res[$k] .'-12-31''";
	if($res = $mysqli->query($sql1)) {
		
			$resu[$j]=$res->num_rows;
			$j++;
		
	}}
 $j=1;
$dataPoints = array(
	for($i=2016;$i<=date("Y")+1;$i++) {
		array("y" => $resu[$j], "label" => "$res[$j]-$res[$j+1]" );
		$j++;
	}); ?>