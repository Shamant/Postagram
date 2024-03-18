<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
require_once "signup.php";
$username = $_COOKIE['id'];
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
$x = mysqli_real_escape_string($link, $_GET['image']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
$word = "IMG";
if(!isset($_COOKIE['avatar'])){
    $ohmg = "SELECT * FROM avatar WHERE username='$username'";
$shell = mysqli_query($link, $ohmg);
$let = mysqli_fetch_assoc($shell);
$cook = $let['prof'];
setcookie("avatar", $cook, time()+365*24*60*60);
}
$cute = $_COOKIE['avatar'];
$sql = "SELECT * FROM posts WHERE imagesData='$x' AND tyr=''";
$result = mysqli_query($link, $sql);
$rowt = mysqli_fetch_assoc($result);
$tree = "SELECT * FROM following WHERE userid='$username' AND following_id='$rowt[username]'";
$check = mysqli_query($link, $tree);
if(!mysqli_num_rows($result)) {
      require_once "404.shtml";
    die('');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en"><html><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Feed</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><div style="position:fixed;background:#fff;width:100%;top:0;left:0;"><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 12px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 11px;
    margin-right: 7px;"/><img class="arrow" src="menu.png" onclick="location.href = 'menu';" style="left:0;position:absolute;margin-left:10px;margin-top:9px;height:35px;width:35px;border-radius:50%;object-fit:cover;"/><br><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:55px;margin-top: -1px;
    font-size: 17px;">Feed</h5><div class="headers" style="margin-top:15px;">
    </div></div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="add-user.png"/></span></div></div><br><br><br><br>
        <?php
$image = $rowt['imagesData'];
$time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><a href='discover/$rowt[username]' style='text-decoration:none;display:inline-block;'><span style='display:flex;margin-bottom:-4px;margin-top:8px;margin-left:3px;'><img src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 class='id' style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click marked' alt='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:12px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click' alt='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:12px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;margin-top:7px;'><img class='uy' src='uploads/$rowt[imagesData]' style='max-height:700px;object-fit:cover;image-rendering: -webkit-optimize-contrast;'><span style='display:flex;margin-left:-24px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "<img class='liked like' id='like' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img id='like' class='like likes' alt='$rowt[imagesData]' src='heart.svg' style='margin-left: 36px;margin-top:2px;object-fit:contain;height:25px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]' style='display:inline-block;'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button><div style='margin-left: auto;order: 2;margin-right:5px;margin-top:-2px;'><img class='opt' src='https://img.icons8.com/ios/48/000000/dots-loading--v3.png' style='height:24px;margin-top: 5px;
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
echo "<hr><div class='option' style='position: fixed;cursor:pointer;
 background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <br>
 <a href='report?report=$rowt[imagesData]' style='text-decoration:none;color:black;'><div style='display:flex;margin-left:10px;'><img src='report.PNG' style='height:30px;margin-left:2px;'/>
 <div style='margin-top:6.5px;margin-left:11px;font-size:17px;'>Report Post</div></div></a>
 <br>";
 if(!mysqli_num_rows($check)) {
    echo "
 <div class='gu' style='display:flex;height:30px;margin-top:-2px;margin-left:10px;'>
 <img src='https://img.icons8.com/ios-glyphs/48/000000/user--v1.png' style='height:30px;width:30px;'/>
 <div class='chan follow' style='margin-top: 7px;
    margin-left: 11px;
    font-size: 17px;'>Follow $rowt[username]</div>
 </div><br>";  
 } else {
 echo "
 <div class='gu' style='display:flex;height:30px;margin-top:-2px;margin-left:10px;'>
 <img src='https://img.icons8.com/ios-glyphs/48/000000/user--v1.png' style='height:30px;width:30px;'/>
 <div class='chan Unfollow' style='margin-top: 7px;
    margin-left: 11px;
    font-size: 17px;'>Unfollow $rowt[username]</div>
 </div><br>";
 }
echo " <div class='ug' style='display:flex;height:30px;margin-top:-2px;margin-left:10px;'>
 <img src='https://img.icons8.com/color/54/000000/boring--v1.png' style='height:38px;margin-left: -2px;'/>
 <div style='margin-top: 8.7px;
    margin-left: 11px;
    font-size: 17px;'>Not Interested</div>
 </div> <br>
 <div class='mute' style='display:flex;height:30px;margin-left:10px;margin-top:4px'>
 <img src='https://img.icons8.com/ios/48/000000/mute.png' style='height:34px;margin-left: 6px;'/>
 <div style='margin-top: 8px;
    margin-left: 11px;
    font-size: 17px;'>Mute $rowt[username]</div>
 </div><br>
  <div class='block' style='display:flex;height:30px;margin-left:10px;margin-top:4px'>
 <img src='block-user.png' style='height:34px;margin-left: 6px;'/>
 <div style='margin-top: 8.7px;
    margin-left: 11px;
    font-size: 17px;'>Block $rowt[username]</div>
 </div>
 <button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>";    
$sqls = "SELECT * FROM posts WHERE username!='$rowt[username]' AND username!='$username' AND imagesData!='$x' AND tyr='' ORDER BY id DESC LIMIT 175";
$results = mysqli_query($link, $sqls);
if(mysqli_num_rows($results)) {
    if(mysqli_num_rows($results) == 1) {
        $taking = mysqli_fetch_assoc($results);
      $urfs = "posts/".$taking['imagesData'];
echo "<a href='$urfs'><img class='lozad' data-src='uploads/$taking[imagesData]'></a>";     
} else {
    while($taking = mysqli_fetch_assoc($results)) {
    $urfs = "posts/".$taking['imagesData'];
echo "<a href='$urfs'><img class='lozad' data-src='uploads/$taking[imagesData]'></a>";
}
    }
} else {
    echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Posts Not Found</h3><br></center><br>";
}
    mysqli_close($link);
    ?>
    <style>html,body{overflow-x:hidden;overflow-y:scroll;font-family:sans-serif;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left: 8%;margin-bottom: -3px;height: 32px;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left; margin-left: 7px; text-align: center; width: 32%; margin-right:2px; margin-bottom:12px;margin-top:3px;border-radius:2px;}}@media screen and (max-width:900px){.lozad{height:170px;float: left; margin-left:6px; text-align: center; width: 32%; margin-right:1px;margin-top:3px;margin-bottom:0px; object-fit: cover;border-radius:2px;}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left; margin-left: 1px; text-align: center; width: 33%; margin-right:0px; margin-bottom:0px;margin-top:1px;border-radius:2px;}}*{-webkit-tap-highlight-color:transparent;margin: 0;}hr{border: 0;border-top: 1px solid rgba(0,0,0,.1);}@media screen and (max-width:1500px){.img{width:50%;border-radius:5px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:98%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}.align{display: flex;justify-content: center;}.psot{right: 0; position: absolute;}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}button{outline:none;}@media screen and (max-width:1500px){.option{ width: 30%;
  height: 330px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:10%;    border-bottom-right-radius: 16px;
    border-bottom-left-radius: 16px;}}@media screen and (max-width:600px){.option{ width: 100%;
  height: 400px;margin-bottom:0px;    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;}}
