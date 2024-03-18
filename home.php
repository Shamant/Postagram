<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
for ($i=0; $i<7; $i++) {
    for ($j=0; $j<7; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<7; ++$j) {
        pclose($pipe[$j]);
    }
}
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$username = $_COOKIE['id'];
require_once "signup.php";
if(!isset($_COOKIE['avatar'])){
    $ohmg = "SELECT * FROM avatar WHERE username='$username'";
$shell = mysqli_query($link, $ohmg);
$let = mysqli_fetch_assoc($shell);
$cook = $let['prof'];
setcookie("avatar", $cook, time()+365*24*60*60);
$refreshAfter = 0;
header('Refresh: ' . $refreshAfter);
}
$cute = $_COOKIE['avatar'];
$ohmgs = "SELECT * FROM avatar WHERE username='$username'";
$shells = mysqli_query($link, $ohmgs);
$lets = mysqli_fetch_assoc($shells);
$cooks = $lets['prof'];
if($cute != $cooks) {
    setcookie("avatar", $cooks, time()+365*24*60*60, '/');
} else {
}
if(isset($_COOKIE['rand'])){
   setcookie("rand", "", time() - 3600);
header('Refresh: ' . $refreshAfter);
}
header ('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Home</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script><meta name="csrf-token" content="{{ csrf_token() }}" /></head><body><div style="position:fixed;background:#fff;width:100%;top:0;left:0;"><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 12.6px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 12px;
    margin-right: 7px;"/><img class="arrow" src="menu.png" onclick="location.href = 'menu';" style="left:0;position:absolute;margin-left:10px;margin-top:10px;height:35px;width:35px;border-radius:50%;object-fit:cover;"/><br><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:55px;margin-top: -3px;
    font-size: 17px;">Home</h5><div class="headers" style="margin-top:-10px;">
    </div></div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-filled/48/000000/home.png" onclick="scrol()"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="add-user.png"/></span></div></div><br><br>
        <?php
$sql = "SELECT *
FROM posts
JOIN following
ON (userid='$username' AND following_id=username)
WHERE following.verfied='1'
";
         $result = mysqli_query($link, $sql);
          if(mysqli_num_rows($result) > 1) {
        while ($rowt = mysqli_fetch_assoc($result)) {  
$image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img' style='background: #fff;'><a href='/discover/$rowt[username]' style='text-decoration:none;display:inline-block;'><span style='display:flex;margin-bottom:-4px;margin-top:8px;margin-left:3px;'><img class='lozad' data-src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px; border-radius: 50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:8.4px;font-size:15px;'>$rowt[username]</h5></span></a><br>";
if(mysqli_num_rows($exes)) {
echo "<img class='click marked 0' alt='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-37px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click 0' alt='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-37px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;margin-top:-11px;'><img class='lozad' data-src='uploads/$rowt[imagesData]' style='max-height:640px;object-fit:cover;transition: .3s ease; border-radius: 3px;image-rendering: -webkit-optimize-contrast;image-rendering: -webkit-optimize-contrast;'><span style='display:flex;margin-left:-25px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "
    <img class='liked like 0' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img class='like likes 0' alt='$rowt[imagesData]' src='heart.svg' style='margin-left: 36px;margin-top:2px;object-fit:contain;height:25px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]' style='display:inline-block;'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button><div style='margin-left: auto;order: 2;margin-right:5px;margin-top:-2px;'><img id='$rowt[imagesData]' class='opt' alt='$rowt[username]' src='https://img.icons8.com/ios/48/000000/dots-loading--v3.png' style='height:24px;margin-top: 5px;
    margin-right: 5px;'/></div>
</span>";
if($rowt['likes'] > 1) {
    echo "<h5 id='likes $rowt[imagesData]' class='number' style='float: left;margin-left: 12px ;font-weight: 600;margin-top: 2px ;margin-bottom:-10px;'>".$rowt['likes']." likes</h5><br>";
}
if(trim($rowt['caption']) == "") {
    echo "
<br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
} else {
    echo "
<h6 style='font-weight:500;font-size:14px;float:left;margin-left:12px;margin-top:9px;'>$rowt[caption]</h6><br><br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
}

}
echo "<div class='option' style='position: fixed;
 background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <br>
 <a class='reports' href='' style='text-decoration:none;color:black;'><div style='display:flex;margin-left:10px;'><img src='report.PNG' style='height:30px;margin-left:2px;'/>
 <div style='margin-top:2px;margin-left:11px;font-size:17px;'>Report Post</div></div></a>
 <br><div class='gu' style='display:flex;height:30px;margin-top:-2px;margin-left:10px;'>
 <img src='https://img.icons8.com/ios-glyphs/48/000000/user--v1.png' style='height:30px;width:30px;'/>
 <div class='chan Unfollow' style='margin-top: 4px;
    margin-left: 11px;
    font-size: 17px;'>Unfollow </div>
 </div><br> <div class='ug' style='display:flex;height:30px;margin-top:-2px;margin-left:10px;'>
 <img src='https://img.icons8.com/color/54/000000/boring--v1.png' style='height:38px;margin-left: -2px;'/>
 <div class='not' style='margin-top: 6.7px;
    margin-left: 11px;
    font-size: 17px;'>Not Interested</div>
 </div> <br>
 <div class='mute' style='display:flex;height:30px;margin-left:10px;margin-top:4px'>
 <img src='https://img.icons8.com/ios/48/000000/mute.png' style='height:34px;margin-left: 6px;'/>
 <div class='mutes' style='margin-top: 5px;
    margin-left: 11px;
    font-size: 17px;'>Mute </div>
 </div><br>
  <div class='block' style='display:flex;height:30px;margin-left:10px;margin-top:4px'>
 <img src='block-user.png' style='height:34px;margin-left: 6px;'/>
 <div class='tran' style='margin-top: 5.7px;
    margin-left: 11px;
    font-size: 17px;'>Block </div>
 </div>
 <button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>";

    } else {
echo "<br><center><h4 style='font-weight:400;'>Welcome To Postagram</h4><large>You need to follow people to see images and videos.</large></center><br>";
        $sqls = "SELECT * FROM posts WHERE username!='$username' AND tyr='' ORDER BY id DESC LIMIT 200";
$kucho = mysqli_query($link, $sqls);
              echo "<center>";
        while ($rowt = mysqli_fetch_assoc($kucho)) {  
$image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><a href='/discover/$rowt[username]' style='text-decoration:none;'><span style='display:flex;margin-bottom:-4px;margin-top:8px;margin-left:9px;'><img class='lozad' data-src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click marked' id='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click' id='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;'><img class='lozad' data-src='uploads/$rowt[imagesData]' style='width:98%;max-height:390px;object-fit:cover;border-radius:5px;'><span style='display:flex;margin-left:-30px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "
    <img class='liked like' id='like' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:0px;object-fit:contain;height:27px;'>"; 
  } else {
 echo "<img id='like' class='like likes' alt='$rowt[imagesData]' src='heart.svg' style='margin-left: 36px;margin-top:2px;object-fit:contain;height:25px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button>
</span><a href='report?report=$rowt[imagesData]'><img src='report.PNG' style='height:26px;float:right;margin-top:-39px;'/></a>";
if(trim($rowt['caption']) == "") {
    echo "
<br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
} else {
    echo "
<h6 style='font-weight:500;font-size:14px;float:left;margin-left:5px;margin-top:9px;'>$rowt[caption]</h6><br><br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
}

}
echo "</center>";
    }
    mysqli_close($link);
    ?><style>@media screen and (max-width:1500px){.img{width:50%;border-radius:5px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;margin-top: 12px;margin-bottom:-8px;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:102.5%;margin-left:-1.7%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}body{font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Helvetica,Arial,sans-serif;overflow-x: hidden;background: #eeeeee2e;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}.align{display: flex;justify-content: center;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left: 8%;margin-bottom: -3px;height: 32px;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.res{color:#1e90ff;}.psot{right: 0; position: absolute;}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}button{outline:none;}@media screen and (max-width:1500px){.option{ width: 30%;cursor:pointer;
  height: 330px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:10%;    border-bottom-right-radius: 16px;
    border-bottom-left-radius: 16px;}}@media screen and (max-width:600px){.option{ width: 100%;
  height: 360px;margin-bottom:0px;    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;cursor: none;}}
    @media screen and (max-width:1500px){.lozad{width:55%;display: block;margin-left: auto;margin-right: auto;margin-top:-28px;margin-bottom:15px;}}
@media screen and (max-width:900px){.lozad{width:55%;margin-bottom:14px;margin-top:-28px;}}
@media screen and (max-width:500px){.lozad{width:98%;margin-bottom:0px;margin-left:1.3%;margin-top:-4px;}}</style><script>localStorage.removeItem("refresh");const observer=lozad();observer.observe();var x = window.location.href;var alt = ""; var id = "";
if(x != "https://postagram.in/home") {
window.location="https://postagram.in/home";
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
 window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
  }
}
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
$(".opt").click(function() {
      $(".option").css('visibility', 'visible');
      alt = $(this).attr("id");
      id = $(this).attr("alt");
      var chan = $(".chan").text();
      if(chan.includes("Unfollow")) {
           $(".chan").text("Unfollow " + id);     
      } else {
        $(".chan").text("Follow " + id); 
      }
      $(".reports").attr("href", "report?report=" + alt);
      $(".mutes").text("Mute " + id);
      $(".tran").text("Block " + id);
      $(".not").attr("id", alt);
 });
 $(".gu").click(function() {
    if($(".chan").hasClass("Unfollow")) {
    if (confirm("Are you sure you want to unfollow " + id + "?")) {
    $(".chan").text("Follow " + id);
    $(".chan").removeClass("Unfollow");
    $(".chan").addClass("follow");
} else {
}
    } else if($(".chan").hasClass("follow")) {
       $(".chan").text("Unfollow " + id);
           $(".chan").removeClass("follow");
    $(".chan").addClass("Unfollow");
} else {
}
});
 $(".dis").click(function() {
      var reply  = $(".chan").text();
      if(reply.includes("Follow")) {
 $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unfollow": id, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(".chan").text("Unfollow " + id);
         $(".chan").removeClass("follow");
    $(".chan").addClass("Unfollow");
       }
})
      } else {
        $.ajax({
    url:'func.php',
    method:'POST',
    data:{"public": id, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(".chan").text("Follow " + id);
        $(".chan").removeClass("Unfollow");
    $(".chan").addClass("follow");
       }
})
          
      }
      $(".option").css('visibility', 'hidden');
 });
