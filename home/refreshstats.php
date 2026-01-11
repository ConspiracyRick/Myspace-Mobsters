<?php
ob_start();
include '../maintenance9657456655.php';
if($maintenance == '1'){
echo '<script>window.top.location.href = "../../home/";</script>';
exit;
}

//** PREVENT BOTS
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!IS_AJAX) {
http_response_code(404);
die();
}
session_start();

if(!$_SESSION['user_id'] == null){
require '../conn1651651651651.php';
$user_id = $_SESSION['user_id'];

/*
function abreviateTotalCount($value) {
$abbreviations = array(18 => 'q', 15 => 'Q', 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '');
foreach($abbreviations as $exponent => $abbreviation) 
{
if($value >= pow(10, $exponent)) 
{
return round(floatval($value / pow(10, $exponent)),1).$abbreviation;
}
}
}
*/

// supports negative numbers too
function numberAbbreviation($number, $floating_points = 1) {

    $a = ['', 'K', 'M', 'B', 't', 'q', 'Q', 's', 'S', 'o', 'n', 'd'];
    $n = intval($number);
    $i = intdiv(strlen((string) $n) - 1, 3);
    $m = isset($a[$i]) ? $a[$i] : '';
    $e = $floating_points;

    return number_format($n / (1000 ** $i), $m ? $e : 0) . $m;
}


$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$row = mysqli_fetch_assoc($result);

$character_id = $row['id'];
$character_level = $row['level'];
$character_name = $row['charactername'];

if($row['cash'] == '0'){
$cash = "0";
}
if($row['cash'] < '0'){
$cash = numberAbbreviation($row['cash']);
}
if($row['cash'] > '0'){
$cash = numberAbbreviation($row['cash']);
}
if($row['income'] == '0'){
$income = "0";
$income_non = "0";
}
if($row['income'] > '0'){
$income = numberAbbreviation($row['income']);
$income_non = $row['income'];
}
if($row['income'] < '0'){
$income = "0";
$income_non = $row['income'];
}
if($row['upkeep'] == '0'){
$upkeep = "0";
$upkeep_non = "0";
}
if($row['upkeep'] > '0'){
$upkeep = numberAbbreviation($row['upkeep']);
$upkeep_non = $row['upkeep'];
}
$cashflow = $income_non-$upkeep_non;
if($cashflow == '0'){
$cashflow = "0";
}
if($cashflow < '0'){
$cashflow = numberAbbreviation($cashflow);
}
if($cashflow > '0'){
$cashflow = numberAbbreviation($cashflow);
}

if($row['health'] == '0'){
$health = "0";
$health_non = "0";
}
if($row['health'] > '0'){
$health = numberAbbreviation($row['health']);
$health_non = $row['health'];
}
$max_health = $row['max_health'];


if($row['energy'] == '0'){
$energy = "0";
$energy_non = "0";
}
if($row['energy'] > '0'){
$energy = numberAbbreviation($row['energy']);
$energy_non = $row['energy'];
}
$max_energy = $row['max_energy'];


if($row['stamina'] == '0'){
$stamina = "0";
$stamina_non = $row['stamina'];
}
if($row['stamina'] > '0'){
$stamina = numberAbbreviation($row['stamina']);
$stamina_non = $row['stamina'];
}
$max_stamina = $row['max_stamina'];








if($health_non >= $max_health){
$display_health_timer = "";
$health_time_stamp = "";
$results_1 = $mysqli->query("UPDATE characters SET health_timer='' WHERE id='".$character_id."'");
}else{
$character_health_timer = $row['health_timer'];
if($character_health_timer == ''){
if($health_non < $max_health){
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+3 minutes'));
$health_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET health_timer='".$health_time_stamp."' WHERE id='".$character_id."'");
}
$display_health_timer = "";
$mins = "";
}else{
$tDiff = $character_health_timer - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins < 0){
$mins = "0";
}
if($secs < 10){
if($secs >= 0){
$secs = "0".$secs;
}
if($secs < 0){
$secs = "00";
}
}


if($mins <= '0' && $secs <= '0'){
$health_left = $max_health-$health_non;
if($health_left == '1'){
$results_1 = $mysqli->query("UPDATE characters SET health_timer='' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET health=health+'1' WHERE id='".$character_id."'");
$health_non = $row['health']+1;
$display_health_timer = "";
$health_time_stamp = "";
}else{
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+3 minutes'));
$health_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET health_timer='".$health_time_stamp."' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET health=health+'1' WHERE id='".$character_id."'");
$health_non = $row['health']+1;
$display_health_timer = "0:00";
}
}else{
$health_left = $max_health-1;
if($health_left == '1'){
$display_health_timer = "";
$health_time_stamp = "";
}else{
$display_health_timer = $mins.":".$secs;
$health_time_stamp = $row['health_timer'];
}
}


}
}






