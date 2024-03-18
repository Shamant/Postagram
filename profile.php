<?php
for ($i=0; $i<5; $i++) {
    for ($j=0; $j<5; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<5; ++$j) {
        pclose($pipe[$j]);
    }
}
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
$cute = $_COOKIE['avatar'];
$user = mb_strimwidth($username, 0, 14, "...");
?><!DOCTYPE html><html lang='en'><head><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1, viewport-fit=cover'><title><?php echo $user; ?>'s Profile</title><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><script src='https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js'></script></head><body><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 44px;
    margin-top: 8px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';"/><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()" style="left:0;position:absolute;margin-left:10px;margin-top:14px;height:20px;"/><img src="https://img.icons8.com/ios-glyphs/48/000000/settings.png" style="height: 31px;float: right;margin-top: 6px;padding-right: 16px;" onclick="openNav()"/><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:50px;margin-top: 14px;
    font-size: 17px;"><?php echo $user; ?></h5><div class="headers" style="height:10px;">
    </div><div class='align'><div class='menu'><span class='rowso'><a href='home'><img class='home1' src='https://img.icons8.com/fluency-systems-regular/48/000000/home.png'></a>
<a href='discover'><img class='psoty' src='https://img.icons8.com/material-outlined/48/000000/compass.png'/></a>
<a href='upload'><img class='psotz' src='https://img.icons8.com/android/48/000000/plus.png'/></a>
<a href='#'><img class='psots' src='uploads/<?=$cute?>'/></a>
<a href='message'><img class='c' src='menu.png'/></a></span></div></div><br><br><br><div id='mySidenav' class='sidenav'><a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a><hr class='gh'><h6 class='df' onclick='change()'>Change Password</h6><hr class='gh'><h6 class='df' onclick="location.href = '/edit';">Edit Profile</h6><hr class='gh'><h6 class='df' onclick='share()'>Share Your Account</h6><hr class='gh'><button class='fgs'>Logout</button><hr class='gh'>
<?php
$query = "SELECT * FROM posts WHERE username='$username' ORDER BY id DESC";
$res = mysqli_query($link, $query);
$n = mysqli_num_rows($res);
$x = "";
$cov = "SELECT * FROM following WHERE following_id ='$username' AND verfied='1'";
$oxyhu = mysqli_query($link, $cov);
$njk = mysqli_num_rows($oxyhu);
$covs = "SELECT * FROM following WHERE userid ='$username' AND verfied='1'";
$oxyhus = mysqli_query($link, $covs);
$njks = mysqli_num_rows($oxyhus);
if(isset($_POST['logout'])) {
 setcookie("loggedin", "", time() - 3600);
 setcookie("id", "", time() - 3600);
 setcookie("registered", "", time() - 3600);
 setcookie("avatar", "", time() - 3600);
 header("location: index.php");
 exit;
}
$steve_jobs = "SELECT * FROM avatar WHERE username='$username'";
$muniyyapa_venkatesh = mysqli_query($link, $steve_jobs);
$elon = mysqli_fetch_assoc($muniyyapa_venkatesh);
$benf = $elon['tyr'];
$any = $elon['type'];
$redirect = "/profile";
       if($benf == '') {
echo "<button name='logouts' class='fgs lo'>Lock Your Profile</button><hr class='gh'></div>";
       } else {
echo "<button name='logoutss' class='fgs un'>Unlock Your Profile</button><hr class='gh'></div>";
       }
echo "</div><center><h2>$user</h2>";
       if($benf == '') {
echo "<img class='fiire' src='https://img.icons8.com/fluent-systems-regular/48/000000/lock--v1.png' style='height:39px;padding-top: 5px;padding-bottom: 5px;display:none;'><br><img class='avatar' src='uploads/$cute' onclick='avatar()'>";
                  } else {
echo "<img class='fiire' src='https://img.icons8.com/fluent-systems-regular/48/000000/lock--v1.png' style='height:39px;padding-top: 5px;padding-bottom: 8px;'><br><img class='avatar' src='uploads/$cute' onclick='avatar()'>";
                }
