<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
if(!isset($_COOKIE['id'])){
    header("location: /login");
}
$username = $_COOKIE['id'];
require_once "signup.php";
$y = mysqli_real_escape_string($link, $_GET['edit']);
$y = str_replace("<", "&lt;", $y);
$y = str_replace(">", "&gt;", $y);
$login_err = $pa = "";
$cute = $_COOKIE['avatar'];
$query = "SELECT * FROM posts WHERE imagesData='$y' AND username='$username'";
$result = mysqli_query($link, $query);
if(mysqli_num_rows($result) == 0) {
       require_once "404.shtml";
    die('');
    exit;
} else {
$let = mysqli_fetch_assoc($result);
$re = $let['type'];
$rt = $let['imagesData'];
$cookie = $let['caption'];
if(!isset($_COOKIE['avatar'])){
    $ohmg = "SELECT * FROM avatar WHERE username='$username'";
$shell = mysqli_query($link, $ohmg);
$let = mysqli_fetch_assoc($shell);
$cook = $let['prof'];
setcookie("avatar", $cook, time()+365*24*60*60);
}
$cute = $_COOKIE['avatar'];
?>
<html lang="en"><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Edit Post</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><meta name="viewport" content= "width=device-width, user-scalable=no"></head><body><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()"/><h6>Edit Post</h6><input type="submit" class="hg" value="Save"><br><hr class="hr"><br>
        <?php 
        $time = date("M j, Y", strtotime($let['time']));
echo "<center><div class='img'><img class='uy' src='uploads/$let[imagesData]' style='max-height:360px;'></div></center>";
       echo "<hr class='fri'><br><br><div style='width:100%;'><h5 class='name'>$username</h5><img src='mic.png' class='record' style='height: 24px;width: 24px;float: right;margin-top: -15px;margin-right: 10px;'/></div><br><center>";
echo "<textarea class='hu' id='l' name='input' placeholder='Title'>".strip_tags($cookie)."</textarea></center><br><hr class='fris'><br><img class='ico' src='https://img.icons8.com/material/24/000000/clock--v1.png'/><h5 class='time'>$time</h5><hr><br><br><br><div class='error' style='width:220px;background:red;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;visibility:hidden;'>An unknown error occured</div>";
            ?>
<style>body{position: relative;min-height: 100vh;}html,body{overflow-x:hidden;overflow-y:scroll;}.hu{width:90%;border-radius:4px;border-color:#fff;height:105px;text-align:left;margin-top:-12px;margin-left:-5px;border:none;}.hu:active{height:105px;}
@media screen and (max-width:1500px){.img{width:50%;margin-left:auto;margin-right:auto;margin-top: 8px;margin-bottom:-8px;}}
@media screen and (max-width:900px){.img{width:60%;}}
@media screen and (max-width:500px){.img{width:102.5%;margin-left:-1.7%;margin-top: -22px;}}
@media screen and (max-width:1500px){.uy{width:auto;display: block;margin-left: auto;margin-right: auto;margin-top:-29px;margin-bottom:15px;object-fit:cover;border-radius:5px;}}
@media screen and (max-width:900px){.uy{width:auto;margin-bottom:14px;margin-top:-8px;}}
@media screen and (max-width:500px){.uy{width:98%;margin-bottom:0px;margin-left:1.3%;margin-top:-4px;border-radius:0px;}}.arrow{left:0;position:absolute;margin-left:10px;top:14;height:23px}
.hg{right:0;position:absolute;margin-right:7px;height:32px;border:none;background-color:#1e90ff;color:#fff;border-radius:5px;width:70px;top:7;}h6{left:0;position:absolute;margin-left:50px;top:13;font-size:1.15rem}.hr{margin-top:24px;}.name{left:0;position:absolute;margin-left:5%;margin-top:-11px;font-size:16px;}.fri{margin-top:24px;margin-bottom:-20px;}.fris{margin-top:-24px;margin-bottom:-10px;}.time{font-size:14px;margin-left:43px;margin-top:-20px;}.ico{margin-left:10px;}textarea:focus{outline:none;    -webkit-appearance: none;}.arrow:hover{border-radius: 50%; background: #eee;}</style><script>function back(){window.history.back();}function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
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
 window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
  }
}
});
 $(document).ready(function(){
var val = $(".hu").val();
val = val.trim();
var declare = "";
declare = $(".uy").attr("src");
declare = declare.replace("uploads/", "");
     var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
setTimeout(function () {
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
window.location.replace("/login");
    }
    },
     error: function() {

       }
});
}, 900);
$(".hg").click(function() {
    var value = $(".hu").val();
    value = value.trim();
    if(value != val) {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"edit": value, "url": declare, "subm": "subm", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
        window.location.replace("user_posts/" + declare);
    },
     error: function() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").css("visibility", "visible");
    setTimeout(function () {
   $(".error").animate({ opacity: 0 });
    }, 2500);
       }
}) 
} else {
  window.location.replace("user_posts/" + declare);  
}
});
  $("#l").on("change keyup input",function () {
      var length = $("#l").val().length;
      if(length > 395) {
          $("#l").attr("maxlength", "400");
      }
  });
  
$('.record').on('click', function(e) {
    var isSafari = window.safari !== undefined;
if (isSafari) {
  alert("Please change or update your browser to access this feature.");
} else {
                     if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            navigator.getUserMedia({ audio: true }, function (e) {
var SpeechRecognition = window.webkitSpeechRecognition;
  
  var recognition = new SpeechRecognition();
  
  var text = $('#l').val();
  var instructions = $('.name');
  
  var Content = '';
  
  recognition.continuous = true;
  
  recognition.onresult = function(event) {
  
    var current = event.resultIndex;
  
    var transcript = event.results[current][0].transcript;
   
      Content += transcript;
      var nf = transcript.toLowerCase();
      if(nf.includes("stop")) {
           recognition.stop();
             var msg = new SpeechSynthesisUtterance();
msg.text = "Voice Dictation Ended";
window.speechSynthesis.speak(msg);
      } else {
          $('#l').val("");
          if($.trim(text) == "") {
            var nh = Content;
              nh = capitalizeFirstLetter(nh);
          $("#l").val(nh);
      } else {
          $("#l").val(text + " " + Content);
      }
      }
    
  };
  recognition.onerror = function(event) {
    if(event.error == 'no-speech') {
      instructions.text('Please Try again.');  
    }
  }
    recognition.start();
}, function (err) {
        alert("Not able to access microphone. Go to your browser settings and click on allow microphone access.");
})
} else {
  alert("please change or update your browser to access this feature.");
}   
}

});
});
</script></body></html>
<?php
}
?>