@media screen and (max-width:1500px){.uy{width:auto;display: block;margin-left: auto;margin-right: auto;margin-top:-10px;margin-bottom:15px;margin-top:-7px;}}
@media screen and (max-width:900px){.uy{width:auto;margin-bottom:14px;margin-top:-6px;}}
@media screen and (max-width:500px){.uy{width:98%;margin-bottom:0px;margin-left:1.3%;margin-top:0px; border-radius: 5px;}}</style><script>function hj(){window.history.back()}var mater = "";
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
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
mater = $(".id").text();
var cou = 0;
$(".gu").click(function() {
    if($(".chan").hasClass("Unfollow")) {
        if (confirm("Are you sure you want to unfollow " + mater + "?")) {
    $(".chan").text("Follow " + mater);
    $(".chan").removeClass("Unfollow");
    $(".chan").addClass("follow");
    if(cou++ > 4) {
} else {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unfollow": mater, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(".chan").text("Unfollow " + mater);
         $(".chan").removeClass("follow");
    $(".chan").addClass("Unfollow");
       }
})
}
}
    } else if($(".chan").hasClass("follow")) {
       $(".chan").text("Unfollow " + mater);
           $(".chan").removeClass("follow");
    $(".chan").addClass("Unfollow");
    if(cou++ > 4) {
        
    } else {
        $.ajax({
    url:'func.php',
    method:'POST',
    data:{"public": mater, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
     $(".chan").text("Follow " + mater);
        $(".chan").removeClass("Unfollow");
    $(".chan").addClass("follow");
       }
})
}
} else {
}
});
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
$(".opt").click(function() {
      $(".option").css('visibility', 'visible');
 });
 $(".dis").click(function() {
      $(".option").css('visibility', 'hidden');
 });
var wbh = 0;
$(".click").click(function() {
    const name = $(this).attr("alt");
             console.log(wbh++);
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
var webs = 0;
    $(".like").click(function() {
    var name = $(this).attr("alt");
     if($(this).hasClass('liked')) {
  	$(this).removeClass('liked');
  	$(this).addClass('likes');
  	$(this).attr('src','heart.svg');
  	$(this).css('height', '25px');
  	$(this).css('margin-top', '2px');
 if(webs++ > 4) {
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
  	if(webs++ > 4) {
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
}, 1000);
});
    function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script></body></html>