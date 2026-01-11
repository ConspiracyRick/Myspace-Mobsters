<?php
ob_start();
include '../maintenance9657456655.php';
if($maintenance == '1'){
?>
<title>Mobsters</title>
<style>
body {

background: url("./images/tycoon_top.jpg"), url("./images/tycoon_main_dark.jpg");
background-repeat: no-repeat, no-repeat;
background-position: center top, center 70px;
background-size: 1120px 70px, 1120px 600px;

background-color: black;
}
</style>
<?php $load = rand(10000000,999999999); //$load = "0"; ?>
<link rel="stylesheet" href="css/style.css?update=<?php echo $load; ?>">
<center><a style='color:white;text-decoration:none;' href='logout.php'>[Logout]</a></center>
<div class="main" style="width:100%;">
<table align="center" style="margin-top:100px;border:solid 1px #505050;background-color:#F1F0F0;color:#404040;margin-left:auto;margin-right:auto;height:40;width:370px;">
<tr>
<td style="padding-bottom:3px;padding-top:3px;"><center><font size="4"><b>We're under Maintenance</b><br><font size="4"><b>We will be right back!</b></font></center></td>
</tr>
</table>
<div style="margin-left:auto;margin-right:auto;width:1020px;height:5000px;padding-left:40px;padding-top:35px;">
<div id="main_container">
</div></div></div>
<?php
exit;
}

$characters_allowed = "5";
session_start();
if(!$_SESSION['user_id'] == null){
$user_id = $_SESSION['user_id'];
require '../conn1651651651651.php';

//echo "<font color='white'>User ID: ".$user_id."</font><br>";
//echo "<font color='white'>Character ID: ".$_SESSION['character_id']."</font><br>";

/* testing */
if(!isset($_GET['create'])){
if($_SESSION['character_id'] == ''){
$check_existence = $mysqli->query("SELECT * FROM registered_users WHERE id='".$_SESSION['user_id']."'");
$c = mysqli_num_rows($check_existence);
// if user id exists.
if($c > 0){
$resu = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$_SESSION['user_id']."' AND characterloaded='1'");
$cont = mysqli_num_rows($resu);
// if theres no character loaded. Load one.
if($cont == 0){
$re = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$_SESSION['user_id']."' order by RAND() LIMIT 1");
$lp = mysqli_fetch_assoc($re);
$_SESSION['character_id'] = $lp['id'];
echo "<center><font size='5' color='black'>Loading Character ID: ".$_SESSION['character_id']."</font></center>";
header('Location: ../../');
exit;
}
// if theres a character already loaded.
if($cont > 0){
$kl = mysqli_fetch_assoc($resu);
$_SESSION['character_id'] = $kl['id'];
header('Location: ../../');
exit;
}
}
// if user id does not exist.
if($c == 0){
session_destroy();
echo "<center><font size='5' color='red'>User ID: ".$user_id." does not exist!</font></center>";
//header('Location: ../../');
exit;
}
exit;
} // if character id is blank.
} // if not trying to create a character.
/*
// old code
if($_SESSION['character_id'] == ''){
$resu = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$_SESSION['user_id']."' AND characterloaded='1'");
$cont = mysqli_num_rows($resu);
if($cont > 0){
$kl = mysqli_fetch_assoc($resu);
$_SESSION['character_id'] = $kl['id'];
header('Location: ../../');
exit;
}
}
*/
?>
<title>Mobsters</title>
<style>
body {

background: url("./images/tycoon_top.jpg"), url("./images/tycoon_main_dark.jpg");
background-repeat: no-repeat, no-repeat;
background-position: center top, center 70px;
background-size: 1120px 70px, 1120px 600px;

background-color: black;
}
</style>
<?php $load = rand(10000000,999999999); //$load = "0"; ?>
<script src="js/jquery-1.5.1.min.js?update=<?php echo $load; ?>"></script>
<script src="js/jquery.js?update=<?php echo $load; ?>" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css?update=<?php echo $load; ?>">
<?php
if($_SESSION['character_id'] !== ''){
echo "<center><a style='color:white;text-decoration:none;' href='logout.php'>[Logout]</a></center>";
if($maintenance == '0'){
?>
<script>
window.onload = function() {
load_game();
}
</script>

<div id="header" style='display:none;'>
<?php
require '../conn1651651651651.php';
$re = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$_SESSION['user_id']."' AND characterloaded='1' LIMIT 1");
$check_if_loaded_still = mysqli_num_rows($re);
if($check_if_loaded_still == 0){
session_destroy();
header('Location: ../');
exit;
}
$row = mysqli_fetch_assoc($re);
$character_id = $row['id'];

function numberAbbreviation($number, $floating_points = 1) {

    $a = ['', 'K', 'M', 'B', 't', 'q', 'Q', 's', 'S', 'o', 'n', 'd'];
    $n = intval($number);
    $i = intdiv(strlen((string) $n) - 1, 3);
    $m = isset($a[$i]) ? $a[$i] : '';
    $e = $floating_points;

    return number_format($n / (1000 ** $i), $m ? $e : 0) . $m;
}

$health = $row['health'];
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

$energy = $row['energy'];
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

$stamina = $row['stamina'];
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

$name = $row['charactername'];

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
$total = '100%';
}else{
$experience = $row['experience'];
//$experience_gained = $row['experience_gained'];
//$max_experience = $row['max_experience'];

if($experience > $get_exp_required){
$total = '100%';
}else{
$percent = $experience/$get_exp_required;
$total = number_format( $percent * 100, 2 ) . '%';
}
}
$name = strlen($name) > 10 ? substr($name,0,10).".." : $name;
?>


