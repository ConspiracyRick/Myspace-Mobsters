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

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

$run = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$runsit = mysqli_fetch_assoc($run);
$character_id = $runsit['id'];
$character_level = $runsit['level'];
$character_points = $runsit['favor_points'];
$character_cash = $runsit['cash'];
$character_upkeep = $runsit['upkeep'];

if(isset($_GET['sell'])){
$id = trim($_GET['sell']);
$id = stripcslashes($id);
$id = $mysqli -> real_escape_string($id);

$amount = trim($_GET['quantity']);
$amount = stripcslashes($amount);
$amount = $mysqli -> real_escape_string($amount);

if($id == 'undefined' && $amount == 'undefined'){
// if equipment does NOT exist
?>
{
"status": "Insuccesso:",
"message": "Yo! You tryna rip me off here?"
}
<?php
}else{
// if equipment does NOT exist
$r = $mysqli->query("SELECT * FROM equipment WHERE id='".$id."'");
$count = mysqli_num_rows($r);
if($count == 0){
?>
{
"status": "Insuccesso:",
"message": "Yo! You tryna rip me off here?"
}
<?php
} // did not find equipment
if($count > 0){
$eid = mysqli_fetch_assoc($r);
$check_can_sell = $eid['can_sell'];

if($check_can_sell == '0'){
?>
{
"status": "Insuccesso:",
"message": "You can't sell that!"
}
<?php
exit;
}

$sold = $eid['name'];
$sell = $eid['cost']/2*$amount;
$takeupkeep = $eid['upkeep']*$amount;

$r = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$id."'");
$counting = mysqli_num_rows($r);
$left = mysqli_fetch_assoc($r);
if($counting == '0'){
$hwcount = "0";
}
if($counting > '0'){
$hwcount = $left['how_many'];
}
if($amount > $hwcount){
if($hwcount > '0'){
?>
{
"status": "Insuccesso:",
"message": "You don't have that many <?php echo $sold; ?>'s to sell."
}
<?php
exit;
}
if($hwcount == '0'){
?>
{
"status": "Insuccesso:",
"message": "You don't have any <?php echo $sold; ?>'s to sell."
}
<?php
exit;
}
}
//new check to see if goes below zero
if($hwcount < $amount){
?>
{
"status": "Insuccesso:",
"message": "You don't have that many <?php echo $sold; ?>'s to sell."
}
<?php
exit;
}
if($hwcount >= $amount){
$result = $mysqli->query("UPDATE owned_equipment SET how_many=how_many-'".$amount."' WHERE equipment_id='".$id."' AND player_id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET cash=cash+'".$sell."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET upkeep=upkeep-'".$takeupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
?>
{
"status": "Eccellente!",
"message": "You sold <?php echo $amount; ?> <?php echo $sold; ?> for $<?php echo number_format($sell); ?>."
}
<?php
exit;
}
/*
// update upkeep in database
$c_upkeep = "0";
$result = $mysqli->query("SELECT * FROM equipment");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
$c_upkeep = $c_upkeep+$total*$row['upkeep'];
}
}
$results_1 = $mysqli->query("UPDATE characters SET upkeep='".$c_upkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// update upkeep in database
*/
} // found equipment

}
exit;
}



