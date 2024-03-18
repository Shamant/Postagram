<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
}
$username = $_COOKIE['id'];
require_once "signup.php";
$x = $_GET['verify'];
if($x) {
    $pass = "";
if(isset($_POST['send'])) {
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
$u = mysqli_real_escape_string($link, $_POST['email']);
$u = str_replace("<", "&lt;", $u);
$u = str_replace(">", "&gt;", $u);
$sql = "SELECT * FROM users WHERE email='$u' AND status='1'";
$res = mysqli_query($link, $sql);
$row = mysqli_num_rows($res);
$namh = mysqli_fetch_array($res);
$name = $namh['username'];
if($row > 0) {
$to_email = mysqli_real_escape_string($link, $_POST['email']);
$r = $to_email;
$r = str_replace("<", "&lt;", $r);
$r = str_replace(">", "&gt;", $r);
$xy = rand(9999, 100000000);
$subject = $name.", it is easy to change your password in postagram";
$body = "Hi!
Sorry to hear that you had trouble changing your password.
".$xy." is your One Time Password (OTP) to change your password.
This OTP is valid for 3 minutes.
Please do not share this OTP with anyone for security reasons.
Best regards,
---
Your friends at Postagram :)
";
$headers = "From: verifymail.postagram@gmail.com";
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","587");
ini_set('sendmail_from','verifymail.postagram@gmail.com');
if (mail($to_email, $subject, $body, $headers)) {
    sleep(1);
    setcookie("rand", $r, time()+365*24*60*60);
    setcookie("sess", "sess", time()+365*24*60*60);
    $update = "UPDATE users SET latest_change='$xy' WHERE email='$r'";
    mysqli_query($link, $update);
    header("Location: /enter");
} else {
    $pass = "An unkown error occured.";
}
} else {
    $pass = "Invalid Email.";
}
}
?>
<html>
<head>
    <title>Forgot Your Password • Postagram</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<body>
 <?php 
        if(!empty($pass)){
            echo '<div class="alert alert-danger" style="text-align:center;">' . $pass . '</div>';
        } else {
            echo "<br><br><br><br>";
        }
        ?>
<center><div class="border" style="border: 1px solid #eee;border-radius: 7px;background-color:white;"><br><img class="src" src="https://img.icons8.com/fluent/96/000000/disappointed.png"/><br><h4>Forgot Your Password?</h4><h5>Enter your email and we will send you a code to change your password.</h5>
<form action="" method="post">
<input type="email" class="form-control mail" placeholder="Email" name="email" required>
<span class="invalid-feedback"><?php echo $pass; ?></span>
<br><button id = "send" name="send" class="btn btn-primary">Send Code</button></form><p class="l">Or</p><a href="verify.php">Remember Your Password</a><br><br></div></center>
<style>body{font-family:sans-serif;background-color:var(--body-color);}.mail{height:32px;width:250px;margin-top:17px}#send{height:30px;width:150px;background-color:#1e90ff;color:white;line-height:1px;margin-bottom:4px;border:none;outline:none;}.alert{background-color:#f00;color:white}a{text-decoration:none}.l{margin-bottom:12px}.src{height:72px;width:72px}.v{margin-top:-6px}h5{font-size:15px;margin-top:22px;margin-left:auto;margin-right:auto;width:16em;color:rgba(var(--f52,142,142,142),1)}h4{margin-top:11px}:root {--hue: 240;--first-color: hsl(var(--hue),16%,18%);--first-color-alt: hsl(var(--hue),16%,12%);--title-color: hsl(var(--hue),8%,15%);--text-color: hsl(var(--hue),8%,35%);--body-color: hsl(var(--hue),100%,97%);}@media screen and (max-width:1500px){.border{width:40%;border-radius:16px;}}@media screen and (max-width:500px){.border{width:85%}}</style><script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
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
window.location.replace("index.php");
    }
    },
     error: function() {

       }
});
}, 900);
$(".mail").on("change keyup input",function () {
    var mail = $(".mail").val();
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
  if (filter.test(mail))
    $("#send").attr("disabled", false);
  else {
   $("#send").attr("disabled", true); 
  }
});
 $('form').on('submit',function(event){
        // block form submit event
    var mail = $(".mail").val();
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
  if (filter.test(mail)) {
   event.currentTarget.submit();
  } else {
    event.preventDefault();
    alert("Please enter valid email address!")
  }    
  });
});
</script></body></html>
<?php
} else {
$password = "";
$password_err = "";
if(isset($_POST['submit'])) {
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
   if(empty(trim($_POST['password']))) {
$password_err = "Please enter a password";
$pass = "Password Error";
   } else {
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $password = str_replace("<", "&lt;", $password);
    $password = str_replace(">", "&gt;", $password);
    $password = trim($password);
   }
if(empty($_POST["new"])) {
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
    $password_err = "Please confirm your password";
    $pass = "Password Error";
} else {
     $cpassword = mysqli_real_escape_string($link, $_POST['npr']);
    $cpassword = str_replace("<", "&lt;", $cpassword);
    $cpassword = str_replace(">", "&gt;", $cpassword);
    $cpassword = trim($cpassword);
    if($npassword != $cpassword){
        $password_err = "Passwords did not match";
        $pass = "Password Error";
    }
}
   if(empty($password_err)) {
    $sql = "SELECT username, password FROM users WHERE username = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "s", $param_password);
        
        $param_password = $username;
        
        if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){                    
                mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                if(mysqli_stmt_fetch($stmt)){
                    if(password_verify($password, $hashed_password)){
                  if(password_verify($npassword, $hashed_password)) {
                      $password_err = "This password is already in use by you.";
                      $pass = "Password Error";
                  } else {
$passwords = password_hash($npassword, PASSWORD_DEFAULT);
    $sql1 = "UPDATE users
    SET status='0'
    WHERE username='$username'";
mysqli_query($link, $sql1);  
sleep(1);  
    $sql_2 = "UPDATE users
              SET password='$passwords'
              WHERE username='$username'";
    mysqli_query($link, $sql_2);
    $password_err = "Your password has been updated.";
    $pass = "Password Updated";
                  }
                    } else{
                        $password_err = "Invalid password.";
                    }
                }
            } else{
                $password_err = "Invalid password.";
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        mysqli_stmt_close($stmt);
    }
}
   }
