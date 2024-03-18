<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
for ($i=0; $i<5; $i++) {
    for ($j=0; $j<5; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<5; ++$j) {
        pclose($pipe[$j]);
    }
}
require_once "signup.php";
$username = $_COOKIE['id'];
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$cute = $_COOKIE['avatar'];
if($_GET['image']) {
    $y = mysqli_real_escape_string($link, $_GET['image']);
$y = str_replace("<", "&lt;", $y);
$y = str_replace(">", "&gt;", $y);
}
$sql = "SELECT * FROM posts WHERE imagesData='$y' AND username='$username'";
$res = mysqli_query($link, $sql);
if(mysqli_num_rows($res) == 0) {
    require_once "404.shtml";
    die('');
    exit;
}
$rowt = mysqli_fetch_assoc($res);
$query = "SELECT * FROM posts WHERE imagesData!='$y' AND username='$username' ORDER BY id DESC LIMIT 33";
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="ie=edge"><base href="/"><title>Your Posts</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><div style="position:fixed;background:#fff;width:100%;top:0;left:0;"><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 12px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 11px;
    margin-right: 7px;"/><img class="arrow" src="menu.png" onclick="location.href = 'menu';" style="left:0;position:absolute;margin-left:10px;margin-top:8px;height:35px;width:35px;border-radius:50%;object-fit:cover;"/><br><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:55px;margin-top: -3px;
    font-size: 17px;">Your Posts</h5><div class="headers" style="margin-top:15px;">
    </div></div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="add-user.png"/></span></div></div><br><br><br><br>
    <?php
 $image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><span style='display:flex;margin-bottom:-4px;margin-top:8px;margin-left:3px;'><img src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span>";
if(mysqli_num_rows($exes)) {
echo "<img class='click marked' alt='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-29.2px;margin-right:9px;height:24.8px;'/><br>";
} else {
    echo "<img class='click' alt='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-29.2px;margin-right:9px;height:24.8px;'/><br>";
}
echo "<div style='width:99%;'><img class='uy' src='uploads/$rowt[imagesData]' style='max-height:700px;object-fit:cover; image-rendering: -webkit-optimize-contrast;'><span style='display:flex;margin-left:-25px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "<img class='liked like' id='like' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>
    "; 
  } else {
   echo "<img id='like' class='like likes' alt='$rowt[imagesData]' src='heart.svg' style='margin-left: 36px;margin-top:2px;object-fit:contain;height:25px;'>";
  }

echo "<a href='comment?comm=$rowt[imagesData]' style='display:inline-block;'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button><div style='margin-left: auto;order: 2;margin-right:5px;margin-top:-2px;'><img class='opt' src='https://img.icons8.com/ios/48/000000/dots-loading--v7.png' style='height:24px;margin-top: 5px;
    margin-right: 5px;'/></div>
</span>";
if($rowt['likes'] > 1) {
    echo "<h5 id='likes $rowt[imagesData]' class='number' style='float: left;margin-left: 9px ;font-weight: 600;margin-top: 2px ;margin-bottom:-10px;'>".$rowt['likes']." likes</h5><br>";
}
if(trim($rowt['caption']) == "") {
    echo "
<br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
} else {
    echo "
<h5 style='font-weight:500;font-size:15px;float:left;margin-left:12px;margin-top:9px;'>$rowt[caption]</h5><br><br><span style='float:right;margin-top: 1px ;color:darkgray;'>$time</span></div></div><br>";
}   
echo "<hr><div class='option' style='position: fixed;
 background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <br>
 <a class='reports' href='edit/$rowt[imagesData]'><div class='edit'>
 <div class='hover'>Edit Post</div></div></a>
 <br><div class='gugu'>
 <div class='hovers' style='margin-top: 6.7px;
    font-size: 19px;'>Delete Post</div>
 </div><button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>
 <span class='rowssss'><strong class='strong'>Posts by  <a href='profile' style='font-weight:400;'>You</a></strong></span><div style='display:flex;border-top: 1px solid #eeeeee96;border-bottom: 1px solid #eeeeee63;margin-bottom:-9px;'>