if($energy_non >= $max_energy){
$display_energy_timer = "";
$energy_time_stamp = "";
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='' WHERE id='".$character_id."'");
}else{
$character_energy_timer = $row['energy_timer'];
if($character_energy_timer == ''){
if($energy_non < $max_energy){
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+5 minutes'));
$energy_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='".$energy_time_stamp."' WHERE id='".$character_id."'");
}
$display_energy_timer = "";
$mins = "";
}else{
$tDiff = $character_energy_timer - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins < 0){
$mins = "0";
}
if($secs < 10){
if($secs >= 0){
$secs = "0".$secs;
}
if($secs < 0){
$secs = "00";
}
}


if($mins <= '0' && $secs <= '0'){
$energy_left = $max_energy-$energy_non;
if($energy_left == '1'){
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET energy=energy+'1' WHERE id='".$character_id."'");
$energy_non = $row['energy']+1;
$display_energy_timer = "";
$energy_time_stamp = "";
}else{
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+5 minutes'));
$energy_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET energy_timer='".$energy_time_stamp."' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET energy=energy+'1' WHERE id='".$character_id."'");
$energy_non = $row['energy']+1;
$display_energy_timer = "0:00";
}
}else{
$energy_left = $max_energy-1;
if($energy_left == '1'){
$display_energy_timer = "";
$energy_time_stamp = "";
}else{
$display_energy_timer = $mins.":".$secs;
$energy_time_stamp = $row['energy_timer'];
}
}


}
}






if($stamina_non >= $max_stamina){
$display_stamina_timer = "";
$stamina_time_stamp = "";
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='' WHERE id='".$character_id."'");
}else{
$character_stamina_timer = $row['stamina_timer'];
if($character_stamina_timer == ''){
if($stamina_non < $max_stamina){
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+2 minutes'));
$stamina_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='".$stamina_time_stamp."' WHERE id='".$character_id."'");
}
$display_stamina_timer = "";
$mins = "";
}else{
$tDiff = $character_stamina_timer - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins < 0){
$mins = "0";
}
if($secs < 10){
if($secs >= 0){
$secs = "0".$secs;
}
if($secs < 0){
$secs = "00";
}
}


if($mins <= '0' && $secs <= '0'){
$stamina_left = $max_stamina-$stamina_non;
if($stamina_left == '1'){
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET stamina=stamina+'1' WHERE id='".$character_id."'");
$stamina_non = $row['stamina']+1;
$display_stamina_timer = "";
$stamina_time_stamp = "";
}else{
$datentime_rightnow = date('Y-m-d H:i:s', strtotime('+2 minutes'));
$stamina_time_stamp = strtotime($datentime_rightnow);
$results_1 = $mysqli->query("UPDATE characters SET stamina_timer='".$stamina_time_stamp."' WHERE id='".$character_id."'");
$results_2 = $mysqli->query("UPDATE characters SET stamina=stamina+'1' WHERE id='".$character_id."'");
$stamina_non = $row['stamina']+1;
$display_stamina_timer = "0:00";
}
}else{
$stamina_left = $max_stamina-1;
if($stamina_left == '1'){
$display_stamina_timer = "";
$stamina_time_stamp = "";
}else{
$display_stamina_timer = $mins.":".$secs;
$stamina_time_stamp = $row['stamina_timer'];
}
}


}
}



// for visual of how much is left
$health =  $health_non;
$max_health = $row['max_health'];
if($health == ''){
}elseif($health == '0'){
$percent_health = $health/$max_health;
$total_health = number_format($percent_health * 100, 2 ). '%';
}elseif($health == $max_health){
$percent_health = $health/$max_health-1;
$total_health = number_format($percent_health * 100-1, 2 ). '%';
}elseif($health > '0'){
if($health < $max_health){
$percent_health = $health/$max_health;
//echo "<font size='6' color='white'>".$percent_health."</font><br>";
$total_health = number_format($percent_health * 100-1, 2 ). '%';
//echo "<font size='6' color='white'>".$total_health."</font><br>";
}else{
$total_health = '98%';
}
}

