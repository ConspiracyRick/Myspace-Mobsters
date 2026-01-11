<?php
ob_start();
include '../../maintenance9657456655.php';
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
date_default_timezone_set('US/Eastern');

$characters_allowed = "10";
if(!$_SESSION['user_id'] == null){
require '../../conn1651651651651.php';
$user_id = $_SESSION['user_id'];
$character_id = $_SESSION['character_id'];

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if(isset($_GET['load_character'])){
$character_to_load = trim($_GET['load_character']);
$character_to_load = stripcslashes($character_to_load);
$character_to_load = $mysqli -> real_escape_string($character_to_load);
//$character_to_load = mysqli_real_escape_string($mysqli, $character_to_load);

// make sure character belongs to the owner.
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND id='".$character_to_load."'");
$count = mysqli_num_rows($result);
if($count > 0){
$result_56743 = $mysqli->query("UPDATE characters SET characterloaded='0' WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$result_56743 = $mysqli->query("UPDATE characters SET characterloaded='1' WHERE id='".$character_to_load."'") or die(mysqli_error("Error.."));
$_SESSION['character_id'] = $character_to_load;
?>
{
"status": "Eccellente!",
"message": "Character has been loaded."
}
<?php
exit;
}else{
?>
{
"status": "Insuccesso:",
"message": "Failed to load character."
}
<?php
exit;
}
}


if(isset($_GET['start_new_game'])){
// check if we can create characters.
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."'");
$count = mysqli_num_rows($result);
if($count >= $characters_allowed){
echo '{
  "status": "Insuccesso:",
  "message": "You have enough characters for now."
}';
exit;
}
if($count < $characters_allowed){
$result = $mysqli->query("UPDATE characters SET characterloaded='0' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$_SESSION['character_id'] = "";
echo '{
  "status": "Eccellente!",
  "message": "You can create another character."
}';
exit;
}
// check if we can create characters.
exit;
}
if(isset($_GET['create_character'])){
// check if we can create characters.
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."'");
$count = mysqli_num_rows($result);
if($count >= $characters_allowed){
echo '{
  "status": "Insuccesso:",
  "message": "You have enough characters for now."
}';
exit;
}
// check character creation.
if(isset($_GET['name'])){
$name = trim($_GET['name']);
$name = stripcslashes($name);
$name = $mysqli -> real_escape_string($name);

$class = trim($_GET['class']);
$class = stripcslashes($class);
$class = $mysqli -> real_escape_string($class);

if($name == '' || $class == '' || $class > '3'){
echo '{
  "status": "Insuccesso:",
  "message": "Please fill in all fields."
}';
}else{
if(strlen($name) > 16) {
echo '{
  "status": "Insuccesso:",
  "message": "Your name is too long."
}';
}else{
if(ctype_alnum($name)){
$result = $mysqli->query("SELECT * FROM characters WHERE charactername='".$name."'");
$count = mysqli_num_rows($result);
if($count > 0){
echo '{
  "status": "Insuccesso:",
  "message": "Sorry, '.$name.' is taken."
}';
}else{
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."'");
$count = mysqli_num_rows($result);
if($count >= $characters_allowed){
echo '{
  "status": "Insuccesso:",
  "message": "You have enough characters for now."
}';
}else{
$income_datentime_rightnow = date('Y-m-d H:i:s', strtotime('+ 1 hour'));
$income_time_stamp = strtotime($income_datentime_rightnow);

$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);

$mysqli->query("INSERT INTO characters (belongsto, charactername, character_created, income_timer, health_timer, energy_timer, stamina_timer, class, claimedbonus) VALUES('$user_id','$name','$time_stamp','$income_time_stamp','','','','$class','')")or die(mysqli_error());

$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$count = mysqli_num_rows($result);
if($count > 0){
$y = mysqli_fetch_assoc($result);
$_SESSION['character_id'] = $y['id'];
}

echo '{
"status": "success",
"message": "Welcome, '.$name.'",
"name": "'.$name.'",
"class": "'.$class.'"
}';

}
}
}else{
echo '{
  "status": "Insuccesso:",
  "message": "Please remove any special characters."
}';
}

}
}
exit;
} // check character creation.
exit;
} // create character


$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);

$max_health = $row['max_health'];
$max_energy = $row['max_energy'];
$max_stamina = $row['max_stamina'];
$attack_strength = $row['attack_strength'];
$defense_power = $row['defense_power'];
$skill_points = $row['skill_points'];

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

$experience = $row['experience'];
//$max_experience = $row['max_experience'];
//$experience_gained = $row['experience_gained'];
$left_to_gain = $get_exp_required-$experience;

