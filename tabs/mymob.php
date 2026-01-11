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
$character_id = $_SESSION['character_id'];

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if(isset($_GET['claim_bonus'])){
$total_claim = "0";
$date_today = date("m/d/Y");

$re = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND from_top_mob='1') OR (request_id='".$character_id."' AND request_top_mob='1')");
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

$total_claim = $total_claim+$bonus/8;
}

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);
$if_claimed_bonus = $row['claimedbonus'];

if($if_claimed_bonus == $date_today){
?>
{
"status": "Insuccesso:",
"message": "You already claimed your top mob today!"
}
<?php
exit;
}else{
$result_4197 = $mysqli->query("UPDATE characters SET cash=cash+'".$total_claim."' WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$result_4198 = $mysqli->query("UPDATE characters SET claimedbonus='".$date_today."' WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "You claimed your top mob and got $<?php echo number_format($total_claim); ?>."
}
<?php
exit;
}
}

if(isset($_GET['send_energy'])){
if(isset($_GET['id'])){
$date_today = date("m/d/Y");

$send_energy_to = trim($_GET['id']);
$send_energy_to = stripcslashes($send_energy_to);
$send_energy_to = $mysqli->real_escape_string($send_energy_to);

// if in mob and top mobbed
$result = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND request_id='".$send_energy_to."' AND accepted='1' AND from_top_mob='1') OR (from_id='".$send_energy_to."' AND request_id='".$character_id."' AND accepted='1' AND request_top_mob='1')");
$count = mysqli_num_rows($result);

if($count > 0){
// how many times did we send energy today?
$rt = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND from_energy_sent='".$date_today."') OR (request_id='".$character_id."' AND request_energy_sent='".$date_today."')");
$ct = mysqli_num_rows($rt);

if($ct >= 8){
?>
{
"status": "Insuccesso:",
"message": "You can't send anymore energy today!"
}
<?php
exit;
}else{
$rsult = $mysqli->query("SELECT * FROM characters WHERE id='".$send_energy_to."'");
$rw = mysqli_fetch_assoc($rsult);

$row = mysqli_fetch_assoc($result);
if($character_id == $row['from_id']){
if($row['from_energy_sent'] == $date_today){
?>
{
"status": "Insuccesso:",
"message": "You already sent energy to <?php echo $rw['charactername']; ?>!"
}
<?php
}else{
$result_4196 = $mysqli->query("UPDATE mob_members SET from_energy_sent='".$date_today."' WHERE from_id='".$character_id."' AND request_id='".$send_energy_to."'") or die(mysqli_error("Error.."));
$result_4197 = $mysqli->query("UPDATE characters SET energy=energy+'10' WHERE id='".$send_energy_to."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "You have sent energy to <?php echo $rw['charactername']; ?>."
}
<?php
}
}elseif($character_id == $row['request_id']){
if($row['request_energy_sent'] == $date_today){
?>
{
"status": "Insuccesso:",
"message": "You already sent energy to <?php echo $rw['charactername']; ?>!"
}
<?php
}else{
$result_4196 = $mysqli->query("UPDATE mob_members SET request_energy_sent='".$date_today."' WHERE from_id='".$send_energy_to."' AND request_id='".$character_id."'") or die(mysqli_error("Error.."));
$result_4197 = $mysqli->query("UPDATE characters SET energy=energy+'10' WHERE id='".$send_energy_to."'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "You have sent energy to <?php echo $rw['charactername']; ?>."
}
<?php
}
}
}
}



} // get id to send energy to
exit;
} // send energy















