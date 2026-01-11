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

$result = $mysqli->query("SELECT * FROM characters WHERE id='".$character_id."'");
$row = mysqli_fetch_assoc($result);

if(isset($_GET['deposit'])){
$type = $_GET['deposit'];
$cash = $_GET['cash'];

$type = stripcslashes($type);
$type = $mysqli -> real_escape_string($type);

$cash = stripcslashes($cash);
$cash = $mysqli -> real_escape_string($cash);

if($type == 'deposit' && $cash > '999'){
if($cash > $row['cash']){
?>
{
"status": "Insuccesso:",
"message": "You do not have that much!"
}
<?php
}else{
//** 10% of 10,000 is 9,000 do that in math now
$result = $mysqli->query("UPDATE characters SET cash=cash-'".$cash."' WHERE id='".$character_id."'");
$show_cash = $cash*10/100;
$show_cash = $cash-$show_cash;
$result = $mysqli->query("UPDATE characters SET bank=bank+'".$show_cash."' WHERE id='".$character_id."'");
$show_cash = "$".number_format($show_cash);
?>
{
"status": "Eccellente!",
"message": "After the bank's cut, you deposited <?php echo $show_cash; ?> into your account."
}
<?php
}
}
if($type == 'deposit' && $cash < '1000'){
?>
{
"status": "Insuccesso:",
"message": "You must deposit at least $1,000."
}
<?php
}
if($type == 'withdraw' && $cash > '999'){
if($cash > $row['bank']){
?>
{
"status": "Insuccesso:",
"message": "You do not have that much!"
}
<?php
}else{
$result = $mysqli->query("UPDATE characters SET bank=bank-'".$cash."' WHERE id='".$character_id."'");
$result = $mysqli->query("UPDATE characters SET cash=cash+'".$cash."' WHERE id='".$character_id."'");
$show_cash = "$".number_format($cash);
?>
{
"status": "Eccellente!",
"message": "You have withdrawn <?php echo $show_cash; ?> from your account."
}
<?php
}
}
if($type == 'withdraw' && $cash < '1000'){
?>
{
"status": "Insuccesso:",
"message": "You must withdraw at least $1,000 from your account."
}
<?php
}
}else{
?>
<body bgcolor='black'>

<span class="bank_bg">

<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Bank (Account Balance: $<?php echo number_format($row['bank']); ?>)</td></tr></table>
<div style='padding:10px 0px 0px 0px;'></div>

<?php
echo "<table align='left' border='0'>
<tr style='background-color:#44150B;color:white;'>
<td style='height:30;width:500;'>Withdraw</td>
<td style='height:30;width:500;'>Deposit</td></tr>";
echo "</table><br>";
?>
<table align='left' border='0'>

<tr>
<td>
<table align='left' border='0'><tr>
<form id="withdrawform" onsubmit="setTimeout(function(){try{withdrawform();}catch(e){}},0);return false;">
<td style='height:30;width:496;color:white;padding:5px;'>Withdrawal Amount: <input style='position:relative;left:5%;' type='text' id='withdrawcash' name='withdrawcash' value='1000'></td>
</form>
</tr></table>
</td>

<td>
<table align='left' border='0'><tr>
<form id="depositform" onsubmit="setTimeout(function(){try{depositform();}catch(e){}},0);return false;">
<td style='height:30;width:496;color:white;'>Deposit Amount: <input style='position:relative;left:5%;' type='text' id='depositcash' name='depositcash' value='<?php echo $row['cash']; ?>'></td>
</form>
</tr></table>
</td></tr>

<td>
<table style='padding-left:178px;' align='left' border='0'><tr><td>
<div class='buttonDiv' style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; position:relative;margin-top:2%;font-size:14px;'>
<a class='button button_blue' onclick="$('#withdrawform').submit();">
<span style='font-size:14px;'>Withdraw</span>		
</a>
</div>
</td></tr></table>
</td>

<td>
<table style='padding-left:148px;' align='left' border='0'><tr><td>
<div class='buttonDiv' style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; position:relative;margin-top:2%;font-size:14px;'>
<a class='button button_blue' onclick="$('#depositform').submit();">
<span style='font-size:14px;'>Deposit</span>		
</a>
</div>
</tr></td></table>
</td></tr>

<tr>
<td>
<table style='padding-left:178px;' align='left' border='0'><tr><td>
<div style='color:white;position:relative;margin-top:2%;font-size:12px;'>
Withdrawing money to cash is free.<br><br>
</div>
</td></tr></table>
</td>

<td>
<table style='padding-left:148px;' align='left' border='0'><tr><td>
<div style='color:white;position:relative;margin-top:2%;font-size:12px;'>
The bank takes a 10% fee for money laundering out of<br> all deposits.
</div>
</td></tr></table>
</td></tr>

</td></tr></table>

</span>
<?php
}
}
?>