<div style="float:right;width:170px;margin-top:10px;margin-right:0px;">
<div style="vertical-align:top;">
<div class="statCell" style="font-size:15px;color:orange;width:100%;max-width:180px;overflow-x:hidden;padding:0px 0px 5px 0px;" id="name"><b><span id="charactername"><?php echo $name; ?></span></b> <a id="cidon" class="stats" onclick="var chid='<?php echo $row['id']; ?>'; user_stats(chid);" style='cursor:pointer;text-decoration: underline;color:#BEB9D0;'>(stats)</a></div>
<div class="statCell" style="font-size:15px;color:#17B117;width:100%;max-width:100px;overflow-x:hidden;" id="levelstat"><b>Level:<span id="level"><?php echo $row['level']; ?></span></b></div>
<div class="statCell" style="font-size:15px;width:100%;max-width:150px;overflow-x:hidden;padding:0px 0px 5px 0px;" id="mobstat"><div style="background-color:#6C6F6C;width:70%;border: 1px solid;border-radius:2px;"><div id="allxp" style="background-color:#17B117;height:4px;width:<?php echo $total; ?>"></div></div></div>
<?php
//check mobbies
$can_mob_1 = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1') OR (request_id='".$character_id."' AND accepted='1')");
$ismob_1 = mysqli_num_rows($can_mob_1);
$total_mobsize = 1+$row['hired_guns']+$ismob_1;

//check topmob
$topcount = "0";
$toop_mobb = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1' AND from_top_mob='1') OR (request_id='".$character_id."' AND accepted='1' AND request_top_mob='1')");
$c_toop_mobb = mysqli_num_rows($toop_mobb);
?>
<div class="statCell" style="font-size:14px;color:white;width:100%;max-width:150px;overflow-x:hidden;padding:0px 0px 0px 0px;" id="hgsstat">Mob size: <span id="mobbies"><?php echo $total_mobsize; ?></span><font size='2' color="orange"><b> +<?php echo $c_toop_mobb; ?></b></font></div>			
</div>
<div style="float:right;width:170px;margin-top:20px;margin-right:0px;"><input id='refresh_button' onclick="refresh()" type="button" value='REFRESH'></div>
</div>

<div style='width:850px;background: hsla(5,5%,5%,0.7);height:28px;position:relative;top:95;left:7%;'>

<div class="statCellNew" style="margin-top: 5px; padding: 0px;position: relative; color:white;width:100%;max-width: 90px;display:inline-block; text-align:left;font-size:15px;">Cash:<span id='cash' style='font-size:14px;color:yellow;' class="incomeTitleText">$<?php echo $cash; ?></span></div>
<div class="statCellNew" style="margin-top: 5px; padding: 0px;position: relative; color:white;width:100%; max-width: 130px;display:inline-block;text-align:left;font-size:15px;">Cash Flow:<span style='font-size:14px;' id="cashflow">$<?php echo $cashflow; ?></span></div>

<?php
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
?>
<div class="statCellNew" style="width:100%;max-width: 200px; display:inline-block;text-align:left;margin:0px; padding: 0px;">
<div id="healthStatus" class="statCell" style="position: relative; left: 0px; top: 0px;">
<div style="position: absolute; left: 0px; top: -14px;">
<ul style="margin: 0px; padding: 0px; list-style-type: none;">
<li style="margin: 0px; float: left; padding: 1px;">
<img style="margin: 0px; width: 16px; height: 16px;" src="../../home/images/s_health.gif">
</li>
<li style="margin: 0px; padding: 0px; float: left; position: relative; width: 112px; height: 16px; background-color: black; border: 1px solid rgb(136, 0, 0);">
<div id="totalhealth" style="margin: 0px; padding: 0px; width:<?php echo $total_health; ?>; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;"></div>

