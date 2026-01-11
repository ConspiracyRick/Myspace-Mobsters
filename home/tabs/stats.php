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

require '../../conn1651651651651.php';
session_start();
date_default_timezone_set('US/Eastern');
if(!$_SESSION['user_id'] == null){
$user_id = $_SESSION['user_id'];
$character_id = $_SESSION['character_id'];
$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$yourrow = mysqli_fetch_assoc($result);
$admin = "0";

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if($yourrow['admin'] == '1'){
$admin = "1";
}

if(isset($_GET['userid'])){
$users_id = trim($_GET['userid']);
$users_id = stripcslashes($users_id);
$users_id = $mysqli -> real_escape_string($users_id);

if(!is_numeric($users_id)){
exit;
}

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$users_id."'");
$if_user_exists = mysqli_num_rows($result);

if($if_user_exists == 0){
exit;
}

if($if_user_exists > 0){
$row = mysqli_fetch_assoc($result);
$user_name = $row['charactername'];
$user_class = $row['class'];
$user_level = $row['level'];
$user_income = $row['income'];
$user_missions_completed = $row['missions_completed'];
$user_bounties_collected = $row['bounties_collected'];

$user_fights_won = $row['fights_won'];
$user_fights_lost = $row['fights_lost'];
$user_deaths = $row['deaths'];
$user_mobsters_whacked = $row['mobsters_whacked'];

$income = $user_income;
if($income == '0'){
$bounty_amount = '1000';
}else{
$bounty_amount = $income*10;
}

function elapsed_time($timestamp, $precision = 2) {
  $time = time() - $timestamp;
  $a = array('decade' => 315576000, 'year' => 31557600, 'month' => 2629800, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute' => 60);
  $i = 0;
  foreach($a as $k => $v) {
    $$k = floor($time/$v);
    if ($$k) $i++;
    $time = $i >= $precision ? 0 : $time - $$k * $v;
    $s = $$k > 1 ? 's' : '';
    $$k = $$k ? $$k.' '.$k.$s.' ' : '';
    @$result .= $$k;
  }
  return $result ? $result.'ago' : 'A moment ago';
}

if($row['character_created'] == ''){
$age = "Unknown";
}
if($row['character_created'] !== ''){
$age_timestamp = $row['character_created'];
$age = elapsed_time($age_timestamp);
}

if($admin == '1'){
$acinfo = $mysqli->query("SELECT * FROM characters WHERE id='".$users_id."'");
$details = mysqli_fetch_assoc($acinfo);
$last_activity = $details['last_activity'];

if($last_activity == null){
$last_activity = "Unknown";
}elseif($last_activity == ''){
$last_activity = "Unknown";
}else{
$last_activity = elapsed_time($details['last_activity']);
}

}
?>
<div id="userpage">
<table style='line-height:1.1;border-bottom: .1px solid white;color:white;font-weight:bold;width:100%;'><tr><td style='font-size:25px;color:white;'><?php echo $user_name; ?>, Level <?php echo $user_level; ?> <?php if($user_class == '0'){ echo "Nightowl";} if($user_class == '1'){ echo "Soldato"; } if($user_class == '2'){ echo "Mogul"; } if($user_class == '3'){ echo "Renegade"; } ?></td></tr></table>

<table border='0' align='left'><tr>

<td style='padding-right:5px;line-height:1.0;border-left: 0px solid white;'><table style='font-weight:bold;color:#BEB9D0;'><tr><td>Attack</td></tr></table></td>
<td style='padding-left:5px;padding-right:5px;line-height:1.0;border-left: 2px solid white;'><table style='font-weight:bold;color:#BEB9D0;'><tr><td>Punch</td></tr></table></td>
<td style='padding-left:5px;padding-right:5px;line-height:1.0;border-left: 2px solid white;'><table style='font-weight:bold;color:#BEB9D0;'><tr><td><a onclick="showaddtohitlist();" style='cursor:pointer;'>Add To Hit List</a></td></tr></table></td>

<td style='padding-left:10px;line-height:1.1;border-left: 0px solid white;'><table style='font-weight:bold;color:white;'><tr><td>Age: <?php echo $age; ?></td></tr></table></td>
<?php if($admin == '1'){ ?>
<td style='padding-left:10px;line-height:1.1;border-left: 0px solid white;'><table style='font-weight:bold;color:white;'><tr><td>Last Active: <?php echo $last_activity; ?></td></tr></table></td>
<?php } ?>
</tr></table>


<table style='line-height:1.1;border-bottom: .1px solid white;font-size:25px;color:orange;font-weight:bold;width:100%;'></table>



<table style='padding-top:10px;line-height:1.1;border-bottom: .1px solid white;font-size:22px;color:white;font-weight:bold;width:332;'><tr><td>Stats</td></tr></table>

<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:220;font-size:16px;'>Career Stats</td><td style='width:100;font-size:16px;'>Value</td></tr></table></td></tr>
<tr><td><table border='0'>
<tr><td style='font-size:16px;color:white;width:220;'>Missions Completed</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_missions_completed); ?></td></tr>
<tr><td style='font-size:16px;color:white;width:220;'>Bounties Collected</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_bounties_collected); ?></td></tr>
</table></td></tr></table>


<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:220;font-size:16px;'>Fight Stats</td><td style='width:100;font-size:16px;'>Value</td></tr></table></td></tr>
<tr><td><table border='0'>
<tr><td style='font-size:16px;color:white;width:220;'>Fights Won</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_fights_won); ?></td></tr>
<tr><td style='font-size:16px;color:white;width:220;'>Fights Lost</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_fights_lost); ?></td></tr>
<tr><td style='font-size:16px;color:white;width:220;'>Death</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_deaths); ?></td></tr>
<tr><td style='font-size:16px;color:white;width:220;'>Mobsters Whacked</td><td style='font-size:16px;width:220;color:white;'><?php echo number_format($user_mobsters_whacked); ?></td></tr>
</table></td></tr></table>


</div>

<div style="display:none;" id="userhitlistpage">
<table style='line-height:1.1;border-bottom: .1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Place Bounty on "<?php echo $user_name; ?>" <font size='4'>(Minimum of $<?php echo number_format($bounty_amount); ?>)</font></td></tr></table>

<div style='color:white; border='0'><tr><td>Once your bounty is posted, this user will be publicly listed for attack by any mobster out there. The reward will be<br> given to whoever accomplishes the task. <b>It costs 1 stamina point to place a user on the hitlist.</b></td></tr></div>

<table style='padding-top:0px;font-size:18px;color:white;margin-left: auto;margin-right: auto;' border='0'><tr><td>Hit List Bounty Amount:</td>

<td>
<input type="text" style="font-size:15px;" id="bountyamount" value="<?php echo $bounty_amount; ?>">
</td>

<div class="buttonDiv" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:28px 0px 0px 150px;font-size:14px; ">
<td>
<a class="button button_blue" onclick="var bounty = document.getElementById('bountyamount').value; var id = '<?php echo $users_id; ?>'; hitlist(bounty,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Set Bounty</span>		
</a>

</td></div>
</tr></table>


</div>
<?php
}
}
}
?>
