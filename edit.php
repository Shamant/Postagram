<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$username = $_COOKIE['id'];
$username_err = "";
require_once "signup.php";
ob_start( 'ob_gzhandler' );
$sql_5 = "SELECT * FROM users WHERE username='$username'";
$rsd = mysqli_query($link, $sql_5);
$kaza = "https://postagram.in/discover/".$username;
$ohmgs = "SELECT * FROM avatar WHERE username='$username'";
$shells = mysqli_query($link, $ohmgs);
$lets = mysqli_fetch_assoc($shells);
$cookie = $lets['type'];
if(!isset($_COOKIE['avatar'])){
    $ohmg = "SELECT * FROM avatar WHERE username='$username'";
$shell = mysqli_query($link, $ohmg);
$let = mysqli_fetch_assoc($shell);
$cook = $let['prof'];
setcookie("avatar", $cook, time()+365*24*60*60);
}
$cute = $_COOKIE['avatar'];
if(mysqli_num_rows($rsd) == 0) {
header("Location: logout.php");
} else {
    
}
$p_err = " ";
$r = " ";
$x = " ";
$delete = 'uploads/'.$cute;
  if (isset($_POST['change']) && isset($_FILES['ima'])) {
    $img_name = $_FILES['ima']['name'];
	$img_size = $_FILES['ima']['size'];
	$tmp_name = $_FILES['ima']['tmp_name'];
	$error = $_FILES['ima']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
$post_err = "Your file is too large.";
        }else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "gif", "jfif", "tiff"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				unlink($delete);
function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        $exif = exif_read_data($source_url);
                 if($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($source_url);
 } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source_url);
        } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);
        }
    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
                
            case 6:
                $image = imagerotate($image, -90, 0);
                break;
                
            case 8:
                $image = imagerotate($image, 90, 0);
                break;
                
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
        }
        
        imagejpeg($image, $destination_url, $quality);
        imagedestroy($image);
    } else {
        imagejpeg($image, $destination_url, $quality);
        imagedestroy($image);
    }
    }
				$sql = "UPDATE avatar SET prof = '$new_img_name' WHERE username = '$username' ";
				mysqli_query($link, $sql);
                $sqls = "UPDATE posts SET avatar = '$new_img_name' WHERE username = '$username' ";
				mysqli_query($link, $sqls);
                $sqls1 = "UPDATE comments SET prof = '$new_img_name' WHERE username = '$username' ";
				mysqli_query($link, $sqls1);
				$sqls2 = "UPDATE answers SET prof = '$new_img_name' WHERE username = '$username' ";
				mysqli_query($link, $sqls2);
				$sqls3 = "UPDATE questions SET avatar = '$new_img_name' WHERE user = '$username' ";
				mysqli_query($link, $sqls3);
				$filename = compress_image($tmp_name, $img_upload_path, 35);
				$tortu = "avatar";
				setcookie($tortu, $new_img_name, time()+365*24*60*60, "/");
				header("Location: /profile");
            }else {
				$post_err = "You cannot upload these types of files";
			}
		}
	}else {
		$post_err = "An unknown error occured";
	}

}
// info update starts from here
if(isset($_POST['changepassword'])){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
    $df = mysqli_real_escape_string($link, $_POST['news']);
    $df = str_replace("<", "&lt;", $df);
    $df = str_replace(">", "&gt;", $df);
    if($df != $username) {
    if(empty($_POST["news"])) {
        $username_err = "Please Fill Out The Field.";
        $r = " ";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = mysqli_real_escape_string($link, $_POST["news"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
            $usernames = mysqli_real_escape_string($link, $_POST["news"]);
            $usernames = str_replace("<", "&lt;", $usernames);
            $usernames = str_replace(">", "&gt;", $usernames);
            $r = "";
if(empty($_POST['newss'])) {
    $ins = mysqli_real_escape_string($link, $_POST['newss']);
    $ins = " ";
    $x = " ";
    $r = "";
} else {
    $ins = mysqli_real_escape_string($link, $_POST['newss']);
    $ins = str_replace("<", "&lt;", $ins);
    $ins = str_replace(">", "&gt;", $ins);
    $x = "";
    $r = "";
}      }
            } else{
$username_err = "Oops! Something went wrong. Please try again later.";
            }
        }
    }
} else {
    if(empty($_POST['newss'])) {
        $p_err = " ";
        $ins = "";
                $x = "";
        $r = " ";
    } else {
        $ins = mysqli_real_escape_string($link, $_POST['newss']);
        $ins = str_replace("<", "&lt;", $ins);
        $ins = str_replace(">", "&gt;", $ins);
        $x = "";
        $r = " ";
    }
}
// start updating 
$pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="tag.php/tag=$1" style="color: #007bff;">#$1</a>', 
             '<a class="res" href="discover.php?search=$1 style="color: #007bff;"">@$1</a>');
