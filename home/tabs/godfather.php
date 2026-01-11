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

// last activity
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
// last activity

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);

if(isset($_GET['accept'])){
$accept = trim($_GET['accept']);
$accept = stripcslashes($accept);
$accept = $mysqli -> real_escape_string($accept);

if($accept == 'cash'){
if($row['favor_points'] < '10'){
?>
{
"status": "Insuccesso:",
"message": "You do not have enough favor points."
}
<?php
}else{
$result = $mysqli->query("UPDATE characters SET cash=cash+'10000' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET favor_points=favor_points-'10' WHERE id='".$character_id."'");
?>
{
"status": "Eccellente!",
"message": "You accepted $10,000 cash."
}
<?php
}
}
if($accept == 'hiredgun'){
if($row['favor_points'] < '20'){
?>
{
"status": "Insuccesso:",
"message": "You do not have enough favor points."
}
<?php
}else{
$result_47332 = $mysqli->query("UPDATE characters SET hired_guns=hired_guns+'1' WHERE id='".$character_id."'") or die(mysqli_error("Error.."));
$result = $mysqli->query("UPDATE characters SET favor_points=favor_points-'20' WHERE id='".$character_id."'");
?>
{
"status": "Eccellente!",
"message": "You accepted 1 hired gun."
}
<?php
}
}
if($accept == 'refill'){
$refill = trim($_GET['refill']);
$refill = stripcslashes($refill);
$refill = $mysqli -> real_escape_string($refill);

if($refill == 'energy'){
if($row['favor_points'] < '10'){
?>
{
"status": "Insuccesso:",
"message": "You do not have enough favor points."
}
<?php
}else{
if($row['energy'] < $row['max_energy']){
$result = $mysqli->query("UPDATE characters SET energy='".$row['max_energy']."' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET favor_points=favor_points-'10' WHERE id='".$character_id."'");
?>
{
"status": "Eccellente!",
"message": "Your energy has been refilled."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "Your energy is already maxed."
}
<?php
}
}
}
if($refill == 'stamina'){
if($row['favor_points'] < '10'){
?>
{
"status": "Insuccesso:",
"message": "You do not have enough favor points."
}
<?php
}else{
if($row['stamina'] < $row['max_stamina']){
$result = $mysqli->query("UPDATE characters SET stamina='".$row['max_stamina']."' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET favor_points=favor_points-'10' WHERE id='".$character_id."'");
?>
{
"status": "Eccellente!",
"message": "Your stamina has been refilled."
}
<?php
}else{
?>
{
"status": "Insuccesso:",
"message": "Your stamina is already maxed."
}
<?php
}
}
}
}
}else{
?>
<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:grey;font-weight:bold;width:100%;'><tr><td>The Godfather: <font size='3' color='yellow'>(You have <?php echo number_format($row['favor_points']); ?> favor points)</td></tr></table>

<b><font size='2' color='grey'>In return for favor points, The Godfather offers you various powerful rewards. <font size='1' color='grey'>(Favor points are NOT necessary for game play or game advancement)</font></font></b>

<b><div style='padding:30px 0px 0px 5px;font-size:23px;color:white;' align='left'>Trade in your favors with the Godfather:</div></b>



<table align='left'><tr><td style='padding:0px 0px 0px 10px;font-size:23px;'>
<table align='left'><tr><td style='width:290px;'>

<table style='height:125px;width:270px;border:2px solid;border-color:#B11717;color:white;'><tr>
<form id="acceptcash" onsubmit="setTimeout(function(){try{acceptcash();}catch(e){}},0);return false;">
<td>
<div style='padding:5px 0px 0px 10px;'>For <b>10</b> favor points:</div><div style='font-size:23px;padding:5px 0px 0px 10px;'>Get $10,000 cash</div>
<div class="buttonDiv" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:28px 0px 0px 160px;font-size:14px; ">
<a class="button button_blue" onclick="$('#acceptcash').submit();">
<span style="font-size:14px;">Accept</span>		
</a>
</div>
</td>
</tr>
</form>
</table>


</td><td style='width:290px;'>


<table style='height:125px;width:270px;border:2px solid;border-color:#B11717;color:white;'><tr>
<form id="accepthiredgun" onsubmit="setTimeout(function(){try{accepthiredgun();}catch(e){}},0);return false;">
<td style='vertical-align: top;'>
<div style='padding:5px 0px 0px 10px;'>For <b>20</b> favor points:</div><div style='font-size:23px;padding:5px 0px 0px 10px;'>Recruit hired gun</div>
<div style="color:white;margin:0px 0 0 7;font-size:21px; ">(+1 mob size)</div>
<div class="buttonDiv" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:3px 0px 0px 160px;font-size:14px; ">
<a class="button button_blue" onclick="$('#accepthiredgun').submit();">
<span style="font-size:14px;">Accept</span>		
</a>
</div>
</td>
</form>
</tr></table>


</td><td>


<table style='height:125px;width:260px;border:2px solid;border-color:#B11717;color:white;'><tr>
<form id="acceptrefill" onsubmit="setTimeout(function(){try{acceptrefill();}catch(e){}},0);return false;">
<td style='vertical-align: top;'>
<div style='padding:5px 0px 0px 10px;'>For <b>10</b> favor points:</div><div style='font-size:23px;padding:5px 0px 0px 10px;'>Refill your <select id='refill'>
<option value="energy">energy</option>
<option value="stamina">stamina</option>
</select></div>
<div class="buttonDiv" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:28px 0px 0px 150px;font-size:14px; ">
<a class="button button_blue" onclick="$('#acceptrefill').submit();">
<span style="font-size:14px;">Accept</span>		
</a>
</div>
</td>
</form>
</tr></table>


</td></tr></table></td></tr></table>
<br><br><br><br><br><br><br><br>
<style>
.points_text {
font-size:20px;
color: rgb(170, 170, 170);
z-index: 1;
}
.points_text_selected {
font-size:20px;
color: rgb(255, 255, 255);
z-index: 1;
}
</style>
<script>
		
        $("#sell1").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect1").attr("class","points_text_selected");
        });
	   
	    $("#sell2").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect2").attr("class","points_text_selected");
        });
	   
	    $("#sell3").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect3").attr("class","points_text_selected");
        });
	   
	    $("#sell4").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect4").attr("class","points_text_selected");
        });
	   
	    $("#sell5").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect5").attr("class","points_text_selected");
        });
	   
	    $("#sell6").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect6").attr("class","points_text_selected");
        });
	   
	    $("#sell7").click(function(){
		$('.sell_selected').each(function() {
        $(this).attr("class","sell-nav");
        });
		$('.points_text_selected').each(function() {
        $(this).attr("class","points_text");
        });
		$(this).attr("class","sell_selected");
		$("#pointsselect7").attr("class","points_text_selected");
        });
	   
	    $("#payment_paypal").click(function(){
		$('.payment_method_selected').each(function() {
        $(this).attr("class","payment_method_nav");
        });
		$(this).attr("class","payment_method_selected");
        });