if(isset($_GET['add_to_top_mob'])){
$adding = trim($_GET['add_to_top_mob']);
$adding = stripcslashes($adding);
$adding = $mysqli -> real_escape_string($adding);

// check if in mob
$result = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1') OR (request_id='".$character_id."' AND accepted='1')");
$count = mysqli_num_rows($result);

if($character_id == $adding){
?>
{
"status": "Insuccesso:",
"message": "You cannot add yourself to your top mob!"
}
<?php
}elseif($count > 0){ // if in mob continue

// check if in top mob
$reult = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND request_id='".$adding."' AND accepted='1' AND from_top_mob='1') OR (from_id='".$adding."' AND request_id='".$character_id."' AND accepted='1' AND request_top_mob='1')");
$cout = mysqli_num_rows($reult);

if($cout > 0){
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];
?>
{
"status": "Insuccesso:",
"message": "<?php echo $character_name; ?> is already in your top mob!"
}
<?php
exit;
}else{
// check if top mob is full
$rult = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1' AND from_top_mob='1') OR (request_id='".$character_id."' AND accepted='1' AND request_top_mob='1')");
$cut = mysqli_num_rows($rult);

if($cut > 7){
?>
{
"status": "Insuccesso:",
"message": "Your top mob is full!"
}
<?php
exit;
}else{
$ret = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$character_id."' AND request_id='".$adding."' AND from_top_mob='1'");
$cnt = mysqli_num_rows($ret);
if($cnt == 0){
$result_56743 = $mysqli->query("UPDATE mob_members SET request_top_mob='1' WHERE from_id='".$adding."' AND request_id='".$character_id."' AND accepted='1' AND request_top_mob='0'") or die(mysqli_error("Error.."));
}

$ret_2 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$adding."' AND request_id='".$character_id."' AND from_top_mob='1'");
$cnt_2 = mysqli_num_rows($ret_2);
if($cnt_2 == 0){
$result_56743 = $mysqli->query("UPDATE mob_members SET from_top_mob='1' WHERE from_id='".$character_id."' AND request_id='".$adding."' AND accepted='1' AND from_top_mob='0'") or die(mysqli_error("Error.."));
}

$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];

?>
{
"status": "Eccellente!",
"message": "You added <?php echo $character_name; ?> to your top mob!"
}
<?php
exit;
}


}





}else{
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];
?>
{
"status": "Insuccesso:",
"message": "<?php echo $character_name; ?> is not in your mob!"
}
<?php
exit;
}

}















if(isset($_GET['accept_request'])){
$adding = trim($_GET['accept_request']);
$adding = stripcslashes($adding);
$adding = $mysqli -> real_escape_string($adding);

$can_mob_1 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$adding."' AND request_id='".$character_id."' AND accepted='0'");
$ismob_1 = mysqli_num_rows($can_mob_1);


if($ismob_1 == 0){
?>
{
"status": "Insuccesso:",
"message": "There was no request to accept!"
}
<?php
}
if($ismob_1 == 1){
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];

$result_56743 = $mysqli->query("UPDATE mob_members SET accepted='1' WHERE from_id='".$adding."' AND request_id='".$character_id."' AND accepted='0'") or die(mysqli_error("Error.."));
?>
{
"status": "Eccellente!",
"message": "You accepted <?php echo $character_name; ?>'s request!"
}
<?php
}

exit;
}

if(isset($_GET['addtomob'])){
$adding = trim($_GET['addtomob']);
$adding = stripcslashes($adding);
$adding = $mysqli -> real_escape_string($adding);

$can_mob_1 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$character_id."' AND request_id='".$adding."' AND accepted='0'");
$ismob_1 = mysqli_num_rows($can_mob_1);
$can_mob_2 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$adding."' AND request_id='".$character_id."' AND accepted='0'");
$ismob_2 = mysqli_num_rows($can_mob_2);

if($character_id == $adding){
?>
{
"status": "Insuccesso:",
"message": "You cannot send yourself a request!"
}
<?php
}elseif($ismob_1 == '0' && $ismob_2 == '0'){
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];

