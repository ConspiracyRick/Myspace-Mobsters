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

$debug = "1";

session_start();
date_default_timezone_set('US/Eastern');

if(!$_SESSION['user_id'] == null){
require '../../conn1651651651651.php';
$user_id = $_SESSION['user_id'];
$run = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$runsit = mysqli_fetch_assoc($run);
$character_id = $runsit['id'];
$character_level = $runsit['level'];
$character_cash = $runsit['cash'];
//define attack and defense skills
$character_attack = $runsit['attack_strength'];
$character_defense = $runsit['defense_power'];
$character_health = $runsit['health'];
$character_max_health = $runsit['max_health'];
$character_hired_guns = $runsit['hired_guns'];

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if(isset($_GET['userid'])){
$other_user = $_GET['userid'];
$other_user = stripcslashes($other_user);
$other_user = $mysqli -> real_escape_string($other_user);

if(isset($other_user) == null){
?>
{
"status": "Insuccesso:",
"message": "The user does not exist!"; ?>"
}
<?php
exit;
}

$others_users_data = $mysqli->query("SELECT * FROM characters WHERE id='".$other_user."'");
$users_data = mysqli_fetch_assoc($others_users_data);
// other grab defense
$other_total_equipment = "0";
$other_character_health = $users_data['health'];
$other_character_max_health = $users_data['max_health'];
$other_character_attack = $users_data['attack_strength'];
$other_character_defense = $users_data['defense_power'];
$other_character_level = $users_data['level'];
$other_character_id = $users_data['id'];
$other_character_hired_guns = $users_data['hired_guns'];

$count_others_users_data = mysqli_num_rows($others_users_data);
if($count_others_users_data == 0){
?>
{
"status": "Insuccesso:",
"message": "We don't have the right guy!"
}
<?php
exit;
}

if(isset($_GET['attack'])){
if($character_id == $other_user){
?>
{
"status": "Insuccesso:",
"message": "What are you doing? You can't attack yourself."
}
<?php
exit;
}

// grab max equipment use.
if($character_level >= '100'){
$total_allowed_use = 500+$character_hired_guns;
}else{
$total_allowed_use = $character_level*5;
}

// grab attack
$total_equipment = "0";
$attack = "0";
$defense = "0";
$result = $mysqli->query("SELECT * FROM equipment WHERE can_fight_with='1'");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$row['id']."'");
if($re->num_rows === 0){
}else{
$w1 = mysqli_fetch_assoc($re);



$total_equipment = $total_equipment+$w1['how_many'];
if($total_equipment > $total_allowed_use){
$difference = $total_equipment-$total_allowed_use;
$total_equipment = $total_equipment-$difference;
$attack = $total_equipment*$row['attack'];
$defense = $total_equipment*$row['defense'];
}else{
$attack = $attack+$row['attack']*$w1['how_many'];
$defense = $defense+$row['defense']*$w1['how_many'];
}




}
}
// grab attack
// add character attack and defense from skill points
$attack = $attack+$character_attack;
$defense = $defense+$character_defense;


// grab max equipment use.
if($other_character_level >= '100'){
$other_total_allowed_use = 500+$other_character_hired_guns;
}else{
$other_total_allowed_use = $other_character_level*5;
}

// grab other_attack
$other_total_equipment = "0";
$other_attack = "0";
$other_defense = "0";
$result = $mysqli->query("SELECT * FROM equipment WHERE can_fight_with='1'");
while($other_row=mysqli_fetch_array($result)){
$other_re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$other_character_id."' AND equipment_id='".$other_row['id']."'");
if($other_re->num_rows === 0){
}else{
$other_w1 = mysqli_fetch_assoc($other_re);



$other_total_equipment = $other_total_equipment+$other_w1['how_many'];
if($other_total_equipment > $other_total_allowed_use){
$other_difference = $other_total_equipment-$other_total_allowed_use;
$other_total_equipment = $other_total_equipment-$other_difference;
$other_attack = $other_total_equipment*$other_row['attack'];
$other_defense = $other_total_equipment*$other_row['defense'];
}else{
$other_attack = $other_attack+$other_row['attack']*$other_w1['how_many'];
$other_defense = $other_defense+$other_row['defense']*$other_w1['how_many'];
}




}
}
// grab other_attack
// add character other_attack and other_defense from skill points
$other_attack = $other_attack+$character_other_attack;
$other_defense = $other_defense+$character_other_defense;


