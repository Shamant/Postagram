<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
     for ($i=0; $i<10; $i++) {
    for ($j=0; $j<10; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<10; ++$j) {
        pclose($pipe[$j]);
    }
}
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$username = $_COOKIE['id'];
require_once "signup.php";
$x = $_GET['search'];
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
$x = mysqli_real_escape_string($link, $x);
if($x == $username) {
      header("Location: /profile");
    exit;
}
$word = "IMG";
$cute = $_COOKIE['avatar']; 
$sql = "SELECT * FROM avatar WHERE username='$x'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
$rew = $row['username'];
$mine = $row['prof'];
$pho = $row['tyr'];
$cheg = $row['type'];
$ava = $row['tyr'];
if(!mysqli_num_rows($result)) {
    require_once "404.shtml";
    die('');
    exit;
}
$query = "SELECT username, imagesData FROM posts WHERE username='$x' ORDER BY id DESC";
$res = mysqli_query($link, $query);
$cov = "SELECT * FROM following WHERE following_id ='$x' AND verfied='1'";
$oxyhu = mysqli_query($link, $cov);
$njk = mysqli_num_rows($oxyhu);
$covs = "SELECT * FROM following WHERE userid ='$x' AND verfied='1'";
$oxyhus = mysqli_query($link, $covs);
$njks = mysqli_num_rows($oxyhus);
$why = "user/".$x;
$xr = "follow/".$x;
$n = mysqli_num_rows($res);
$follow = "SELECT * FROM following WHERE userid = '$username' AND following_id = '$x' AND verfied='1'";
$resul = mysqli_query($link, $follow);
$ryj = mysqli_num_rows($resul);
$ones = "SELECT * FROM following WHERE userid='$username' AND following_id='$x'";
$dfgs = mysqli_query($link, $ones);
$xy = mb_strimwidth($x, 0, 22, "...");
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="ie=edge"><base href="/"><title><?php echo $x ?>'s Profile</title><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><style>.arrow:hover{border-radius: 50%; background: #eee;}html,body{overflow-x:hidden;}@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left; margin-left: 7px; text-align: center; width: 32%; margin-right:2px; margin-bottom:12px;margin-top:-6px;border-radius:3px}}@media screen and (max-width:900px){.lozad{height:170px;float: left; margin-left:6px; text-align: center; width: 32%; margin-right:1px;margin-top:-6px;margin-bottom:10px; object-fit: cover;border-radius:3px}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left; margin-left: 1px; text-align: center; width: 33%; margin-right:0px; margin-bottom:10px;margin-top:-8px;border-radius:3px}}@media screen and (max-width:1500px){.avatar{border-radius:50%;object-fit:cover;height:120px;width:120px;margin-top:-4px;border: 2px solid #eee;margin-left:-7px}}@media screen and (max-width:800px){.avatar{border-radius:50%;object-fit:cover;height:110px;width:110px;margin-top:-4px;}}@media screen and (max-width:550px){.avatar{border-radius:50%;object-fit:cover;height:100px;width:100px;margin-top:-4px}}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left:8%;margin-bottom:2.7px;height:19px}a{-webkit-tap-highlight-color:rgba(0,0,0,0);text-decoration:none;}a:focus,a:visited,a:active{outline:none;}*{-webkit-tap-highlight-color:transparent;margin:0px;}.res{color:#007bff;}.psot{right: 0; position: absolute; padding: 10px;margin-top:-3px;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.align{display: flex;justify-content: center;}body{font-family:sans-serif;}#ls{height:30px;width:90px;border:none;background-color:#1e90ff;color:white;border-radius:4px;font-size:15px;line-height: 0;}h4{width: 300px;}</style><body><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 44px;
    margin-top: 8px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';"/><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()" style="left:0;position:absolute;margin-left:10px;margin-top:14px;height:20px;"/><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:50px;margin-top: 14px;
    font-size: 17px;"><?php echo $xy; ?></h5><div class="headers" style="height:10px;border-bottom: 1px solid #eeeeeeb0;">
    </div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="menu.png"/></span></div></div><br><center><br><h2 id="x" style="font-weight:300;"><?php echo $xy; ?></h2><br><img class="avatar" src="uploads/<?=$row['prof']?>" style=""><br><br>
        <?php
         if($ava == 'private' && $ryj > 0) {
echo "<div class='information' style='width:96%;word-wrap: break-word;'>$cheg</div>
<br><div style='display:flex;width:248px;'>
<a href='$xr'><div>
<div style='color:#000000;'>$njks</div><div style='color:grey;'>Following</div></div></a>";
if($njk == 1) {
 echo "<a href='$why'><div style='padding-left:25px;'>
<div><div class='dev' style='color:#000000;'>1</div><div class='2qr' style='color:grey;'>Follower</div></div></div></a>";   
} else {
  echo "<a href='$why'><div style='padding-left:25px;'>
<div><div class='dev' style='color:#000000;'>$njk</div><div class='2qr' style='color:grey;'>Followers</div></div></div></a>";  
}

if($n == 1) {
   echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>1</div><div style='color:grey;'>Post</div></div></div><br>"; 
} else {
    echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>$n</div><div style='color:grey;'>Posts</div></div></div><br>";
}

            } elseif($ava == 'private') 
            {
 echo "<div style='width:220px;overflow:hidden;'></div>
<br><div style='display:flex;width:248px;'>
<div>
<div style='color:#000000;'>$njks</div><div style='color:grey;'>Following</div></div>";
if($njk == 1) {
  echo "<a><div style='padding-left:25px;'>
<div><div style='color:#000000;'>1</div><div style='color:grey;'>Follower</div></div></div></a>";  
} else {
 echo "<a><div style='padding-left:25px;'>
<div><div style='color:#000000;'>$njk</div><div style='color:grey;'>Followers</div></div></div></a>";   
}

if($n == 1) {
   echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>1</div><div style='color:grey;'>Post</div></div></div><br>"; 
} else {
    echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>$n</div><div style='color:grey;'>Posts</div></div></div><br>";
}

// brek

            } else {
echo "<div class='information' style='width:96%;overflow:hidden;'>$cheg</div>
<br><div style='display:flex;width:248px;'>
<a href='$xr'><div>
<div style='color:#000000;'>$njks</div><div style='color:grey;'>Following</div></div></a>";
if($njk == 1) {
 echo "<a href='$why'><div style='padding-left:25px;'>
<div><div class='dev' style='color:#000000;'>1</div><div class='2qr' style='color:grey;'>Follower</div></div></div></a>";   
} else {
  echo "<a href='$why'><div style='padding-left:25px;'>
<div><div class='dev' style='color:#000000;'>$njk</div><div class='2qr' style='color:grey;'>Followers</div></div></div></a>";  
}

if($n == 1) {
   echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>1</div><div style='color:grey;'>Post</div></div></div><br>"; 
} else {
    echo "<div style='padding-left:31px;margin-top: -1.7px;margin-bottom: 1px;'><div style='margin-bottom: 1px;'>$n</div><div style='color:grey;'>Posts</div></div></div><br>";
}
// brek
            }       
        
