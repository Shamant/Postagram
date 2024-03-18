<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
require_once "signup.php";
$username = $_COOKIE['id'];
ob_start( 'ob_gzhandler' );
$x = $_GET['user'];
$sql = "SELECT * FROM following WHERE userid='$x' AND verfied='1'";
$res = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="ie=edge"><base href="/"><title><?php echo $x ?>'s Following</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet"/><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head>
<body><ol class="menu">
        <h5 class="people"><?php echo $x; ?>'s following</h5>
       </ol><br><br><br>
        <?php
            if(mysqli_num_rows($res)) {
$sqls = "SELECT *
FROM avatar
JOIN following
ON (userid='$x' AND following_id=username)
WHERE following.verfied='1'
ORDER BY avatar.id DESC";
$query = mysqli_query($link, $sqls);
            while($h = mysqli_fetch_assoc($query)) {
                $vh = "discover.php?search=".$h['username'];
            ?>
            <span class="row">
<a href="<?php echo $vh; ?>"><img class="lozad" data-src="uploads/<?=$h['prof']?>" alt="Image"></a><h5 class="see"><?php echo $h['username']; ?></h5></span><br>
            <?php
            }
                } else {
                    ?>
<br><center><img class="l" src="https://img.icons8.com/pastel-glyph/64/000000/person-male--v2.png"/></center><h5 class="g">When this users follow people, you can see who this user is following here.</h5><h6>Suggestions</h6>
                <?php
                }
        ?>
<style>body{font-family:sans-serif}.lozad{margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box}.see{margin-bottom:2px;margin-top:9px;font-size:15px;font-family:sans-serif}.row{display:flex;margin-top:-18px}h6{font-size:.75em;color:#202020}.g{margin-left:auto;margin-right:auto;width:16em;text-align:center;margin-top:2px;color:#202020;font-size:.75em}.l{margin-left:24px}.menu{width:100%;position:fixed;top:0;margin-top:-20px;margin-left:-24px;left:0;border-bottom:1px solid silver;background-color:#fff;height:50px}.people{margin-top:27.5px;text-align:center;color:#1e90ff;font-size:14px;margin-left:-5%;}</style><script>document.addEventListener('contextmenu', event => event.preventDefault());
const observer = lozad();
observer.observe();
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