$ins = preg_replace($pat, $rep, $ins);
$url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
$ins = preg_replace($url, '<a class="res" target="_blank" href="$0 " style="color: #007bff;"> $0</a>', $ins);
if(empty($r) && empty($x)) {
    $query = "UPDATE users
    SET status='0'
    WHERE username='$username'";
mysqli_query($link, $query);
sleep(1);
    $sql = "UPDATE users
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql);

$sql1 = "UPDATE avatar
    SET username='$usernames',
    type = '$ins'
    WHERE username='$username'";
mysqli_query($link, $sql1);

    $sql_2 = "UPDATE posts
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql_2);

$sql_3 = "UPDATE following
    SET userid='$usernames'
    WHERE userid='$username'";
mysqli_query($link, $sql_3);
$sql_8 = "UPDATE following
    SET following_id='$usernames'
    WHERE following_id='$username'";
mysqli_query($link, $sql_8);
$sql_4 = "UPDATE followers
    SET followerid='$usernames'
    WHERE followerid='$username'";
mysqli_query($link, $sql_4);
$sql_9 = "UPDATE followers
    SET userid='$usernames'
    WHERE userid='$username'";
mysqli_query($link, $sql_9);
$sql_5 = "UPDATE comments
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql_5);
header("Location: logout.php");
}
if(!empty($r) && empty($x)) {
    $sql12 = "UPDATE avatar
    SET type='$ins'
    WHERE username='$username'";
mysqli_query($link, $sql12);
header("Location: /profile");
}

if(!empty($x) && empty($r)) {
    $query = "UPDATE users
    SET status='0'
    WHERE username='$username'";
mysqli_query($link, $query);
sleep(1);
    $sql = "UPDATE users
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql);

$sql1 = "UPDATE avatar
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql1);

    $sql_2 = "UPDATE posts
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql_2);

$sql_3 = "UPDATE following
    SET userid='$usernames'
    WHERE userid='$username'";
mysqli_query($link, $sql_3);
$sql_8 = "UPDATE following
    SET following_id='$usernames'
    WHERE following_id='$username'";
mysqli_query($link, $sql_8);
$sql_4 = "UPDATE followers
    SET followerid='$usernames'
    WHERE followerid='$username'";
mysqli_query($link, $sql_4);
$sql_9 = "UPDATE followers
    SET userid='$usernames'
    WHERE userid='$username'";
mysqli_query($link, $sql_9);
$sql_5 = "UPDATE comments
    SET username='$usernames'
    WHERE username='$username'";
mysqli_query($link, $sql_5);
header("Location: logout.php");
}
}
?><!DOCTYPE html><html><head><title>Edit Profile</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script></head><body><center>
    <?php 
        if(!empty($username_err)){
            echo '<div class="alert alert-danger alerts">' . $username_err . '</div>';
            echo '<br>';
        } else {
            ?>
<img src="https://img.icons8.com/material-rounded/48/000000/back--v1.png" style="left:0;position:absolute;height:32px;margin-top:6px;" onclick="location.href = 'profile';"/><br><h6 class="d" align="center">Edit Profile</h6><hr><br>
            <?php
        }             
        ?>
</center>
<form action="" method="POST" enctype="multipart/form-data"><center>
<label for="file-input" class="btng"><img class="overlay" src="https://img.icons8.com/ios/32/000000/plus--v1.png"/></label>
    <input id="file-input" type="file" id="select" class="d" name="ima" accept="image/*" style="visibility: hidden;" onchange="loadFile(event)" />
