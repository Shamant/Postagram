<?php
if($_POST['user'] == "cce4560po") {
require_once "signup.php";
$username = $_COOKIE['id'];
$searchTerm = mysqli_real_escape_string($link, $_POST['query']);
$searchTerm = str_replace("<", "&lt;", $searchTerm);
$searchTerm = str_replace(">", "&gt;", $searchTerm);
$searchTerm = trim($searchTerm);
$check = mysqli_real_escape_string($link, $_POST['type']);
$check = str_replace("<", "&lt;", $check);
$check = str_replace(">", "&gt;", $check);
$check = trim($check);
if($check == "acc") {
    if($searchTerm == "") {
} else {
ob_start( 'ob_gzhandler' );
$word ="IMG";
$result = "SELECT * FROM avatar WHERE username!='$username' AND username LIKE '{$searchTerm}%' ORDER BY rand() LIMIT 10";
$sql = mysqli_query($link, $result);
if(!mysqli_num_rows($sql)) {
    ?>
       <br><center><img class='sd' src='no.png' style='margin-top:-60px;'/><br><br><h6 class="kls" style="margin-top:-20px;font-weight: 400;">Results not found.</h6></center>
    <?php
} else {
while ($row = mysqli_fetch_assoc($sql)) {
    for ($i=0; $i<4; $i++) {
    for ($j=0; $j<4; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<4; ++$j) {
        pclose($pipe[$j]);
    }
}
    $x = $row['username'];
    $image = $row['prof'];
    $know = "/discover/".$x;
    ?>
  <a href="<?php echo $know; ?>" tabindex=0 style="outline:none;"><div class="select" style="margin-left:215px;"><img class="avatar" src="uploads/<?=$row['prof']?>"><h6 class="list-group-item"><?php echo $x; ?></h6></div></a><br><br>
    <?php
    }
}
?>
<!DOCTYPE html><html lang="en"><head><base href="/"></head><body><style>.list-group-item{margin-left:-175px;border:none;color:#000;margin-top:-47px;margin-bottom:7px;font-weight:450}.avatar{margin-left:-220px;height:45px;width:45px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;padding:1px;border:2px solid #eee}.select{margin-top:-30px}a:link{text-decoration: none!important;cursor: pointer;}</style><script>
document.addEventListener("keydown", function (e) {
    e.ctrlKey && e.preventDefault();
});</script></body></html>
    <?php
}
} else {
    $result = "SELECT * FROM posts WHERE caption LIKE '{$searchTerm}%' ORDER BY rand() LIMIT 10";
$sql = mysqli_query($link, $result);
if($searchTerm == "") {
    ?>
    <br><center><img class='sd' src='no.png'/><br><br><h6 class="kl" style="margin-top:-20px;text-align:center;font-weight: 400;">Enter Keywords To Search For Posts</h6>
    <?php
} else {
    if(!mysqli_num_rows($sql)) {
    ?>
       <br><center><img class='sd' src='no.png'/><br><br> <h6 class="kl" style="margin-top:-20px;text-align:center;font-weight: 400;">Results not found.</h6>
    <?php
} else {
while ($row = mysqli_fetch_assoc($sql)) {
    $new = "SELECT * FROM following WHERE userid='$username' AND following_id='$row[username]'";
    $jup = mysqli_query($link, $new);
    $rui = mysqli_fetch_assoc($jup);
    for ($i=0; $i<4; $i++) {
    for ($j=0; $j<4; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<4; ++$j) {
        pclose($pipe[$j]);
    }
}
if($row['tyr'] == 'private' && $rui['verfied'] != '1' && $row['username'] != $username) {
    } else {
    $know = "view_posts?image=".$row['imagesData']."&search=".$row['username'];
 echo "<a href='$know' tabindex=0 style='outline:none;'><img class='lozad' data-src='uploads/$row[imagesData]'></a>";  
    }
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head><base href="/"></head><body><style>a:link{text-decoration:none!important;cursor:pointer}.list-group-item:hover{outline:none}.list-group-item{border:none;color:#000;margin-top:-47px;margin-bottom:7px;font-weight:450}.avatar{margin:auto;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;padding:1px;border:2px solid #fff}.select{margin-top:-30px}@media screen and (max-width:1500px){.lozad{height:310px;object-fit:cover;float: left;  width: 32%; margin-right:2px; margin-bottom:11px;margin-top:-6px;border-radius:1px;margin-left:5px}}@media screen and (max-width:900px){.lozad{height:170px;float: left;width: 32%; margin-right:1px;margin-top:-6px;margin-bottom:10px; object-fit: cover;border-radius:1px;margin-left:3px}}@media screen and (max-width:550px){.lozad{height:105px;object-fit:cover;float: left;width: 33%; margin-right:0.5px; margin-bottom:9px;margin-top:-8px;border-radius:1px;margin-left:0px;}}</style><script>
document.addEventListener("keydown", function (e) {
    e.ctrlKey && e.preventDefault();
});</script></body></html>
    <?php
}
mysqli_close($link);
} else {
    
}
?>