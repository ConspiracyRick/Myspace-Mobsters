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
?>
<body bgcolor='black'>
<?php
session_start();
date_default_timezone_set('US/Eastern');
if(!$_SESSION['user_id'] == null){
require '../../conn1651651651651.php';
$user_id = $_SESSION['user_id'];
$character_id = $_SESSION['character_id'];

$date_today = date("m/d/Y");

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);
?>
<table style='width:450px;padding-top:5px;color:white;' border='0' align='right'><tr><td>

<table style='color:white;'><tr><td>
<b><font size='4.5' color='orange'>TIP: Dust yourself off and try again.</font></b><br>
Want to try again with a different Mobster class? With our
new save/load game feature you can create up to 3 mobster
characters under one Myspace account which will share favor
points and mob members. <a style='color:#0D7BD5;' href="#" onclick='mymobsterstabb();'>Click here</a> to check it out!
</td></tr></table>

<table style='margin-top:10px;color:white;'>
<tr><td>
<b><font size='4.5' color='orange'>Find a bug?</font></b>
</td></tr>
<tr><td>
If you found any exploits at all please<br><a style='color:#0D7BD5;' href="https://www.facebook.com/MobstersRemake/" target="new">Report it here!</a>
</td></tr></table>


</td></tr></table>


<table style='width:500px;padding-left:0px;padding-top:5px;display:block;' border='0'><tr><td>
<div style='font-size:23px;color:orange;'>Your Top Mob <b><font color='#8F1F07'>(NEW!)</font></b></div>
</td></tr><tr><td>
<?php
$re_1 = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND from_top_mob='1') OR (request_id='".$character_id."' AND request_top_mob='1')");
$count = mysqli_num_rows($re_1);
if($count == 0){
?>
<div style='width:100%;padding-left:5px;padding-top:0px;color:white;'>

<table style='color:white;font-size:16px;' align='left' border='0'><tr>
<td><div style="background-image: url('images/gb1.png');background-size: 100% 100%;background-repeat: no-repeat;background-attachment: scroll;display:inline-block;height:158px;width:130px;border: 2px solid #0B6C4A;"><center><img width="80" height="80" style="margin-top: 3px; border: 0;" src="images/emptyslot.gif"><br><br><div style="font-size:13px;color:grey;text-align: center;"> This spot<br>available.<br></div></center></div></td>
</tr></table>

<table style='width:350px;color:white;font-size:19px;' align='left' border='0'><tr>
<td>
<b>Want extra cash and experience?</b>
<br><br>
<b>Want a bigger mob in fights?</b>
<br><br>
Promote your most active mob members to
your Top Mob!
</td></tr></table>

</div></td></tr></table>
<?php 
}else{
// top mob info
$total_claim = "0";
$total_exp = "0";

$re = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND from_top_mob='1') OR (request_id='".$character_id."' AND request_top_mob='1')");
while($w=mysqli_fetch_array($re)){
$total_exp++;

if($character_id == $w['from_id']){
$other_character_id = $w['request_id'];
$if_energy_sent = $w['from_energy_sent'];
}
if($character_id == $w['request_id']){
$other_character_id = $w['from_id'];
$if_energy_sent = $w['request_energy_sent'];
}

$esult = $mysqli->query("SELECT * FROM characters WHERE id='".$other_character_id."'");
$ro = mysqli_fetch_assoc($esult);
if($ro['income'] <= '0'){
$bonus = "0";
}else{
$bonus = $ro['income'];
}

$total_claim = $total_claim+$bonus/8;
}

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);
$if_claimed_bonus = $row['claimedbonus'];
?>

<table style='color:white;font-size:16px;' align='left'><tr><td>
<?php if($if_claimed_bonus == $date_today){ ?>
You have already claimed your top mob bonus today.
<?php }else{ ?>
<div id="claimingbonusbutton">Your <b><?php echo $count; ?></b> <font color='green'>active</font> top mobs have <b><font color="yellow">$<?php echo number_format($total_claim); ?></font></b> + <?php echo $total_exp; ?> exp
<button style="margin-left:20px;background-color:#383889;border: solid 1px grey;color:white;cursor:pointer;padding-top:2px;padding-bottom:2px;padding-left:7px;padding-right:7px;" onclick="claim_bonus();" type="button">Claim it now!</button></div>
<?php } ?>
</td></tr></table>