<div class='posts act' style='width:20%;float:left;text-align:center;background:#eeeeee70;height:40px;'><img src='https://img.icons8.com/pastel-glyph/36/000000/image--v2.png' style='height:33px;margin-top: 4px;'></div>
<div class='ment' style='width:20%;text-align:center;height:40px;'><img src='https://img.icons8.com/external-neu-royyan-wijaya/36/000000/external-mention-neu-text-neu-royyan-wijaya.png' style='height:33px;margin-top: 4px;'/></div>
<div class='likee' style='width:20%;text-align:center;height:40px;'><img src='https://img.icons8.com/color/36/000000/like--v3.png' style='height:35px;margin-top:2px;'/></div>
<div class='book' style='width:20%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/ios/36/000000/bookmark-ribbon--v1.png' style='height:28px;margin-top:6px;'/></div>
<div class='comm' style='width:20%;float:right;text-align:center;height:40px;'><img src='https://img.icons8.com/ios/36/000000/topic.png' style='height:29px;margin-top:10px;'/></div></div><br><div class='change'>";
if(mysqli_num_rows($result)) {
    if(mysqli_num_rows($result) == 1) {
        $taking = mysqli_fetch_assoc($result);
      $urfs = "user_posts/".$taking['imagesData'];
echo "<a href='$urfs'><img class='lozad' data-src='uploads/$taking[imagesData]'></a>";     
} else {
    while($taking = mysqli_fetch_assoc($result)) {
    $urfs = "user_posts/".$taking['imagesData'];
echo "<a href='$urfs'><img class='lozad' data-src='uploads/$taking[imagesData]'></a>";
}
    }
} else {
    echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Posts Not Found</h3><br></center><br>";
}
echo "</div>";
mysqli_close($link);
?>
<style>html,body{overflow-x:hidden;font-family:sans-serif;position: relative;min-height: 100vh;}.delete{border:0;background-color:white;float:right;margin-right:30px;margin-top:-39px}
@media screen and (max-width:1500px){.uy{width:auto;display: block;margin-left: auto;margin-right: auto;margin-top:-10px;margin-bottom:15px;margin-top:-7px;}}
@media screen and (max-width:900px){.uy{width:auto;margin-bottom:14px;margin-top:-6px;}}
@media screen and (max-width:500px){.uy{width:98%;margin-bottom:0px;margin-left:1.3%;margin-top:0px; border-radius: 5px;}}
.gugu{margin-top:-11.6px;height:27.5px}.srf{height:28px;margin-left:20px;margin-top:-2.5px}.rowsss{display:flex;margin-top:-15px;margin-bottom:-34px;margin-left:4px;}@media screen and (max-width:1500px){.img{width:50%;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;border-radius:5px;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:98%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left: 8%;margin-bottom: -3px;height: 32px;}.rowssss{display:flex;margin-top:19px;margin-bottom:17px;margin-left:7px;}.strong{color:grey;font-size:15px;font-weight:100;}a{text-decoration:none;color:black;}hr{margin-top:-1px;border:0;border-top:1px solid rgba(0,0,0,.1);margin-left: -6px;margin-right: -8px;}@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left; margin-left: 7px; text-align: center; width: 32%; margin-right:2px; margin-bottom:12px;margin-top:-6px;border-radius:2px;}}@media screen and (max-width:900px){.lozad{height:170px;float: left; margin-left:6px; text-align: center; width: 32%; margin-right:1px;margin-top:-6px;margin-bottom:10px; object-fit: cover;border-radius:2px;}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left; margin-left: 1px; text-align: center; width: 33%; margin-right:0px; margin-bottom:12px;margin-top:-10px;border-radius:3px;}}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}*{margin:0;}.res{color:#1e90ff;}.align{display: flex;justify-content: center;}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}button{outline:none;}@media screen and (max-width:1500px){.option{ width: 30%;
  height:170px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:10%;    border-bottom-right-radius: 16px;
    border-bottom-left-radius: 16px;cursor: context-menu;}}@media screen and (max-width:600px){.option{ width: 100%;
  height: 180px;margin-bottom:0px;    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;}}
    .gugu{display: flex;height: 30px;margin-top: -2px;padding-left: 19.5px;}.edit{display:flex;margin-left:10px;}
    .hover{margin-top:4px;margin-left:8px;font-size:19px;}</style>
