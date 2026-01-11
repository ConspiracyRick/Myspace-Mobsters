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
if(!$_SESSION['user_id'] == null){
require '../../conn1651651651651.php';
$user_id = $_SESSION['user_id'];
$g_p = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$p = mysqli_fetch_assoc($g_p);
$character_id = $p['id'];
$player_level = $p['level'];

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if(isset($_GET['mission'])){
$mission = trim($_GET['mission']);
$mission = stripcslashes($mission);
$mission = $mysqli -> real_escape_string($mission);
$player_energy = $p['energy'];
$player_experience = $p['experience'];

//** get exp required to hit next level 
$get_exp_required = "0";
if($player_level < '1000'){
$get_exp_required = "1000000";
if($player_level < '601'){
$get_exp_required = "100000";
if($player_level < '501'){
$get_exp_required = "10000";
if($player_level < '401'){
$get_exp_required = "1000";
if($player_level < '316'){
$get_exp_required = "500";
if($player_level < '116'){
$get_exp_required = "300";
if($player_level < '16'){
$get_exp_required = "100";
if($player_level < '10'){
$get_exp_required = "40";
if($player_level < '6'){
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

$g_m = $mysqli->query("SELECT * FROM missions WHERE id='".$mission."'");
$count = mysqli_num_rows($g_m);
if($count == 0){
?>
{
"status": "Insuccesso:",
"message": "Whoa! This mission does not exist!"
}
<?php
exit;
}
$m = mysqli_fetch_assoc($g_m);
$released = $m['released'];
$level_required = $m['level_unlock'];
$mission_quote = $m['mission_quote'];
$energy_needed = $m['energy_needed'];
$min_cash = $m['min_cash'];
$max_cash = $m['max_cash'];
$missionequipmentid1 = $m['need_equip_id'];
$missionequipmentneed1 = $m['howmanyneed'];

$missionequipmentid2 = $m['need_equip_id2'];
$missionequipmentneed2 = $m['howmanyneed2'];

$missionequipmentid3 = $m['need_equip_id3'];
$missionequipmentneed3 = $m['howmanyneed3'];

$failmission = "0";

if(!$missionequipmentid1 == ''){
$result1 = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid1."' AND how_many>='".$missionequipmentneed1."'");
$count1 = mysqli_num_rows($result1);
if($count1 == 0){
$failmission = "1";
}
}
if(!$missionequipmentid2 == ''){
$result1 = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid2."' AND how_many>='".$missionequipmentneed2."'");
$count1 = mysqli_num_rows($result1);
if($count1 == 0){
$failmission = "1";
}
}
if(!$missionequipmentid3 == ''){
$result1 = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid3."' AND how_many>='".$missionequipmentneed3."'");
$count1 = mysqli_num_rows($result1);
if($count1 == 0){
$failmission = "1";
}
}
if($get_exp_required == '0'){
$experience = "0";
}else{
$experience = $m['experience'];
}
$loot_item = $m['loot_id'];
$how_many_loot = $m['howmany_loot'];
$loot_chance_min = $m['loot_chance_min'];
$loot_chance_max = $m['loot_chance_max'];

if($released == '0'){
?>
{
"status": "Insuccesso:",
"message": "Whoa! This mission isn't ready for you yet!"
}
<?php
}elseif($player_level < $level_required){
?>
{
"status": "Insuccesso:",
"message": "Whoa! You haven't reached the level required for this mission!"
}
<?php
}elseif($player_energy < $energy_needed){
?>
{
"status": "Insuccesso:",
"message": "You do not have enough energy to complete this mission."
}
<?php
}elseif($failmission == '1'){
?>
{
"status": "Insuccesso:",
"message": "You do not have the required equipment to complete this mission."
}
<?php
}else{
if(!$loot_item == ''){
$give_equipment = rand($loot_chance_min,$loot_chance_max);
}else{
$give_equipment = "";
}
$result = $mysqli->query("UPDATE characters SET missions_completed=missions_completed+1 WHERE id='".$character_id."'");

//$arr = array('status' => 'Eccellente!', 'message' => $mission_quote, 'id' => $mission);
//echo json_encode($arr);
?>
{
"status": "Eccellente!",
"message": "<?php echo $mission_quote; ?>",
"id": "<?php echo $mission; ?>",
"used_energy": "<?php echo $energy_needed; ?>",
<?php if(!$missionequipmentid1 == ''){
$g_w = $mysqli->query("SELECT * FROM equipment WHERE id='".$missionequipmentid1."'");
$w = mysqli_fetch_assoc($g_w);
?>
"used_equipment": "<?php echo $w['name']; ?>",
<?php
$result_6756754 = $mysqli->query("UPDATE owned_equipment SET how_many=how_many-".$missionequipmentneed1." WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid1."'");
}
?>
<?php if(!$missionequipmentid2 == ''){
$g_w = $mysqli->query("SELECT * FROM equipment WHERE id='".$missionequipmentid2."'");
$w = mysqli_fetch_assoc($g_w);
?>
"used_equipment2": "<?php echo $w['name']; ?>",
<?php
$result_7896767 = $mysqli->query("UPDATE owned_equipment SET how_many=how_many-".$missionequipmentneed2." WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid2."'");
}
?>
<?php if(!$missionequipmentid3 == ''){
$g_w = $mysqli->query("SELECT * FROM equipment WHERE id='".$missionequipmentid3."'");
$w = mysqli_fetch_assoc($g_w);
?>
"used_equipment3": "<?php echo $w['name']; ?>",
<?php
$result_87976788 = $mysqli->query("UPDATE owned_equipment SET how_many=how_many-".$missionequipmentneed3." WHERE player_id='".$character_id."' AND equipment_id='".$missionequipmentid3."'");
}
?>
<?php
if($min_cash > '0'){
$cash = rand($min_cash,$max_cash);
$update_cash = "$".number_format($cash);
?>
"gained_cash": "<?php echo $update_cash; ?>",
<?php 
}
if($min_cash < '1'){
?>
"gained_cash": "",
<?php
}

// if loot chance equals number 4 then give loot.
if($give_equipment == '4'){
$g_w = $mysqli->query("SELECT * FROM equipment WHERE id='".$loot_item."'");
$w = mysqli_fetch_assoc($g_w);
$id = $w['id'];
$name = $w['name'];
$exclusiveloot = $w['missionexclusiveloot'];
$picture = "../home/images/equipment/".$w['picture_name'];
$giveupkeep = $w['upkeep'];

$result = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$id."'");
$count = mysqli_num_rows($result);
if($count > 0){
$result = $mysqli->query("UPDATE owned_equipment SET how_many=how_many+'$how_many_loot' WHERE equipment_id='$id' AND player_id='$character_id'");
$result_2 = $mysqli->query("UPDATE characters SET upkeep=upkeep+'".$giveupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
if($count < 1){
if($exclusiveloot == '1'){
$mysqli->query("INSERT INTO owned_equipment (missionexclusiveloot,equipment_id,player_id,how_many) VALUES('1','$id','$character_id','$how_many_loot')");
$result_2 = $mysqli->query("UPDATE characters SET upkeep=upkeep+'".$giveupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}else{
$mysqli->query("INSERT INTO owned_equipment (missionexclusiveloot,equipment_id,player_id,how_many) VALUES('0','$id','$character_id','$how_many_loot')");
$result_2 = $mysqli->query("UPDATE characters SET upkeep=upkeep+'".$giveupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
}
?>
"equipment_how_many": "<?php echo $how_many_loot; ?>",
<?php
if($how_many_loot > '1'){
?>
"equipment_name": "<?php echo $name."s"; ?>",
<?php
}else{
?>
"equipment_name": "<?php echo $name; ?>",
<?php 
} 
?>
"equipment_picture": "<?php echo $picture; ?>",
<?php 
}
?>
"gained_experience": "<?php echo $experience; ?>"
<?php
//** Level up character
$player_experience_1 = $p['experience']+$experience;
$total_experience_gained = $p['experience_gained']+$experience;

// if no exp is required like max level then stop leveling
if($get_exp_required == '0'){
// if exp > required exp then level up with exp left over.
}elseif($player_experience_1 > $get_exp_required){
$player_level_up = $player_level+1;
$exp_to_carry_over = $player_experience_1-$get_exp_required;
// if exp > required exp then level up with exp left over.
?>
,"level_up": "<?php echo $player_level_up; ?>"
<?php
$result_49583 = $mysqli->query("UPDATE characters SET skill_points=skill_points+'3' WHERE id='".$character_id."'");
$update_energy = $mysqli->query("UPDATE characters SET energy=energy-'".$energy_needed."' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET level='".$player_level_up."' WHERE id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET experience='".$exp_to_carry_over."' WHERE id='".$character_id."'");
$result_3 = $mysqli->query("UPDATE characters SET experience_gained='".$total_experience_gained."' WHERE id='".$character_id."'");
if($min_cash > '0'){
$update_cash = $mysqli->query("UPDATE characters SET cash=cash+'".$cash."' WHERE id='".$character_id."'");
}

}elseif($player_experience_1 == $get_exp_required){
// if exp = exp then level up exp = 0.
$player_level_up = $player_level+1;
$update_energy = $mysqli->query("UPDATE characters SET energy=energy-'".$energy_needed."' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET level='".$player_level_up."' WHERE id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET experience='0' WHERE id='".$character_id."'");
$result_3 = $mysqli->query("UPDATE characters SET experience_gained='".$total_experience_gained."' WHERE id='".$character_id."'");
if($min_cash > '0'){
$update_cash = $mysqli->query("UPDATE characters SET cash=cash+'".$cash."' WHERE id='".$character_id."'");
}
// if exp = exp then level up exp = 0.
?>
,"level_up": "<?php echo $player_level_up; ?>"
<?php
$result_49583 = $mysqli->query("UPDATE characters SET skill_points=skill_points+'3' WHERE id='".$character_id."'");
}else{
// do mission no level ups.
$update_energy = $mysqli->query("UPDATE characters SET energy=energy-'".$energy_needed."' WHERE id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET experience='".$player_experience_1."' WHERE id='".$character_id."'");
$result_3 = $mysqli->query("UPDATE characters SET experience_gained='".$total_experience_gained."' WHERE id='".$character_id."'");
if($min_cash > '0'){
$update_cash = $mysqli->query("UPDATE characters SET cash=cash+'".$cash."' WHERE id='".$character_id."'");
}
// do mission no level ups.
}
//** Level up character
?>
}
<?php
}
}else{

$result = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND missionexclusiveloot='1'");
$count = mysqli_num_rows($result);
if($count > 0){
?>
<table style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Your Loot</td></tr></table>
<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;padding-left:20px;margin-top:30px;'>
<table border='0'><tr>
<?php
$result = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND missionexclusiveloot='1' AND how_many>'0'");
while($row=mysqli_fetch_array($result)){
$g_w = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['equipment_id']."'");
$w = mysqli_fetch_assoc($g_w);
echo "<td><table border='0'><tr><td><center><img src='/home/images/equipment/".$w['picture_name']."' height='60'></center></td></tr><tr><td style='color:white;'><center>".$row['how_many']." X <b>".$w['name']."</b></center></td></tr></table></td>";
}
?>
</tr></table>
</div>
<?php } ?>
<table style='border: none;padding-left: 0px;margin: 0;margin-top:80px;' align='center' border='0'>
<tr>
<td>
<?php
if(isset($_GET['city_name'])){
$city_name = trim($_GET['city_name']);
$city_name = stripcslashes($city_name);
$city_name = $mysqli -> real_escape_string($city_name);
}else{
$city_name = "da_bronx";
}

if($city_name == 'da_bronx'){
echo "<div id='da_bronx' class='da_bronx_red' onclick='da_bronx_click()'></div>";
echo "<div id='downtown' class='downtown' onclick='downtown_click()'></div>";
echo "<div id='jersey' class='jersey' onclick='jersey_click()'></div>";
echo "<div id='outta_town' class='outta_town' onclick='outta_town_click()'></div>";
}
if($city_name == 'downtown'){
echo "<div id='da_bronx' class='da_bronx' onclick='da_bronx_click()'></div>";
echo "<div id='downtown' class='downtown_red' onclick='downtown_click()'></div>";
echo "<div id='jersey' class='jersey' onclick='jersey_click()'></div>";
echo "<div id='outta_town' class='outta_town' onclick='outta_town_click()'></div>";
}
if($city_name == 'jersey'){
echo "<div id='da_bronx' class='da_bronx' onclick='da_bronx_click()'></div>";
echo "<div id='downtown' class='downtown' onclick='downtown_click()'></div>";
echo "<div id='jersey' class='jersey_red' onclick='jersey_click()'></div>";
echo "<div id='outta_town' class='outta_town' onclick='outta_town_click()'></div>";
}
if($city_name == 'outta_town'){
echo "<div id='da_bronx' class='da_bronx' onclick='da_bronx_click()'></div>";
echo "<div id='downtown' class='downtown' onclick='downtown_click()'></div>";
echo "<div id='jersey' class='jersey' onclick='jersey_click()'></div>";
echo "<div id='outta_town' class='outta_town_red' onclick='outta_town_click()'></div>";
}
?>
</td>
</tr>
</table>
<?php 
$result = $mysqli->query("SELECT * FROM missions WHERE city_name='".$city_name."' AND level_unlock<='".$player_level."' AND released='1' ORDER BY id DESC");
while($row=mysqli_fetch_array($result)){
?>
<table style='padding-left:3px;width:1000px;' border='0'><tr><td>
<table border='0' width='100%' align='left'><tr>
<div style='margin-top:0px;text-align:left;padding:3px 0px 3px 3px;background-color:#5F1304;color:white;'><b><?php echo $row['mission_name']; ?></b></div>

<td style='width:180px;'><table style='margin-top:-75px;' border='0'>
<tr><td style='color:white;'><b>Rewards...</b></td></tr>
<?php if(!$row['max_cash'] == ''){ ?>
<tr><td style='color:yellow;'><b>$<?php echo number_format($row['min_cash']); ?> <font color='white'>-</font> $<?php echo number_format($row['max_cash']); ?></b> <font color='white'>cash</font></td></tr>
<?php } if(!$row['experience'] == ''){ ?>
<tr><td style='color:white;'><b>+<?php echo number_format($row['experience']); ?></b> <font color='white'>experience</font></td></tr>
<?php } ?>
<?php if($row['experience'] == ''){ ?>
<tr><td style='color:white;'><b>Chance of loot</b></td></tr>
<?php } ?>
</table>
</td>

<td style='width:120px;' border='0'>
<?php
if(!$row['loot_id'] == ''){
$e = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['loot_id']."'");
$w = mysqli_fetch_assoc($e);
?>
<table style='margin-top:10px;margin-left:0px;' align='left' border='0'>
<tr><td align='center'><img src='../home/images/equipment/<?php echo $w['picture_name']; ?>' height='60'></td></tr>
<tr><td style='color:white;' align='center'><?php echo $w['name']; ?></td></tr>
</table>
<?php
}
?>
</td>

<td style='width:0px;'>
<table style='margin-top:15px;height:150px;border-left: thin solid #44150B;' border='0'>
<tr><td></td></tr>
</table>
</td>

<td>
<table style='margin-top:-50px;margin-left:1px;' border='0'>
<tr><td style='color:white;'><b>Needs...</b></td></tr>
<tr><td style='color:white;'><b><?php echo $row['energy_needed']; ?></b> energy</td></tr>
<tr><td style='color:white;'><b><?php echo $row['mob_needed']; ?></b> mob</td></tr>
</table>
</td>

<td>
<table border='0'><tr><td>
<?php
if(!$row['need_equip_id'] == ''){
$e = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['need_equip_id']."'");
$w = mysqli_fetch_assoc($e);
?>
<table style='margin-top:10px;margin-left:0px;' align='left' border='0'>
<tr><td style='height:80px;' align='center'><img src='../home/images/equipment/<?php echo $w['picture_name']; ?>' height='60'></td></tr>
<tr><td style='color:white;' align='center'><?php echo $row['howmanyneed']; ?> x <?php echo $w['name']; ?></td></tr>
</table>
<?php
}
?>
</td><td>
<?php
if(!$row['need_equip_id2'] == ''){
$e = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['need_equip_id2']."'");
$w = mysqli_fetch_assoc($e);
?>
<table style='margin-top:10px;margin-left:0px;' align='left' border='0'>
<tr><td style='height:80px;' align='center'><img src='../home/images/equipment/<?php echo $w['picture_name']; ?>' height='60'></td></tr>
<tr><td style='color:white;' align='center'><?php echo $row['howmanyneed2']; ?> x <?php echo $w['name']; ?></td></tr>
</table>
<?php
}
?>
</td><td>
<?php
if(!$row['need_equip_id3'] == ''){
$e = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['need_equip_id3']."'");
$w = mysqli_fetch_assoc($e);
?>
<table style='margin-top:10px;margin-left:0px;' align='left' border='0'>
<tr><td style='height:80px;'><center><img src='../home/images/equipment/<?php echo $w['picture_name']; ?>' width='100'></td></tr>
<tr><td style='color:white;'><center><?php echo $row['howmanyneed2']; ?> x <?php echo $w['name']; ?></td></tr>
</table>
<?php
}
?>
</td>
</tr></table>
</td>

<td>
<table style='margin-top:-10px;' align='right' border='0'>
<tr><td>
<div class="buttonDiv" style="padding-top:15px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var id = this.id; do_mission(id);$(window).scrollTop(0);">
<span style="font-size:14px;">Start</span>
</a>
</div>
</td></tr>
</table>

</td></tr>
</table>

</td></tr></table>
<?php
}
}
}
?>