<br><img class="av" id="output" src="uploads/<?=$cute?>"><h5><?php echo $username;?></h5><input type="submit" class="avtar btn" id="ko" value="Change" name="change"></center></form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"><h6 class="l lpg">Name</h6><input type="text" class="form-control lpg" name="news" maxlength='50' id="z" value="<?php echo $username; ?>"><span class="invalid-feedback lpg"><?php echo $username_err; ?></span>
    <div class="j lpg">Help people discover your account by your username.</div>
    
    <br><h6 class="g lpg">Info</h6><textarea class="form-control lpg" name="newss"><?php echo strip_tags($cookie); ?></textarea><span class="invalid-feedback lpg"><?php echo $username_err; ?></span>
    <div class="js lpg">Help people learn about you.</div>
    <br><input type="submit" class="btn lpg" id="b" value="Submit" name="changepassword"></form><br><h6 class="f lpg" id="kuch">Share</h6><textarea class="form-control xc lpg" id="uio" readonly><?php echo $kaza; ?></textarea><button onclick="myFunction()" class="cot lpg" id="a">Copy</button><button class="cot lpg" id="share" style="margin-left:16px;">Share</button><div class='error' style='width:220px;background:#4caf50;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;opacity:0;'>Copied To Clipboard!</div><br><br><br><br><style>
.form-control{width:75%;border-color:#5px gray}#t{height:6%;width:50%}.g{margin-top:9px;margin-left:6.01%}textarea{margin-left:6%}.d{font-family:sans-serif;font-size:19px;margin-bottom:16px}.js{color:rgba(var(--f52,142,142,142),1);font-size:12px;padding-left:6%;margin-bottom:-20px;letter-spacing:.025em;font-family:Roboto,Arial,sans-serif;padding-top:5px}.j{color:rgba(var(--f52,142,142,142),1);font-size:12px;letter-spacing:.025em;font-family:Roboto,Arial,sans-serif;padding-left:6%;padding-top:5px}.l{margin-left:6%;margin-bottom:-14px;margin-top:-42px}.fg{color:#ff0800;font-family:sans-serif;background-color:#fff;margin:1px 0;border:0}#z{margin-left:6%;margin-top:24px}.btn{height:30px;color:#fff;background-color:#1e90ff;line-height:2px;width:75px;margin-left:6.7%;margin-top:24px}.row{display:flex;margin-left:-2px}.alerts{color:#fff;background-color:red}.psot{margin-left:13px;height:27px;margin-bottom:-2px}.d{margin-top:-12px;font-size:17px}.av{height:110px;width:110px;object-fit:cover;border-radius:50%;margin-top:-64px;margin-bottom:10px}hr{margin-top:-9px}.jh{margin-top:-12px;height:24px;left:0;position:absolute;margin-left:10px}h5{margin-top:-4px}body{background-color:#80808001;min-height:99vh;position:relative;}.f{margin-left:7%}.xc{margin-left:7%;margin-top:12px}.form-control:disabled,.form-control[readonly]{background-color:#fff;opacity:1}.cot{width:75px;color:#fff;background-color:#1e90ff;border:none;margin-top:18px;height:32px;margin-left:7.4%;border-radius:4px}@media screen and (max-width:1500px){.overlay{margin-left:208px;height:27px;position:absolute;margin-top:-30px}}@media screen and (max-width:325px){.overlay{margin-left:38px;height:27px;position:absolute;margin-top:-15px}}.btn:hover{color:#fff}.avtar{visibility:hidden;height:35px;color:#fff;background-color:#1e90ff;width:80px;margin-left:2px}</style><script> 
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
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
      document.getElementById("ko").style.visibility = "visible";
      document.getElementById("output").style.objectFit = "cover";
      document.getElementById("ko").style.marginBottom = "45px";
      document.getElementById("ko").style.marginTop = "3px";
      document.getElementById("a").style.visibility = "hidden";
      document.getElementById("b").style.visibility = "hidden";
      document.getElementById("kuch").style.marginTop = "-65px";
      [].forEach.call(document.querySelectorAll('.lpgs'), function (el) {
  el.style.visibility = 'hidden';
});
    }
  };
function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
var value = readCookie('id');
const store = "'s Profile" + "(@" + value + ")";
function myFunction(){
var a = document.getElementById("uio");
a.select();
a.setSelectionRange(0,99999);
document.execCommand("copy");
window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    $(".error").animate({opacity: 1}, 1000);
        setTimeout(function () {
   $(".error").animate({opacity: 0}, 1000);
    }, 2500);
}
 document.querySelector('#share')
        .addEventListener('click', event => {
            if (navigator.share) {
                const v = document.getElementById("uio").value;
                navigator.share({
                    title: value + store,
                    url: v
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
        })
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