$energy = $energy_non;
$max_energy = $row['max_energy'];
if($energy == ''){
}elseif($energy == 0){
$percent_energy = $energy/$max_energy;
$total_energy = number_format($percent_energy * 100, 2 ). '%';
}elseif($energy == $max_energy){
$total_energy = '98%';
}elseif($energy > 0){
if($energy < $max_energy){
$percent_energy = $energy/$max_energy;
//echo "<font size='6' color='white'>".$percent_energy."</font><br>";
$total_energy = number_format($percent_energy * 100-1, 2 ). '%';
//echo "<font size='6' color='white'>".$total_energy."</font><br>";
}else{
$total_energy = '98%';
}
}

$stamina = $stamina_non;
$max_stamina = $row['max_stamina'];
if($stamina == ''){
}elseif($stamina == '0'){
$percent_stamina = $stamina/$max_stamina;
$total_stamina = number_format($percent_stamina * 100, 2 ). '%';
}elseif($stamina == $max_stamina){
$percent_stamina = $stamina/$max_stamina-1;
$total_stamina = number_format($percent_stamina * 100-1, 2 ). '%';
}elseif($stamina > '0'){
if($stamina < $max_stamina){
$percent_stamina = $stamina/$max_stamina;
//echo "<font size='6' color='white'>".$percent_stamina."</font><br>";
$total_stamina = number_format($percent_stamina * 100-1, 2 ). '%';
//echo "<font size='6' color='white'>".$total_stamina."</font><br>";
}else{
$total_stamina = '98%';
}
}
// for visual of how much is left


$health_non = numberAbbreviation($health_non);
$energy_non = numberAbbreviation($energy_non);
$stamina_non = numberAbbreviation($stamina_non);

//** get exp required to hit next level 
$player_level_1 = $row['level'];
$get_exp_required = "0";
if($player_level_1 < '1000'){
$get_exp_required = "1000000";
if($player_level_1 < '601'){
$get_exp_required = "100000";
if($player_level_1 < '501'){
$get_exp_required = "10000";
if($player_level_1 < '401'){
$get_exp_required = "1000";
if($player_level_1 < '316'){
$get_exp_required = "500";
if($player_level_1 < '116'){
$get_exp_required = "300";
if($player_level_1 < '16'){
$get_exp_required = "100";
if($player_level_1 < '10'){
$get_exp_required = "40";
if($player_level_1 < '6'){
$get_exp_required = "20";
}
}
}
}
}
}
}
}
}

if($get_exp_required == '0'){
$experience_level = '100%';
}else{
$experience = $row['experience'];
//$experience_gained = $row['experience_gained'];
//$max_experience = $row['max_experience'];

if($experience > $get_exp_required){
$experience_level = '100%';
}else{
$percent = $experience/$get_exp_required;
$experience_level = number_format( $percent * 100, 2 ) . '%';
}
}

$character_name = strlen($character_name) > 10 ? substr($character_name,0,10).".." : $character_name;

$can_mob_1 = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1') OR (request_id='".$character_id."' AND accepted='1')");
$ismob_1 = mysqli_num_rows($can_mob_1);

$total_mobsize = 1+$row['hired_guns']+$ismob_1;

$arr = array('characterid' => $character_id, 'charactername' => $character_name, 'cash' => $cash, 'income' => $income, 'upkeep' => $upkeep, 'cashflow' => $cashflow, 'health' => $health_non, 'maxhealh' => $max_health, 'healthtimer' => $health_time_stamp, 'totalhealth' => $total_health, 'energy' => $energy_non, 'maxenergy' => $max_energy, 'energytimer' => $energy_time_stamp, 'totalenergy' => $total_energy, 'stamina' => $stamina_non, 'maxstamina' => $max_stamina, 'staminatimer' => $stamina_time_stamp, 'totalstamina' => $total_stamina, 'level' => $character_level, 'allxp' => $experience_level, 'mobsize' => $total_mobsize);
echo json_encode($arr);
}
?>