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
$query = "SELECT * FROM following WHERE userid='$username' AND verfied='1' ORDER BY id DESC";
$resul = mysqli_query($link, $query);
?>
<html lang=""><html><head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><title>Postagram</title><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script></head>
<body><img src="https://img.icons8.com/material-rounded/36/000000/back--v1.png" style="left:0;position:absolute;height:25px;margin-top:-3px;" onclick="location.href = 'profile.php';"/><h5 class="people">Following</h5><hr style="border: 0;border-top: 1px solid rgba(0,0,0,.1);margin-right: -8px;margin-left: -8px;margin-top:-15px;">
<?php
if(mysqli_num_rows($resul) > 0) {
$sql = "SELECT *
FROM avatar
JOIN following
ON (userid='$username' AND following_id=username)
WHERE following.verfied='1'
ORDER BY avatar.id DESC";
$result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_assoc($result)) {  
            $naf = $row['username'];
            $xy = "discover.php?search=".$naf;
            ?>
<span class="row"><a href="<?php echo $xy; ?>"><img class="lozad" data-src="uploads/<?=$row['prof']?>"></a><h5 class="see"><?php echo $row['username']; ?></h5><br><button class="deletes elon" value="<?php echo $naf; ?>">Following</button></span><br>
       <?php 
        }
    echo "<h6 class='pl'>Suggestions</h6>";
    } else {   
echo "<br><br><center><img class='l' src='https://img.icons8.com/pastel-glyph/64/000000/person-male--v2.png'/></center><h5 class='g'>When you follow people, you can see who you are following here.</h5><h6>Suggestions</h6>";
    }
                     ?>
<style>html,body{font-family:sans-serif}.lozad{margin-right:10px;height:36px;width:36px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;border: 2px solid #eee;}h6{font-size:.75em;color:#202020}.pl{font-size:.75em;color:#202020;margin-top:-2px}.g{margin-left:auto;margin-right:auto;width:16em;margin-top:2px;color:#202020;font-size:.75em;text-align:center}.deletes{margin-top:1px;right:5px;position:absolute;height:25px;width:70px;border-radius:4px;border-style:solid;border-width:1px;font-size:12px;font-weight:600;border:none;background-color:#0000ffb0;color:#fff}.see{margin-bottom:2px;margin-top:10px;font-size:15px}.l{margin-left:24px}.row{display:flex}.people{margin-top:2px;text-align:center;color:#0000ffb0;font-size:14px;}
</style><script>document.addEventListener('contextmenu', event => event.preventDefault());
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
$('.deletes').on('click', function(){
    const c = $(this).val();
 if ($(this).hasClass('elon')) {
     if(confirm("Are you sure you want to unfollow " + c + "?")) {
          $(this).removeClass("elon");
   $(this).text('Follow');
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"unfollow": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
        $(this).text('Following');
      $(this).addClass("elon");
       }
})    
     } else {
     }
} else if($(this).hasClass('elons')) {
    $.ajax({
    url:'func.php',
    method:'POST',
    data:{"request": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
       $(this).val('Requested');   
       $(this).addClass("elon");
       $(this).removeClass("elons");
    },
     error: function() {
       alert("An error occured");   
       }
})
    } else {
           $(this).text('Following');
      $(this).addClass("elon");
     $.ajax({
    url:'func.php',
    method:'POST',
    data:{"public": c, "uri": uri, csrf: csrf, field: field},
    success:function(data) {
    },
     error: function() {
      $(this).text('Follow');
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