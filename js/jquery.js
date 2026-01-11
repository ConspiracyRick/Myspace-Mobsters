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

// add to top mob
function add_to_top_mob(id){

setTimeout(function(){
var ids=id;
$.ajax({type:"GET",url:tabs+"mymob.php?add_to_top_mob="+ids,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var cid=e.characterid;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
//refresh_stats();
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'mymob.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);

}


// accept requests for mob
function accept_request(id){

setTimeout(function(){
var ids=id;
$.ajax({type:"GET",url:tabs+"mymob.php?accept_request="+ids,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var cid=e.characterid;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
refresh_stats();
// if you dont wanna reload the page //
$('#main_container').load(tabs+'mymob.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

}
}});
}, 0);
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
//refresh_stats();
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});

$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");

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
//refresh_stats();
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'stats.php');
});


if(inmob=="0"){
$("#mymobstatus").html("<div style='margin-top:20px;width:150;'><table style='font-family: Helvetica;olor: #FF0000; border: 1px solid white;color:white;width:100%;'><tr><td align='center'><a onclick='user_stats("+cid+");' style='font-size:20px;color:white;cursor:pointer;'>"+n+"</a></td></tr><tr><td align='center'><img src='"+pic+"' width='110' height='90'></td></tr><tr><td><table align='center'><tr><td><a class='button button_blue' onclick='addtomob("+cid+");$(window).scrollTop(0);'><span style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;font-size:14px;'>Add to Mob</span></a></td></tr></table></td></tr></table></div>");
}
if(inmob=="1"){
$("#mymobstatus").html("<div style='margin-top:20px;width:150;'><table style='font-family: Helvetica;olor: #FF0000; border: 1px solid white;color:white;width:100%;'><tr><td align='center'><a onclick='user_stats("+cid+");' style='font-size:20px;color:white;cursor:pointer;'>"+n+"</a></td></tr><tr><td align='center'><img src='"+pic+"' width='110' height='90'></td></tr></table></div>");
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
refresh_stats();
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
document.getElementById("cidon").setAttribute("class", "stats_selected");

$("#main_container").html("<div style='margin-left:auto;margin-right:auto;font-family: Helvetica;'><div style='margin-top:80px;' align='center'><h2 style='color:orange;font-size:25px;'>Loading...</h2></div></div>");
$("#status").html("");
$('.nav_selected').each(function() {
$(this).attr("class","top-nav");
});

function loadita() {
}

setTimeout(function(){
refresh_stats(userid);
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
refresh_stats();
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
refresh_stats();
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
refresh_stats();
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
$.ajax({type:"GET",url:tabs+"mymob.php?send_energy&id="+m,data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
$("#" + m + "").html("<div style='font-size:13;color:white;'>Energy Sent</div>");

//refresh_stats();
//$('#main_container').load(tabs+'main.php');
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
$.ajax({type:"GET",url:tabs+"mymob.php?claim_bonus",data:{},dataType:"json",cache:false,success:function(e){
var t=e.status;
var n=e.message;
var x=e.gained_experience;
if(t=="Insuccesso:"){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
return;
}
if(t=="Eccellente!"){
$(document).ready(function(){
refresh_stats();
//$('#main_container').load(tabs+'main.php');
$("#claimingbonusbutton").html("<div style='font-size:16px;color:white;'>You have already claimed your top mob bonus today.</div>");
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}

}});
}, 0);

}

//** Mission Tab
function do_mission(id){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><div style='padding:20px 0px 18px 20px;color:white;font-size:17px;'>Doing mission...</div></div>");
var m=id;
$.ajax({type:"GET",url:tabs+"missions.php?mission="+m,data:{},async: true,dataType:"json",cache:false,success:function(e){
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
var refreshit = Math.floor(Math.random() * 5);
$('#status').ready(function () {
if(refreshit == '2'){
refresh_stats();
}
// if you dont wanna reload the page //
//$('#main_container').load(tabs+'missions.php');
});
if(c==""){
if(wn > ""){
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><div style='padding:0px 0px 5px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
refresh_stats();
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:20px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 5px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
}
}else{
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding:0px 0px 7px 40px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
refresh_stats();
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
}
}
}



if(c > ""){
if(wn > ""){
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
refresh_stats();
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding-left:15px;position:relative;bottom:50px;padding-right:25px;display: inline-block;'><img src='"+wp+"'></div><div style='position:relative;bottom:0px;right:46px;display: inline-block;'><div style='padding:0px 0px 20px 20px;color:white;font-size:15px;'>"+n+"</div><div style='padding:0px 0px 5px 24px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.<br>You gained <b><font size='3' color='white'>"+hm+" </font></b>"+wn+".</div><div style='padding:30px 0px 15px 24px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></div></div></div></div>");
}
}else{
if(level_up > ""){
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><div style='padding:0px 0px 7px 40px;color:white;font-size:15px;'><b>Congratulations!</b> You have reached <a onclick='mymobsterstabb();' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;'>level "+level_up+"!</a></div><p style='padding:0px 0px 5px 35px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
refresh_stats();
}else{
$("#status").html("<div style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false; padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:0px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 35px;color:white;font-size:15px;'>"+n+"</p><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>You used <b><font size='3' color='red'>"+u+"</font></b> energy to complete the mission.<br>You gained <b><font size='3' color='yellow'>"+c+"</font></b> and <b><font size='3' color='orange'>"+x+"</font></b> experience.</p><p style='padding:20px 0px 0px 40px;color:white;font-size:15px;'><a onclick='do_mission("+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Do this mission again!</a></p></div></div>");
}
}
}

}
}});
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
refresh_stats();
// if you dont wanna reload the page //
$('#main_container').load(tabs+'territory.php');
});


