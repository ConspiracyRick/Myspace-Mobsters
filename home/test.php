<?php
require '../conn1651651651651.php';

$other_character_level = "586";
$other_character_id = "12";

// grab max equipment use.
if($other_character_level >= '100'){
$other_total_allowed_use = 500;
}else{
$other_total_allowed_use = $other_character_level*5;
}

// grab other_attack
$other_total_equipment = "0";
$other_attack = "0";
$other_defense = "0";
$other_result = $mysqli->query("SELECT * FROM equipment WHERE can_fight_with='1'");
while($otherrow=mysqli_fetch_array($other_result)){
$other_re = $mysqli->query("SELECT * FROM owned_equipment WHERE player_id='".$other_character_id."' AND equipment_id='".$otherrow['id']."'");
if($other_re->num_rows === 0){
}else{
$other_w1 = mysqli_fetch_assoc($other_re);



$other_total_equipment = $other_total_equipment+$other_w1['how_many'];
if($other_total_equipment > $other_total_allowed_use){
$other_difference = $other_total_equipment-$other_total_allowed_use;
$other_total_equipment = $other_total_equipment-$other_difference;
$other_attack = $other_total_equipment*$otherrow['attack'];
$other_defense = $other_total_equipment*$otherrow['defense'];
}else{
$other_attack = $other_attack+$otherrow['attack']*$other_w1['how_many'];
$other_defense = $other_defense+$otherrow['defense']*$other_w1['how_many'];
}




}
}
// grab other_attack
// add character other_attack and other_defense from skill points
$other_attack = $other_attack+$character_other_attack;
$other_defense = $other_defense+$character_other_defense;


echo "Attack: ".$other_attack."<br>";
echo "Defense: ".$other_defense;
?>