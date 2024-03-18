<?php
if(!isset($_COOKIE['id'])) {
    header("Location: /login");
    exit;
}
require_once "signup.php";
$username = $_COOKIE['id'];
$cute = $_COOKIE['avatar'];
$dgh = "SELECT * FROM request WHERE receiver LIKE '{$username}%' AND seen!='1' AND sender!='Postagram' ORDER BY id DESC"; 
$rht = mysqli_query($link, $dgh);
$numrows = mysqli_num_rows($rht);
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><title>Menu</title></head><body>
    <br><br><center><img class="prof" src="uploads/<?=$cute?>"></center><h5 class="see">Hi, <?php echo $username; ?>!</h5><h3>What are you</h3><h5 class="ce"> looking for?</h5><br><div class="bord"><a href="/notifications"><img class="not" src="https://img.icons8.com/external-becris-lineal-becris/48/000000/external-notification-mintab-for-ios-becris-lineal-becris.png"><h4 class="n">Notifications</h4></a><a href="groups.php"><img class="g" src="https://img.icons8.com/ios/50/000000/send-comment.png"><h4 class="n">Community</h4><a href="/audio"><img class="vid" src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/48/000000/external-media-video-production-flatart-icons-outline-flatarticons.png"/><h4 class="vids">Audio</h4></a><a href=".php"><img class="de" src="https://img.icons8.com/ios-glyphs/48/000000/test-account.png"/><h4 class="hu">Profiles</h4></a></div>
<style>body{background-color:#ffc107;font-family:sans-serif;}
.see{font-size:23px;margin-top:20px;margin-left:10px;text-align:center;}h3{text-align:center;margin-top:22px;}.ce{font-size:1.75rem;text-align:center;}.prof{height:90px;width:90px;border-radius:50%;object-fit:cover;margin-top:-12px;margin-left:4px;}.bord{width:100%;padding:10px;right:-10px;background-color:#fff;border-top-left-radius:17px;border-top-right-radius:17px;border-bottom-left-radius:0;border-bottom-right-radius:0;height:64.8vh;margin-top:-15px;}.not{margin-top:25px;margin-left:25%;}.n{margin-left:15%;margin-top:15px;}.g{margin-left:25%;margin-top:65px;}.vid{right:0;position:absolute;margin-right:15%;margin-top:-262px;height:44px;}.vids{right:0;position:absolute;margin-right:11%;margin-top:-203px;}.de{right:0;position:absolute;margin-right:15%;margin-top:-106px;height:54px;}.hu{right:0;position:absolute;margin-right:11%;margin-top:-39px;}a{text-decoration:none;color:black;}a:hover{text-decoration:none;color:black;}</style><script>
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
</script></body></html>