echo "<div style='display:flex;justify-content: center;margin-left: 20px;'>";   
         if ($ryj) {
        echo '<input type="submit" id="ls" class="req elon" value="Following">';
         } else { 
             if($pho == 'private' && !mysqli_num_rows($dfgs)) {
            echo '<input type="submit" class="req elons" id="ls" value="Request">';
             } if($pho == '') {
        echo '<input type="submit" id="ls" class="req" value="Follow">';
             }
             if(mysqli_num_rows($dfgs)) {
        echo '<input type="submit" id="ls" class="req elon" value="Requested">';
             }
         }
// followers
if($row['message'] != "true") {
echo "</div><br><br>
<div style='display:flex;border-top: 1px solid #eeeeee96;border-bottom: 1px solid #eeeeee63;margin-bottom:-12px;'>
<div class='posts act' style='width:33%;float:left;text-align:center;background:#eeeeee70;height:40px;'><img src='https://img.icons8.com/pastel-glyph/36/000000/image--v2.png' style='height:34px;margin-top: 3px;'></div>
<div class='ment' style='width:33%;text-align:center;height:40px;'><img src='https://img.icons8.com/external-neu-royyan-wijaya/36/000000/external-mention-neu-text-neu-royyan-wijaya.png' style='height:33px;margin-top: 4px;'/></div>
<div class='like' style='width:34%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/color/36/000000/like--v3.png' style='height:34px;margin-top:2px;'/></div></div><br><div class='change'>";    
} else {
echo "<a href='message/$x'><div style='margin-left:20px;margin-top:-3px;border-radius: 7px;width: 50px;background:#eeeeee85;height:35px;'><img src='https://img.icons8.com/ios/48/000000/reddit-inbox.png' style='height:34px;margin-top:-1px;'/></div></a></div><br><br>
<div style='display:flex;border-top: 1px solid #eeeeee96;border-bottom: 1px solid #eeeeee63;margin-bottom:-12px;'>
<div class='posts act' style='width:33%;float:left;text-align:center;background:#eeeeee70;height:40px;'><img src='https://img.icons8.com/pastel-glyph/36/000000/image--v2.png' style='height:34px;margin-top: 3px;'></div>
<div class='ment' style='width:33%;text-align:center;height:40px;'><img src='https://img.icons8.com/external-neu-royyan-wijaya/36/000000/external-mention-neu-text-neu-royyan-wijaya.png' style='height:33px;margin-top: 4px;'/></div>
<div class='like' style='width:34%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/color/36/000000/like--v3.png' style='height:34px;margin-top:2px;'/></div></div><br><div class='change'>";
// posts
}


          if($ava == 'private' && $ryj > 0) {
          if(mysqli_num_rows($res)) {
          while ($rowa = mysqli_fetch_assoc($res)) {  
          $echo = "view_posts?image=".$rowa['imagesData']."&search=".$x;
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
          }
          } else {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No posts yet by $x</h4></center><br>";
          }
          } elseif($ava == 'private') {
echo "<br><center><img class='fiire' src='https://img.icons8.com/fluent-systems-regular/48/000000/lock--v1.png'><h3 style='margin-top: 9px;'>This account is private.</h3><br><h4>Follow to see their posts.</h4></center><br>";
          } else {
               if(mysqli_num_rows($res)) {
              while ($rowa = mysqli_fetch_assoc($res)) {  
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$x;
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }
} else {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No posts yet by $x</h4></center><br>";
}
}
echo "</div></center>";
mysqli_close($link);
    ?>