?>
<!DOCTYPE html><html lang="en"><head><meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><meta charset="UTF-8"><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script></script><title>Verify</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><style>body{text-align:center;width:auto!important;overflow-x:hidden!important;font:14px sans-serif}.wrapper{width:350px}textarea.form-control{height:53px;margin-top:22px;width:80%}a{font-size:17px}.alert{background-color:red;color:#fff}.avatar{height:90px;width:90px;object-fit:cover;border-radius:50%}h5{margin-top:6px}.d{margin-top:-9px;font-size:17px}hr{margin-top:-2px}p{margin-top:12px;font-size:16px;}a:hover{text-decoration:none;}.overlay{margin-left:67px;height:27px;position:fixed;margin-top:-2px;}.btn{height:30px;color:white;background-color:#1e90ff;line-height:2px;}</style></head><body><center><br><img src="https://img.icons8.com/material-rounded/48/000000/back--v1.png" style="left:0;position:absolute;height:31px;margin-top:-16.5px;" onclick="location.href = '/profile';"/><h6 class="d" style="margin-top:-3px">Reset your password</h6><hr><br>
        <?php 
        if(!empty($password_err)){
        echo "<center><div class='modal__container' id='modal-container'>
    <div class='modal__content'>
        <h1 class='modal__title'>$pass</h1>
<p class='modal__description'>$password_err</p>

        <button class='modal__button modal__button-width' onclick='profile()'>
            Reset Password
</button><br><br><br><div class='video videos'><br>
<img src='https://img.icons8.com/cotton/64/000000/user-male-circle.png'><br><button class='modal__button-link close-modal' style='margin-top:12px;'>Discover Profiles</button></div><br><br><div class='video' onclick='ima()'><br><img src='https://img.icons8.com/fluency/64/000000/image.png'/><br><button class='modal__button-link close-modal' style='margin-top:5px;'>Discover Posts</button></div></div></div></center>";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"><script>function ima(){window.location.replace("/discover")}function profile(){window.location.replace("/verify")}$(document).ready(function(){$(".videos").on("click",function(){window.location.replace("/list")})}),window.history.replaceState&&window.history.replaceState(null,null,window.location.href);</script><style>@import "https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap";:root{--hue:240;--first-color:hsl(var(--hue),16%,18%);--first-color-alt:hsl(var(--hue),16%,12%);--title-color:hsl(var(--hue),8%,15%);--text-color:hsl(var(--hue),8%,35%);--body-color:hsl(var(--hue),100%,99%);--container-color:#FFF;--body-font:Poppins,sans-serif;--big-font-size:1.5rem;--normal-font-size:.938rem;--z-modal:1000}@media screen and (min-width: 968px){:root{--big-font-size:1.75rem;--normal-font-size:1rem}}*{box-sizing:border-box;padding:0;margin:0}body,button{font-family:var(--body-font);font-size:var(--normal-font-size)}body{background-color:var(--body-color);color:var(--text-color);}button{cursor:pointer;border:none;outline:none}.container{margin-left:1rem;margin-right:1rem}.modal{height:100vh;display:grid;place-items:center}.modal__button{background-color:var(--first-color);color:#FFF;padding:1rem 1.25rem;border-radius:.5rem;transition:.3s}.modal__button:hover{background-color:var(--first-color-alt)}.modal__container{width:90%;height:100%;}.modal__content{background-color:var(--container-color);padding:3rem 2rem 2rem;border-radius:1rem 1rem 0 0;transition:all .3s;transform:translateY(10%);height:55%;}.modal__title{font-size:var(--big-font-size);color:var(--title-color);}.modal__description{margin-bottom:1.5rem}.modal__button-width{width:90%}.modal__button-link{margin:1rem auto 0;background-color:transparent;color:var(--first-color)}.show-modal{visibility:visible;opacity:1}.show-modal .modal__content{transform:translateY(0)}@media screen and (min-width: 576px){.modal__content{margin:auto;width:380px;border-radius:1.25rem}.modal__img{width:170px}}.video{width:140px;border: 1px solid #eee;border-radius: 5px;height:140px;}</style>
<?php
    die('');
}
?>
<div class="wrapper"><img class="overlay" src="https://img.icons8.com/ios/32/000000/plus--v1.png" onclick="location.href = '/edit';"/><img class="avatar" src="uploads/<?=$_COOKIE['avatar']?>"><h5><?php echo $username; ?></h5><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group"><input type="password" placeholder="Current Password" name="password" class="form-control"><br><input type="password" placeholder="New Password" class="form-control" name="new" maxlength='30'>
<br><input type="password" placeholder="Repeat Password" class="form-control" name="npr" maxlength='30'><br></span><br><hr style="margin-left: -14px;margin-right: -14px;"><br><a href="verify?verify=forgot" style="width:130px;font-size:14px;float:left;color:#1e90ff;background-color:white;border:none;border-radius:5px;height:30px;margin-top:9px;">Forgot Password?</a>
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
    <?php
}
?>