echo "<br><br><div class='information' style='width:96%;overflow:hidden;'>$elon[type]</div><br><div style='display:flex;width:248px;'>
<a href='following'><div>
<div style='color:#000000;'>$njks</div><div style='color:grey;'>Following</div></div></a><a href='followers'><div style='padding-left:25px;'>";
if($njk == 1) {
 echo "
<div><div class='dev' style='color:#000000;'>1</div><div class='2qr' style='color:grey;'>Follower</div></div></div></a>";   
} else {
echo "
<div><div class='dev' style='color:#000000;'>$njk</div><div class='2qr' style='color:grey;'>Followers</div></div></div></a>";
}
if($n == 1) {
 echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>1</div><div style='color:grey;'>Post</div></div></div><br><button class='sql' onclick='avatar()'>Edit Profile</button></center>";   
} else {
echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>$n</div><div style='color:grey;'>Posts</div></div></div><br><button class='sql' onclick='avatar()'>Edit Profile</button></center>";
}
echo "<div style='display:flex;border-top: 1px solid #eeeeee96;border-bottom: 1px solid #eeeeee63;margin-bottom:-9px;'>
<div class='posts act' style='width:20%;float:left;text-align:center;background:#eeeeee70;height:40px;'><img src='https://img.icons8.com/pastel-glyph/36/000000/image--v2.png' style='height:33px;margin-top: 4px;'></div>
<div class='ment' style='width:20%;text-align:center;height:40px;'><img src='https://img.icons8.com/external-neu-royyan-wijaya/36/000000/external-mention-neu-text-neu-royyan-wijaya.png' style='height:33px;margin-top: 4px;'/></div>
<div class='like' style='width:20%;text-align:center;height:40px;'><img src='https://img.icons8.com/color/36/000000/like--v3.png' style='height:35px;margin-top:2px;'/></div>
<div class='book' style='width:20%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/ios/36/000000/bookmark-ribbon--v1.png' style='height:28px;margin-top:6px;'/></div>
<div class='comm' style='width:20%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/ios/36/000000/topic.png' style='height:29px;margin-top:4px;'/></div></div><br><div class='change' style='margin-top:-4px;'>";
          if(mysqli_num_rows($res)) {
          while($images = mysqli_fetch_assoc($res)) {  
            $checks = $images['imagesData'];
            $echos = "user_posts/".$checks;
 echo "<a href='$echos'><img class='lozad' data-src='uploads/$checks'></a>";
    }
    } else {
echo "<br><br><br><center><a href='post.php'><img id='gugus' src='https://img.icons8.com/ios-filled/50/000000/no-camera--v1.png'/></a><a href='post.php'><h4 class='oip'>No Posts By You. Post your first photo or video.</h4></a></center>";
    }
    echo "</div><br><div><div id='google_translate_element' style=''></div></div>";
    mysqli_close($link);
    ?><br>