$mysqli->query("INSERT INTO mob_members (from_id,request_id) VALUES('".$character_id."','".$adding."')");
?>
{
"status": "Eccellente!",
"message": "You sent <?php echo $character_name; ?> an invite to join your mob!"
}
<?php
exit;
}elseif($ismob_1 == '0' && $ismob_2 == '1'){
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];
?>
{
"status": "Insuccesso:",
"message": "<?php echo $character_name; ?> already sent you a request to join their mob!"
}
<?php
exit;
}elseif($ismob_1 == '1' && $ismob_2 == '0'){
$result3 = $mysqli->query("SELECT * FROM characters WHERE id='".$adding."'");
$getinfo = mysqli_fetch_assoc($result3);
$character_name = $getinfo['charactername'];
?>
{
"status": "Insuccesso:",
"message": "You already sent <?php echo $character_name; ?> a request to join your mob!"
}
<?php
exit;
}

}

if(isset($_GET['search'])){
$search_name = trim($_GET['search']);
$search_name = stripcslashes($search_name);
$search_name = $mysqli -> real_escape_string($search_name);

if($search_name == ''){
$arr = array('status' => 'Insuccesso:', 'message' => 'What are you trying to do here?!');
echo json_encode($arr);
exit;
}

if(ctype_alnum($search_name)){
$result = $mysqli->query("SELECT * FROM characters WHERE charactername='".$search_name."'");
$count = mysqli_num_rows($result);
$characterinfo = mysqli_fetch_assoc($result);

if($count > 0){
$result_898 = $mysqli->query("SELECT * FROM registered_users WHERE id='".$characterinfo['belongsto']."'");
$account_info = mysqli_fetch_assoc($result_898);

if($account_info['picture'] == ''){
$picture = "./images/users/user.png";
}
if(!$account_info['picture'] == ''){
$picture = $account_info['picture'];
}


$can_mob_1 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$character_id."' AND request_id='".$characterinfo['id']."' AND accepted='1'");
$ismob_1 = mysqli_num_rows($can_mob_1);
$can_mob_2 = $mysqli->query("SELECT * FROM mob_members WHERE from_id='".$characterinfo['id']."' AND request_id='".$character_id."' AND accepted='1'");
$ismob_2 = mysqli_num_rows($can_mob_2);
?>
{
"status": "Eccellente!",
"message": "<?php echo $search_name; ?>",
"picture": "<?php echo $picture; ?>",
"characterid": "<?php echo $characterinfo['id']; ?>",
<?php if($ismob_1 > 0){ ?>
"inmob": "1"
<?php }elseif($ismob_2 > 0){ ?>
"inmob": "1"
<?php }elseif($character_id == $characterinfo['id']){ ?>
"inmob": "1"
<?php }else{ ?>
"inmob": "0"
<?php } ?>
}
<?php
exit;
}
if($count == 0){
$search_name = str_replace('\\', '', $search_name);
$message = $search_name." does not exist!";
$arr = array('status' => 'Insuccesso:', 'message' => $message);
echo json_encode($arr);
exit;
}
}else{
$arr = array('status' => 'Insuccesso:', 'message' => 'What are you trying to do here?!');
echo json_encode($arr);
exit;
}
}
?>
<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>My Mob</td></tr></table>

<table style='font-size:25px;color:white;font-weight:bold;' align='center'><tr><td>Search for Mobster</td></tr></table>
<table align='center' border='0'>
<tr>
<td><input type="text" id="cname" style="font-size:16px;" value=""></td>
</tr>
<tr>

<td style="color:white;" align='center'>

<table align='center'><tr><td>
<a class="button button_blue" onclick="var charactername = document.getElementById('cname').value; searchmob(charactername);$(window).scrollTop(0);">
<span style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;">Search</span>		
</a>
</td></tr></table>

</td></tr></table>

<div id='mymobstatus' align='center'></div>

