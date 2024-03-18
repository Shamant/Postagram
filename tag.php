<?php
for ($i=0; $i<7; $i++) {
    for ($j=0; $j<7; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<7; ++$j) {
        pclose($pipe[$j]);
    }
}
require_once "signup.php";
$username = $_COOKIE['id'];
$x = mysqli_real_escape_string($link, $_GET['tag']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
date_default_timezone_set('UTC');
$cute = $_COOKIE['avatar'];
if(!$_GET['tag']) {
    // if no url condition then select random #'s'
$sqlt = "SELECT * FROM posts WHERE caption LIKE '%#%' AND tyr=''";
$rest = mysqli_query($link, $sqlt);

?>
<!DOCTYPE html>
<html lang="en"><html><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Hashtags • Postagram</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick 0="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick 0="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick 0="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick 0="location.href = 'profile';"/><img class="c" onclick 0="location.href = 'menu';" src="https://img.icons8.com/plumpy/50/000000/line-width.png"/></span></div></div>
<?php
if(mysqli_num_rows($rest)) {
    while($rowt = mysqli_fetch_assoc($rest)) {
        $image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like 0'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><a href='discover.php?search=$rowt[username]' style='text-decoration:none;'><span style='display:flex;margin-bottom:-4px;margin-top:4px;margin-left:9px;'><img class='lozad' src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click 0 marked' id='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click 0' id='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;'><img class='lozad' data-src='uploads/$rowt[imagesData]' style='width:100%;max-height:640px;object-fit:cover; border-radius: 1px;'><span style='display:flex;margin-left:-30px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "
    <img class='liked like 0' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img class='like likes 0' alt='$rowt[imagesData]' src='like.PNG' style='margin-left: 36px;margin-top:4px;object-fit:contain;height:24px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button>
</span><a href='report?report=$rowt[imagesData]'><img src='report.PNG' style='height:26px;float:right;margin-top:-38px;'/></a>
<h5 style='font-weight:500;font-size:15px;float:left;margin-left:5px;margin-top:9px;'>$rowt[caption]</h5><br><br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
}
} else {
    echo "<center><br><br><br><br><br><br><br><br><br><div class='border' style='border-radius:12px;border:2px solid #eee;width:70%'><br><img class='sp' src='https://img.icons8.com/ios/48/000000/hashtag.png'/><h4 style='font-family:sans-serif'>When posts contain trending hashtags, you can view them here.</h4><br></div></center>";
}
?><style>body{font-family:sans-serif}.sp{margin-bottom:-10px;margin-left:10px;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:28px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left:8%;margin-bottom:2.7px;height:19px}.align{display: flex;justify-content: center;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}@media screen and (max-width:1500px){.img{width:50%; border-radius: 1px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:97%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}button{outline:none;}</style><script>var lastScrollTop=0;$(window).scroll(function(o){var e=$(this).scrollTop();lastScrollTop<e?$(".menu").fadeOut():$(".menu").fadeIn(),lastScrollTop=e});const observer = lozad();observer.observe();
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
 } else {
 $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unlike": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
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
  	} else {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"like": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
       }
})  	    
  	}
    } else {
    }
});
// share
$(".share").click 0(function() {
            if (navigator.share) {
                const post = $(this).val();
                const name = $(this).attr("name");
                navigator.share({
                    title: 'Post By ' + name + '(@' + name + ')',
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
</script></body></html>
<?php
} else {
$x = "#".$x;
$sql = "SELECT * FROM posts WHERE caption LIKE '%{$x}%' AND tyr=''";
$res = mysqli_query($link, $sql);
if(mysqli_num_rows($res)) {
?>
<!DOCTYPE html>
<html lang="en"><html><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Hashtags • Postagram</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick 0="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick 0="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick 0="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick 0="location.href = 'profile';"/><img class="c" onclick 0="location.href = 'menu';" src="https://img.icons8.com/plumpy/50/000000/line-width.png"/></span></div></div>
<?php
if(mysqli_num_rows($res)) {
    while($rowt = mysqli_fetch_assoc($res)) {
        $image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like 0'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><a href='discover.php?search=$rowt[username]' style='text-decoration:none;'><span style='display:flex;margin-bottom:-4px;margin-top:4px;margin-left:9px;'><img class='lozad' src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click 0 marked' id='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click 0' id='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;'><img class='lozad' data-src='uploads/$rowt[imagesData]' style='width:100%;max-height:640px;object-fit:cover; border-radius: 1px;'><span style='display:flex;margin-left:-30px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "
    <img class='liked like 0' id='like 0' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img class='like likes 0' alt='$rowt[imagesData]' src='like.PNG' style='margin-left: 36px;margin-top:4px;object-fit:contain;height:24px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button>
</span><a href='report?report=$rowt[imagesData]'><img src='report.PNG' style='height:26px;float:right;margin-top:-38px;'/></a>
<h5 style='font-weight:500;font-size:15px;float:left;margin-left:5px;margin-top:9px;'>$rowt[caption]</h5><br><br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
}
} else {
    echo "<center><br><br><br><br><br><br><br><br><br><div class='border' style='border-radius:12px;border:2px solid #eee;width:70%'><br><img class='sp' src='https://img.icons8.com/ios/48/000000/hashtag.png'/><h4 style='font-family:sans-serif'>When posts contain trending hashtags, you can view them here.</h4><br></div></center>";
}
?><style>body{font-family:sans-serif}.sp{margin-bottom:-10px;margin-left:10px;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:28px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left:8%;margin-bottom:2.7px;height:19px}.align{display: flex;justify-content: center;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}@media screen and (max-width:1500px){.img{width:50%; border-radius: 1px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:97%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}button{outline:none;}</style><script>var lastScrollTop=0;$(window).scroll(function(o){var e=$(this).scrollTop();lastScrollTop<e?$(".menu").fadeOut():$(".menu").fadeIn(),lastScrollTop=e});const observer = lozad();observer.observe();
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
 } else {
 $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unlike": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
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
  	} else {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"like": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
       }
})  	    
  	}
    } else {
    }
});
// share
$(".share").click 0(function() {
            if (navigator.share) {
                const post = $(this).val();
                const name = $(this).attr("name");
                navigator.share({
                    title: 'Post By ' + name + '(@' + name + ')',
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
</script></body></html>
<?php
} else {
?>
<!DOCTYPE html>
<html lang="en"><html><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Hashtags • Postagram</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head><body><div class="align"><div class="menu"><span class="rowso"><img class="home1" src="https://img.icons8.com/fluency-systems-regular/48/000000/home.png" onclick 0="location.href = 'home';"><img class="psoty" src="https://img.icons8.com/material-outlined/48/000000/compass.png"  onclick 0="location.href = 'discover';"/><img class="psotz" src="https://img.icons8.com/android/48/000000/plus.png"  onclick 0="location.href = 'upload';"/><img class="psots" src="uploads/<?=$cute?>"  onclick 0="location.href = 'profile';"/><img class="c" onclick 0="location.href = 'menu';" src="https://img.icons8.com/plumpy/50/000000/line-width.png"/></span></div></div>
<?php
if(mysqli_num_rows($res)) {
    while($rowt = mysqli_fetch_assoc($res)) {
        $image = $rowt['imagesData'];
       $time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like 0'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
  echo "<div class='img'><a href='discover.php?search=$rowt[username]' style='text-decoration:none;'><span style='display:flex;margin-bottom:-4px;margin-top:4px;margin-left:9px;'><img class='lozad' src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:10.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click 0 marked' id='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click 0' id='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:-29px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;'><img class='lozad' data-src='uploads/$rowt[imagesData]' style='width:100%;max-height:640px;object-fit:cover; border-radius: 1px;'><span style='display:flex;margin-left:-30px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "
    <img class='liked like 0' id='like 0' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img class='like likes 0' alt='$rowt[imagesData]' src='like.PNG' style='margin-left: 36px;margin-top:4px;object-fit:contain;height:24px;'>";
  }

echo "    <a href='comment?comm=$rowt[imagesData]'>
        <img class='comm' src='https://static.thenounproject.com/png/638755-200.png'></a>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-10px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button>
</span><a href='report?report=$rowt[imagesData]'><img src='report.PNG' style='height:26px;float:right;margin-top:-38px;'/></a>
<h5 style='font-weight:500;font-size:15px;float:left;margin-left:5px;margin-top:9px;'>$rowt[caption]</h5><br><br><span style='float:right;margin-top: -10px ;color:darkgray;'>$time</span></div></div><br>";
}
} else {
    echo "<center><br><br><br><br><br><br><br><br><br><div class='border' style='border-radius:12px;border:2px solid #eee;width:70%'><br><img class='sp' src='https://img.icons8.com/ios/48/000000/hashtag.png'/><h4 style='font-family:sans-serif'>When posts contain trending hashtags, you can view them here.</h4><br></div></center>";
}
?><style>body{font-family:sans-serif}.sp{margin-bottom:-10px;margin-left:10px;}.psot{right:0;position:absolute;margin-right:8px;height:24px;margin-top:-33px;}.psoty{margin-left:40px;height:31px;margin-bottom:-3px}.psotz{height:25.5px;margin-left:8%}.home1{height:28.5px;left:0;position:absolute;margin-top:3px;margin-left:6%;}.psots{height:27.5px;width:28px;object-fit:cover;margin-left:9%;margin-bottom:-1px;border-radius:50%}.c{margin-left:8%;margin-bottom:2.7px;height:19px}.align{display: flex;justify-content: center;}.menu{width:250px;position:fixed;margin-bottom:0;text-align:center;background-color:#fff;bottom:6px;height:35px;border-radius:10px;border:1px solid silver;}a{-webkit-tap-highlight-color:rgba(0,0,0,0);}a:focus,a:visited,a:active{outline:none;}@media screen and (max-width:1500px){.img{width:50%; border-radius: 1px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:97%;}}.res{color:#1e90ff;text-decoration:none;}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}button{outline:none;}</style><script>var lastScrollTop=0;$(window).scroll(function(o){var e=$(this).scrollTop();lastScrollTop<e?$(".menu").fadeOut():$(".menu").fadeIn(),lastScrollTop=e});const observer = lozad();observer.observe();
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
 } else {
 $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unlike": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
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
  	} else {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"like": name, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
       }
})  	    
  	}
    } else {
    }
});
// share
$(".share").click 0(function() {
            if (navigator.share) {
                const post = $(this).val();
                const name = $(this).attr("name");
                navigator.share({
                    title: 'Post By ' + name + '(@' + name + ')',
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
</script></body></html>
<?php
}
}
mysqli_close($link);
?>