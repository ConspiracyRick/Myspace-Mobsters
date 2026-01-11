<?php
ob_start();
$getserver = 'http://'.$_SERVER['HTTP_HOST'];
// PayPal settings
$paypal_email = 'tommy3guns@gmail.com';
$return_url = $getserver.'/mobsters/home/payment/payment-successful.html';
$cancel_url = $getserver.'/mobsters/home/payment/payment-cancelled.html';
$notify_url = $getserver.'/mobsters/home/payment/index.php';

//Database Connection
require '../../conn1651651651651.php';

$item_id = $_POST['item_number'];
$item_id = stripcslashes($item_id);
$item_id = $mysqli->real_escape_string($item_id);

$sql = $mysqli->query("SELECT * FROM `virtual_goods` WHERE item_number='".$item_id."'");
if (mysqli_num_rows($sql) != 0) {
while ($row = mysqli_fetch_array($sql)) {
$item_amount = $row['price'];
$item_name = $row['item_name'];
}
}

// Include Functions
include("functions.php");

// Check if paypal request or response
if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
	$querystring = '';
	
	// Firstly Append paypal account to querystring
	$querystring .= "?business=".urlencode($paypal_email)."&";
	
	// Append amount& currency (£) to quersytring so it cannot be edited in html
	
	//The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
	$querystring .= "item_name=".urlencode($item_name)."&";
	$querystring .= "amount=".urlencode($item_amount)."&";
	
	//loop for posted values and append to querystring
	foreach($_POST as $key => $value){
		$value = urlencode(stripslashes($value));
		$querystring .= "$key=$value&";
	}
	
	// Append paypal return addresses
	$querystring .= "return=".urlencode(stripslashes($return_url))."&";
	$querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
	$querystring .= "notify_url=".urlencode($notify_url);
	
	// Append querystring with custom field
	//$querystring .= "&custom=".USERID;
	
	// Redirect to paypal IPN
	header('location:https://www.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
	exit();
} else {

$myFile = "test_it_pinged_back.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
$stringData = "well it pings back.";
fwrite($fh, $stringData);
fclose($fh);
	
	
	// Response from Paypal

	// read the post from PayPal system and add 'cmd'
	$req = 'cmd=_notify-validate';
	foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
		$req .= "&$key=$value";
	}
	
	// assign posted variables to local variables
	$data['item_name']			= $_POST['item_name'];
	$data['item_number'] 		= $_POST['item_number'];
	$data['payment_status'] 	= $_POST['payment_status'];
	$data['payment_amount'] 	= $_POST['mc_gross'];
	$data['payment_currency']	= $_POST['mc_currency'];
	$data['txn_id']				= $_POST['txn_id'];
	$data['receiver_email'] 	= $_POST['receiver_email'];
	$data['payer_email'] 		= $_POST['payer_email'];
	$data['custom'] 			= $_POST['custom'];
		
	// post back to PayPal system to validate
	$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
	$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
	$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
	
	$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);
	
	if(!$fp){
		
	}else{
		fputs($fp, $header . $req);
		while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp($res, "VERIFIED") == 0) {
				
				// Used for debugging
				// mail('user@domain.com', 'PAYPAL POST - VERIFIED RESPONSE', print_r($post, true));
						
				// Validate payment (Check unique txnid & correct price)
				$valid_txnid = check_txnid($data['txn_id']);
				$valid_price = check_price($data['payment_amount'], $data['item_number']);
				$character_id = $data['custom'];
				
				// PAYMENT VALIDATED & VERIFIED!
				if ($valid_txnid && $valid_price) {
					
					$s = $mysqli->query("SELECT * FROM `virtual_goods` WHERE item_number='".$data['item_number']."'");
                    $row = mysqli_fetch_assoc($s);
                    $reward_points = $row['points'];

					$orderid = updatePayments($data);

					if($data['payment_status'] == 'Refunded'){
					$result = $mysqli->query("UPDATE characters SET favor_points=favor_points-'$reward_points' WHERE id='".$character_id."'");
					}
					if($data['payment_status'] == 'Completed'){
					if ($orderid) {
						// Payment has been made & successfully inserted into the Database
						$result = $mysqli->query("UPDATE characters SET favor_points=favor_points+'$reward_points' WHERE id='".$character_id."'");
					} else {
						// Error inserting into DB
						// E-mail admin or alert user
						// mail('user@domain.com', 'PAYPAL POST - INSERT INTO DB WENT WRONG', print_r($data, true));
					}
					}
				} else {
					// Payment made but data has been changed
					// E-mail admin or alert user
					$result = $mysqli->query("UPDATE characters SET alert='1' WHERE id='".$character_id."'");
				}
			
			} else if (strcmp ($res, "INVALID") == 0) {
				
				// PAYMENT INVALID & INVESTIGATE MANUALY!
				// E-mail admin or alert user
				
				// Used for debugging
				//@mail("user@domain.com", "PAYPAL DEBUGGING", "Invalid Response<br />data = <pre>".print_r($post, true)."</pre>");
			}
		}
	fclose ($fp);
	}
}
?>
