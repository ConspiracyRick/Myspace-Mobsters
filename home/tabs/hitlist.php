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
$user_id = $_SESSION['user_id'];
$character_id = $_SESSION['character_id'];

function elapsed_time($timestamp, $precision = 2) {
  $time = time() - $timestamp;
  $a = array('decade' => 315576000, 'year' => 31557600, 'month' => 2629800, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute' => 60, 'second' => 1);
  $i = 0;
  foreach($a as $k => $v) {
    $$k = floor($time/$v);
    if ($$k) $i++;
    $time = $i >= $precision ? 0 : $time - $$k * $v;
    $s = $$k > 1 ? 's' : '';
    $$k = $$k ? $$k.' '.$k.$s.' ' : '';
    @$result .= $$k;
  }
  return $result ? $result.'ago' : '1 second to go';
}

require '../../conn1651651651651.php';

// last activity
/*
$datentime_rightnow = date('Y-m-d H:i:s');
$time_stamp = strtotime($datentime_rightnow);
$result_54065091 = $mysqli->query("UPDATE characters SET last_activity='".$time_stamp."' WHERE belongsto='".$user_id."' AND characterloaded='1'");
*/
// last activity

$arr = array();
$result = $mysqli->query("SELECT * FROM hitlist");
while($row=mysqli_fetch_array($result)){
$timestamp = $row['timestamp'];
$when = elapsed_time($timestamp);
$g_w = $mysqli->query("SELECT * FROM characters WHERE id='".$row['character_id']."'");
$w = mysqli_fetch_assoc($g_w);
$o_p = $mysqli->query("SELECT * FROM characters WHERE id='".$row['set_by']."'");
$k = mysqli_fetch_assoc($o_p);

$arr[] = array('characterid' => $w['id'], 'charactername' => $w['charactername'], 'characterlevel' => $w['level'], 'idlistedby' => $k['id'], 'listedby' => $k['charactername'], 'amount' => number_format($row['bounty']), 'when' => $when);
}
echo json_encode($arr);
}
?>

