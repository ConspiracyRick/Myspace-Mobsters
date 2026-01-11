<?php
ob_start();
?>
<title>Mobsters</title>
<style>
body {
background-color: black;
}
</style>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<font color='white'><?php
// Turn off all error reporting
error_reporting(0);

$device = $_SERVER['HTTP_USER_AGENT'];
$ip_address = $_SERVER['REMOTE_ADDR'];

if(isset($_GET['get_info'])){
echo $device."<br>";
echo $ip_address."<br>";
}

if(strpos($device, 'Chrome') !== false || strpos($device, 'Firefox') !== false) {
if(strpos($device, 'Android') !== false || strpos($device, 'iPhone') !== false) {
}else{
$enable = '1';
}
}

if($enable == '1') {
if($ip_address == ''){
echo "<center><font size='5' color='red'>Could not get information.</font></center><br>";
}else{
include_once 'conn1651651651651.php';

date_default_timezone_set('US/Eastern');

if(isset($_GET['register'])){
echo "<center><a style='font-size:35px;text-decoration:none;color:white;' href='../ '>[<-Back]</a></center><br>";
if(isset($_POST['form'])){
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$email = stripcslashes($email);
$password = stripcslashes($password);
$email = $mysqli -> real_escape_string($email);
$password = $mysqli -> real_escape_string($password);

//echo "<center><font size='5' color='white'>".$email."</font></center><br>";
//echo "<center><font size='5' color='white'>".$password."</font></center><br>";

$check_email = strstr($email, '@');
$check_email = substr($check_email, 0, strpos($check_email, '.'));
$check_email = str_replace('@', '', $check_email);

if($email == '' || $password == ''){
echo "<center><font size='5' color='red'>Information not correct. Please correct it!</font></center><br>";
}elseif($check_email !== 'gmail' && $check_email !== 'yahoo'){
echo "<center><font size='5' color='red'>Use an actual email provider!</font></center><br>";
}else{

/* Testing passwords
if(preg_match('/^([A-Za-z])/i', $password)) {
echo "<center><font size='5' color='green'>Password is working</font></center><br>";
exit;
}

if(!preg_match('/^([A-Za-z])/i', $password)) {
echo "<center><font size='5' color='red'>Password is not working</font></center><br>";
exit;
}
*/

if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email) && preg_match('/^([A-Za-z])/i', $password)) {
$rlt = $mysqli->query("SELECT * FROM registered_users WHERE registered_ip='".$ip_address."'");
$ont = mysqli_num_rows($rlt);

if($ont > '0'){
header('Location: ../?ipalreadyregistered=1');
}else{
$result = $mysqli->query("SELECT * FROM registered_users WHERE email='".$email."'");
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);
if($count > 0){
echo "<center><font size='5' color='red'>Email already exists.</font></center><br>";
}else{
$mysqli->query("INSERT INTO registered_users
(registered_ip, picture, email, password) VALUES('$ip_address','','$email','$password')") 
or die(mysqli_connect_errno());
header('Location: ../?registered=1');
}
}
}else{
echo "<center><font size='5' color='red'>Something went wrong!</font></center><br>";
}



}
}
echo "<center>
<form action='?register' method='POST'>
<font size='5' color='white'>Email:</font><br>
  <input type='text' style='width:300px;font-size:20px;height:28px;' name='email' value=''><br>
<font size='5' color='white'>Password:</font><br>
  <input type='password' style='width:300px;font-size:20px;height:28px;' name='password' value=''><br><br>
  <input name='form' style='font-size:18px;' type='submit' value='Submit Registration'></form>
</center>";
}else{
session_start();
$value = "";
if($_SESSION['character_id'] == null){
$_SESSION['character_id'] = $value;
if(isset($_POST['form'])){
$email = trim($_POST['email']);
$password = trim($_POST['password']);

$email = stripcslashes($email);
$password = stripcslashes($password);
$email = $mysqli -> real_escape_string($email);
$password = $mysqli -> real_escape_string($password);

$check_email = strstr($email, '@');
$check_email = substr($check_email, 0, strpos($check_email, '.'));
$check_email = str_replace('@', '', $check_email);

if($email == '' || $password == ''){
//echo "<center><font size='5' color='red'>Information not correct. Please correct it!</font></center>";
header('Location: ../../?error=112');
exit;
}elseif($check_email !== 'gmail' && $check_email !== 'yahoo'){
//echo "<center><font size='5' color='red'>Use an actual email provider!</font></center>";
header('Location: ../../?error=113');
exit;
}else{

if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $email) && preg_match('/^([A-Za-z])/i', $password)) {
$rrrr = $mysqli->query("SELECT * FROM registered_users WHERE email='".$email."' AND password='".$password."'") or die("Cannot Connect");
$row = mysqli_fetch_array($rrrr);
$count = mysqli_num_rows($rrrr);
if($count > 0){
// timestamp last logged in
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);

// register logins
$mysqli->query("INSERT INTO log_ins (belongsto, device, ip, time_stamp) VALUES('".$row['id']."','".$device."','".$ip_address."',".$time_stamp.")") or die("Cannot Connect #1");

/*
// search for any ips matching any accounts.
$rtgy = $mysqli->query("SELECT * FROM log_ins WHERE ip='".$ip_address."'") or die("Cannot Connect #2");
$counting_ips = mysqli_num_rows($rtgy);
if($counting_ips > '1'){
$result_59743 = $mysqli->query("UPDATE log_ins SET alert='1' WHERE ip='".$ip_address."'") or die(mysqli_error("Error.."));
}
// search for any ips matching any accounts.
*/

if($row['banned'] == '1'){
header('Location: ../?banned');
}else{
$_SESSION['user_id'] = $row['id'];
//echo $_SESSION['user_id'];
//check for characters
$rult = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$row['id']."'");
$cnt = mysqli_num_rows($rult);
if($cnt > 0){
// check for loaded characters
$result = $mysqli->query("SELECT * FROM characters WHERE belongsto='".$row['id']."' AND characterloaded='1'");
$count = mysqli_num_rows($result);
//if a loaded character is found
if($count > '0'){
$y = mysqli_fetch_assoc($result);
$_SESSION['character_id'] = $y['id'];
header('Location: ../home/?status=1');
}else{
$nhy = mysqli_fetch_assoc($rult);
$load_character_id = $nhy['id'];
$result_56743 = $mysqli->query("UPDATE characters SET characterloaded='1' WHERE id='".$load_character_id."'") or die(mysqli_error("Error.."));
$_SESSION['character_id'] = $load_character_id;
header('Location: ../home/?status=0');
}
}else{ // create character if NONE are found.
$_SESSION['character_id'] = "";
header('Location: ../home/?create');
}
}
}else{
echo "<center><font size='5' color='white'>Email or password is incorrect.</font></center>";
//header('Location: ../?error=132');
}




}else{ // if email is bad
header('Location: ../?error=133');
} // if email is good
}
}
if(isset($_GET['banned'])){
echo "<center><font size='5' color='red'>This account is banned.</font></center><br>";
header("Refresh:0; url=../?error=126");
}
if(isset($_GET['error'])){
$error = $_GET['error'];
if($error == '133'){
echo "<center><font size='5' color='red'>Why don't you join us in the game instead?</font></center><br>";
}
if($error == '132'){
echo "<center><font size='5' color='red'>Email or password is incorrect.</font></center><br>";
}
if($error == '126'){
echo "<center><font size='5' color='red'>This account is banned.</font></center><br>";
}
if($error == '112'){
echo "<center><font size='5' color='red'>Information not correct. Please correct it!</font></center><br>";
}
if($error == '113'){
echo "<center><font size='5' color='red'>Use an actual email provider!</font></center><br>";
}
}