<style>html,body{overflow-x:hidden;}@media screen and (max-width:1500px){.avatar{border-radius:50%;object-fit:cover;height:120px;width:120px;margin-top:-4px;border: 2px solid #eee;margin-left:-7px}}@media screen and (max-width:800px){.avatar{border-radius:50%;object-fit:cover;height:110px;width:110px;margin-top:-4px;}}@media screen and (max-width:550px){.avatar{border-radius:50%;object-fit:cover;height:100px;width:100px;margin-top:-4px}}@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left; margin-left: 7px; text-align: center; width: 32%; margin-right:2px; margin-bottom:12px;margin-top:-6px;border-radius:2px;}}@media screen and (max-width:900px){.lozad{height:170px;float: left; margin-left:6px; text-align: center; width: 32%; margin-right:1px;margin-top:-6px;margin-bottom:10px; object-fit: cover;border-radius:2px;}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left; margin-left: 0px; text-align: center; width: 33%; margin-right:1px; margin-bottom:9px;margin-top:-8px;border-radius:2px;}}.sidenav{height:100%;width:0;position:fixed;top:0;left:0;background-color:#fff;overflow-x:hidden;transition:.3s ease;padding-top:60px}.df{color:#000;margin-left:12px;margin-bottom:18px;height:5px;margin-top:10px;}.sidenav a{padding:8px 8px 8px 32px;color:black;    text-decoration: none;}.sidenav .closebtn{position:absolute;top:0;right:25px;font-size:36px;margin-left:50px}#main{transition:margin-left .3s ease;padding:16px}@media screen and (max-height: 450px){.sidenav{padding-top:12px}.sidenav a{font-size:18px}}.row{display:flex}h2{font-weight:450;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;}body{font-family:sans-serif}.sql{background-color:#fff;height:27px;border-radius:6px;width:200px;border:1px solid lightgrey;margin-bottom:24px}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.align{display: flex;justify-content: center;}.psot{right:0;position:absolute;margin-right:8px;height:23px;margin-top:7px;}.psoty{margin-left:53px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left:6%;height:24px;margin-bottom:1.6px;}.fgs{border:none;background-color:#fff;margin-top:2px;font-weight:600;margin-left:9px;font-size:11px;height:30px;}.gh{border: 0;border-top: 1px solid rgba(0,0,0,.1);}.headers{border-bottom:1px solid #eee;width:100%;right:0;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);text-decoration:none;}a:focus,a:visited,a:active{outline:none;color:black;}*{margin:0;}.res{color:#007bff;text-decoration:none;}.res:hover{color:#007bff;text-decoration:none;}
</style>
<script>function openNav(){document.getElementById("mySidenav").style.width="100%"}function closeNav(){document.getElementById("mySidenav").style.width="0"}function change(){window.location="verify"}function jf(){window.location="/edit"}function avatar(){window.location="edit"}function share(){window.location="/edit"}function back() {window.history.back();}
$(document).ready(function(){
var lastScrollTop = 0;var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
var rep_post = $(".change").html();
var comm = "";
var book = "";
var like = "";
var men = "";
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
const observer = lozad();
observer.observe();
var count = 0;
$('.fgs').on('click', function(){
    count = ++count;
    if(count > 2) {
        if($(this).hasClass("lo")) {
       $(".lo").addClass("un");
   $(".lo").removeClass("lo");
   $(".un").text("Unlock Your Profile");
   $(".fiire").css("display", "block");
   $(".fiire").css("margin-bottom", "-10px");     
        } else {
        $(".un").addClass("lo");
   $(".lo").removeClass("un");
   $(".lo").text("Lock Your Profile");
   $(".fiire").css("display", "none");
        }
    } else {
    if($(this).hasClass("lo")) {
        $(".lo").addClass("un");
   $(".lo").removeClass("lo");
   $(".un").text("Unlock Your Profile");
   $(".fiire").css("display", "block");
   $(".fiire").css("margin-bottom", "-10px");
     $.ajax({
    url:'func.php',
    method:'POST',
    data:{"lock": "lo", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
       }
})
} else if($(this).hasClass("un")) {
        $(".un").addClass("lo");
   $(".lo").removeClass("un");
   $(".lo").text("Lock Your Profile");
   $(".fiire").css("display", "none");
   $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unlock": "unlo", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
       }
}) 
} else {
    if(confirm("Are you sure you want to logout from postagram?")) {
    document.cookie = "registered=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "loggedin=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
document.cookie = "avatar=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
window.location.replace("/login");        
    }
}
}
});
$('.ment').on('click', function(){
    if($(this).hasClass("act")) {
        
    } else {
         $('.like').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.ment').css("background", "#eeeeee70");
        $('.like').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act");  
    if(men == "") {
            $.ajax({
    url:'shows.php',
    method:'POST',
    data:{"image": "ment", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
men = data;
    },
     error: function() {
       alert("An error occured");   
       }
})     
    } else {
      $(".change").html(men);
          const observer = lozad();
observer.observe();
    }
    }
});
$('.like').on('click', function(){
        if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.like').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act"); 
    if(like == "") {
                 $.ajax({
    url:'shows.php',
    method:'POST',
    data:{"image": "like", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
like = data;
    },
     error: function() {
       alert("An error occured");   
       }
})    
    } else {
  $(".change").html(like);
          const observer = lozad();
observer.observe();    
    }
    }
});
$('.posts').on('click', function(){
         if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.like').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.posts').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.like').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act"); 
    $(".change").html(rep_post);
    const observer = lozad();
observer.observe();
    }
});
$('.book').on('click', function(){
         if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.like').css("background", "white");
    $('.posts').css("background", "white");
     $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.book').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.like').removeClass("act");
    $('.posts').removeClass("act");
    $(this).addClass("act"); 
    if(book == "") {
             $.ajax({
    url:'shows.php',
    method:'POST',
    data:{"image": "book", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
book = data;
    },
     error: function() {
       alert("An error occured");   
       }
})        
    } else {
     $(".change").html(book);
          const observer = lozad();
observer.observe();   
    }
    }
});
$('.comm').on('click', function(){
         if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.like').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
    $('.comm').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.like').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act"); 
    if(comm == "") {
             $.ajax({
    url:'shows.php',
    method:'POST',
    data:{"image": "comm", "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
comm = data;
    },
     error: function() {
       alert("An error occured");   
       }
})        
    } else {
 $(".change").html(comm);
          const observer = lozad();
observer.observe();       
    }
    }
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
$.ajax({
    url:'func.php',
    method:'POST',
    data:{"notify": "user", "uri": uri, csrf: csrf, field: field},
    success:function(result) {
    if(result == "https://img.icons8.com/pastel-glyph/24/000000/notification-mail--v2.png") {
    } else {
         $(".rqet67").attr("src", result);
    }
    },
     error: function() {

       }
}); 
}, 900);
});
localStorage.removeItem("refresh");</script></body></html>