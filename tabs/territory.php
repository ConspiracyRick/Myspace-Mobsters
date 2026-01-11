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
$run = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$user_id."' AND characterloaded='1'");
$runsit = mysqli_fetch_assoc($run);
$character_id = $runsit['id'];
$character_income_timer = $runsit['income_timer'];
$character_level = $runsit['level'];
$character_cash = $runsit['cash'];
$character_income = $runsit['income'];
$character_upkeep = $runsit['upkeep'];
$class = $runsit['class'];

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

if(isset($_GET['buy'])){
$get_buy = trim($_GET['buy']);
$get_quantity = trim($_GET['quantity']);

$get_buy = stripcslashes($get_buy);
$get_buy = $mysqli -> real_escape_string($get_buy);

$get_quantity = stripcslashes($get_quantity);
$get_quantity = $mysqli -> real_escape_string($get_quantity);

//new check to see if goes below zero
if($get_quantity < 0){
?>
{
"status": "Insuccesso:",
"message": "Whoa! You can't do that pal!"
}
<?php
exit;
}
if($get_quantity > 10){
?>
{
"status": "Insuccesso:",
"message": "You cannot buy that many!"
}
<?php
exit;
}

$but = $mysqli->query("SELECT * FROM property WHERE id='".$get_buy."' AND level<='".$character_level."'");
$sht = mysqli_num_rows($but);

if($sht > 0){
$butt = mysqli_fetch_assoc($but);
$property_name = $butt['name'];
$built_on_id = $butt['built_on_id'];
$income = $butt['income'];
$initial_cost = $butt['initial_cost'];
$giveincome = $income*$get_quantity;

//check built on
if(!$built_on_id == '0'){
//buying built on for the first time check to see if there are any land.
$re1 = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$built_on_id."'");
$ths = mysqli_num_rows($re1);
if($ths <= 0){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't own any <?php echo $built_on_property_name; ?>'s"
}
<?php
exit;
}

if($ths > 0){
//buying built on for the first time
$re1 = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$get_buy."'");
$hhs = mysqli_num_rows($re1);
if($hhs <= 0){
// check built on
$rg1 = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$built_on_id."'");
$rhs = mysqli_num_rows($rg1);
if($rhs > 0){
$bsd = mysqli_fetch_assoc($rg1);
$howmanyowned = $bsd['how_many'];
if($howmanyowned >= $get_quantity){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
$built_on_income = $b['income'];
$takeincome = $built_on_income*$get_quantity;
$buy = $initial_cost*$get_quantity;

if($character_cash >= $buy){
$mysqli->query("INSERT INTO owned_property (property_id,player_id,how_many) VALUES('".$get_buy."','".$character_id."','".$get_quantity."')");
$result_2 = $mysqli->query("UPDATE owned_property SET how_many=how_many-'".$get_quantity."' WHERE property_id='".$built_on_id."' AND player_id='".$character_id."'");
$result_4 = $mysqli->query("UPDATE characters SET income=income+'".$giveincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET income=income-'".$takeincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_5 = $mysqli->query("UPDATE characters SET cash=cash-'".$buy."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
?>
{
"status": "Eccellente!",
"id": "<?php echo $get_buy; ?>",
"property_how_many": "<?php echo $get_quantity; ?>",
"message": "You Bought <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s for $<?php echo number_format($buy); ?>."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "You don't have enough cash to purchase <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s"
}
<?php
}

}elseif($howmanyowned == 0){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't own any <?php echo $built_on_property_name; ?>'s"
}
<?php
}elseif($howmanyowned < $get_quantity){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't have that many <?php echo $built_on_property_name; ?>'s"
}
<?php
}

}else{
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't own any <?php echo $built_on_property_name; ?>'s"
}
<?php
}





}
//buying built on for the first time



