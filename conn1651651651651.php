<?php
$mysqli = new mysqli("db5006696252.hosting-data.io", "dbu756986", "WonderingCow940@", "dbs5540491");
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
?>