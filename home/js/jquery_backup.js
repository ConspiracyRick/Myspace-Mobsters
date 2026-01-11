var CANVAS_REF = "keep-alive";
var iFold=0;
var tabs = location.protocol+"//"+window.location.hostname+"/home/tabs/";
var images = location.protocol+"//"+window.location.hostname+"/home/images/";

//** Start game
function chooseclass(){
var $questions = $('special'), $answers = $(':checked');
var selected = $($answers).val();

var x = document.getElementById(selected).getElementsByTagName("td");
x[0].style.backgroundColor = "#75190A";

if(selected === '0'){
document.getElementById('1').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('2').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('3').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
}
if(selected === '1'){
document.getElementById('0').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('2').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('3').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
}
if(selected === '2'){
document.getElementById('0').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('1').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('3').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
}
if(selected === '3'){
document.getElementById('0').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('1').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
document.getElementById('2').getElementsByTagName("td")[0].style = "border-bottom: 1px solid #585A5C;color:white;padding-left:60px;padding-right:60px;";
}

}

// add to mob
function addtomob(id){

setTimeout(function(){
var ids=id;
$.ajax({type:"GET",url:tabs+"mymob.php?addtomob="+ids,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var cid=e.characterid;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
//$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});


$("#status").html("<table style='font-family: Helvetica;olor: #FF0000; border: 1px solid white;color:white;width:100%;'><tr><td align='center'><a onclick='user_stats("+cid+");' style='font-size:20px;color:white;cursor:pointer;'>"+n+"</a></td></tr><tr><td align='center'><img src='"+pic+"' height='80'></td></tr><tr><td><table align='center'><tr><td><a class='button button_blue' onclick='addtomob("+cid+");$(window).scrollTop(0);'><span style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;'>Add to Mob</span></a></td></tr></table></td></tr></table>");


}
}});
}, 0);
}

// search for mob members
function searchmob(charactername){

setTimeout(function(){
var ename=charactername;
$.ajax({type:"GET",url:tabs+"mymob.php?search="+ename,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var pic=e.picture;
var cid=e.characterid;
var inmob=e.inmob;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
//$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});


if(inmob=="0"){
$("#mymobstatus").html("<table style='font-family: Helvetica;olor: #FF0000; border: 1px solid white;color:white;width:100%;'><tr><td align='center'><a onclick='user_stats("+cid+");' style='font-size:20px;color:white;cursor:pointer;'>"+n+"</a></td></tr><tr><td align='center'><img src='"+pic+"' height='80'></td></tr><tr><td><table align='center'><tr><td><a class='button button_blue' onclick='addtomob("+cid+");$(window).scrollTop(0);'><span style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;'>Add to Mob</span></a></td></tr></table></td></tr></table>");
}
if(inmob=="1"){
$("#mymobstatus").html("<table style='font-family: Helvetica;olor: #FF0000; border: 1px solid white;color:white;width:100%;'><tr><td align='center'><a onclick='user_stats("+cid+");' style='font-size:20px;color:white;cursor:pointer;'>"+n+"</a></td></tr><tr><td align='center'><img src='"+pic+"' height='80'></td></tr></table>");
}

}
}});
}, 0);
}

function mobsterconfirm(){
var $questions = $('special'), $answers = $(':checked');
var selected = $($answers).val();
if(selected == null){
}else{
var t=$("#mobName").val();
$.ajax({type:"GET",url:tabs+"mymobster.php?create_character&name="+t+"&class="+selected,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#error_debug").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:17px;'>"+n+"</p></div></div>");
return;
} // failed
setTimeout(function(){window.location="../../home/"},0);
}});

} // else
} // end
// End of start game


//** My Mobster Tab start new game
function start_newgame(){
setTimeout(function(){
$.ajax({type:"GET",url:tabs+"mymobster.php?start_new_game",data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$("#status").html("");
$('.nav_selected').each(function() {
$(this).attr("class","top-nav");
});
setTimeout(function(){window.location="../../home/?create"},0);
});
}

}});
}, 0);
}

//** increase stats
function increase(id){
setTimeout(function(){
var m=id;
$.ajax({type:"GET",url:tabs+"mymobster.php?statincrease="+m,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'mymobster.php');
});

}});
}, 0);
}