// buying the prop again
if($hhs > 0){
// check built on
$rg1 = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$built_on_id."'");
$rhs = mysqli_num_rows($rg1);
if($rhs > 0){
$bsd = mysqli_fetch_assoc($rg1);
$howmanyowned = $bsd['how_many'];

if($howmanyowned >= $get_quantity){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
$built_on_income = $b['income'];
$takeincome = $built_on_income*$get_quantity;

$ji = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$get_buy."'");
$lo = mysqli_fetch_assoc($ji);
$total_amount = $lo['how_many'];
// maths
$percentage = $total_amount*10;
$new_width = ($percentage / 100) * $initial_cost;
$price_now = $initial_cost+$new_width;
$bought = $price_now*$get_quantity;

if($character_cash >= $bought){
$result = $mysqli->query("UPDATE owned_property SET how_many=how_many+'".$get_quantity."' WHERE property_id='".$get_buy."' AND player_id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE owned_property SET how_many=how_many-'".$get_quantity."' WHERE property_id='".$built_on_id."' AND player_id='".$character_id."'");
$result_3 = $mysqli->query("UPDATE characters SET income=income-'".$takeincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_4 = $mysqli->query("UPDATE characters SET income=income+'".$giveincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_5 = $mysqli->query("UPDATE characters SET cash=cash-'".$bought."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
?>
{
"status": "Eccellente!",
"id": "<?php echo $get_buy; ?>",
"property_how_many": "<?php echo $get_quantity; ?>",
"message": "You Bought <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s for $<?php echo number_format($bought); ?>."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "You don't have enough cash to purchase <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s"
}
<?php
}

}elseif($howmanyowned == 0){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't own any <?php echo $built_on_property_name; ?>'s"
}
<?php
}elseif($howmanyowned < $get_quantity){
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't have that many <?php echo $built_on_property_name; ?>'s"
}
<?php
}


}else{
$yu = $mysqli->query("SELECT * FROM property WHERE id='".$built_on_id."'");
$b = mysqli_fetch_assoc($yu);
$built_on_property_name = $b['name'];
?>
{
"status": "Insuccesso:",
"message": "You don't own any <?php echo $built_on_property_name; ?>'s"
}
<?php
}
} // buying the prop again
} //buying built on for the first time


} //check built on
//check if nothing built on
if($built_on_id == '0'){
$re1 = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$get_buy."'");
$ths = mysqli_num_rows($re1);
// buying the prop for the first time
if($ths <= 0){
$buy = $initial_cost*$get_quantity;

if($character_cash >= $buy){
$mysqli->query("INSERT INTO owned_property (property_id,player_id,how_many) VALUES('".$get_buy."','".$character_id."','".$get_quantity."')");
$result_2 = $mysqli->query("UPDATE characters SET cash=cash-'".$buy."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET income=income+'".$giveincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
?>
{
"status": "Eccellente!",
"id": "<?php echo $get_buy; ?>",
"property_how_many": "<?php echo $get_quantity; ?>",
"message": "You Bought <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s for $<?php echo number_format($buy); ?>."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "You don't have enough cash to purchase <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s"
}
<?php
}



}
// buying the prop again
if($ths > 0){

$ji = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$get_buy."'");
$lo = mysqli_fetch_assoc($ji);
$total_amount = $lo['how_many'];
// maths
$percentage = $total_amount*10;
$new_width = ($percentage / 100) * $initial_cost;
$price_now = $initial_cost+$new_width;
$bought = $price_now*$get_quantity;

if($character_cash >= $bought){
$result = $mysqli->query("UPDATE owned_property SET how_many=how_many+'".$get_quantity."' WHERE property_id='".$get_buy."' AND player_id='".$character_id."'");
$result_2 = $mysqli->query("UPDATE characters SET cash=cash-'".$bought."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
$result_3 = $mysqli->query("UPDATE characters SET income=income+'".$giveincome."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
?>
{
"status": "Eccellente!",
"id": "<?php echo $get_buy; ?>",
"property_how_many": "<?php echo $get_quantity; ?>",
"message": "You Bought <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s for $<?php echo number_format($bought); ?>."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "You don't have enough cash to purchase <?php echo $get_quantity; ?> <?php echo $property_name; ?>'s"
}
<?php
}
}







} //check if nothing built on

/*
// update income in database
$income = "0";
$result = $mysqli->query("SELECT * FROM property");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
$income = $income+$total*$row['income'];
}
}
$results_1 = $mysqli->query("UPDATE characters SET income='".$income."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// update income in database
*/

}else{ // if property id exists
?>
{
"status": "Insuccesso:",
"message": "What was your goal here?"
}
<?php
}
}elseif(isset($_GET['sell'])){
$get_sell = trim($_GET['sell']);
$get_quantity = trim($_GET['quantity']);

$get_sell = stripcslashes($get_sell);
$get_sell = $mysqli -> real_escape_string($get_sell);

$get_quantity = stripcslashes($get_quantity);
$get_quantity = $mysqli -> real_escape_string($get_quantity);

//new
//new
?>
{
"status": "Insuccesso:",
"message": "You cannot sell property!"
}
<?php
exit;

if($get_quantity > 10){
?>
{
"status": "Insuccesso:",
"message": "You cannot sell that many!"
}
<?php
exit;
}

$but = $mysqli->query("SELECT * FROM property WHERE id='".$get_sell."'");
$butt = mysqli_fetch_assoc($but);
$property_name = $butt['name'];
$initial_cost = $butt['initial_cost'];
$sell = $initial_cost/$get_quantity;

?>
{
"status": "Eccellente!",
"message": "You sold <?php echo $get_quantity; ?> <?php echo $property_name; ?> for $<?php echo number_format($sell); ?>."
}
<?php
}else{
?>

<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Your Territory: <font size='3'>(Income <font color='yellow'>$<?php echo number_format($character_income); ?></font>, Upkeep From Equipment: <font color='red'>$<?php echo number_format($character_upkeep); ?></font>)</font></td></tr></table>
<?php
$cash_flow = $character_income-$character_upkeep;

if($character_income_timer == ''){
$mins = "";
}else{
$tDiff = $character_income_timer - time();
$days = floor($tDiff / 86400);
$hours = ($tDiff / 3600) % 24;
$mins = ($tDiff / 60) % 60;
$secs = ($tDiff) % 60;
if($mins < 0){
$mins = "0";
}
}
?>
<table style='line-height:1.4;border-bottom: 1px solid white;font-size:16px;color:white;font-weight:bold;width:100%;'><tr><td>Cash Flow: <font size='3' color='yellow'>$<?php echo number_format($cash_flow); ?></font> <font size='3'>every 60 mintues. Next paid in <span id="incometimer"><?php echo $mins; ?></span> minutes.</font></td></tr></table>
<font size='3' color='white'>Territory produces the income you need to keep up with your expenses. Your goal is a positive Cash flow. Start by<br> buying a plot of land. For even more income, build developments on your land! If you lack the Cash to buy what<br> you want, complete missions or attack rivals.</font>

<script>
var remainingTime = <?php echo $character_income_timer; ?>;

function updateITime() {
var MMode = setInterval(function(){ MModeTimer(remainingTime)}, 1000);

	function MModeTimer(remainingTime) {

	var currentTime = new Date().getTime() / 1000;
	var futureTime = remainingTime;
	var timeRemaining = futureTime - currentTime;
	var minute = 60;
	var hour = 60 * 60;
	var day = 60 * 60 * 24;
	var dayFloor = Math.floor(timeRemaining / day);
	var hourFloor = Math.floor((timeRemaining - dayFloor * day) / hour);
	var minuteFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour) / minute);
	var secondFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour - minuteFloor * minute));
	var countdownCompleted = "0";

	if (secondFloor <= 0 && minuteFloor <= 0) {
	clearInterval(MModeTimer);
	document.getElementById("incometimer").innerHTML = countdownCompleted;

	} else {

	if (futureTime > currentTime) {
$('#incometimer').html(minuteFloor);
	}
	}
	}
	}