</script>
<table style='position:relative;left:3.5%;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;background-color:#303031;color:white;padding:10px 20px 5px 20px;'><tr><td>

<table style='padding:0; margin:0;border-collapse: collapse;'><tr>
<td style='width:100px;'><b><font size='5' color='#9A9A9B'>Step 1:</font></b></td><td><b><font size='4' color='#9A9A9B'>How many Favor Points do you want?</font></b></td>
</tr></table>

<table style='padding:0px 0px 0px 15px;margin:0;'><tr><td>
<?php
$result = $mysqli->query("SELECT * FROM virtual_goods WHERE display='1'");
while($row = mysqli_fetch_array($result)){
?>
<form id="sell<?php echo $row['id']; ?>" class='sell-nav' action='../home/payment/index.php' method='post' target='_blank'>
<input type='hidden' name='cmd' value='_xclick' />
<input type='hidden' name='no_note' value='1' />
<input type='hidden' name='lc' value='US' />
<input type='hidden' name='currency_code' value='USD' />
<input type='hidden' name='bn' value='PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest' />
<input type='hidden' name='item_number' value='<?php echo $row['item_number']; ?>' / >
<input type='hidden' name='custom' value='<?php echo $character_id; ?>' />

<table id='pointsselect<?php echo $row['id']; ?>' class='points_text'>
<tr><td><center><?php echo number_format($row['points']); ?></center></td></tr>
<tr><td><center><font size='3'>$<?php echo $row['price']; ?></font></center></td></tr>
</table>
</form>
<?php
}
?>
</td></tr></table>
<br>
<table style='padding:0; margin:0;border-collapse: collapse;'><tr>
<td style='width:100px;'><b><font size='5' color='#9A9A9B'>Step 2:</font></b></td><td><b><font size='4' color='#9A9A9B'>How do you want to pay?</font></b></td>
</tr></table>

<table style='padding:0px 0px 0px 15px;margin:0;'><tr>
<td>
<div id="payment_paypal" class="payment_method_nav"><img src='images/payment_method_paypal.png' style='width:100px;height:50px;'></div>	
</td>
<td>
<div class="buttonDiv" style="-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:28px 0px 0px 150px;font-size:14px; ">
<a class="button button_blue" onclick="document.getElementsByClassName('sell_selected')[0].submit();">
<span style="font-size:14px;">Buy</span>		
</a>
</div>
</td>
</tr></table>

</td></tr></table>
<?php
}
}
?>