if(isset($_GET['buy'])){
$id = trim($_GET['buy']);
$id = stripcslashes($id);
$id = $mysqli -> real_escape_string($id);

$amount = trim($_GET['quantity']);
$amount = stripcslashes($amount);
$amount = $mysqli -> real_escape_string($amount);

//new check to see if goes below zero
if($amount < 0){
?>
{
"status": "Insuccesso:",
"message": "Yo! You tryna rip me off here?"
}
<?php
exit;
}

//new check to see if goes below zero
if($amount > 10){
?>
{
"status": "Insuccesso:",
"message": "You cannot buy that many!"
}
<?php
exit;
}

if($id == 'undefined' && $amount == 'undefined'){
// if equipment does NOT exist
?>
{
"status": "Insuccesso:",
"message": "Yo! You tryna rip me off here?"
}
<?php
}else{
$r = $mysqli->query("SELECT * FROM equipment WHERE id='".$id."'");
$count = mysqli_num_rows($r);
// if equipment does NOT exist
if($count == 0){
?>
{
"status": "Insuccesso:",
"message": "Yo! You tryna rip me off here?"
}
<?php
exit;
}
// if equipment does exist
if($count > 0){
$eid = mysqli_fetch_assoc($r);

$check_can_buy = $eid['can_buy'];
if($check_can_buy == '0'){
?>
{
"status": "Insuccesso:",
"message": "You can't buy that!"
}
<?php
exit;
}

$bought = $eid['name'];
$cost = $eid['cost']*$amount;
$exclusive_item = $eid['exclusive_item'];
$exclusive_left = $eid['exclusive_left'];
$exclusive_cost = $eid['exclusive_cost']*$amount;
$level_required = $eid['level'];
$giveupkeep = $eid['upkeep']*$amount;

if($exclusive_item == '0'){
if($cost > $character_cash){
?>
{
"status": "Insuccesso:",
"message": "You don't have enough cash!"
}
<?php
exit;
}
}
if($exclusive_item == '1'){
if($exclusive_cost > $character_points){
?>
{
"status": "Insuccesso:",
"message": "You don't have enough favor points!"
}
<?php
exit;
}
}

if($exclusive_item == '0'){
if($character_cash >= $cost){
if($character_level < $level_required){
?>
{
"status": "Insuccesso:",
"message": "You are not the required level!"
}
<?php
}else{
// check if already in database or not.
$or = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$id."'");
$ths = mysqli_num_rows($or);

if($ths == 0){
$mysqli->query("INSERT INTO owned_equipment (equipment_id,player_id,how_many) VALUES('".$id."','".$character_id."','".$amount."')");
$result_2 = $mysqli->query("UPDATE characters SET cash=cash-'".$cost."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET upkeep=upkeep+'".$giveupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
if($ths > 0){
$result = $mysqli->query("UPDATE owned_equipment SET how_many=how_many+'".$amount."' WHERE equipment_id='".$id."' AND player_id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET cash=cash-'".$cost."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET upkeep=upkeep+'".$giveupkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
?>
{
"status": "Eccellente!",
"id": "<?php echo $id; ?>",
"weapon_how_many": "<?php echo $amount; ?>",
"message": "You bought <?php echo $amount; ?> <?php echo $bought; ?> for $<?php echo number_format($cost); ?>."
}
<?php
}
}
}
if($exclusive_item == '1'){
if($exclusive_left <= '0'){
?>
{
"status": "Insuccesso:",
"message": "There are no <?php echo $bought; ?>'s left!"
}
<?php
exit;
}
if($character_points >= $exclusive_cost){
// check if already in database or not.
$or = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$id."'");
$ths = mysqli_num_rows($or);

if($ths == 0){
$mysqli->query("INSERT INTO owned_equipment (equipment_id,player_id,how_many) VALUES('".$id."','".$character_id."','".$amount."')");
$result_2 = $mysqli->query("UPDATE characters SET favor_points=favor_points-'".$exclusive_cost."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
if($ths > 0){
$result = $mysqli->query("UPDATE owned_equipment SET how_many=how_many+'".$amount."' WHERE equipment_id='".$id."' AND player_id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET favor_points=favor_points-'".$exclusive_cost."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
}
?>
{
"status": "Eccellente!",
"weapon_how_many": "",
"message": "You bought <?php echo $amount; ?> <?php echo $bought; ?> for <?php echo number_format($exclusive_cost); ?> favor points."
}
<?php
}
}

/*
// update upkeep in database
$c_upkeep = "0";
$result = $mysqli->query("SELECT * FROM equipment");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
$c_upkeep = $c_upkeep+$total*$row['upkeep'];
}
}
$results_1 = $mysqli->query("UPDATE characters SET upkeep='".$c_upkeep."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// update upkeep in database
*/
exit;
}
// if equipment does exist
}
exit;
}

/* old code delete it if upkeep works from database
// When an id isn't found it gives an error. Warning: Trying to access array offset on value of type null in C:\wamp64\www\home\tabs\equipment.php
$total_upkeep = "0";
$result = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."'") or die("Cannot Connect");
while($row=mysqli_fetch_array($result)){
$re1 = $mysqli->query("SELECT * FROM equipment WHERE id='".$row['equipment_id']."'");
$w1 = mysqli_fetch_assoc($re1);
if($w1['upkeep'] > '0'){
//echo "<font color='white'>X".$row['how_many']." - ID: ".$w1['id']." - Upkeep: $<br>";
$upkeep = $row['how_many']*$w1['upkeep'];
$total_upkeep = $total_upkeep+$upkeep;
}
}
*/
?>

<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Your Equipment: <font size='3'>(Upkeep <font color='red'>$<?php echo number_format($character_upkeep); ?></font>)</td></tr></table>
<font size='3' color='white'>
You'll need equipment for certain missions. Also the more equipment you have, the better your mob will<br> perform when you attack others ... or when other mobs attack you.
<br>Buy or sell equipment by clicking on the proper tab below.</font>

<?php
$result = $mysqli->query("SELECT * FROM equipment WHERE featured='1' AND released='1'");
$fgd = mysqli_num_rows($result);
if($fgd > 0){
?>

<div style='margin-left:25px;margin-top:10px;padding-left:7px;padding-top:3px;padding-bottom:3px;background-color:#5F1304;width:930px;line-height:1.4;font-size:18px;color:white;'>
Featured Items
</div>

<table style='margin-left:25px;' border='0'><tr>
<?php
while($row=mysqli_fetch_array($result)){
$ore = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$row['id']."'");
if($ore->num_rows === 0){
$own_total = "0";
}else{
$own = mysqli_fetch_assoc($ore);
$own_total = $own['how_many'];
}
?>
<td style='border-style: solid;border-color: grey;border-width: 1px;'>
<table border='0' style='font-size:16px;color:white;margin-left: auto;margin-right: auto;'>
<tr><td style='width:300px;font-weight:bold;'><center><?php echo $row['name']; ?></td></tr>
</table>
<table border='0' style='font-size:16px;color:white;margin-left: auto;margin-right: auto;'>
<tr><td style='height:120px;'><center><img src='./images/equipment/<?php echo $row['picture_name']; ?>'></center></td></tr>
</table>
<table border='0' style='font-size:16px;color:white;margin-left: auto;margin-right: auto;'>
<tr><td style='width:300px;'><center>Attack: <?php echo $row['attack']; ?> Defense: <?php echo $row['defense']; ?></center></td></tr>
</table>

<?php if($row['exclusive_left'] <= '0'){ ?>
<table border='0' style='font-size:16px;color:white;margin-left: auto;margin-right: auto;'>
<tr><td style='width:300px;'><center><b><font color='red'>SOLD OUT</font></b> | <b>Owned: <?php echo $own_total; ?></b></center></td></tr>
<tr><td style='width:300px;'><center><br></center></td></tr>
</table>
<?php } ?>

<?php if($row['exclusive_left'] > '0'){ ?>
<table border='0' style='font-size:16px;color:white;margin-left: auto;margin-right: auto;'>
<tr><td style='width:300px;'><center>Less than <font color='red'><b><?php echo number_format($row['exclusive_left']); ?></b></font> remaining!</center></td></tr>
<tr><td style='width:300px;'><center><b><font color='orange'><?php echo number_format($row['exclusive_cost']); ?> favor points</font></b> | <b>Owned: <?php echo $own_total; ?></b></center></td></tr>
</table>
<?php } ?>


<?php if($row['exclusive_left'] == '0'){ ?>
<table style='margin-top:64px;' border='0'><tr><td>
</td></tr></table>
<?php } ?>

<?php if($row['exclusive_left'] > '0'){ ?>
<table style='margin-top:30px;margin-left: auto;margin-right: auto;' border='0'><tr><td>
<select style='font-size:16px;' id="buyequipment<?php echo $row['id']; ?>">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td><td>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected = $('#buyequipment<?php echo $row['id']; ?> option:selected'); var q = selected.html(); var id = this.id; buy_equipment(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Buy</span>		
</a>
</div>
</td></tr></table>
<?php } ?>






</td>
<?php } ?>
</tr></table>
<?php } ?>


<?php
$result = $mysqli->query("SELECT * FROM equipment WHERE level<='".$character_level."' AND released='1' AND can_sell='1' ORDER BY exclusive_item,level ASC");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$character_id."' AND equipment_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
}
?>
<table style='width:100%;line-height:1.4;border-bottom: 1px solid grey;' border='0'><tr><td>

<table border='0'><tr>
<td style='height:100px;width:170px;'><center>
<table border='0'><tr><td><center><img src='./images/equipment/<?php echo $row['picture_name']; ?>'></center></td></tr></table>
</center></td>
<td>
<table style='margin-left:0px;color:white;' border='0'>
<tr><td><b><?php echo $row['name']; ?></b></td></tr>
<?php if($row['exclusive_item'] == '0'){ ?>
<tr><td>Upkeep: $<?php echo number_format($row['upkeep']); ?></td></tr>
<?php } ?>
<tr><td>Attack: <?php echo number_format($row['attack']); ?></td></tr>
<tr><td>Defense: <?php echo number_format($row['defense']); ?></td></tr>
<?php if($row['exclusive_item'] == '1'){ ?>
<?php if($row['exclusive_left'] <= '0'){ ?>
<tr><td style='font-weight:bold;font-size:16px;color:red;'>SOLD OUT!</td></tr>
<?php } ?>
<?php if($row['exclusive_left'] > '0'){ ?>
<tr><td style='font-size:16px;color:white;'>Less than <font color='red'><b><?php echo number_format($row['exclusive_left']); ?></font></b> remaining!</td></tr>
<?php } ?>
<?php } ?>
</table>
</td>
</tr></table>

</td>
<td>

<table style='width:285px;margin-left:0px;' border='0' align='right'>



<?php if($row['can_sell'] == '1'){ ?>
<tr><td>
<table border='0'>
<tr>
<td style='width:140px;color:yellow;'>
<b>$<?php echo number_format($row['cost']); ?></b>
</td>
<?php }elseif($row['can_buy'] == '1'){ ?>
<?php if($row['exclusive_item'] == '0'){ ?>
<tr><td>
<table border='0'>
<tr>
<td style='width:140px;color:yellow;'>
<b>$<?php echo number_format($row['cost']); ?></b>
</td>
<?php }elseif($row['exclusive_item'] == '1'){ ?>

<?php if($row['exclusive_left'] <= '0'){ ?>
<td style='width:139px;color:white;font-weight:bold;'>
SOLD OUT
</td>
<?php } ?>
<?php if($row['exclusive_left'] > '0'){ ?>
<tr><td>
<table border='0'>
<tr>
<td style='width:140px;color:orange;font-weight:bold;'>
<?php echo number_format($row['exclusive_cost']); ?> <font size='3'>favor points</font>
</td>
<?php } ?>


<?php } }?>

<td style='width:120px;color:white;'>
<b>Owned: <?php echo number_format($total); ?></b>
</td>
</tr>
</table>
</td></tr>



<tr><td>
<table border='0'>
<tr>
<?php if($row['can_buy'] == '1'){ ?>
<?php if($row['exclusive_item'] == '0'){ ?>
<td style='width:140px;color:yellow;'>
<table><tr><td>
<select style='font-size:16px;' id="buyequipment<?php echo $row['id']; ?>">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td><td>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected = $('#buyequipment<?php echo $row['id']; ?> option:selected'); var q = selected.html(); var id = this.id; buy_equipment(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Buy</span>		
</a>
</div>
</td></tr></table>
</td>
<?php }elseif($row['exclusive_item'] == '1'){ ?>
<?php if($row['exclusive_left'] > '0'){ ?>
<td style='width:140px;color:orange;'>
<table><tr><td>
<select style='font-size:16px;' id="buyequipment<?php echo $row['id']; ?>">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td><td>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected = $('#buyequipment<?php echo $row['id']; ?> option:selected'); var q = selected.html(); var id = this.id; buy_equipment(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Buy</span>		
</a>
</div>
</td></tr></table>
</td>
<?php } ?>
<?php } }?>


<?php if($row['can_sell'] == '1'){ ?>

<?php if($row['can_buy'] == '0'){ ?>
<?php if($row['exclusive_item'] == '0'){ ?>
<td style='width:220px;color:yellow;'>

</td>
<td style='width:140px;color:yellow;'>
<table><tr><td>
<select style='font-size:16px;' id="sellequipment<?php echo $row['id']; ?>">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td><td>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected2 = $('#sellequipment<?php echo $row['id']; ?> option:selected'); var q = selected2.html(); var id = this.id; sell_equipment(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Sell</span>		
</a>
</div>
</td></tr></table>
</td>
<?php } } ?>

<?php if($row['can_buy'] == '1'){ ?>
<?php if($row['exclusive_item'] == '0'){ ?>
<td style='width:120px;color:yellow;'>
<table><tr><td>
<select style='font-size:16px;' id="sellequipment<?php echo $row['id']; ?>">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
</select>
</td><td>
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected2 = $('#sellequipment<?php echo $row['id']; ?> option:selected'); var q = selected2.html(); var id = this.id; sell_equipment(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Sell</span>		
</a>
</div>
</td></tr></table>
</td>
<?php } } ?>

<?php } ?>

</tr></table>
</td></tr>



</table>
</td></tr></table>
<?php
}
}
?>