setInterval(updateITime, 1000 );
</script>

<?php
// buying will only change the income in database find a different way.
// test income in database
/*
$income = "0";
$result = $mysqli->query("SELECT * FROM property");
while($row=mysqli_fetch_array($result)){
$re = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
$income = $income+$total*$row['income'];
}
}
echo "<center><font color='white'>".number_format($income)."</font></center>";
*/
// test income in database - over seas lot income is 50000 - vacant lot is 100
?>

<table style='margin-top:15px;line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:980;'><tr><td>Land</td></table>
<?php
$count = "0";
$display = "4";
$result = $mysqli->query("SELECT * FROM property WHERE type='land' AND released='1' ORDER BY level DESC");
echo '<table style="margin-top:15px;" border="0"><tr>';
while($row=mysqli_fetch_array($result)){
$initial_cost = $row['initial_cost'];
$count++;
$re = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
$price_inflation = $row['initial_cost'];
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
if($total == 0){
$price_inflation = $initial_cost;
}else{
// maths
$percentage = $total*10;
$new_width = ($percentage / 100) * $initial_cost;
$price_inflation = $initial_cost+$new_width;

}
}
echo '<td style="padding-top:10px;padding-left:10px;padding-right:10px;border-style: solid;border-color: grey;border-width: 1px;"><table style="width:220px;" border="0"><tr><td style="text-align:center;"><img src="./images/property/'.$row['picture_name'].'"></td></tr>';
echo '<tr><td style="text-align:center;color:white;font-weight:bold;">'.$row['name'].'</td></tr>';
echo '<tr><td style="text-align:center;color:white;">Income: $'.number_format($row['income']).'</td></tr>';
echo '<tr><td style="text-align:center;color:yellow;">Price: $'.number_format($price_inflation).'</td></tr><tr><td style="text-align:center;color:white;width:100px;">You own: <b>'.number_format($total).'</b></td></tr>';
echo '<tr><td>';
?>