// if attack greater than defense of other player
if($attack > $other_defense){
$damage_done_to_you = round($attack-$other_defense);
// use this for now to calculate damage for all.
$damage_done_to_you = round($damage_done_to_you*$other_character_max_health/40000);

$other_damage_done = round($attack-$other_defense);
// use this for now to calculate damage for all.
$other_damage_done = round($other_damage_done*$other_character_max_health/9000);

/* save just in case.
if($character_max_health > $other_character_max_health){
$other_damage_done = round($other_damage_done*$other_character_max_health/9000);
}

if($character_max_health < $other_character_max_health){
$other_damage_done = round($other_damage_done*$other_character_max_health/9000);
}
*/

if($debug == '1'){
?>
{
"status": "Eccellente!",
"message": "Equipment: <?php echo $total_equipment."/".$total_allowed_use; ?><br> Health: <?php echo $character_health; ?>, Attack: <?php echo $attack; ?>, Defense: <?php echo $defense; ?><br> Other - Equipment: <?php echo $other_total_equipment."/".$other_total_allowed_use; ?><br> Health: <?php echo $other_character_health; ?>, Attack: <?php echo $other_attack; ?>, Defense: <?php echo $other_defense; ?><br><br>You won, dealing <?php echo $other_damage_done; ?> damage to your opponent and taking <?php echo $damage_done_to_you; ?> damage."
}
<?php
}else{
?>
{
"status": "Eccellente!",
"message": "You won, dealing <?php echo $other_damage_done; ?> damage to your opponent and taking <?php echo $damage_done_to_you; ?> damage."
}
<?php
}

}elseif($attack < $other_defense){
$damage_done_to_you = round($other_defense-$attack);
// use this for now to calculate damage for all.
$damage_done_to_you = round($damage_done_to_you*$other_character_max_health/100);

$other_damage_done = round($other_defense-$attack);
// use this for now to calculate damage for all.
$other_damage_done = round($other_damage_done*$other_character_max_health/9000);

if($debug == '1'){
?>
{
"status": "Insuccesso:",
"message": "Equipment: <?php echo $total_equipment."/".$total_allowed_use; ?><br> Health: <?php echo $character_health; ?>, Attack: <?php echo $attack; ?>, Defense: <?php echo $defense; ?><br> Other - Equipment: <?php echo $other_total_equipment."/".$other_total_allowed_use; ?><br> Health: <?php echo $other_character_health; ?>, Attack: <?php echo $other_attack; ?>, Defense: <?php echo $other_defense; ?><br><br>You Lost, dealing <?php echo $other_damage_done; ?> damage to your opponent and taking <?php echo $damage_done_to_you; ?> damage."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "You Lost, dealing <?php echo $other_damage_done; ?> damage to your opponent and taking <?php echo $damage_done_to_you; ?> damage."
}
<?php
}
}elseif($attack == $other_defense){// if attack equal to defense of other player
$damage_done_to_you = "0";
$other_damage_done = "0";
?>
{
"status": "Insuccesso:",
"message": "Equipment: <?php echo $total_equipment."/".$total_allowed_use; ?><br> Health: <?php echo $character_health; ?>, Attack: <?php echo $attack; ?>, Defense: <?php echo $defense; ?><br> Other - Equipment: <?php echo $other_total_equipment."/".$other_total_allowed_use; ?><br> Health: <?php echo $other_character_health; ?>, Attack: <?php echo $other_attack; ?>, Defense: <?php echo $other_defense; ?>"
}
<?php
}

exit;
}

// hitlist
if(isset($_GET['hitlist'])){
$bounty = trim($_GET['amount']);
$bounty = stripcslashes($bounty);
$bounty = $mysqli -> real_escape_string($bounty);

$bounty = str_replace("$", "", $bounty);
$bounty = str_replace(",", "", $bounty);

if(!is_numeric($bounty)){
?>
{
"status": "Insuccesso:",
"message": "Yo! That isn't a number."
}
<?php
exit;
}

$other_user_income = $users_data['income'];
if($other_user_income == '0'){
$bounty_amount = '1000';
}else{
$bounty_amount = $other_user_income*10;
}

if($character_id == $other_user){
?>
{
"status": "Insuccesso:",
"message": "What are you doing? You can't take a hit out on yourself."
}
<?php
exit;
}

// if user is already on the hitlist.
$read_hitlist_data = $mysqli->query("SELECT * FROM hitlist WHERE character_id='".$other_user."'");
$count_hitlist_data = mysqli_num_rows($read_hitlist_data);
if($count_hitlist_data > 0){
?>
{
"status": "Insuccesso:",
"message": "<?php echo $users_data['charactername']; ?> is already on the Hit List!"
}
<?php
exit;
}

//new check to see if goes below zero
if($bounty < 0){
?>
{
"status": "Insuccesso:",
"message": "<?php echo $users_data['charactername']; ?> is worth more cash than that!"
}
<?php
exit;
}

if($bounty < $bounty_amount){
?>
{
"status": "Insuccesso:",
"message": "<?php echo $users_data['charactername']; ?> is worth more cash than that!"
}
<?php
exit;
}

if($character_cash == '0'){
?>
{
"status": "Insuccesso:",
"message": "Your broke! You don't have any cash!"
}
<?php
exit;
}

if($character_cash < $bounty){
?>
{
"status": "Insuccesso:",
"message": "You don't have that much cash!"
}
<?php
exit;
}

if($character_cash >= $bounty){
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);

// take money from person doing the hitlist
$result_5086 = $mysqli->query("UPDATE characters SET cash=cash-'".$bounty."' WHERE id='".$user_id."'") or die(mysqli_error("Error.."));

// hitlist the id
$mysqli->query("INSERT INTO hitlist (character_id,bounty,set_by,timestamp) VALUES('".$other_user."','".$bounty."','".$character_id."','".$time_stamp."')");
?>
{
"status": "Eccellente!",
"message": "You listed <?php echo $users_data['charactername']; ?> for <?php echo "$".number_format($bounty); ?>!"
}
<?php
exit;
}
} // hitlist





} // get user id
}
?>
