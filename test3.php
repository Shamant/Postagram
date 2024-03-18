<?php
if(!isset($_COOKIE['loggedin'])){
    header("location: index.php");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
?>
<html lang="en"><head><title>New Post</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"></head><body><img class="arrow" src="https://img.icons8.com/fluency-systems-filled/48/000000/long-arrow-left.png" onclick="location.href = 'post.php';"/><h6 id="p">New Post</h6><form action="" method="POST"><input type="submit" id="uy" class="hg" name="subm" value="Post" required><br><hr class="hr"><br><br><center><img id="output" class="avatar"><hr class="hrs"></center><h5 class="name"><?php echo $username;?></h5><br><br><center><textarea class='hu' id='l' name='input' maxlength='220' placeholder="Title"></textarea><br><hr class="df"><br></center><h5 id="na" class="name">Categories</h5><br><div class="tech av Tech">Tech </div><div class="tech Art">Art</div><div class="tech avs Fashion" id="fs">Fashion </div><div class="tech Family" id="fs">Family </div><div class="tech av DIY" id="hs">DIY </div><div class="tech Music">Music </div><div class="tech avs Wedding">Wedding </div><div class="tech Space">Space </div><div class="tech av Travel">Travel </div><div class="tech Nature">Nature </div><div class="tech avs Lifestyle">Lifestyle </div><div class="tech Books">Books </div><div class="tech av Food">Food </div><div class="tech Party">Party </div><div class="tech avs Comedy">Comedy </div><div class="tech Cars">Cars </div><div class="tech av Sports">Sports </div><div class="tech Love">Love </div><div class="tech avs History">History </div><div class="tech Vista">Vista </div><div class="tech av Science">Science </div><div class="tech Service">Service </div><div class="tech avs Finance">Finance </div><div class="tech Animals">Animals </div></form><hr><style>html, body { max-width: 100%; overflow-x: hidden; }@media screen and (max-width:1500px){.avatar{width:300px;height:300px;border-radius:7px;object-fit:cover;margin-top:-33px;}}@media screen and (max-width:900px){.avatar{width:320;height:320px;border-radius:7px;object-fit:cover;margin-top:-5%;}}@media screen and (max-width:550px){.avatar{width:90%;height:270px;border-radius:7px;object-fit:cover;margin-top:-10%;}}.arrow{left:0;position:absolute;margin-left:10px;top:12;height:21px}.hg{right:0;position:absolute;margin-right:7px;height:30px;border:none;background-color:#5d00ffd9;color:#fff;border-radius:5px;width:70px;top:5;padding-bottom:2.5px;}h6{left:0;position:absolute;margin-left:55px;top:11;font-size:18px;}.name{left:0;position:absolute;margin-top:2px;margin-left:5%;font-size:16px;}.hu{width:90%;border-radius:4px;border-color:#fff;height:105px;text-align:left;margin-top:-15px;margin-left:-2px;}textarea{outline:none}.df{margin-bottom:-12px;}.tech{margin-top:12px;margin-left:6%;border-radius:16px;background:#e9ecef;width:60px;text-align:center;height:30px;line-height:1.9;display:inline-block;}.row{display:flex;}button{outline:none;}#fr{visibility:hidden;margin-top:50px;margin-bottom:-50px;}</style><script>window.onload=function(){window.location.hash||(window.location=window.location+"#post",window.location.reload())};
const image = localStorage.getItem("img");
const angle = localStorage.getItem("angle");
const g = localStorage.getItem("allow");
const angles = "rotate(" + angle + "deg)";
const t = localStorage.getItem("file");
$('.avs').css('width','69px');
if(image) {
     if(angle) {
    var y = document.getElementById("output");
    y.src = image;
    document.getElementById("output").style.transform = angles;
    height = $(window).innerWidth();
    if(height > 500) {
    } else {
    const width = height/1.11;
    $('.avatar').css('height',width);
    localStorage.setItem("angle", "0");
    }
    var o = angle;
    o = o.replace("rotate(", "");
    o = o.replace("deg)", "");
    localStorage.setItem("angle", o);
     } else {
     var y = document.getElementById("output");
    y.src = image;
    var o = 0;
     }
 } else {
     window.location="post.php";
 }
$('.tech').click(function() {
    var text = $(this).text();
    if($(this).hasClass( "te" )) {
     $(this).removeClass("te");   
    $(this).css("background","#e9ecef");
  $(this).css("color","black");
} else {
    var xs = $('.te').length;
        if(xs > 4) {
       document.getElementById("na").innerHTML = "Select Categories: LIMIT 5";
        } else {
    $(this).css("background","black");
    $(this).css("color","white");
    $(this).addClass("te");
  document.getElementById("na").innerHTML = "Selected Categories";
        }
}
});
$('#uy').click(function() {
var quantity = $(".te").text();
var xss = $('.te').length;
        if(xss == 0) {
           document.getElementById("na").innerHTML = "Please Select A Category";
        } else {
var find = $(".te").text();
var input = $(".hu").val();
$.ajax({
    url:'uploads.php',
    method:'POST',
    data:{"image": image},
    success:function(data) {
      
    },
     error: function() {
       document.getElementById("p").innerHTML = "An error occured.";   
       }
})
        }
});
</script></body></html>