$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><div style='padding:0px 0px 15px 40px;color:white;font-size:15px;'><a onclick='buy_property("+hm+","+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Buy "+hm+" more</a></div></div></div>");

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
refresh_stats();
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
refresh_stats();
// if you dont wanna reload the page //
$('#main_container').load(tabs+'equipment.php');
});

if(hm === ''){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
if(hm > 0){
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p><div style='padding:0px 0px 15px 40px;color:white;font-size:15px;'><a onclick='buy_equipment("+hm+","+d+");' style='font-size:16px;color:#2E65E3;text-decoration:underline;cursor:pointer;-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;'>Buy "+hm+" more</a></div></div></div>");
}

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
refresh_stats();
// if you dont wanna reload the page //
$('#main_container').load(tabs+'equipment.php');
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
refresh_stats();
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
refresh_stats();
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
refresh_stats();
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
refresh_stats();
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
refresh_stats();
$('#main_container').load(tabs+'godfather.php');
});
$("#status").html("<div style='padding:0px 0px 15px 0px;font-family: Helvetica;'><div style='color: #FF0000; border: 1px solid white;'><h2 style='padding:5px 0px 0px 20px;color:orange;font-size:15px;'>"+t+"</h2><p style='padding:0px 0px 5px 40px;color:white;font-size:15px;'>"+n+"</p></div></div>");
}
}});
}, 0);
}
//** End of Godfather Tab

// new code
function updateATime() {
var location = window.location.href;
let url = new URL(location)
let pathandQuery = url.pathname + url.search;
//console.log(pathandQuery);
if(pathandQuery === '/home/?create'){
}else{
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
	$('#healthtimer').html("");
	refresh_stats();
	//clearInterval(TheInterval);
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
}
myInterval = setInterval(updateATime, 1000);


function updateBTime() {
var location = window.location.href;
let url = new URL(location)
let pathandQuery = url.pathname + url.search;
//console.log(pathandQuery);
if(pathandQuery === '/home/?create'){
}else{
var TheInterval = setInterval(function(){ MModeTimer(energyremainingTime)}, 1000);
//TheInterval = setInterval(MModeTimer, 1000);

	function MModeTimer(energyremainingTime) {

	var currentTime = new Date().getTime() / 1000;
	var futureTime = energyremainingTime;
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
	$('#energytimer').html("");
	refresh_stats();
	//clearInterval(TheInterval);
    }
	}
	
	
	if (futureTime >= currentTime) {
	if(secondFloor < '10'){
	secondFloor = "0" + secondFloor;
	}
    $('#energytimer').html(minuteFloor + ":" + secondFloor);
	}
	
	
	}
	clearInterval(myInterval2);
	}
}
myInterval2 = setInterval(updateBTime, 1000);


function updateCTime() {
var location = window.location.href;
let url = new URL(location)
let pathandQuery = url.pathname + url.search;
//console.log(pathandQuery);
if(pathandQuery === '/home/?create'){
}else{
var TheInterval = setInterval(function(){ MModeTimer(staminaremainingTime)}, 1000);
//TheInterval = setInterval(MModeTimer, 1000);

	function MModeTimer(staminaremainingTime) {

	var currentTime = new Date().getTime() / 1000;
	var futureTime = staminaremainingTime;
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
	$('#staminatimer').html("");
	refresh_stats();
	//clearInterval(TheInterval);
    }
	}
	
	
	if (futureTime >= currentTime) {
	if(secondFloor < '10'){
	secondFloor = "0" + secondFloor;
	}
    $('#staminatimer').html(minuteFloor + ":" + secondFloor);
	}
	
	
	}
	clearInterval(myInterval3);
	}
}
myInterval3 = setInterval(updateCTime, 1000);

