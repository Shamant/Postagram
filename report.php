<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
require_once "signup.php";
   for ($i=0; $i<7; $i++) {
    for ($j=0; $j<7; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<7; ++$j) {
        pclose($pipe[$j]);
    }
}
$username = $_COOKIE['id'];
$x = mysqli_real_escape_string($link, $_GET['report']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
if(!$_GET['report']) {
    header("Location:/home");
}
$sql = "SELECT * FROM posts WHERE imagesData='$x'";
$result = mysqli_query($link, $sql);
$let = mysqli_fetch_assoc($result);
$sqls = "SELECT * FROM request WHERE receiver='$x'";
$results = mysqli_query($link, $sqls);
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Report a problem</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0"></head><body><div style="margin-bottom:15px;"></div><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()" style="left:0;position:absolute;margin-left:10px;height:20px;"/><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:50px;
    font-size: 17px;">Report a problem</h5><div class="headers" style="height:10px;border-bottom: 1px solid #eeeeeeb0;margin-top: -5px;"></div><br><h5 style="color:grey;text-align:center;font-weight:400;margin-bottom:29px;">What is the issue with this post?</h5>
<?php
if(!mysqli_num_rows($results)) {
echo "<hr style='margin-top:25px;'><button class='report' value='Suspicious' style='width:100%;font-weight:400;color:black;border:none;height:20px;background:none;text-align:left;padding-left:15px;outline:none;'>Suspicious Or Spam</button><hr><button class='report' value='Abuse' style='width:100%;font-weight:400;color:black;border:none;height:30px;background:none;text-align:left;padding-left:15px;outline:none;'>Abusive Or Harmful</button><hr><button class='report' value='Illegal' style='width:100%;font-weight:400;color:black;border:none;height:30px;background:none;text-align:left;padding-left:15px;outline:none;'>Illegal Content</button><hr><br><div class='img'>
    <img class='uy' src='uploads/$let[imagesData]' style='max-height:330px;border-radius:4px;'></div><br><br><div class='error' style='width:220px;background:red;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;visibility:hidden;'>An unknown error occured</div>";
} else {
echo "<hr style='margin-top:25px;'><button class='reports' value='Suspicious' style='width:100%;font-weight:400;color:black;border:none;height:20px;background:none;text-align:left;padding-left:15px;outline:none;'>Suspicious Or Spam</button><hr><button class='reports' value='Abuse' style='width:100%;font-weight:400;color:black;border:none;height:30px;background:none;text-align:left;padding-left:15px;outline:none;'>Abusive Or Harmful</button><hr><button class='reports' value='Illegal' style='width:100%;font-weight:400;color:black;border:none;height:30px;background:none;text-align:left;padding-left:15px;outline:none;'>Illegal Content</button><hr><br><div class='img'>
    <img class='uy' src='uploads/$let[imagesData]' style='max-height:330px;border-radius:4px;'></div><br><br><div class='error' style='width:220px;background:red;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;visibility:hidden;'>An unknown error occured</div>";
}
mysqli_close($link);
?>
<style>html, body {
    overflow-x: hidden;
    position: relative;min-height: 98vh;
}
@media screen and (max-width:1500px){.img{width:50%;border-radius:5px;margin-left:auto;margin-right:auto;margin-top: 14px;margin-bottom:-8px;}}
@media screen and (max-width:900px){.img{width:60%;}}
@media screen and (max-width:500px){.img{width:100%;}}
@media screen and (max-width:1500px){.uy{width:auto;display: block;margin-left: auto;margin-right: auto;margin-top:-10px;margin-bottom:15px;object-fit:cover;border:2px solid #eee;}}
@media screen and (max-width:900px){.uy{width:auto;margin-bottom:14px;margin-top:-8px;}}
@media screen and (max-width:500px){.uy{width:98%;margin-bottom:0px;margin-top:-4px;border:none;}}

</style><script> 
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
function back(){window.history.back();}
$(document).ready(function(){
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
}, 4000);
$(".report").click(function() {
    var report = $(this).val();
    if(report == "Abuse" || report == "Suspicious" || report == "Illegal") {
    var url = $(".uy").attr("src");
    url = url.replace("uploads/", "");
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"report": url, "val": report, "uri": uri, csrf: csrf},
    success:function(data) {
        if(data == "t") {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").css("background", "#4caf54");
    $(".error").css("width", "250px");
    $(".error").text("Thanks for reporting this post!");
    $(".error").css("visibility", "visible");
        }
    },
     error: function() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").css("visibility", "visible");
       }
}) 
} else {
window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").css("background", "#4caf54");
    $(".error").css("width", "250px");
    $(".error").text("Thanks for reporting this post!");
    $(".error").css("visibility", "visible");
}
});
$(".reports").click(function() {
window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").css("background", "#4caf54");
    $(".error").css("width", "250px");
    $(".error").text("Thanks for reporting this post!");
    $(".error").css("visibility", "visible");
});
});
</script></body></html>