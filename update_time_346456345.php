<?php
include_once 'conn1651651651651.php';
date_default_timezone_set('US/Eastern');

//
$health_datentime_rightnow = date('Y-m-d H:i:s', strtotime('+3 minutes'));
$health_time_stamp = strtotime($health_datentime_rightnow);
//echo $health_time_stamp;
//echo "<br>";
//echo $health_datentime_rightnow;
//echo "<br><br>";
//

$result = $mysqli->query("SELECT * FROM characters");
while($row=mysqli_fetch_array($result)){
$id = $row['id'];
$upkeep = $row['upkeep'];
$health = $row['health'];
$max_health = $row['max_health'];
$health_unix_timestamp = $row['health_timer'];
// add timer if there the timer is blank

$difference_in_health = abs($health-$max_health);
$difference_in_health = trim($difference_in_health);

//echo "*".$difference_in_health."*<br>";
if($difference_in_health == '1'){
if($health_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET health_timer='".$health_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $health_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET health_timer='' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET health=health+'1' WHERE id='".$id."'");
//echo $difference_in_health."<br>";
}
}
}else{

if($health < $max_health){
if($health_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET health_timer='".$health_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $health_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
//echo $mins.":".$secs."<br>";
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET health_timer='".$health_time_stamp."' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET health=health+'1' WHERE id='".$id."'");
}
} // if timestamp is blank
} // if health is lower than max health
} // if health is 1 away

}















//
$energy_datentime_rightnow = date('Y-m-d H:i:s', strtotime('+5 minutes'));
$energy_time_stamp = strtotime($energy_datentime_rightnow);
//echo $energy_time_stamp;
//echo "<br>";
//echo $energy_datentime_rightnow;
//echo "<br><br>";
//

$result = $mysqli->query("SELECT * FROM characters");
while($row=mysqli_fetch_array($result)){
$id = $row['id'];
$upkeep = $row['upkeep'];
$energy = $row['energy'];
$max_energy = $row['max_energy'];
$energy_unix_timestamp = $row['energy_timer'];
// add timer if there the timer is blank

$difference_in_energy = abs($energy-$max_energy);
$difference_in_energy = trim($difference_in_energy);

//echo "*".$difference_in_energy."*<br>";
if($difference_in_energy == '1'){
if($energy_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='".$energy_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $energy_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET energy=energy+'1' WHERE id='".$id."'");
//echo $difference_in_energy."<br>";
}
}
}else{

if($energy < $max_energy){
if($energy_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='".$energy_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $energy_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
//echo $mins.":".$secs."<br>";
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='".$energy_time_stamp."' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET energy=energy+'1' WHERE id='".$id."'");
}
} // if timestamp is blank
} // if energy is lower than max energy
} // if energy is 1 away

}












//
$stamina_datentime_rightnow = date('Y-m-d H:i:s', strtotime('+2 minutes'));
$stamina_time_stamp = strtotime($stamina_datentime_rightnow);
//echo $stamina_time_stamp;
//echo "<br>";
//echo $stamina_datentime_rightnow;
//echo "<br><br>";
//

$result = $mysqli->query("SELECT * FROM characters");
while($row=mysqli_fetch_array($result)){
$id = $row['id'];
$upkeep = $row['upkeep'];
$stamina = $row['stamina'];
$max_stamina = $row['max_stamina'];
$stamina_unix_timestamp = $row['stamina_timer'];
// add timer if there the timer is blank

$difference_in_stamina = abs($stamina-$max_stamina);
$difference_in_stamina = trim($difference_in_stamina);

//echo "*".$difference_in_stamina."*<br>";
if($difference_in_stamina == '1'){
if($stamina_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='".$stamina_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $stamina_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET stamina=stamina+'1' WHERE id='".$id."'");
//echo $difference_in_stamina."<br>";
}
}
}else{

if($stamina < $max_stamina){
if($stamina_unix_timestamp == ''){
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='".$stamina_time_stamp."' WHERE id='".$id."'");
}else{
$tDiff = $stamina_unix_timestamp - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
//echo $mins.":".$secs."<br>";
if($mins <= '0' && $secs <= '0'){
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='".$stamina_time_stamp."' WHERE id='".$id."'");
$results_2 = $mysqli->query("UPDATE characters SET stamina=stamina+'1' WHERE id='".$id."'");
}
} // if timestamp is blank
} // if stamina is lower than max stamina
} // if stamina is 1 away

}
?>