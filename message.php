<?php
for ($i=0; $i<3; $i++) {
    for ($j=0; $j<3; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<3; ++$j) {
        pclose($pipe[$j]);
    }
}
require_once "signup.php";
$username = $_COOKIE['id'];
$cute = $_COOKIE['avatar'];
$sql = "SELECT * FROM avatar WHERE username='$username'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html><html lang=""><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Messages</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script><meta name="csrf-token" content="{{ csrf_token() }}" /><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><style>@media screen and (max-width:1500px){.option{ width: 30%;cursor:pointer;
  height: 180px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:10%;    border-bottom-right-radius: 16px;
    border-bottom-left-radius: 16px;}}@media screen and (max-width:600px){.option{ width: 100%;
  height: 154px;margin-bottom:0px;    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;cursor: none;}}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}</style></head><body>
<div style="margin-bottom:15px;"></div><img class="arrow" src="uploads/<?=$cute?>" onclick="location.href = '/profile';" style="position: absolute;margin-left: 10px;height: 31px;border-radius: 50%;width: 31px;object-fit: cover;margin-top: -5px;"/><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;
    font-size: 17px;text-align:center;">Conversations</h5><div style="float:right;    margin-top: -36px;">
<img class="set" src="https://img.icons8.com/ios-glyphs/30/000000/settings.png" style="height:29px;margin-top:2px;padding-right:5px;"></div><div class="headers" style="height:10px;border-bottom: 1px solid #eeeeeeb0;margin-top: -4px;"></div><br><button style="width:90%;border-radius:6px;outline:none;background:#fff;color:black;border:1px solid #eee;font-size:15px;text-align:left;padding-left:15px;margin: auto;
    display: block;height:40px;margin-bottom: -6px;"><img src="https://img.icons8.com/external-dreamstale-lineal-dreamstale/24/000000/external-search-ui-dreamstale-lineal-dreamstale.png" style="margin-right:10px;height:21px;">Search For People</button><br>
<div style="padding-left:10px;margin-top: -12px;"><hr style='margin-left: -10px;'><a href='chat' style='color:black;text-decoration:none;'><div style="display:flex;"><img src="uploads/<?=$cute?>" style="height: 38px;border-radius: 50%;width: 38px;object-fit: cover;"><h6 style="font-size:16px;margin-top:-2px;margin-left:10px;">Arunms</h6></div><h5 style="font-size:16px;font-weight: 400;padding-left: 50px;margin-top: -15px;">Hi!</h5></a><hr style='margin-left: -10px;'>
<div style="display:flex;"><img src="uploads/<?=$cute?>" style="height: 38px;border-radius: 50%;width: 38px;object-fit: cover;"><h6 style="font-size:16px;margin-top:-2px;margin-left:10px;">Arunms</h6></div><h5 style="font-size:16px;font-weight: 400;padding-left: 50px;margin-top: -15px;">Hi!</h5><hr style='margin-left: -10px;'></div>
<?php
if($row['message'] != "true") {
echo "<div class='option' style='position: fixed;background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <hr style='margin-top:17px;'>
    <div class='che' style='width:100%;font-weight:400;color:black;border:none;height:20px;background:none;padding-left:15px;outline:none;'>Allow everyone to message you<input class='che' type='checkbox' id='vehicle1' name='vehicle1' style='float:right;margin-right:12px;margin-top:5px;'></div><hr><button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>";
} else {
echo "<div class='option' style='position: fixed;background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <hr style='margin-top:17px;'>
    <div class='che' style='width:100%;font-weight:400;color:black;border:none;height:20px;background:none;padding-left:15px;outline:none;'>Allow everyone to message you<input class='che' type='checkbox' id='vehicle1' name='vehicle1' style='float:right;margin-right:12px;margin-top:5px;' checked></div><hr><button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>";
}
?>
<script>
    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var value = readCookie('id');
if(!value) {
    window.location.replace("login");
} else {
}
setInterval(function(){
(function(){
    debugger
window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
  }
}
}())
}, 100);
window.addEventListener('resize', function(event){
 debugger
});
 $(document).ready(function(){
    $(window).scrollTop(0);
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url:'check.php',
    method:'POST',
    data:{"uri": uri, csrf: csrf, field: field},
    success:function(result) {
    if(result == 0){
document.cookie = "registered=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "loggedin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "avatar=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
window.location.replace("index.php");
    }
    },
     error: function() {

       }
});
var f = $(".che").is(":checked");
var c = 0;
$(".set").click(function() {
    $(".option").css("visibility", "visible");
});
$(".dis").click(function() {
    var x = "false";
    if($(".che").is(":checked")) {
        x = "true";
    }
    if(++c < 3) {
     $.ajax({
    url:'func.php',
    method:'POST',
    data:{"message": x, "uri": uri, csrf: csrf, field: field},
    success:function(result) {
    },
     error: function() {

       }
});    
    }
    $(".option").css("visibility", "hidden");
});
$(".che").click(function() {
if($(".che").is(":checked")) {
$('.che').prop('checked', false);
} else {
   $('.che').prop('checked', true); 
}
});
});
document.addEventListener('touchstart', handleTouchStart, false);        
document.addEventListener('touchmove', handleTouchMove, false);

var xDown = null;                                                        
var yDown = null;

function getTouches(evt) {
  return evt.touches ||           
         evt.originalEvent.touches; 
}                                                     
                                                                         
function handleTouchStart(evt) {
    const firstTouch = getTouches(evt)[0];                                      
    xDown = firstTouch.clientX;                                      
    yDown = firstTouch.clientY;                                      
};                                                
                                                                         
function handleTouchMove(evt) {
    if ( ! xDown || ! yDown ) {
        return;
    }

    var xUp = evt.touches[0].clientX;                                    
    var yUp = evt.touches[0].clientY;

    var xDiff = xDown - xUp;
    var yDiff = yDown - yUp;
                                                                         
    if ( Math.abs( xDiff ) > Math.abs( yDiff ) ) {/*most significant*/
        if ( xDiff > 0 ) {
            
        } else {
window.history.back();
        }                       
    } else {
    }
    xDown = null;
    yDown = null;                                             
};
</script></body></html>