<div style="font-size:15px;margin: 0px; float: left; position: absolute; left: 5px; top: 0px; height: 14px; color: rgb(170, 170, 170);">Health <span class="statsBarReloadTimer" style="width:100px;float:left;position: absolute;top: -20px;left:40px;"><span id="healthtimer"><?php echo $display_health_timer; ?></span></span></div></li>
<li style="margin: 0px; float: left; padding: 0px;overflow-y:hidden;overflow-x:hidden;">
<div id="health" style="font-size:15px;color:white;margin-left: 3px; width: 100%; height: 16px;"><?php echo $health; ?></div></li>
</ul></div>
<div class="" style="display:none;"></div>
</div>
</div>

<script>
<?php if($character_health_timer == ''){ ?>
var healthremainingTime = '';
<?php }else{ ?>
var healthremainingTime = '<?php echo $character_health_timer; ?>';
<?php } ?>

<?php if($character_energy_timer == ''){ ?>
var energyremainingTime = '';
<?php }else{ ?>
var energyremainingTime = '<?php echo $character_energy_timer; ?>';
<?php } ?>

<?php if($character_stamina_timer == ''){ ?>
var staminaremainingTime = '';
<?php }else{ ?>
var staminaremainingTime = '<?php echo $character_stamina_timer; ?>';
<?php } ?>
</script>

<div class="statCellNew" style="width:100%;max-width: 200px;display:inline-block;text-align:left;margin: 0px; padding: 0px;">
<div id="energyStatus" class="statCell" style="position: relative; left: 0px; top: 0px;">
<div style="position: absolute; left: 0px; top: -14px;">
<ul style="margin: 0px; padding: 0px; list-style-type: none;">
<li style="margin: 0px; float: left; padding: 1px;">
<img style="margin: 0px; width: 16px; height: 16px;" src="../../home/images/s_energy.gif"></li>
<li style="margin: 0px; padding: 0px; float: left; position: relative; width: 112px; height: 16px; background-color: black; border: 1px solid rgb(136, 0, 0);">
<div id="totalenergy" style="margin: 0px; padding: 0px; width: <?php echo $total_energy; ?>; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;"></div>

<div style="font-size:15px;color:white;margin: 0px; float: left; position: absolute; left: 5px; top: 0px; height: 14px; color: rgb(170, 170, 170);">Energy<span class="statsBarReloadTimer" style="width:100px;float:left;position: absolute;top: -20px;left:40px;"><span id="energytimer"><?php echo $display_energy_timer; ?></span></span></div>

</li>
<li style="margin: 0px; float: left; padding: 0px;overflow-y:hidden;overflow-x:hidden;">
<div id="energy" style="font-size:15px;color:white;margin-left: 3px; width: 100%; height: 16px;"><?php echo $energy; ?></div>
</li>
</ul></div><div class="" style="display:none;"></div>
</div>
</div>
<div class="statCellNew" style="width:100%;max-width: 200px; display:inline-block;text-align:left;margin: 0px; padding: 0px;">
<div id="staminaStatus" class="statCell" style="position: relative; left: 0px; top: 0px;">
<div style="position: absolute; left: 0px; top: -14px;"><ul style="margin: 0px; padding: 0px; list-style-type: none;">
<li style="margin: 0px; float: left; padding: 0px;">
<img style="margin: 0px; width: 16px; height: 16px;" src="../../home/images/s_stamina.gif"></li>
<li style="margin: 0px; padding: 0px; float: left; position: relative; width: 112px; height: 16px; background-color: black; border: 1px solid rgb(136, 0, 0);">
<div id="totalstamina" style="margin: 0px; padding: 0px; width: <?php echo $total_stamina; ?>; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;"></div>

<div style="font-size:15px;color:white;margin: 0px; float: left; position: absolute; left: 5px; top: 0px; height: 14px; color: rgb(170, 170, 170);">Stamina<span class="statsBarReloadTimer" style="width:100px;float:left;position: absolute;top: -20px;left:40px;"><span id="staminatimer"><?php echo $display_stamina_timer; ?></span></span></div>
</li>
<li style="margin: 0px; float: left; padding: 0px;overflow-y:hidden;overflow-x:hidden;">
<div id="stamina" style="font-size:15px;color:white;margin-left: 3px; width: 100%; height: 16px;"><?php echo $stamina; ?></div>
</li>
</ul></div>
<div class="" style="display:none;"></div></div>
</div>
</div>

</div>