if(isset($_GET['statincrease'])){
$stat_increase = trim($_GET['statincrease']);
$stat_increase = stripcslashes($stat_increase);
$stat_increase = $mysqli -> real_escape_string($stat_increase);

if($skill_points == '0'){
?>
{
"status": "Insuccesso:",
"message": "You have no more skill points."
}
<?php
}else{

if($stat_increase == 'increase_attack_strength'){
$update = $mysqli->query("UPDATE characters SET skill_points=skill_points-1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$update_2 = $mysqli->query("UPDATE characters SET attack_strength=attack_strength+1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "Your attack has been increased."
}
<?php
}

if($stat_increase == 'increase_defense_power'){
$update = $mysqli->query("UPDATE characters SET skill_points=skill_points-1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$update_2 = $mysqli->query("UPDATE characters SET defense_power=defense_power+1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "Your defense power has been increased."
}
<?php
}

if($stat_increase == 'increase_energy'){
$update = $mysqli->query("UPDATE characters SET skill_points=skill_points-1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$update_2 = $mysqli->query("UPDATE characters SET max_energy=max_energy+1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "Your max energy has been increased."
}
<?php
}

if($stat_increase == 'increase_health'){
$update = $mysqli->query("UPDATE characters SET skill_points=skill_points-1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$update_2 = $mysqli->query("UPDATE characters SET max_health=max_health+10 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "Your max health has been increased."
}
<?php
}

if($stat_increase == 'increase_stamina'){
$update = $mysqli->query("UPDATE characters SET skill_points=skill_points-2 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$update_2 = $mysqli->query("UPDATE characters SET max_stamina=max_stamina+1 WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "Your max stamina has been increased."
}
<?php
}






}
exit;
}
?>
<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Your Mobster  <a onclick="var id='<?php echo $character_id; ?>'; user_stats(id);" style='font-size:16;cursor:pointer;color:#ACC6FB;'>stats</a></td></tr></table>

<?php if($get_exp_required == '0'){ }else{ ?>
<div style='padding:25px 0px 0px 0px;font-size:20px;color:grey;' align='center'>
<font color='white'>You need <b><?php echo number_format($left_to_gain); ?></b> more experience points to gain another level.</font>
</div>
<?php } ?>
<?php if($skill_points > '0'){ ?>
<div style='padding:25px 0px 0px 0px;font-size:20px;color:grey;' align='center'>
<font color='white'>You have <b><?php echo number_format($skill_points); ?></b> skill points.</font>
</div>
<?php } ?>

<div style='padding:25px 0px 0px 15px;'>
<table border='0' style='color:white;' align='left'>
<tr>
<td style='padding:5px 5px 5px 5px;background-color:#44150B;width:200px;'><b>Stat</b></td><td style='padding:5px 5px 5px 5px;background-color:#44150B;width:100px;'><b>Score</b></td><td style='padding:5px 5px 5px 5px;background-color:#44150B;width:210px;'><b>Action</b></td><td style='padding:5px 5px 5px 5px;background-color:#44150B;width:400px;'><b>Explanation</b></td>
</tr>
<tr>
<td><table border='0'><tr><td style='width:40px;'><center><img src="images/attack.png"></td><td style='padding-left:10px;font-size:20px;color:white;'>Attack Strength</td></tr></table></td><td style='text-align:right;padding-right:15px;font-size:20px;color:white;'><?php echo $attack_strength; ?></td><?php if($skill_points > '0'){ ?>
<td style='padding-left:60px;font-size:15px;color:#DE6452;'><div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="increase_attack_strength" class="button button_blue" onclick="increase(this.id);">
<span style="font-size:14px;">Increase</span>		
</a>
</div></td>
<?php }else{ ?> <td style='padding-left:35px;font-size:15px;color:#DE6452;'>Insufficient skill points</td> <?php } ?>
<td style='padding-top:10px;padding-left:10px;width:100px;font-size:15px;color:white;'>Higher attack strength makes you more successful when attacking other mobsters.</td>
</tr>
<tr>
<td><table border='0'><tr><td style='width:40px;'><center><img src="images/defense.png"></td><td style='padding-left:10px;font-size:20px;color:white;'>Defense Power</td></tr></table></td><td style='text-align:right;padding-right:15px;font-size:20px;color:white;'><?php echo $defense_power; ?></td><?php if($skill_points > '0'){ ?>
<td style='padding-left:60px;font-size:15px;color:#DE6452;'><div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="increase_defense_power" class="button button_blue" onclick="increase(this.id);">
<span style="font-size:14px;">Increase</span>		
</a>
</div></td><?php }else{ ?> 
<td style='padding-left:35px;font-size:15px;color:#DE6452;'>Insufficient skill points</td> <?php } ?>
<td style='padding-top:10px;padding-left:10px;width:100px;font-size:15px;color:white;'>Higher defense power makes you less vulnerable to the attacks of other mobsters.</td>
</tr>
<tr>
<td><table border='0'><tr><td style='width:40px;'><center><img src="images/energy.png"></td><td style='padding-left:10px;font-size:20px;color:white;'>Max Energy</td></tr></table></td><td style='text-align:right;padding-right:15px;font-size:20px;color:white;'><?php echo $max_energy; ?></td><?php if($skill_points > '0'){ ?>
<td style='padding-left:60px;font-size:15px;color:#DE6452;'><div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="increase_energy" class="button button_blue" onclick="increase(this.id);">
<span style="font-size:14px;">Increase</span>		
</a>
</div></td><?php }else{ ?> 
<td style='padding-left:35px;font-size:15px;color:#DE6452;'>Insufficient skill points</td> <?php } ?>
<td style='padding-top:10px;padding-left:10px;width:100px;font-size:15px;color:white;'>Higher maximum energy lets you complete more missions more quickly.</td>
</tr>
<tr>
<td><table border='0'><tr><td style='width:40px;'><center><img src="images/health.png"></td><td style='padding-left:10px;font-size:20px;color:white;'>Max Health</td></tr></table></td><td style='text-align:right;padding-right:15px;font-size:20px;color:white;'><?php echo $max_health; ?></td><?php if($skill_points > '0'){ ?>
<td style='padding-left:60px;font-size:15px;color:#DE6452;'><div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="increase_health" class="button button_blue" onclick="increase(this.id);">
<span style="font-size:14px;">Increase</span>		
</a>
</div></td><?php }else{ ?> 
<td style='padding-left:35px;font-size:15px;color:#DE6452;'>Insufficient skill points</td> <?php } ?>
<td style='padding-top:10px;padding-left:10px;width:100px;font-size:15px;color:white;'>Higher maximum health lets you stay in fights longer, whether you are attacking or are being attacked. [It takes 1 skill point to boost your max health by 10.]</td>
</tr>
<tr>
<td><table border='0'><tr><td style='width:40px;'><center><img src="images/stamina.png"></td><td style='padding-left:10px;font-size:20px;color:white;'>Max Stamina</td></tr></table></td><td style='text-align:right;padding-right:15px;font-size:20px;color:white;'><?php echo $max_stamina; ?></td><?php if($skill_points > '1'){ ?>
<td style='padding-left:60px;font-size:15px;color:#DE6452;'><div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="increase_stamina" class="button button_blue" onclick="increase(this.id);">
<span style="font-size:14px;">Increase</span>		
</a>
</div></td><?php }else{ ?> 
<td style='padding-left:35px;font-size:15px;color:#DE6452;'>Insufficient skill points</td> <?php } ?>
<td style='padding-top:10px;padding-left:10px;width:100px;font-size:15px;color:white;'>Higher maximum stamina lets you attack more mobsters more quickly - on the hit list and taking revenge on rivals. [It takes 2 skill points to boost your max stamina by 1.]</td>
</tr>
</table>