//** My Mobster Tab load character
function load_character(id){
setTimeout(function(){
var mid=id;
$.ajax({type:"GET",url:tabs+"mymobster.php?load_character="+mid,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){

window.scrollTo(0, 0);
setTimeout(function(){
window.location.reload();
}, 0);

});
}
}});
}, 0);
}

//** Stats Page
function user_stats(id){
var userid=id;

$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
$("#status").html("");
$('.nav_selected').each(function() {
$(this).attr("class","top-nav");
});

function loadita() {
}

setTimeout(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'stats.php?userid='+userid);
$('#main_container').ready(function () {
$("#main_container").ready(loadita);
});
}, 0);

}

//** fight
function attack(id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Fighting...</div></div>");

setTimeout(function(){
var eid=id;
$.ajax({type:"GET",url:tabs+"fight.php?attack&userid="+eid,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}

//** hitlist
function hitlist(bounty,id){

setTimeout(function(){
var eid=id;
var eq=bounty;
$.ajax({type:"GET",url:tabs+"fight.php?hitlist&userid="+eid+"&amount="+eq,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}






function showaddtohitlist() {
var x = document.getElementById("userpage");
x.style.display = "none";
var y = document.getElementById("userhitlistpage");
y.style.display = "block";
}


function mymobsterstabb(){
$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
$("#status").html("");
$('.nav_selected').each(function() {
$(this).attr("class","top-nav");
});
$('#mymobster').attr("class","nav_selected");

function loadits() {
}

setTimeout(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'mymobster.php');
$('#main_container').ready(function () {
$("#main_container").ready(loadits);
});
}, 0);


}

//** Send Energy
function send_energy(id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Sending Energy...</div></div>");

setTimeout(function(){
var m=id;
$.ajax({type:"GET",url:tabs+"send_energy.php?id="+m,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'main.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}

}});
}, 0);
}

//** Claim Bonus
function claim_bonus(){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Claiming Bonus...</div></div>");

setTimeout(function(){
$.ajax({type:"GET",url:tabs+"claim_bonus.php",data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var x=e.gained_experience;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'main.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}

}});
}, 0);
}

//** Mission Tab
function do_mission(id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Doing mission...</div></div>");
setTimeout(function(){
var m=id;
$.ajax({type:"GET",url:tabs+"missions.php?mission="+m,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
var u=e.used_energy;
var x=e.gained_experience;
var c=e.gained_cash;
var wn=e.equipment_name;
var wp=e.equipment_picture;
var hm=e.equipment_how_many;
var level_up=e.level_up;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
//$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'missions.php');
});
if(c==""){
if(wn > ""){
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><div style='padding:0px 0px 5px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
$('#header').load(tabs+'header.php');
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:20px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 5px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
}
}else{
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding:0px 0px 7px 40px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
$('#header').load(tabs+'header.php');
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
}
}
}



if(c > ""){
if(wn > ""){
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
$('#header').load(tabs+'header.php');
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
}
}else{
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding:0px 0px 7px 40px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><p style='padding:0px 0px 5px 35px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
$('#header').load(tabs+'header.php');
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 35px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
}
}
}

}
}});
}, 0);
}


