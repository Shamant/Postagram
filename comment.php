<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
// space
require_once "signup.php";
$username = $_COOKIE['id'];
$err = "";
$y = mysqli_real_escape_string($link, $_GET['comm']);
$y = str_replace("<", "&lt;", $y);
$y = str_replace(">", "&gt;", $y);
// space
if(!$y) {
   require "404.shtml";
   exit;
}
// space
// space
$twin = "SELECT * FROM posts WHERE imagesData='$y'";
$fr = mysqli_query($link, $twin);
if(!mysqli_num_rows($fr)) {
   require "404.shtml";
   exit;
}
$rowt = mysqli_fetch_assoc($fr);
    // select statemetns
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><title>Comments</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head><body>
    <?php 
    if($rowt['allow'] == "false") {
  echo "<center><div class='modal__container' id='modal-container'>
    <div class='modal__content'>
        <h1 class='modal__title'>Comments Disabled</h1>
<p class='modal__description'>Comments have been disabled on this post</p>

        <button class='modal__button modal__button-width' onclick='profile()'>
            Profile
</button><br></div></div></center>";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"><script>setInterval(function(){
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
});function ima(){window.location.replace("posts.php")}function profile(){window.location.replace("profile.php")}$(document).ready(function(){$(".videos").on("click",function(){window.location.replace("list.php")})}),window.history.replaceState&&window.history.replaceState(null,null,window.location.href);</script><style>@import "https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap";:root{--hue:240;--first-color:hsl(var(--hue),16%,18%);--first-color-alt:hsl(var(--hue),16%,12%);--title-color:hsl(var(--hue),8%,15%);--text-color:hsl(var(--hue),8%,35%);--body-color:hsl(var(--hue),100%,99%);--container-color:#FFF;--body-font:Poppins,sans-serif;--big-font-size:1.5rem;--normal-font-size:.938rem;--z-modal:1000}@media screen and (min-width: 968px){:root{--big-font-size:1.75rem;--normal-font-size:1rem}}*{box-sizing:border-box;padding:0;margin:0}body,button{font-family:var(--body-font);}body{background-color:var(--body-color);color:var(--text-color);}button{cursor:pointer;border:none;outline:none}.container{margin-left:1rem;margin-right:1rem}.modal{height:100vh;display:grid;place-items:center}.modal__button{background-color:var(--first-color);color:#FFF;padding:1rem 1.25rem;border-radius:.5rem;transition:.3s}.modal__button:hover{background-color:var(--first-color-alt)}.modal__container{width:90%;height:100%;}.modal__content{background-color:var(--container-color);padding:3rem 2rem 2rem;border-radius:1rem 1rem 0 0;transition:all .3s;transform:translateY(10%);height:55%;}.modal__title{font-size:var(--big-font-size);color:var(--title-color);}.modal__description{margin-bottom:1.5rem}.modal__button-width{width:90%}.modal__button-link{margin:1rem auto 0;background-color:transparent;color:var(--first-color)}.show-modal{visibility:visible;opacity:1}.show-modal .modal__content{transform:translateY(0)}@media screen and (min-width: 576px){.modal__content{margin:auto;width:380px;border-radius:1.25rem}.modal__img{width:170px}}.video{width:140px;border: 1px solid #eee;border-radius: 5px;height:140px;}</style>
<?php
    die('');
}
?>
<img class="rqet67" src="https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v2.png" style="
    float: right;
    height: 27px;
    margin-right: 40px;
    margin-top: 9px;
" onclick="location.href = 'notifications';"><img class="psot" src="https://img.icons8.com/ios-glyphs/24/000000/search--v1.png" onclick="location.href = 'search';" style="margin-top: 8px;
    margin-right: 7px;"/><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()" style="left:0;position:absolute;margin-left:10px;margin-top:14px;height:20px;"/><h5 style="font-weight:500;font-family: -apple-system,BlinkMacSystemFont,Roboto,Helvetica,Arial,sans-serif;margin-left:39px;margin-top: 14px;
    font-size: 17px;" id="com">Comments</h5><div class="headers" style="margin-top:12px;">
    </div><br>
<?php
$query = "SELECT * FROM comments WHERE image_url='$y' ORDER BY id DESC";
$comms = mysqli_query($link, $query);
$image = $rowt['imagesData'];
$time = date("M j, Y", strtotime($rowt['time']));
       $query = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='like'";
       $exe = mysqli_query($link, $query);
       $querys = "SELECT * FROM likes WHERE username='$username' AND image='$image' AND action='book'";
       $exes = mysqli_query($link, $querys);
       $querys = "SELECT * FROM likes WHERE image='$image' AND action='like'";
       $exed = mysqli_query($link, $querys);
  echo "<div class='img'><a href='/discover/$rowt[username]' style='text-decoration:none;display:inline-block;'><span style='display:flex;margin-bottom:-4px;margin-top:8px;margin-left:12px;'><img src='uploads/$rowt[avatar]' style='margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;margin-left:3px;margin-top:1.5px;border: 2px solid #eee;'><h5 style='color:black;margin-bottom:2px;margin-top:9.3px;font-size:15px;'>$rowt[username]</h5></span></a>";
if(mysqli_num_rows($exes)) {
echo "<img class='click marked' alt='$rowt[imagesData]' src='bookmark.PNG' style='float:right;margin-top:12px;margin-right:9px;height:24px;'/><br>";
} else {
    echo "<img class='click' alt='$rowt[imagesData]' src='white.PNG' style='float:right;margin-top:12px;margin-right:9px;height:24px;'/><br>";
}
echo "<div style='width:99%;margin-top:7px;'><img class='cla' src='uploads/$rowt[imagesData]' style='width:98%;margin-left:1.4%;object-fit:cover; border-radius: 5px 20px 5px;'><span style='display:flex;margin-left:-24px;margin-top:10px;'>";
  if(mysqli_num_rows($exe)) {
echo "<img class='liked like' id='like' alt='$rowt[imagesData]' src='red.PNG' style='margin-left: 36px;margin-top:1px;object-fit:contain;height:27px;'>"; 
  } else {
   echo "<img id='like' class='like likes' alt='$rowt[imagesData]' src='heart.svg' style='margin-left: 36px;margin-top:2px;object-fit:contain;height:25px;'>";
  }

echo "<img class='comm' src='https://static.thenounproject.com/png/638755-200.png'><h5 id='qpuji' style='font-size:1rem;margin-left:5px;margin-top:2.8px;'>".mysqli_num_rows($comms)."</h5>
    <button class='share' name='$rowt[username]' value='$rowt[imagesData]' style='border:none;background-color:#fff;outline:none;'><img class='shar' style='width:31px;height:31px;margin-left:8px;margin-top:-12.5px;' src='https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/48/000000/external-share-interface-kiranshastry-lineal-kiranshastry-1.png'/></button>
</span><a href='report?report=$rowt[imagesData]'><img src='report.PNG' style='height:26px;float:right;margin-top:-36px;'/></a>";
if(mysqli_num_rows($exed) > 1) {
    echo "<h5 id='$rowt[imagesData]' class='number' style='float: left;margin-left: 9px ;font-weight: 600;font-size:14px;margin-top: 6px ;margin-bottom:10px;'>".mysqli_num_rows($exed)." likes</h5><br></div></div><br><hr style='margin-top:-8px;'>";
} else {
echo "<br></div></div><br><hr style='margin-top:-8px;'>"; 
}
if(mysqli_num_rows($comms) > 159) {
    echo "<div class='body'>";
} else {
        echo "<div class='body'><div class='hidden' style='text-align:center;'><textarea type='text' id='enter' class='enter' placeholder='Add a comment...' maxlength='250' style='outline:none;border-radius:16px;height:40px;border-color:#eee;padding-left: 10px;padding-top: 4px;line-height:1.9;resize:none;'></textarea><div style='
    float: right;'><img class='send' src='https://img.icons8.com/external-flatart-icons-outline-flatarticons/48/000000/external-send-basic-ui-elements-flatart-icons-outline-flatarticons.png' style='transform: rotate(45deg);height: 34px;margin-right: 20px;margin-top:1.5px;margin-left: -7px;opacity:0.6;'></div></div><br>";
}
// comments
if(mysqli_num_rows($comms) > 0) {
    if(mysqli_num_rows($comms) > 1) {
        echo "<div class='content' style='margin-left:10px;'>";
    while($row = mysqli_fetch_assoc($comms)) {
         if($row['username'] == $username) {
echo "<div id='$row[rand]' class='div' style='margin-bottom:20px; border-radius: 5px 20px 5px;border: 2px solid #eee;overflow:auto;'><div style='margin-top:8px;'><a href='/profile' style='display:inline-block;text-decoration:none;'><span style='display:flex;margin-top:4.5px;padding-left:5.5px;margin-bottom:9px;'><img class='lozad' data-src='uploads/$row[prof]' style='height:35px;width:35px;object-fit:cover;border-radius:50%;'><h6 style='margin-left:8px;margin-top:6px;color:#000000d1;'>$row[username]</h6></span></a><img class='delete' id='$row[rand]' style='float: right;margin-top: 3px;height:26px;' src='https://img.icons8.com/external-kiranshastry-solid-kiranshastry/36/000000/external-delete-multimedia-kiranshastry-solid-kiranshastry.png'/><br><div style='margin-top: -9px;margin-bottom: 10px;padding-left:50px;padding-right:7px;'>$row[caption]</div></div></div>";          
    } else {
echo "<div class='div' style='margin-bottom:20px; border-radius: 5px 20px 5px;border: 2px solid #eee;overflow:auto;'><div style='margin-top:8px;'><a href='/discover/$row[username]' style='display:inline-block;text-decoration:none;'><span style='display:flex;margin-top:4.5px;padding-left:5.5px;margin-bottom:9px;'><img class='lozad' data-src='uploads/$row[prof]' style='height:35px;width:35px;object-fit:cover;border-radius:50%;'><h6 style='margin-left:8px;margin-top:6px;color:#000000d1;'>$row[username]</h6></span></a><br><div style='margin-top: -9px;margin-bottom: -15px;padding-left:50px;padding-right:7px;'>$row[caption]</div><a class='reply' id='$row[username]' style='float: right;margin-right: 10px;margin-bottom: 5px;text-decoration:none;color:#2196f3'>Reply</a></div></div>";    
}    
    }
echo "</div>";
} else {
    $row = mysqli_fetch_assoc($comms);
    if($row['username'] == $username) {
echo "<div class='content' style='margin-left:10px;'><div id='$row[rand]' class='div' style=' border-radius: 5px 20px 5px;border: 2px solid #eee;overflow:auto;'><div style='margin-top:8px;'><a href='/profile' style='display:inline-block;text-decoration:none;'><span style='display:flex;margin-top:4.5px;padding-left:5.5px;margin-bottom:9px;'><img class='lozad' data-src='uploads/$row[prof]' style='height:35px;width:35px;object-fit:cover;border-radius:50%;'><h6 style='margin-left:8px;margin-top:6px;color:#000000d1;'>$row[username]</h6></span></a><img class='delete' id='$row[rand]' style='float: right;margin-top: 3px;height:26px;' src='https://img.icons8.com/external-kiranshastry-solid-kiranshastry/36/000000/external-delete-multimedia-kiranshastry-solid-kiranshastry.png'/><br><div style='margin-top: -9px;margin-bottom: 10px;padding-left:50px;padding-right:7px;'>$row[caption]</div></div></div></div><br>";          
    } else {
echo "<div class='content' style='margin-left:10px;'><div class='div' style=' border-radius: 5px 20px 5px;border: 2px solid #eee;overflow:auto;'><div style='margin-top:8px;'><a href='/discover/$row[username]' style='display:inline-block;text-decoration:none;'><span style='display:flex;margin-top:4.5px;padding-left:5.5px;margin-bottom:9px;'><img class='lozad' data-src='uploads/$row[prof]' style='height:35px;width:35px;object-fit:cover;border-radius:50%;'><h6 style='margin-left:8px;margin-top:6px;color:#000000d1;'>$row[username]</h6></span></a><br><div style='margin-top: -9px;margin-bottom: -15px;padding-left:50px;padding-right:7px;'>$row[caption]</div></div><a class='reply' id='$row[username]' style='float: right;margin-right: 10px;margin-bottom: 5px;text-decoration:none;color:#2196f3'>Reply</a></div></div><br>";    
}
}
} else {
}
echo "</div>";
mysqli_close($link);
        ?>
<style>html,body{overflow-x:hidden;position:relative;scroll-behavior: smooth;}@media screen and (max-width:1500px){.img{width:50%;border-radius:5px;border:2px solid #eee;overflow:hidden;margin-left:auto;margin-right:auto;margin-top:-7px;}}@media screen and (max-width:900px){.img{width:60%;}}@media screen and (max-width:500px){.img{width:98%;}}@media screen and (max-width:1500px){.cla{max-height:360px;}}@media screen and (max-width:900px){.cla{max-height:350px;}}@media screen and (max-width:500px){.cla{max-height:350px;}}@media screen and (max-width:350px){.cla{max-height:300px;}}.res{color:#1e90ff;text-decoration:none;}@media screen and (max-width:1500px){.enter{width:50%;}}@media screen and (max-width:500px){.enter{width:75%;}}.comm{height: 40px;margin-left: 10px;margin-top: -6.5px;}.align{display: flex;justify-content: center;}.psot{right: 0; position: absolute;}.headers{border-bottom: 1px solid #eeeeeeb0;width: 104%;
    margin-left: -8px;}.arrow:hover{border-radius: 50%; background: #eee;}@media screen and (max-width:1500px){.div{width:50%;}}@media screen and (max-width:900px){.div{width:53%;}}@media screen and (max-width:500px){.div{width:97.1%;}}</style><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script><script>
function back() {
window.history.back();
}
$(document).ready(function(){
    var uri = "c4c6995edca5c600";var csrf = "csrf";var field = "field";
var post = $(".cla").attr("src");
var posts = post.replace("uploads/", "");
  var body = document.body;
var html = document.documentElement;
body.scrollTop += 140;
html.scrollTop += 140;
$(".reply").click(function() {
    const re = $(this).attr("id");
    var text = $(".enter").val();
    $(".enter").val("@" + re + " " + text);
    reply();
    window.scrollTo({top: 0, behavior: 'smooth'});
});
$(".enter").on("change keyup input",function () {
    let val = $(".enter").val();
    let res = val.trim();
    if(res == "") {
        $(".send").css("opacity", "0.6");
    } else if(val.length < 4){
        $(".send").css("opacity", "0.6");
        $("#com").text('Minimum 5 letters to comment...');
    } else {
        $(".send").css("opacity", "1");
    }
});
function reply() {
    let val = $(".enter").val();
    let res = val.trim();
    if(res == "") {
        $(".send").css("opacity", "0.6");
    } else {
        $(".send").css("opacity", "1");
    }
}
    $(".send").click(function () {
        if( $(".send").css('opacity') == '1') {
    let val = $(".enter").val();
    let res = val.trim();
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"text": res, "image": posts, "uri": uri, csrf: csrf, field: field},
    success:function(result) {
        if(result == "MAX number of comments...") {
            $(".enter").val("");
        $(".enter").attr("placeholder", "MAX number of comments...");    
        } else {
window.location.reload();
        }
    },
     error: function() {
    $(".enter").attr("placeholder", "An unknown error occurred...");
       }
});
        } else {
        }
    });
$(".delete").click(function() {
    const i = $(this).attr("id");
    if(window.confirm("Are you sure you want to delete this comment?")) {
        $('#' + i).hide();
        var avic = $("#qpuji").text();
        avic = avic - 1;
        $("#qpuji").text(avic);
        $.ajax({
    url:'func.php',
    method:'POST',
    data:{"delete": i, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
   $('#' + i).remove();
    },
     error: function() {
    $('#' + i).show();
       }
})    
    } else {
        
    }
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
const observer = lozad();
observer.observe();
});
function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script></body></html>