if($_GET['registered'] == '1'){
echo "<center><font size='5' color='green'>You have registered. You may now login.</font></center>";
}
if($_GET['ipalreadyregistered'] == '1'){
echo "<center><font size='6' color='red'>You already have an account with us!</font></center>";
}
?>
<center><form method='POST'>
<font size='5' color='white'>Email:</font><br>
  <input style="border-size:1px;border-color:black;width:300px;font-size:20px;height:28px;" type="text" name="email" value=""><br>
<font size='5' color='white'>Password:</font><br>
  <input style="border-size:1px;border-color:black;width:300px;font-size:20px;height:28px;" type="password" name="password" value=""><br><br>
  <input name="form" style='font-size:18px;' type="submit" value="Login">
</form></center>
<center><font size='5' color='white'>Don't have a account yet?</font></center>
<center>
<a style='text-decoration:none;' href='?register'><input style='font-size:18px;' type="submit" value="Register"></a>
</center>
<br>
<?php
echo "<center><b><font size='6' color='white'>Welcome!</font></b></center>
<center><font size='5' color='white'>Welcome to a poorly coded still in development game.</font></center>
<center><font size='5' color='white'>Right now your characters are not guaranteed to be saved.</font></center>
<br>
<center><b><font size='6' color='red'>NOTICE!</font></b></center>
<center><font size='5' color='white'>This game is just a rebuilt version of mobsters that's it.</font></center>
<center><font size='5' color='white'>This game will be made into an entirely new game eventually.</font></center>
<center><font size='5' color='white'>This is for testing purposes only.</font></center>
<center><font size='5' color='white'>Exploit it but don't crash server. Report any exploits found <a style='color:#0D7BD5;' href='https://www.facebook.com/MobstersRemake/' target='new'>here!</a></font></center>
<center><font size='5' color='white'>Security will get better over time.</font></center>
<br>";
/*
echo "<center><b><font size='5' color='red'>WARNING!!!!</font></b></center>
<center><font size='4' color='white'>If you try to exploit the system you WILL<br>get a account ban and IP ban.<br>Play fair with your fellow mobbies.</font></center>
<br>";
*/
?>
<?php
}else{
header('Location: ../home/');
}
}
}
}else{
echo "<center><font size='6' color='white'>Your device/web browser is not supported!</font></center>";
}
?>
