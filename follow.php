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
$sql = "SELECT *
FROM avatar
JOIN following
ON (following_id='$username' AND userid=username)
WHERE following.verfied='1'
ORDER BY avatar.id DESC";
$result = mysqli_query($link, $sql);
 if(!isset($_COOKIE['avatar'])){
    $ohmg = "SELECT * FROM avatar WHERE username='$username'";
$shell = mysqli_query($link, $ohmg);
$let = mysqli_fetch_assoc($shell);
$cook = $let['prof'];
setcookie("avatar", $cook, time()+365*24*60*60);
}
$cute = $_COOKIE['avatar'];
?>
<!DOCTYPE html>
<html lang=""><head><meta charset="utf-8"><base href="/"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Followers</title><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><base href="/"></head><body>
<img src="https://img.icons8.com/material-rounded/36/000000/back--v1.png" style="left:0;position:absolute;height:25px;margin-top:-3px;" onclick="location.href = 'profile.php';"/><h5 class="people">Followers</h5><hr style="border: 0;border-top: 1px solid rgba(0,0,0,.1);margin-right: -8px;margin-left: -8px;margin-top:-14px;">
<?php
if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {  
            $naf = $row['username'];
            $xy = "/discover/".$naf;
            ?>
<div class="test"><span class="row"><a href="<?php echo $xy; ?>"><img class="lozad" data-src="uploads/<?=$row['prof']?>"></a><?php $raw = $row['username']; ?><h5 class="see"><?php echo $raw; ?></h5><br><button class="deletes elon" value="<?php echo $naf ?>">Decline</button></span></div>
       <?php 
        }
 echo "<h6 class='pl'>Suggestions</h6>";
 } else {   
 echo "<br><center><img class='l' src='https://img.icons8.com/pastel-glyph/64/000000/person-male--v2.png'/></center><h5 class='g'>When people follow you, you can see who you are following here.</h5><h6>Suggestions</h6>";
    }
        ?>
<br><style>.row{display:flex}.lozad{margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;border: 2px solid #eee;}.deletes{height:25px;width:60px;border-radius:3px;background-color:#fff;margin-top:1px;right:0;position:absolute;border:none;background-color:#0000ffb0;color:#fff}.test{position:relative}body{font-family:sans-serif}.l{margin-left:24px}.see{margin-top:10px}.people{margin-top:11px;text-align:center;color:#0000ffb0;font-size:14px;}.pl{font-size:.75em;color:#202020;margin-top:-2px}h6{font-size:.75em;color:#202020}.g{margin-left:auto;margin-right:auto;width:16em;margin-top:2px;color:#202020;font-size:.75em;text-align:center}
</style><script>document.addEventListener('contextmenu', event => event.preventDefault());
const observer = lozad();
observer.observe();

$(document).ready(function(){
var uri = "c4c6995edca5c600";
var csrf = "csrf";
var field = "field";
$('.deletes').on('click', function(){
    const c = $(this).val();
 if ($(this).hasClass('elon')) {
     if (confirm("Are you sure you want to remove " + c + " as a follower?")) {
          $(this).text('Allow');
        $(this).removeClass("elon");
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"follow": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
  
    },
     error: function() {
    $(this).addClass("elon");
   $(this).text('Decline');  
       }
})
        } else {
        }
    } else {
      $(this).text('Decline');
      $(this).addClass("elon");
     $.ajax({
    url:'func.php',
    method:'POST',
    data:{"refollow": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
        $(this).text('Allow');
      $(this).removeClass("elon");
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
window.location.replace("/login");
    }
    },
     error: function() {

       }
});
}, 900);
});
</script></body></html>