<table align='center'><tr><td>
<select style='font-size:16px;' id="propertyquantity<?php echo $row['id']; ?>">
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
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected = $('#propertyquantity<?php echo $row['id']; ?> option:selected'); var q = selected.html(); var id = this.id; buy_property(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Buy</span>		
</a>
</div>

</td>
<?php /* ?>
<td style="padding-left:10px;">
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected2 = $('#propertyquantity<?php echo $row['id']; ?> option:selected'); var q = selected2.html(); var id = this.id; sell_property(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Sell</span>		
</a>
</div>
</td>
<?php */ ?>
</tr></table>

<?php
echo '</td></tr></table></td>';
if($count == $display){
$count = "0";
echo '</tr><tr>';
}
}
echo '</tr></table>';
?>

<table style='margin-top:15px;line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:980;'><tr><td>Developments</td></table>
<?php
$count = "0";
$display = "4";
$result = $mysqli->query("SELECT * FROM property WHERE type='dev' AND released='1' ORDER BY level DESC");
echo '<table style="margin-top:15px;" border="0"><tr>';
while($row=mysqli_fetch_array($result)){
$initial_cost = $row['initial_cost'];
$count++;
$re = $mysqli->query("SELECT * FROM owned_property WHERE player_id='".$character_id."' AND property_id='".$row['id']."'");
if($re->num_rows === 0){
$total = "0";
$price_inflation = $row['initial_cost'];
}else{
$w1 = mysqli_fetch_assoc($re);
$total = $w1['how_many'];
if($total == 0){
$price_inflation = $initial_cost;
}else{
// maths
$percentage = $total*10;
$new_width = ($percentage / 100) * $initial_cost;
$price_inflation = $initial_cost+$new_width;
}
}
echo '<td style="padding-top:10px;padding-left:10px;padding-right:10px;border-style: solid;border-color: grey;border-width: 1px;"><table style="width:220px;" border="0"><tr><td style="text-align:center;"><img src="./images/property/'.$row['picture_name'].'"></td></tr>';
echo '<tr><td style="text-align:center;color:white;font-weight:bold;">'.$row['name'].'</td></tr>';
echo '<tr><td style="text-align:center;color:white;">Income: $'.number_format($row['income']).'</td></tr>';
if(!$row['built_on_id'] == '0'){
$re1 = $mysqli->query("SELECT * FROM property WHERE id='".$row['built_on_id']."'");
$wl = mysqli_fetch_assoc($re1);
echo '<tr><td style="text-align:center;color:white;">Built on: '.$wl['name'].'</td></tr>';
}
echo '<tr><td style="text-align:center;color:yellow;">Price: $'.number_format($price_inflation).'</td></tr><tr><td style="text-align:center;color:white;width:100px;">You own: <b>'.number_format($total).'</b></td></tr>';
if($row['built_on_id'] == '0'){
echo '<tr><td style="text-align:center;color:white;height:23px;"></td></tr>';
}
echo '<tr><td>';
?>

<table align='center'><tr><td>
<select style='font-size:16px;' id="propertyquantity<?php echo $row['id']; ?>">
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
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected = $('#propertyquantity<?php echo $row['id']; ?> option:selected'); var q = selected.html(); var id = this.id; buy_property(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Buy</span>		
</a>
</div>

</td>
<?php /* ?>
<td style="padding-left:10px;">
<div class="buttonDiv" style="padding-top:0px;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; font-size:14px; ">
<a id="<?php echo $row['id']; ?>" class="button button_blue" onclick="var selected2 = $('#propertyquantity<?php echo $row['id']; ?> option:selected'); var q = selected2.html(); var id = this.id; sell_property(q,id);$(window).scrollTop(0);">
<span style="font-size:14px;">Sell</span>		
</a>
</div>
</td>
<?php */ ?>
</tr></table>

<?php
echo '</td></tr></table></td>';
if($count == $display){
$count = "0";
echo '</tr><tr>';
}
}
echo '</tr></table>';




}
}
?>