//** Timer Refresh
function refresh_stats(userid){
            $.ajax({
                url: "refreshstats.php",
                dataType: "json",
                cache: false,
                success: function(data) {
                    if(data.cash === null){
					$('#cash').html('$0');
				    }
					if(data.cash <= '0'){
					$('#cash').html('$' + data.cash);
				    }
					if(data.cash > '0'){
					$('#cash').html('$' + data.cash);
				    }
					if(data.cashflow === null){
					$('#cashflow').html('$0');
				    }
					if(data.cashflow <= '0'){
					$('#cashflow').html('$' + data.cashflow);
				    }
					if(data.cashflow > '0'){
					$('#cashflow').html('$' + data.cashflow);
				    }
					if(data.health === null){
					$('#health').html('0');
				    }
					if(data.health === '0'){
					$('#health').html('0');
				    }
					if(data.health > '0'){
					$('#health').html(data.health);
				    }

					if(data.healthtimer === null){
					healthremainingTime = '';
					$('#healthtimer').html('');
				    }
					if(data.healthtimer === ''){
					healthremainingTime = '';
					$('#healthtimer').html('');
				    }
					if(data.healthtimer !== ''){
					healthremainingTime = data.healthtimer;
				    }
					
					if(data.energy === null){
					$('#energy').html('0');
				    }
					if(data.energy === '0'){
					$('#energy').html('0');
				    }
					if(data.energy > '0'){
					$('#energy').html(data.energy);
				    }
					
					if(data.energytimer === null){
					energyremainingTime = '';
					$('#energytimer').html('');
				    }
					if(data.energytimer === ''){
					energyremainingTime = '';
					$('#energytimer').html('');
				    }
					if(data.energytimer !== ''){
					energyremainingTime = data.energytimer;
				    }
					
					if(data.stamina === null){
					$('#stamina').html('0');
				    }
					if(data.stamina === '0'){
					$('#stamina').html('0');
				    }
					if(data.stamina > '0'){
					$('#stamina').html(data.stamina);
				    }
					
					if(data.staminatimer === null){
					staminaremainingTime = '';
					$('#staminatimer').html('');
				    }
					if(data.staminatimer === ''){
					staminaremainingTime = '';
					$('#staminatimer').html('');
				    }
					if(data.staminatimer !== ''){
					staminaremainingTime = data.staminatimer;
				    }
					
					if(data.totalhealth === '-1.00%'){
					$('#healthtimer').html("");
					}
					if(data.totalenergy === '-1.00%'){
					$('#energytimer').html("");
					}
					if(data.totalstamina === '-1.00%'){
					$('#staminatimer').html("");
					}
					//visual only
					document.getElementById("totalhealth").style="margin: 0px; padding: 0px; width:" + data.totalhealth + "; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;";
					document.getElementById("totalenergy").style="margin: 0px; padding: 0px; width:" + data.totalenergy + "; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;";
					document.getElementById("totalstamina").style="margin: 0px; padding: 0px; width:" + data.totalstamina + "; height: 14px; background-color: rgb(136, 0, 0); border: 1px solid black;";
					document.getElementById("allxp").style="background-color:#17B117;height:4px;width:" + data.allxp;
					document.getElementById("cidon").setAttribute("onClick", "user_stats(" + data.characterid + ");");
					//visual only
					$('#level').html(data.level);
					$('#charactername').html(data.charactername);
					chid = userid;
                    $('#mobbies').html(data.mobsize);
                }
             				
            });		
        }

// hitlist tab
function show_hitlist() {
	   $.ajax({
                url: tabs+"hitlist.php",
				dataType: "json",
                cache: false,
                success: function(response) {
					$('#showhitlist').html("");
					$.each(response, function(i, value){
					var characterid = value.characterid;
					var charactername = value.charactername;
					var characterlevel = value.characterlevel;
					
					var listedbyid = value.idlistedby;
					var listedby = value.listedby;
					var amount = value.amount;
					var when = value.when;
					
					//$('#showhitlist').append("<h2 style='color:green;font-size:25px;margin-top:10px;font-family: Helvetica;'>user_stats(" + characterid + ");</h2>");
					$('#showhitlist').append("<tr><td><table style='width:260px;color:white;' border='0'><tr><td><a onclick='user_stats(" + characterid + ");' style='cursor:pointer;text-decoration: none;color:#BEB9D0;font-weight: bold;'>" + charactername + ", Level " + characterlevel + "</a></td></tr></table></td><td><table style='width:180px;color:white;' border='0'><tr><td><a onclick='user_stats(" + listedbyid + ");' style='cursor:pointer;text-decoration: none;color:#BEB9D0;font-weight: bold;'>" + listedby + "</a></td></tr></table></td><td><table style='width:240px;color:green;font-weight: bold;' border='0'><tr><td>$" + amount + "</td></tr></table></td><td><table style='width:190px;color:white;' border='0'><tr><td>" + when + "</td></tr></table></td><td><table style='width:83px;color:white;' border='0'><tr><div class='buttonDiv' style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;padding-top:0px;font-size:14px;'><td><a id='" + characterid + "' class='button button_blue' style='-moz-user-select: none; -webkit-user-select: none; -ms-user-select:none; user-select:none;-o-user-select:none; unselectable:on;onselectstart:return false;onmousedown:return false;' onclick='attack(" + characterid + ");$(window).scrollTop(0);'><span style='font-size:14px;'>Attack</span></a></td></div></tr></table></td></tr>");
					
					});
                }
             				
            });
       }