<script>
function back() {window.history.back();}
  setInterval(function(){
(function(){
    debugger
var ui = "Err";
window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
      throw ui;
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
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
var c = "";
var av = "";
var rep_post = $(".change").html();
var ret = "";
var ran = "";
const observer = lozad();
observer.observe();
c = $("#x").text();
av = $(".avatar").attr("src");
var las = localStorage.getItem("search");
var checks = '<a href="discover/' + c + '" tabindex="0"><div class="select"><img class="avatar" src="' + av + '"><h6 class="list-group-item">' + c + '</h6></div></a><br><br>';
if(las) {
let res = las.includes(c);
if(res == true) {
} else {
var search = checks + las;
search = search.replace("null", "");
localStorage.setItem('search', search);
}
} else {
        console.log('ps');
 var search = checks + las;
search = search.replace("null", "");
localStorage.setItem('search', search);   
}
var lastScrollTop = 0;
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
// comment
    $('.psot').on('click', function(){
        window.location="/search";
    });
$('.req').on('click', function(){
 if ($(this).hasClass('elon')) {
     if(confirm("Are you sure you want to unfollow " + c + "?")) {
         var follow = $(".dev").text();
         follow = parseInt(follow);
         follow = follow - 1;
         $(".dev").text(follow);
         if(follow == 1) {
             $(".2qr").text("Follower");
         } else {
             $(".2qr").text("Followers");
         }
         $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unfollow": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
        if($(".req").val() == 'Requested') {
       $(".req").val('Request');   
       $(".req").removeClass("elon");
       $(".req").addClass("elons");
        } else {
            if(data == "Request") {
            $(".req").removeClass("elon");
            $(".req").val(data);
            $(".change").html("<br><center><img class='fiire' src='https://img.icons8.com/fluent-systems-regular/48/000000/lock--v1.png'><h3 style='margin-top: 9px;'>This account is private.</h3><br><h4>Follow to see their posts.</h4></center><br>");
            $(".req").addClass("elons");
            } else {
   $(".req").val(data);
   $(".req").removeClass("elon");
            }
        }
    },
     error: function() {
       alert("An error occured");   
       }
})    
     } else {
     }
    } else if($(this).hasClass('elons')) {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"request": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
       $(".req").val('Requested');   
       $(".req").addClass("elon");
       $(".req").removeClass("elons");
    },
     error: function() {
       alert("An error occured");   
       }
})        
    } else {
        var follow = $(".dev").text();
         follow = parseInt(follow);
         follow = follow + 1;
         $(".dev").text(follow);
         if(follow == 1) {
             $(".2qr").text("Follower");
         } else {
             $(".2qr").text("Followers");
         }
     $.ajax({
    url:'func.php',
    method:'POST',
    data:{"public": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
   $(".req").val('Following');
      $(".req").addClass("elon");
    },
     error: function() {
       alert("An error occured");   
       }
})
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
window.location.replace("index.php");
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
$('.ment').on('click', function(){
    if($(this).hasClass("act")) {
        
    } else {
         $('.like').css("background", "white");
    $('.posts').css("background", "white");
    $('.ment').css("background", "#eeeeee70");
        $('.like').removeClass("act");
    $('.posts').removeClass("act");
    $(this).addClass("act");   
    if(ran == "") {
         $.ajax({
    url:'show.php',
    method:'POST',
    data:{"image": "ment", "user": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
        if(data == "p") {
        } else {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
ran = data;
        }
    },
     error: function() {
       alert("An error occured");   
       }
})
} else {
$(".change").html(ran);    
}
    }
});
$('.like').on('click', function(){
        if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.posts').css("background", "white");
    $('.like').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.posts').removeClass("act");
    $(this).addClass("act"); 
        if(ret == "") {
             $.ajax({
    url:'show.php',
    method:'POST',
    data:{"image": "like", "user": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
   if(data == "p") {
            
        } else {
    $(".change").html(data);
    const observer = lozad();
observer.observe();
ret = data;
        }
    },
     error: function() {
       alert("An error occured");   
       }
})
} else {
$(".change").html(ret);    
}
}
});
$('.posts').on('click', function(){
         if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.like').css("background", "white");
    $('.posts').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.like').removeClass("act");
    $(this).addClass("act"); 
    $(".change").html(rep_post);
    const observer = lozad();
observer.observe();
    }
});
});
localStorage.removeItem("refresh");function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});</script></body></html>