<script>
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
var deletes = "";
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
var rep_post = $(".change").html();
var comm = "";
var book = "";
var like = "";
var men = "";
    deletes = $('.uy').attr("src");
    deletes = deletes.replace("uploads/", "");
    $(".gugu").click(function() {
        if (confirm("Are you sure you want to delete this post?")) {
        $(".dis").attr("disabled", true);
        $(".gugu").attr("disabled", true);
        $(".reports").attr("href", "");
          $.ajax({
    url:'func.php',
    method:'POST',
    data:{"deletes": deletes, "uri": uri, csrf: csrf},
    success:function(data) {
        window.location.replace("/profile");
    },
     error: function() {
    alert("An unknown error occured");
       }
})
        }
    });
 $(".opt").click(function() {
      $(".option").css('visibility', 'visible');
 });
 $(".dis").click(function() {
      $(".option").css('visibility', 'hidden');
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
}, 990);
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
const observer = lozad();
observer.observe();
var wbh = 0;
$(".click").click(function() {
    const name = $(this).attr("alt");
     if($(this).hasClass('marked')) {
         $(this).attr('src','white.PNG');
         $(this).removeClass('marked');
         if(wbh++ > 3) {
             
         } else {
$.ajax({
    url:'func.php',
    method:'POST',
    data:{"unmark": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(this).attr('src','bookmark.PNG');
         $(this).addClass('marked');
       }
})              
         }
    } else {
    $(this).attr('src','bookmark.PNG');
    $(this).addClass('marked');
        if(wbh++ > 3) {
             
         } else {
            $.ajax({
    url:'func.php',
    method:'POST',
    data:{"mark": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(this).attr('src','white.PNG');
         $(this).removeClass('marked');
       }
}) 
         }
    }

});
// like
var web = 0;
    $(".like").click(function() {
    var name = $(this).attr("alt");
     if($(this).hasClass('liked')) {
  	$(this).removeClass('liked');
  	$(this).addClass('likes');
  	$(this).attr('src','heart.svg');
  	$(this).css('height', '25px');
  	$(this).css('margin-top', '2px');
 if(web++ > 4) {
           name = "likes " + name;
          var net = document.getElementById(name).textContent;
          net = net.replace(" likes", "");
          net = parseInt(net);
          net = net - 1;
          if(net == 1) {
              net = net + " like";
          } else {
              net = net + " likes";
          }
     document.getElementById(name).innerHTML = net;   
 } else {
 $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unlike": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
          name = "likes " + name;
          var net = document.getElementById(name).textContent;
          net = net.replace(" likes", "");
          net = parseInt(net);
          net = net - 1;
          if(net == 1) {
              net = net + " like";
          } else {
              net = net + " likes";
          }
     document.getElementById(name).innerHTML = net;
    },
     error: function() {
  	  	  	$(this).addClass('liked');
  	  	  	$(this).removeClass('likes');
  	  	  	$(this).attr('src','red.PNG');
  	  	  	$(this).css('height', '28px');
  	  	  	$(this).css('margin-top', '2px');
       }
})    
 }
    } else if($(this).hasClass('likes')) {
  	$(this).addClass('liked');
  	$(this).removeClass('likes');
  	$(this).attr('src','red.PNG');
  	$(this).css('height', '28px');
  	$(this).css('margin-top', '2px');
  	if(web++ > 4) {
   name = "likes " + name;
          var net = document.getElementById(name).textContent;
          if(!net) {
          } else {
          net = net.replace(" likes", "");
          net = parseInt(net);
          net = net + 1;
          if(net == 1) {
              net = net + " like";
          } else {
              net = net + " likes";
          }
     document.getElementById(name).innerHTML = net;
    }	    
  	} else {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"like": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    name = "likes " + name;
          var net = document.getElementById(name).textContent;
          if(!net) {
          } else {
          net = net.replace(" likes", "");
          net = parseInt(net);
          net = net + 1;
          if(net == 1) {
              net = net + " like";
          } else {
              net = net + " likes";
          }
     document.getElementById(name).innerHTML = net;
    }
    },
     error: function() {
  	$(this).removeClass('liked');
  	$(this).attr('src','https://img.icons8.com/windows/36/000000/like--v1.png');
  	$(this).css('height', '25px');
  	$(this).css('margin-top', '2px');
  	$(this).addClass('likes');
       }
})  	    
  	}
    } else {
    }
});
// share
$(".share").click(function() {
            if (navigator.share) {
                const post = $(this).val();
                const name = $(this).attr("name");
                navigator.share({
                    title: 'Post From ' + name + '(@' + name + ')',
                    url: 'https://postagram.in/view_posts?image=' + post + '&search=' + name
                }).then(() => {
                    console.log('Thanks for sharing!');
                }).catch(err => {
                    console.log(
                    "Error while using Web share API:");
                    console.log(err);
                });
            } else {
                alert("Update Your Browser To Share This Link!");
            }
    });
$('.ment').on('click', function(){
    if($(this).hasClass("act")) {
        
    } else {
         $('.likee').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.ment').css("background", "#eeeeee70");
        $('.likee').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act");  
        if(men != "") {
        $(".change").html(men);
          const observer = lozad();
observer.observe();
    } else {
         $.ajax({
    url:'client.php',
    method:'POST',
    data:{"image": "ment", "url": deletes, "uri": uri, csrf: csrf, field: field},
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
}
    }
});
$('.likee').on('click', function(){
        if($(this).hasClass("act")) {
        
    } else {
    $('.ment').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.likee').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act"); 
        if(like == "") {
                 $.ajax({
    url:'client.php',
    method:'POST',
    data:{"image": "like", "url": deletes, "uri": uri, csrf: csrf, field: field},
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
    $('.likee').css("background", "white");
    $('.book').css("background", "white");
         $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.posts').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.likee').removeClass("act");
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
    $('.likee').css("background", "white");
    $('.posts').css("background", "white");
     $('.comm').css("background", "white");
         $('.comm').removeClass("act");
    $('.book').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.likee').removeClass("act");
    $('.posts').removeClass("act");
    $(this).addClass("act"); 
    if(book == "") {
    $.ajax({
    url:'client.php',
    method:'POST',
    data:{"image": "book", "url": deletes, "uri": uri, csrf: csrf, field: field},
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
    $('.likee').css("background", "white");
    $('.posts').css("background", "white");
    $('.book').css("background", "white");
    $('.comm').css("background", "#eeeeee70");
    $('.ment').removeClass("act");
    $('.likee').removeClass("act");
    $('.posts').removeClass("act");
    $('.book').removeClass("act");
    $(this).addClass("act"); 
    if(comm == "") {
              $.ajax({
    url:'client.php',
    method:'POST',
    data:{"image": "comm", "url": deletes, "uri": uri, csrf: csrf, field: field},
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
});
function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script></body></html>