//** Refresh button
function refresh() // no ';' here
{
    var elem = document.getElementById("refresh_button");
    if (elem.value=="REFRESH") {
	elem.value = "Refreshing...";
	document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 12px 4px 12px;border-color:grey;border-style:solid;color:white;font-size:12px;background-color:grey;';
	setTimeout(function(){

	$('.nav_selected').each(function() {
    var id = this.id;
	if(document.getElementById("cidon").className == 'stats_selected'){
	document.getElementById("cidon").setAttribute("class", "stats");
	}
	if(id == 'main'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'main.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'missions'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'missions.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'territory'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'territory.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'bank'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'bank.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'godfather'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'godfather.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'fight'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'fight.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'hitlist'){
	$("#status").html("");
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   show_hitlist();
	   display();
	   }, 0);
	refresh_stats();
	}
	if(id == 'equipment'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'equipment.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'hospital'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'hospital.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'mymob'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'mymob.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'mymobster'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'mymobster.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'mademen'){
    $("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'made_men.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
	if(id == 'help'){
	$("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'help.php');
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	refresh_stats();
	}
    });
	if(document.getElementById("cidon").className == 'stats_selected'){
	   $("#status").html("");
	   function main_container() {
	   display();
       }
	   
	   function display() {
       elem.value = "REFRESH";
	   document.getElementById('refresh_button').style.cssText = 'cursor:pointer;padding:4px 18px 4px 18px;border-width: 1px;color:white;font-size:12px;border: solid 1px #555555;background-color: #2F2F4F;';
	   }
	   
       setTimeout(function(){
	   $('#main_container').load(tabs+'stats.php?userid='+chid);
	   $('#main_container').ready(function () {
	   $("#main_container").ready(main_container);
	   });
	   }, 0);
	   refresh_stats(chid);
	}
	
	}, 100);
	}
}
//** End of refresh button


function load_game() {
	   
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
	   $('#main_container').load(tabs+'main.php');
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
	   var text = "Add To Hit List";
	   $("#main_container").html("<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>The Hit List</td></tr></table><font size='3' color='white'>Make a hit on a mobster listed below to collect the bounty put out on them!<br>Or, If you've got a rival you need taken out, you can add that mobster to the hit list below by clicking " + text + " on their mobster profile page.</font><table style='margin-top:10px;background-color:#5F1304;'><tr><td><table style='width:260px;color:white;'><tr><td>The Mark</td></tr></table></td><td><table style='width:180px;color:white;'><tr><td>Marked By</td></tr></table></td><td><table style='width:240px;color:white;'><tr><td>Bounty</td></tr></table></td><td><table style='width:190px;color:white;'><tr><td>When</td></tr></table></td><td><table style='width:110px;color:white;'><tr><td>Attack Mob</td></tr></table></td></tr></table><table id='showhitlist' border='0'><table style='margin-left:400px;'><tr><td><h2 style='color:orange;font-size:25px;margin-top:10px;font-family: Helvetica;'>Loading...</h2></td></tr></table></table>");
	   
	   $('.nav_selected').each(function() {
        $(this).attr("class","top-nav");
        });
	   $("#hitlist").attr("class","nav_selected");
	   $("#status").html("");
	   
	   setTimeout(function(){
	   $("#main_container").html("<table style='line-height:1.4;border-bottom: 1px solid white;font-size:25px;color:white;font-weight:bold;width:100%;'><tr><td>The Hit List</td></tr></table><font size='3' color='white'>Make a hit on a mobster listed below to collect the bounty put out on them!<br>Or, If you've got a rival you need taken out, you can add that mobster to the hit list below by clicking " + text + " on their mobster profile page.</font><table style='margin-top:10px;background-color:#5F1304;'><tr><td><table style='width:260px;color:white;'><tr><td>The Mark</td></tr></table></td><td><table style='width:180px;color:white;'><tr><td>Marked By</td></tr></table></td><td><table style='width:240px;color:white;'><tr><td>Bounty</td></tr></table></td><td><table style='width:190px;color:white;'><tr><td>When</td></tr></table></td><td><table style='width:110px;color:white;'><tr><td>Attack Mob</td></tr></table></td></tr></table><table id='showhitlist' border='0'></table>");
	   show_hitlist();
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