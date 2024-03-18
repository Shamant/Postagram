<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
for ($i=0; $i<1; $i++) {
    for ($j=0; $j<1; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<1; ++$j) {
        pclose($pipe[$j]);
    }
}
$username = $_COOKIE['id'];
require_once "signup.php";
$word = "IMG";
$cute = $_COOKIE['avatar'];
$sql = "SELECT 
  imagesData
FROM posts 
WHERE tyr='' AND username!='$username' AND username NOT IN
  (SELECT 
     following_id 
   FROM following 
   WHERE userid='$username')";
$result = mysqli_query($link, $sql);
?>
<!DOCTYPE html><html lang=""><html><head><meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Discover Posts</title><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script></head><body><div><img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 9px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 8px;
    margin-right: 7px;"/><img class="arrow" src="menu.png" onclick="location.href = 'menu';" style="left:0;position:absolute;margin-left:10px;margin-top:7.3px;height:35px;width:35px;border-radius:50%;object-fit:cover;"/><br><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left: 59px;
    margin-top: -4px;
    font-size: 17px;">Your Feed</h5><br><div class="headers" style="margin-top:-1px;">
    </div></div><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-rounded/48/000000/compass.png"  onclick="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick="location.href = 'profile';"/><img class="c" onclick="location.href = 'menu';" src="add-user.png"/></span></div></div><br>
   <?php
          	while ($row = mysqli_fetch_assoc($result)) {  
                $echo = "posts/".$row['imagesData'];
              if(strpos($row['imagesData'], $word) !== false) { 
echo "<a href='$echo'><img class='lozad' data-src='uploads/$row[imagesData]'></a>";
     } else {
echo "<a href='$echo'><video class='lozad' data-src='uploads/$row[imagesData]' muted></video></a>"; 
    }
}
mysqli_close($link);
?><style>@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left; margin-left: 7px; text-align: center; width: 32%; margin-right:2px; margin-bottom:12px;margin-top:-6px;border-radius:2px;}}@media screen and (max-width:900px){.lozad{height:170px;float: left; margin-left:6px; text-align: center; width: 32%; margin-right:1px;margin-top:-6px;margin-bottom:10px; object-fit: cover;border-radius:2px;}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left; margin-left: 1px; text-align: center; width: 33%; margin-right:0px; margin-bottom:12px;margin-top:-10px;border-radius:2px;}}.postagram{text-align:center;font-family:'Urbanist', sans-serif;margin-top:17px;margin-bottom:-9.5px;}.headers{width:100%;right:0;position:fixed;margin-top:-8px;background-color:white;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}.search{width:60px;margin-top:2px;}.align{display: flex;justify-content: center;}.vid{height:26px;margin-top:-99px;margin-left:4px;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:27.5px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left: 8%;margin-bottom: -3.5px;height: 32px;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);margin:0;}a:focus,a:visited,a:active{outline:none;}*{margin:0;padding:0;box-sizing:border-box}body{font-family:sans-serif;}.psot{right: 0; position: absolute;}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}</style><script>
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
document.addEventListener('contextmenu', event => event.preventDefault());
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
}, 4000);  
});
</script></body></html>