<div style='width:970px;line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;' align='left'>
<table style='font-size:25px;color:white;padding:40px 0px 0px 0px;'><tr><td><b>Switch Mobsters/Start New Mobster (beta)</b></td></tr></table>
</div>

<table><tr><td style='padding:0px 0px 10px 0px;'></td></tr></table>
<div style='width:960px;font-size:17px;color:white;padding:5px 5px 5px 5px;border: 1px solid white;'><b>Saved Games</b></div>

<?php
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND id!='".$character_id."'") or die("Cannot Connect");
$count = mysqli_num_rows($result);
if($count > 0){
echo "<table border='0' style='width:850px;padding:0px 0px 0px 10px;'><tr><td>";
while($row=mysqli_fetch_array($result)){
echo "<table align='left' border='0'><tr><td style='padding:5px 0px 0px 0px;font-size:26px;color:#977A18;'>".$row['charactername']."<font color='white'>,</font></td><td style='padding:5px 0px 0px 10px;font-size:26px;color:white;'>Level ".$row['level']."</td></tr></table>";
echo '<table align="right" border="0"><tr><td style="padding:10px 0px 0px 0px;">';
?>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="load_character(this.id);">
<span style="font-size:14px;">Load Game</span>		
</a>
</div>
<?php
echo '</td></tr></table></td></tr><tr><td>';
}
echo '</td></tr></table>';

$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."'") or die("Cannot Connect");
$count = mysqli_num_rows($result);
if($count >= $characters_allowed){
}else{
echo "<table border='0' style='width:887px;padding:0px 0px 0px 10px;'><tr><td>";
echo "<table align='left' border='0'><tr><td style='padding:10px 0px 0px 0px;font-size:15px;color:white;'>Start a new game...</td></tr></table>";
echo '<table align="right" border="0"><tr><td>';
?>
<div class="buttonDiv" style="padding-top:5px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a class="button button_blue" onclick="start_newgame();">
<span style="font-size:14px;">Start New Game</span>		
</a>
</div>
<?php
echo '</td></tr></table>';
echo '</td></tr></table>';
}
}else{
?>

<table border='0' style='width:850px;padding:0px 0px 0px 10px;'><tr><td>
</td></tr></table>
<table border='0' style='width:887px;padding:0px 0px 0px 10px;'><tr><td>
<table align='left' border='0'><tr><td style='padding:10px 0px 0px 0px;font-size:15px;color:white;'>Start a new game...</td></tr></table>
<table align="right" border="0"><tr><td>

<div class="buttonDiv" style="padding-top:5px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a class="button button_blue" onclick="start_newgame();">
<span style="font-size:14px;">Start New Game</span>		
</a>
</div>
</td></tr></table>
</td></tr></table>


<?php
}
}
?>