function scrol() {
   window.scrollTo({top: 0, behavior: 'smooth'});
}
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
// start
$(".click").click(function() {
    const name = $(this).attr("alt");
    var init = $(this).attr("class");
    init = init.replace("marked ", "");
    init = init.replace("marked", "");
    init = init.replace("click ", "");
    init = init.replace("click", "");
     if($(this).hasClass('marked')) {
             $(this).attr("class", "click " + init++);
         $(this).attr('src','white.PNG');
         $(this).removeClass('marked');
         if(init++ > 9) {
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
    $(this).attr("class", "click " + init++ + " marked");
    $(this).attr('src','bookmark.PNG');
    $(this).addClass('marked');
        if(init++ > 9) {
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

    $(".like").click(function() {
    var name = $(this).attr("alt");
      	var init = $(this).attr("class");
    init = init.replace("liked ", "");
    init = init.replace("liked", "");
    init = init.replace("likes ", "");
    init = init.replace("likes", "");
    init = init.replace("like ", "");
    init = init.replace("like", "");    
    init++;
     if($(this).hasClass('liked')) {
    $(this).attr("class", "like " + init++ + " likes");
  	$(this).removeClass('liked');
  	$(this).attr('src','heart.svg');
  	$(this).css('height', '25px');
  	$(this).css('margin-top', '2px');
 if(init++ > 9) {
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
       }
})    
 }
    } else if($(this).hasClass('likes')) {
    $(this).attr("class", "like " + init++ + " liked");
  	$(this).removeClass('likes');
  	$(this).attr('src','red.PNG');
  	$(this).css('height', '28px');
  	$(this).css('margin-top', '2px');
  	if(init++ > 9) {
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
});
    function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script></body></html>