<div class="main" style='width:100%;'>
<table id="loading" style="margin-top:100px;border:solid 1px #505050;background-color:#F1F0F0;color:#404040;margin-left:auto;margin-right:auto;height:40;width:370px;">
<tr>
<td style="padding-bottom:3px;padding-top:3px;"><center><font size="4"><b>Loading your info...</b></font><br><font size="1"><b>(Please do not refresh unless this takes more than 30 seconds)</b></font></center></td>
</tr>
</table>
<table id='loadtabs' style='display:none;'><tr><td>
<div id='main' class='nav_selected'>Main</div>	
<div id='missions' class='top-nav'>Missions</div>
<div id='territory' class='top-nav'>Territory</div>	
<div id='bank' class='top-nav'>Bank</div>
<div id='godfather' class='top-nav'>Godfather</div>
<div id='fight' class='top-nav'>Attack</div>
<div id='hitlist' class='top-nav'>Hit List</div>	
<div id='equipment' class='top-nav'>Equipment</div>
<div id='hospital' class='top-nav'>Hospital</div>										
<div id='mymob' class='top-nav'>My Mob</div>
<div id='mymobster' class='top-nav'>My Mobster</div>
<div id='mademen' class='top-nav'>Made Men</div>
<div id='help' class='top-nav'>Help</div>
</td></tr></table>
<div style="border: 0px solid red;margin-left:auto;margin-right:auto;height:5000px;padding-left:40px;padding-top:35px;">
<table style='padding-left:30px;width:1020;' align='left'><tr><td><div id='status' style='position:relative;top:0;width:100%;'></div></td></tr></table>
<div style="display:none;" id="main_container"></div>
</div></div>

<?php
}
}else{
?>
<div id='welcome' class="welcome"></div>
<table style='width:990px;' align='center'><tr><td><div style='width:100%;' id="error_debug"></div></td></tr></table>
<form id="npform" onsubmit="setTimeout(function(){try{mobsterconfirm();}catch(e){ console.log(e); }},250);return false;" >
<table style='width:900px;' align='center' border='0'><tr><td>
						<div style="font-size:24px;color:white;max-width:100%;border-bottom: 1px solid white;">Pick a Name</div>
						<div style='padding-top:10px;'><input type = "text" id = "mobName"  aoninput="this.value = this.value.replace(/[^A-Za-z0-9 ]/g, ''); " name = "mobName" placeholder = "Type Name Here" autocomplete='off' /><b><font color='grey'> Please be tasteful</font></b></div> 
						<br>
						<div style="font-size:24px;color:white;max-width:100%;border-bottom: 1px solid white;">Pick a Specialty</div>
</td></tr></table>

<table align='center' border='0'><tr><td>

<table id="0" align='left' style='border: 1px solid #585A5C;color:white;'>
<tr>
<td style='border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;'><input type="radio" id="special" name="special" onclick="chooseclass();" value="0"> <b>Nightowl</b></td>
</tr>
<tr>
<td><img src="images/js0.png" width="210" height="200"></td>
</tr>
<tr>
<td style='padding-bottom:47px;'><center><font size='4' color='#585A5C'>Regains energy<br>faster. You'll need<br>energy to do missions.</font></center></td>
</tr>
</table>

<table id="1" align='left' style='border: 1px solid #585A5C;color:white;'>
<tr>
<td style='border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;'><input type="radio" id="special" name="special" onclick="chooseclass();" value="1"> <b>Soldato</b></td>
</tr>
<tr>
<td><img src="images/js1.png" width="210" height="200"></td>
</tr>
<tr>
<td style='padding-bottom:25px;'><center><font size='4' color='#585A5C'>Regains health faster.<br>Health is important<br>when fighting against<br>enemy mobsters.</font></center></td>
</tr>
</table>

<table id="2" align='left' style='border: 1px solid #585A5C;color:white;'>
<tr>
<td style='border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;'><input type="radio" id="special" name="special" onclick="chooseclass();" value="2"> <b>Mogul</b></td>
</tr>
<tr>
<td><img src="images/js2.png" width="210" height="200"></td>
</tr>
<tr>
<td style='padding-bottom:25px;'><center><font size='4' color='#585A5C'>Your territories pay<br>income more often,<br>giving you more $$$<br>for good equipment.</font></center></td>
</tr>
</table>

<table id="3" align='left' style='border: 1px solid #585A5C;color:white;'>
<tr>
<td style='border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;'><input type="radio" id="special" name="special" onclick="chooseclass();" value="3"> <b>Renegade</b></td>
</tr>
<tr>
<td><img src="images/js3.png" width="210" height="200"></td>
</tr>
<tr>
<td style='padding-bottom:3px;'><center><font size='4' color='#585A5C'>This "jack of all<br>trades" gets smaller<br>bonuses, But to<br>everything! Health,<br>Energy and $$$</font></center></td>
</tr>
</table>

</td></tr></table>

<table style='padding-top:10px;' align='center' border='0'><tr><td>
<div class="buttonDiv" style="font-size:14px; "><a class="button button_blue" onclick="$('#npform').submit();"><span style="font-size:14px;">Continue</span></a></div></form>
</td></tr></table>
<?php
} // if no character id is found
}else{ // if session user id not found redirect to login
header('Location: ../../');
exit;
}
?>