<table style="padding-left:0px;text-align:left;padding-top:0px;" border='0'><tr>
<?php
//define
$top_mob_bonus = "0";
$get_mob_members = array();
$re = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND from_top_mob='1') OR (request_id='".$character_id."' AND request_top_mob='1') ORDER BY RAND()");
$w = mysqli_fetch_assoc($re_1);
while($w=mysqli_fetch_array($re)){

if($character_id == $w['from_id']){
$other_character_id = $w['request_id'];
$if_energy_sent = $w['from_energy_sent'];
}
if($character_id == $w['request_id']){
$other_character_id = $w['from_id'];
$if_energy_sent = $w['request_energy_sent'];
}

$esult = $mysqli->query("SELECT * FROM characters WHERE id='".$other_character_id."'");
$ro = mysqli_fetch_assoc($esult);
if($ro['income'] <= '0'){
$bonus = "0";
}else{
$bonus = $ro['income'];
}
$top_mob_bonus = $top_mob_bonus+$bonus/8;

$nh = $mysqli->query("SELECT * FROM registered_users WHERE id='".$ro['belongsto']."'");
$tr = mysqli_fetch_assoc($nh);
if($tr['picture'] == ''){
$image = "./images/users/user.png";
}
if($tr['picture'] !== ''){
$image = $tr['picture'];
}

$get_mob_members[] = array('characterid'=>$other_character_id, 'charactername'=>$ro['charactername'], 'energysent'=>$if_energy_sent, 'topmobbonus'=>$top_mob_bonus, 'image'=>$image);
}

// count whatever mob members is not in mob then add blanks for top mob.
$count_array = count($get_mob_members);
$maths = 8-$count_array;


for ($x = 1; $x <= $maths; $x++) {
$get_mob_members[] = array('characterid'=>'', 'charactername'=>'', 'energysent'=>'', 'topmobbonus'=>'', 'image'=>'');
}
//echo $maths."<br><br>";
//print_r($get_mob_members);


$count = "0";
foreach($get_mob_members as $x => $item) {
//echo $item['characterid'];
//echo $item['charactername'];
//echo $item['energysent'];
//echo $item['topmobbonus'];
//echo $item['image'];

if($count == '4'){
$count = "0";
echo "</tr><tr>";
}

if($item['characterid'] == ''){
?>
<td><div style="background-image: url('images/gb1.png');background-size: 100% 100%;background-repeat: no-repeat;background-attachment: scroll;display:inline-block;height:158px;width:130px;border: 2px solid #0B6C4A;"><center><img width="80" height="80" style="margin-top: 3px; border: 0;" src="images/emptyslot.gif"><br><br><div style="font-size:13px;color:grey;text-align: center;"> This spot<br>available.<br></div></center></div></td>
<?php
}else{
?>
<td><div style="background-image: url('images/gb1.png');background-size: 100% 100%;background-repeat: no-repeat;background-attachment: scroll;display:inline-block;height:158px;width:130px;border: 2px solid #0B6C4A;color:white;"><center><img width="110" height="90" style="margin-top: 3px; border: 0;" src="<?php echo $item['image']; ?>"><br><div style="font-size:13px;color:yellow;text-align: left;padding-left:5px;"><b>$<?php echo number_format($item['topmobbonus']); ?></b></div><div style='padding-left:5px;padding-bottom:5px;color:white;font-size:15px;text-align:left;'>+1 exp</div>
<?php if($item['energysent'] == $date_today){ ?>
<div style='font-size:13;color:white;'>Energy Sent</div>
<?php }else{ ?>
<div id="<?php echo $item['characterid']; ?>"><button style='background-color:#383889;border: solid 1px grey;color:white;cursor:pointer;padding-top:2px;padding-bottom:2px;padding-left:15px;padding-right:15px;' onclick="send_energy(<?php echo $item['characterid']; ?>);" type="button">Send Energy</button></div>
<?php } ?>
</center></div></td>
<?php
}
$count++;
}
?>
</tr></table>






<?php
}
}
?>