//** Territory Tab
function buy_property(q,id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Buying...</div></div>");

setTimeout(function(){
var eid=id;
var eq=q;
$.ajax({type:"GET",url:tabs+"territory.php?buy="+eid+"&quantity="+eq,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
var wn=e.property_name;
var wp=e.property_picture;
var hm=e.property_how_many;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
$('#main_container').load(tabs+'territory.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}

function sell_property(q,id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Selling...</div></div>");

setTimeout(function(){
var eid=id;
var eq=q;
$.ajax({type:"GET",url:tabs+"territory.php?sell="+eid+"&quantity="+eq,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
var wn=e.property_name;
var wp=e.property_picture;
var hm=e.property_how_many;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
$('#main_container').load(tabs+'territory.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}

//** Equipment Tab
function buy_equipment(q,id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Buying...</div></div>");

setTimeout(function(){
var eid=id;
var eq=q;
$.ajax({type:"GET",url:tabs+"equipment.php?buy="+eid+"&quantity="+eq,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
var wn=e.weapon_name;
var wp=e.weapon_picture;
var hm=e.weapon_how_many;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
$('#main_container').load(tabs+'equipment.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}

function sell_equipment(q,id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Selling...</div></div>");

setTimeout(function(){
var eid=id;
var eq=q;
$.ajax({type:"GET",url:tabs+"equipment.php?sell="+eid+"&quantity="+eq,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var d=e.id;
var wn=e.weapon_name;
var wp=e.weapon_picture;
var hm=e.weapon_how_many;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
// if you dont wanna reload the page //
// $('#main_container').load(tabs+'equipment.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
}


//** Bank Tab
function withdrawform(){
var l=$("#withdrawcash").val();
$.ajax({type:"GET",url:tabs+"bank.php?deposit=withdraw&cash="+l,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'bank.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}

function depositform(){
var l=$("#depositcash").val();
$.ajax({type:"GET",url:tabs+"bank.php?deposit=deposit&cash="+l,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'bank.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}
//** End of Bank Tab





//** Godfather Tab
function acceptcash(){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 20px 20px;color:white;font-size:17px;'>Accepting reward...</div></div></div>");

setTimeout(function(){
$.ajax({type:"GET",url:tabs+"godfather.php?accept=cash",data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'godfather.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}, 0);
}

function accepthiredgun(){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 20px 20px;color:white;font-size:17px;'>Accepting reward...</div></div></div>");

setTimeout(function(){
$.ajax({type:"GET",url:tabs+"godfather.php?accept=hiredgun",data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'godfather.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}, 0);
}

function acceptrefill(){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 20px 20px;color:white;font-size:17px;'>Accepting reward...</div></div></div>");

setTimeout(function(){
var r=$("#refill").val();
$.ajax({type:"GET",url:tabs+"godfather.php?accept=refill&refill="+r,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$('#header').load(tabs+'header.php');
$('#main_container').load(tabs+'godfather.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}, 0);
}
//** End of Godfather Tab


//** Timer Refresh
function callhealthtimer(){
/*
setTimeout(function (){
$.ajax({
url: "../../update_time_346456345.php", 
success:   function(result){ 
}
});
*/
setTimeout(function (){
$('#header').load(tabs+'header.php');
//$('#header').load(tabs+'header.php');
}, 0);
// }, 0);
}

// new code
function updateATime() {
var TheInterval = setInterval(function(){ MModeTimer(healthremainingTime)}, 1000);
//TheInterval = setInterval(MModeTimer, 1000);
clearInterval(myInterval);

	function MModeTimer(healthremainingTime) {

	var currentTime = new Date().getTime() / 1000;
	var futureTime = healthremainingTime;
	var timeRemaining = futureTime - currentTime;
	var minute = 60;
	var hour = 60 * 60;
	var day = 60 * 60 * 24;
	var dayFloor = Math.floor(timeRemaining / day);
	var hourFloor = Math.floor((timeRemaining - dayFloor * day) / hour);
	var minuteFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour) / minute);
	var secondFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour - minuteFloor * minute));
	
	//console.log("Ok.");
	// now timer needs to be at 0:0 instead of 0:1 to make the call after so we can update the time.
	
	//console.log(minuteFloor + ":" + secondFloor);
	
	// make call to server to check timer.
	if (futureTime <= currentTime) {
	//$('#healthtimer').html("");
	callhealthtimer();
	//clearInterval(myInterval);
	//clearInterval(TheInterval);
    }
	
	
	if (futureTime >= currentTime) {
	if(secondFloor < '10'){
	secondFloor = "0" + secondFloor;
	}
    $('#healthtimer').html(minuteFloor + ":" + secondFloor);
	}
	
	
	}
	clearInterval(myInterval);
	}
myInterval = setInterval(updateATime, 1000);

/* old code
function updateATime() {
var TheInterval = setInterval(function(){ MModeTimer(healthremainingTime)}, 1000);
//TheInterval = setInterval(MModeTimer, 1000);

	function MModeTimer(healthremainingTime) {

	var currentTime = new Date().getTime() / 1000;
	var futureTime = healthremainingTime;
	var timeRemaining = futureTime - currentTime;
	var minute = 60;
	var hour = 60 * 60;
	var day = 60 * 60 * 24;
	var dayFloor = Math.floor(timeRemaining / day);
	var hourFloor = Math.floor((timeRemaining - dayFloor * day) / hour);
	var minuteFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour) / minute);
	var secondFloor = Math.floor((timeRemaining - dayFloor * day - hourFloor * hour - minuteFloor * minute));
	
	//console.log("Ok.");
	// now timer needs to be at 0:0 instead of 0:1 to make the call after so we can update the time.
	
	//console.log(minuteFloor + ":" + secondFloor);
	
	// make call to server to check timer.
	if (minuteFloor === 59) {
	if (secondFloor === 59) {
	callhealthtimer();
	clearInterval(myInterval);
	//clearInterval(TheInterval);
	$('#healthtimer').html("");
    }
    }
	
	
	if (futureTime >= currentTime) {
	if(secondFloor < '10'){
	secondFloor = "0" + secondFloor;
	}
    $('#healthtimer').html(minuteFloor + ":" + secondFloor);
	}
	
	
	}
	clearInterval(myInterval);
	}
myInterval = setInterval(updateATime, 1000);
*/

//** Refresh button
function refresh() // no ';' here
{
    var elem = document.getElementById("refresh_button");
    if (elem.value=="REFRESH") {
	elem.value = "Refreshing...";
	document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 12px 4px 12px;border-color:grey;border-style:solid;color:white;font-size:12px;background-color:grey;';
	setTimeout(function(){
    elem.value = "REFRESH";
	document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	
	$('.nav_selected').each(function() {
    var id = this.id;
	if(id == 'main'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'main.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'missions'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'missions.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'territory'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'territory.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'bank'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'bank.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'godfather'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'godfather.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'fight'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'fight.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'hitlist'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'hitlist.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'equipment'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'equipment.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'hospital'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'hospital.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'mymob'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'mymob.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'mymobster'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'mymobster.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'mademen'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'made_men.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
	if(id == 'help'){
	$("#status").html("");
	$('#header').load(tabs+'header.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
    $('#main_container').load(tabs+'help.php', {limit: 25}, 
    function (responseText, textStatus, req) {  // new function
    if (textStatus == "error") {  // new function
    return "oh noes!!!!";  // new function
    }}); // new function;
	}
    });
	
	}, 0);
	}
}
//** End of refresh button


function load_game() {
	   function header() {
       }
	   
	   function main_container() {
	   display();
       }
	   
	   function display() {
       document.getElementById('loading').style = "display:none;";
	   document.getElementById('loadtabs').style = "padding-left:30px;position:relative;top:35;width:1050px;margin-left:auto;margin-right:auto;";
       document.getElementById('header').style = "width:100%;max-width:1120px;min-height:70px;margin-left:auto;margin-right:auto;";
       document.getElementById('main_container').style = "border: 0px solid white;width:1010px;margin-left:auto;margin-right:auto;";
	   }
	   
       setTimeout(function(){
	   $('#header').load(tabs+'header.php');
	   $('#main_container').load(tabs+'main.php');
	   $('#header').ready(function () {
	   $("#header").ready(header);
	   });
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	   

/*
var header = $('#header').load(tabs+'header.php', {limit: 25}, 
function (responseText, textStatus, req) {  // new function
if (textStatus == "error") {  // new function
return "oh noes!!!!";  // new function
}}); // new function
var container = $('#main_container').load(tabs+'main.php', {limit: 25}, 
function (responseText, textStatus, req) {  // new function
if (textStatus == "error") {  // new function
return "oh noes!!!!";  // new function
}}); // new function
document.getElementById('loading').innerHTML = "padding-left:30px;position:relative;top:35;width:1050px;";
document.getElementById('loading').style = "display:none;";
document.getElementById('loadtabs').style = "padding-left:30px;position:relative;top:35;width:1050px;";
*/

}

function da_bronx_click() {
//$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
$(".da_bronx").attr("class","da_bronx_red");
$("#downtown").attr("class","downtown");
$("#jersey").attr("class","jersey");
$("#outta_town").attr("class","outta_town");

function loadmissions() {
}

setTimeout(function(){
$('#main_container').load(tabs+'missions.php?city_name=da_bronx');
$('#main_container').ready(function () {
$("#main_container").ready(loadmissions);
});
}, 0);

}
function downtown_click() {
//$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
$("#da_bronx").attr("class","da_bronx");
$(".downtown").attr("class","downtown_red");
$("#jersey").attr("class","jersey");
$("#outta_town").attr("class","outta_town");

function loadmissions() {

}

setTimeout(function(){
$('#main_container').load(tabs+'missions.php?city_name=downtown');
$('#main_container').ready(function () {
$("#main_container").ready(loadmissions);
});
}, 0);

}
function jersey_click() {
//$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");

$("#da_bronx").attr("class","da_bronx");
$("#downtown").attr("class","downtown");
$(".jersey").attr("class","jersey_red");
$("#outta_town").attr("class","outta_town");

function loadmissions() {

}

setTimeout(function(){
$('#main_container').load(tabs+'missions.php?city_name=jersey');
$('#main_container').ready(function () {
$("#main_container").ready(loadmissions);
});
}, 0);
}
function outta_town_click() {
//$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");

$("#da_bronx").attr("class","da_bronx");
$("#downtown").attr("class","downtown");
$("#jersey").attr("class","jersey");
$(".outta_town").attr("class","outta_town_red");

function loadmissions() {

}

setTimeout(function(){
$('#main_container').load(tabs+'missions.php?city_name=outta_town');
$('#main_container').ready(function () {
$("#main_container").ready(loadmissions);
});
}, 0);
}

$(document).ready(function(){
		
		/* old code
	   $("#main").click(function(){
        $('#main_container').load(tabs+'main.php', {limit: 25}, 
        function (responseText, textStatus, req) {  // new function
        if (textStatus == "error") {  // new function
          return "oh noes!!!!";  // new function
        } else { // new function
		$('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
		$("#status").html("");
		$("#main").attr("class","nav_selected");
		} // new function
        });
		
       });
	   */
	   
	   $("#main").click(function(){
	   if ($("#main.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   function main() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#main").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'main.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#missions").click(function(){
	   if ($("#missions.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function missions() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#missions").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'missions.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(missions);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#territory").click(function(){
	   if ($("#territory.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function territory() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#territory").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'territory.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(territory);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#bank").click(function(){
	   if ($("#bank.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function bank() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#bank").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'bank.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(bank);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#godfather").click(function(){
	   if ($("#godfather.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function godfather() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#godfather").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'godfather.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(godfather);
	   });
	   }, 0);
	   }
	   });


	   $("#fight").click(function(){
	   if ($("#fight.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function fight() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#fight").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'fight.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(fight);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#hitlist").click(function(){
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");

	   
	   function hitlist() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#hitlist").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'hitlist.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(hitlist);
	   });
	   }, 0);
	   
	   });
	   
	  
	   $("#equipment").click(function(){
	   if ($("#equipment.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function equipment() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#equipment").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'equipment.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(equipment);
	   });
	   }, 0);
	   }
	   });
	   
	   
       $("#hospital").click(function(){
	   if ($("#hospital.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function hospital() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#hospital").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'hospital.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(hospital);
	   });
	   }, 0);
	   }
	   });
	   

	   $("#mymob").click(function(){
	   if ($("#mymob.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function mymob() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#mymob").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'mymob.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(mymob);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#mymobster").click(function(){
	   if ($("#mymobster.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function mymobster() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#mymobster").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'mymobster.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(mymobster);
	   });
	   }, 0);
	   }
	   });
	   
	   
	   $("#mademen").click(function(){
	   if ($("#mademen.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function mademen() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#mademen").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'made_men.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(mademen);
	   });
	   }, 0);
	   }
	   });
	   

	   $("#help").click(function(){
	   if ($("#help.nav_selected")[0]){
	   //alert('hi');
	   }else{
	   /*
	   $("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;' align='center'><h2 style='color:orange;font-size:18px;'>Loading...</h2></div></div>");
       $("#main_container").html("");
	   */
	   $("#main_container").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
	   
	   function help() {
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#help").attr("class","nav_selected");
	   $("#status").html("");
       }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'help.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(help);
	   });
	   }, 0);
	   }
	   });
	   
     });