<?php
$result = $mysqli->query("SELECT * FROM mob_members WHERE request_id='".$character_id."' AND accepted='0'");
$count = mysqli_num_rows($result);
if($count > 0){
$counties = "0";
echo "<div style='margin-top:20;font-size:25px;color:white;font-weight:bold;'><div align='center'>Mob Invitations</div></div>";
echo "<div style='margin-top:10;font-family: Helvetica;color: #FF0000; border: 0px solid white;margin-left:auto;margin-right:auto;width:90%;'><table><tr>";
while($row=mysqli_fetch_array($result)){
$other_character_id = $row['from_id'];
$counties++;

$ret = $mysqli->query("SELECT * FROM characters WHERE id='".$other_character_id."'");
$characterinfo = mysqli_fetch_assoc($ret);

$rt = $mysqli->query("SELECT * FROM registered_users WHERE id='".$characterinfo['belongsto']."'");
$info = mysqli_fetch_assoc($rt);
?>
<td>

<table style='font-family: Helvetica;color: #FF0000; border: 1px solid grey;color:white;'>
<tr><td style='width:180px;' align='center'>
<a onclick='user_stats("<?php echo $other_character_id; ?>");' style='font-size:20px;color:white;cursor:pointer;'><?php echo $characterinfo['charactername']; ?></a>
</td></tr>
<?php if($info['picture'] == ''){ ?>
<tr><td align='center'><img src='./images/users/user.png' width="110" height="90"></td></tr>
<?php } ?>
<?php if($info['picture'] !== ''){ ?>
<tr><td align='center'><img src='<?php echo $info['picture']; ?>' width="110" height="90"></td></tr>
<?php } ?>
<tr><td><table align='center'><tr><td><a class='button button_blue' onclick='accept_request("<?php echo $other_character_id; ?>");$(window).scrollTop(0);'><span style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;'>Accept Request</span></a></td></tr></table>
</td></tr></table>

</td>
<?php
if($counties == '5'){
$counties = "0";

echo "</tr><tr>";

}
}
echo "</tr></table></div>";
}
?>










<?php
$result = $mysqli->query("SELECT * FROM mob_members WHERE (from_id='".$character_id."' AND accepted='1') OR (request_id='".$character_id."' AND accepted='1')");
$count = mysqli_num_rows($result);
if($count > 0){
$counties = "0";
echo "<div style='margin-top:20;font-size:25px;color:white;font-weight:bold;'><div align='center'>Mob Members</div></div>";
echo "<div style='margin-top:10;font-family: Helvetica;color: #FF0000; border: 0px solid white;margin-left:auto;margin-right:auto;width:90%;'><table><tr>";
while($row=mysqli_fetch_array($result)){
$other_character_id = $row['from_id'];
if($other_character_id == $character_id){
$other_character_id = $row['request_id'];
}
$counties++;

$ret = $mysqli->query("SELECT * FROM characters WHERE id='".$other_character_id."'");
$characterinfo = mysqli_fetch_assoc($ret);

$rt = $mysqli->query("SELECT * FROM registered_users WHERE id='".$characterinfo['belongsto']."'");
$info = mysqli_fetch_assoc($rt);
?>
<td>

<table style='font-family: Helvetica;color: #FF0000; border: 1px solid grey;color:white;'>
<tr><td style='width:180px;' align='center'>
<a onclick='user_stats("<?php echo $other_character_id; ?>");' style='font-size:20px;color:white;cursor:pointer;'><?php echo $characterinfo['charactername']; ?></a>
</td></tr>
<?php if($info['picture'] == ''){ ?>
<tr><td align='center'><img src='./images/users/user.png' width="110" height="90"></td></tr>
<?php } ?>
<?php if($info['picture'] !== ''){ ?>
<tr><td align='center'><img src='<?php echo $info['picture']; ?>' width="110" height="90"></td></tr>
<?php } ?>
<tr><td><table align='center'><tr><td><a class='button button_blue' onclick='add_to_top_mob("<?php echo $other_character_id; ?>");$(window).scrollTop(0);'><span style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;'>Add to Top Mob</span></a></td></tr></table>
</td></tr></table>

</td>
<?php
if($counties == '5'){
$counties = "0";

echo "</tr><tr>";

}
}
echo "</tr></table></div>";
}
?>






<?php
}
?>