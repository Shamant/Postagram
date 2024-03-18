<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$tk = "requested to follow you";
$ready = "SELECT *
FROM avatar
JOIN request
ON (seen!='1' AND sender=username)
WHERE request.receiver LIKE '{$username}%'
ORDER BY request.id DESC";
$finish = mysqli_query($link, $ready);
$cute = $_COOKIE['avatar'];
$r = "UPDATE request SET seen = '1' WHERE receiver LIKE '{$username}%' AND reason!='$tk'";
mysqli_query($link, $r);
?>
<!DOCTYPE html>
<html lang="en"><html><head><meta charset="utf-8"><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></script><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Notifications</title><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 5px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 4px;
    margin-right: 7px;"/><img class="arrow" src="menu.png" onclick="location.href = 'profile';" style="left:0;position:absolute;margin-left:10px;margin-top:2px;height:35px;width:35px;border-radius:50%;object-fit:cover;"/><br><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:50px;margin-top: -8px;
    font-size: 17px;">Notifications</h5><div class="headers" style="margin-top:-10px;">
    </div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="add-user.png"/></span></div></div><br>
<?php
    if(mysqli_num_rows($finish) > 0) {
       while($data = mysqli_fetch_array($finish)) {
           $redirect = "discover.php?search=".$data['sender'];
           if($data['reason'] == "requested to follow you") {
echo "<span class='row'><a href='$redirect'><img class='lozad' src='uploads/$data[prof]'></a><h5 class='jf'>$data[sender] has $data[reason]</h5><button class='deletes f' name='follows' value='$data[sender]'>Accept</button><button class='deletes a' name='follow' value='$data[sender]'>Cancel</button><br></span><br>";                    
           } else {
echo "<span class='row'><a href='$redirect'><img class='lozad' src='uploads/$data[prof]'></a><h5 class='jf'>$data[sender] has $data[reason]</h5></span><br>";     
           }
    }
    } else {
echo "<center><br><br><br><br><br><br><img class='sp' src='https://img.icons8.com/pastel-glyph/48/000000/notification-mail--v2.png'/><h4>When you have notifications, you can view them here.</h4></center>";
    }
    mysqli_close($link);
        ?>
<style>@import url('https://fonts.googleapis.com/css2?family=Urbanist:wght@100&display=swap');.lozad{margin-right:10px;border-radius:60px;height:35px;width:35px;border-radius:50%;object-fit:cover}.jf{font-size:15px;margin-top:7px;margin-bottom:-10px;}.dfs{font-size:15px;color:white;margin-left:12px;margin-top:20px}.see{margin-bottom:2px;margin-top:11px;font-size:15px}.row{display:flex}body{font-family:sans-serif;}.sp{margin-bottom:-10px;margin-left:10px;}.postagram{text-align:center;font-family:'Urbanist', sans-serif;margin-top:10px;margin-bottom:-9.5px;}.headers{border-bottom:1px solid lightgray;width:100%;right:0;position:fixed;margin-top:-8px;background-color:white;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.search{width:60px;margin-top:2px;}.align{display: flex;justify-content: center;}.vid{height:26px;margin-top:-99px;margin-left:4px;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left: 8%;margin-bottom: -3px;height: 32px;}.deletes{margin-top:2px;height:25px;margin-right: 4px;width:70px;border-radius:4px;border-style:solid;border-width:1px;font-size:12px;font-weight:600;border:none;}.f{background-color:#1e90ff;color:#fff}.a{background-color:#eee;color:black}.hu{right:0;position:absolute;background-color:#1e90ff;color:#fff}.new{background-color:#eee;color:black}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}</style><script>'use strict';document.addEventListener('contextmenu', event => event.preventDefault());
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
var token='{{ Session::token() }}';
var lastScrollTop = 0;
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       // downscroll code
       $('.menu').fadeOut();
   } else {
      // upscroll code
      $('.menu').fadeIn();
   }
   lastScrollTop = st;
});
$('.a').on('click', function(){
 var text = $(this).val();
$.ajax({
    url:'func.php',
    method:'POST',
    data:{"follow": text, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
$(".a").html('Declined');
 $( ".f" ).remove();
  $(".a").addClass("new");
 $(".a").removeClass("a");
    },
     error: function() {
       alert("An error occured");   
       }
})
});
$('.f').on('click', function(){
 var text = $(this).val();
$.ajax({
    url:'func.php',
    method:'POST',
    data:{"follows": text, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
   $(".f").html('Accepted');
 $(".f").addClass("hu");
 $(".f").removeClass("f");
 $(".a").css("visibility", "hidden");      
    },
     error: function() {
       alert("An error occured");   
       }
})
});
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
});
const observer=lozad();observer.observe();function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});</script></body></html>