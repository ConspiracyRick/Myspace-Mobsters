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
?>
<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>Made Men of Mobsters</td></tr></table>

<table border='0'><tr><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY income DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Top Earners</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'>$<?php echo number_format($fetch['income']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY missions_completed DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Most Missions Completed</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'><?php echo number_format($fetch['missions_completed']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td></tr></table>

<table border='0'><tr><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY fights_won DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Top Fighters</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'><?php echo number_format($fetch['fights_won']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY fights_lost DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Top Losers</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'><?php echo number_format($fetch['fights_lost']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td></tr></table>


<table border='0'><tr><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY mobsters_whacked DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Deadliest Foes</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'><?php echo number_format($fetch['mobsters_whacked']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td><td>
<?php
$query = $mysqli->query("SELECT * FROM `characters` ORDER BY bounties_collected DESC LIMIT 0,10") or die('Invalid query: ' . mysql_error());
echo "<table><tr><td><table style='color:white;background-color:#44150B;' border='0'><tr><td style='width:250;font-size:18px;'>Top Hitmen</td><td style='width:250;font-size:18px;'>Value</td></tr></table></td></tr>";
echo "<tr><td><table border='0'>";
while($fetch = mysqli_fetch_assoc($query)){
?>
<tr><td style='width:250;'><a onclick="var id='<?php echo $fetch['id']; ?>'; user_stats(id);$(window).scrollTop(0);" style='font-size:20px;cursor:pointer;text-decoration: none;color:#BEB9D0;'><?php echo $fetch['charactername']; ?></a></td><td style='font-size:18px;width:250;color:white;'><?php echo number_format($fetch['bounties_collected']); ?></td></tr>
<?php
}
echo "</table></td></tr></table>";
?>
</td></tr></table>