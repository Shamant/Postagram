<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
require_once "signup.php";
$username = $_COOKIE['id'];
$email = $_COOKIE['rand'];
if(!isset($_COOKIE['changed'])) {
    header("Location: /verify");
}
$npassword = $cpassword = "";
$password_err = "";
$pass = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
if(trim(empty($_POST["new"]))) {
    $password_err = "Enter a new password";
    $pass = "Password Error";
 } elseif(strlen(trim($_POST["new"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
        $pass = "Password Error";
} else {
    $npassword = mysqli_real_escape_string($link, $_POST['new']);
    $npassword = str_replace("<", "&lt;", $npassword);
    $npassword = str_replace(">", "&gt;", $npassword);
    $npassword = trim($npassword);
}
if(empty($_POST["npr"])) {
    $password_err = "Please enter a password";
    $pass = "Password Error";
} else {
    $cpassword = mysqli_real_escape_string($link, $_POST['npr']);
    $cpassword = str_replace("<", "&lt;", $cpassword);
    $cpassword = str_replace(">", "&gt;", $cpassword);
    $cpassword = trim($cpassword);
    if(empty($password_err) && ($npassword != $cpassword)){
        $password_err = "Passwords did not match";
        $pass = "Password Error";
    }
}
if(empty($password_err)) {
    $sq = "SELECT * FROM users WHERE email='$email'";
    $rest = mysqli_query($link, $sq);
    $pas = mysqli_fetch_assoc($rest);
    if(password_verify($npassword, $pas['password'])) {
        $password_err = "This password is already in use";
        $pass = "Password Error";
    } else {
            $password = password_hash($npassword, PASSWORD_DEFAULT);
    $sql1 = "UPDATE users
    SET status='0'
    WHERE email='$email'";
mysqli_query($link, $sql1);  
sleep(1);  
    $sql_2 = "UPDATE users
              SET password='$password'
              WHERE email='$email'";
    mysqli_query($link, $sql_2);
    $password_err = "Password changed";
    $pass = "Password Updated";
    setcookie("changed", "", time() - 3600);
    setcookie("rand", "", time() - 3600);
    }
} else {
    $password_err = "Could not update password.";
    $pass = "Password Error";
}
                                }
?>
<!DOCTYPE html><html lang="en"><head><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><meta charset="UTF-8"><title>Verify</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><style>body{text-align:center;width:auto!important;overflow-x:hidden!important;font:14px sans-serif}.wrapper{width:350px}textarea.form-control{height:53px;margin-top:22px;width:80%}a{font-size:17px}.alert{background-color:red;color:#fff}.avatar{height:90px;width:90px;object-fit:cover;border-radius:50%}h5{margin-top:6px}.d{margin-top:-9px;font-size:17px}hr{margin-top:-2px}p{margin-top:12px;font-size:16px;}a:hover{text-decoration:none;}.overlay{margin-left:67px;height:27px;position:absolute;margin-top:-2px;}.btn{height:30px;color:white;background-color:#1e90ff;line-height:2px;}</style></head><body><center><br><img src="https://img.icons8.com/material-rounded/48/000000/back--v1.png" style="left:0;position:absolute;height:31px;margin-top:-13.5px;" onclick="location.href = '/verify';"/><h6 class="d">Reset your password</h6><hr><br>
        <?php 
if(!empty($password_err)){
    echo "<center><div class='modal__container' id='modal-container'>
    <div class='modal__content'>
        <h1 class='modal__title'>$pass</h1>
<p class='modal__description'>$password_err</p>

        <button class='modal__button modal__button-width' onclick='profile()'>
            Reset Password
</button><br><br><br><div class='video videos'><br>
<img src='https://img.icons8.com/cotton/64/000000/user-male-circle.png'><br><button class='modal__button-link close-modal' style='margin-top:12px;'>Profile Page</button></div><br><br><div class='video' onclick='ima()'><br><img src='https://img.icons8.com/fluency/64/000000/image.png'/><br><button class='modal__button-link close-modal' style='margin-top:5px;'>Home Page</button></div></div></div></center>";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"><script>
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
function ima(){window.location.replace("home")}function profile(){window.location.replace("password")}$(document).ready(function(){$(".videos").on("click",function(){window.location.replace("profile")})}),window.history.replaceState&&window.history.replaceState(null,null,window.location.href);</script><style>@import "https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap";:root{--hue:240;--first-color:hsl(var(--hue),16%,18%);--first-color-alt:hsl(var(--hue),16%,12%);--title-color:hsl(var(--hue),8%,15%);--text-color:hsl(var(--hue),8%,35%);--body-color:hsl(var(--hue),100%,99%);--container-color:#FFF;--body-font:Poppins,sans-serif;--big-font-size:1.5rem;--normal-font-size:.938rem;--z-modal:1000}@media screen and (min-width: 968px){:root{--big-font-size:1.75rem;--normal-font-size:1rem}}*{box-sizing:border-box;padding:0;margin:0}body,button{font-family:var(--body-font);}body{background-color:var(--body-color);color:var(--text-color);}button{cursor:pointer;border:none;outline:none}.container{margin-left:1rem;margin-right:1rem}.modal{height:100vh;display:grid;place-items:center}.modal__button{background-color:var(--first-color);color:#FFF;padding:1rem 1.25rem;border-radius:.5rem;transition:.3s}.modal__button:hover{background-color:var(--first-color-alt)}.modal__container{width:90%;height:100%;}.modal__content{background-color:var(--container-color);padding:3rem 2rem 2rem;border-radius:1rem 1rem 0 0;transition:all .3s;transform:translateY(10%);height:55%;}.modal__title{font-size:var(--big-font-size);color:var(--title-color);}.modal__description{margin-bottom:1.5rem}.modal__button-width{width:90%}.modal__button-link{margin:1rem auto 0;background-color:transparent;color:var(--first-color)}.show-modal{visibility:visible;opacity:1}.show-modal .modal__content{transform:translateY(0)}@media screen and (min-width: 576px){.modal__content{margin:auto;width:380px;border-radius:1.25rem}.modal__img{width:170px}}.video{width:140px;border: 1px solid #eee;border-radius: 5px;height:140px;}</style>
<?php
    die('');
}
?>
<div class="wrapper"><img class="overlay" src="https://img.icons8.com/ios/32/000000/plus--v1.png" onclick="location.href = '/edit';"/><img class="avatar" src="uploads/<?=$_COOKIE['avatar']?>"><h5><?php echo $username; ?></h5><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group"><input type="password" placeholder="New Password" class="form-control" name="new" maxlength='30'>
<br><input type="password" placeholder="Repeat Password" class="form-control" name="npr" maxlength='30'><br></span><br><hr style="margin-left: -14px;margin-right: -14px;"><br>
<input type="submit" class="btn" value="Reset Password" name="submit" style="width:125px;font-size:14px;float:right;margin-top:-1px;"><br><br>
</form></div><script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
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
</script></body><html>