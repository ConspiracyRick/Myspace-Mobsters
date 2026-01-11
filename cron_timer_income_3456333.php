<?php
include_once 'conn1651651651651.php';
date_default_timezone_set('US/Eastern');

//
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+ 1 hour'));
$time_stamp = strtotime($datentime_rightnow);
/*
echo $time_stamp;
echo "<br>";
echo $datentime_rightnow;
echo "<br><br>";
*/
//


$result = $mysqli->query("SELECT * FROM characters");
while($row=mysqli_fetch_array($result)){
$id = $row['id'];
$income = $row['income'];
$upkeep = $row['upkeep'];
$payout = $income-$upkeep;
$income_unix_timestamp = $row['income_timer'];
// add timer if there the timer is blank

$tDiff = $income_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;

//echo $mins.":".$secs."<br>";

if($mins <= 0){
if($secs <= 0){
$results_1 = $mysqli->query("UPDATE characters SET income_timer='".$time_stamp."' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET cash=cash+'".$payout."' WHERE id='".$id."'");
}
}

}


?>