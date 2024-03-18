<?php
for ($i=0; $i<1; $i++) {
    for ($j=0; $j<1; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<1; ++$j) {
        pclose($pipe[$j]);
    }
}
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
header("Pragma: no-cache"); // HTTP 1.0.
header("Expires: 0");
if(!isset($_COOKIE['rand'])){
    header("Location:/home");
    exit;
}
require_once "signup.php";
$pass = "";
$t = mysqli_real_escape_string($link, $_COOKIE['rand']);
$t = str_replace("<", "&lt;", $t);
$t = str_replace(">", "&gt;", $t);
if(isset($_COOKIE['sess'])) {
$sql = "SELECT * FROM users WHERE email='$t'";
$res = mysqli_query($link, $sql);
if(!isset($_COOKIE['rand'])) {
    header("Location: /verify");
}
$row = mysqli_fetch_assoc($res);
if(isset($_POST['resend'])) {
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
    $to_email = $t;
    $subject = $row['username'].", it is easy to get back to Postagram";
    $body = "Hi!
    Sorry to hear that you had trouble logging in.
    ".$row['latest_forgot']." is your One Time Password (OTP) to log in to your account.
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
    $refreshAfter = 0;
    header('Refresh: ' . $refreshAfter);
    } else {
        $pass = "An unknown error occurred.";
    }
    }
if(isset($_POST['send'])) {
$r = mysqli_real_escape_string($link, $_POST['email']);
$r = str_replace("<", "&lt;", $r);
$r = str_replace(">", "&gt;", $r);
if($r == $row['latest_change']) {
    setcookie("changed", "true", time()+365*24*60*60);
    setcookie("sess", "", time() - 3600);
    header("Location: /password");
} else {
    $pass = "Invalid Code!";
}
}
?>
<html><head><title>Verify Code • Postagram</title></head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><body>
 <?php 
        if(!empty($pass)){
            echo '<div class="alert alert-danger" style="text-align:center;">' . $pass . '</div>';
        }        
        ?>
<br><br><br><center><div class="border" style="background:white;border:1px solid #eee;"><img class="src" src="https://img.icons8.com/color/96/000000/happy--v1.png"/>
    <br><h4>Check your email</h4>
<h5>You would have received a code to verify here so you can change your password.</h5>
    <form action="" method="post">
<input type="number" class="form-control inputsend" placeholder="Code" name="email"><br>
<button id = "send" name="send" class="btn btn-primary">Verify Code</button>
    </form><h6 class="kj">Didn't receive an email?</h6>
    <form action="" method="post">
<button name="resend" class="kl">Resend OTP</button>
    </form>
<p class="l">Or</p><a href="verify.php">Remember Your Password</a><br><br>
    <p class="v">&copy;<script>document.write((new Date()).getFullYear());</script> Postagram Inc.</p></div></center><style>body{text-align:center;background-color:rgba(var(--d87,255,255,255),1);font-family:sans-serif}.inputsend{height:32px;width:250px;margin-top:17px}#send{height:30px;width:150px;background-color:#1e90ff;color:#fff;line-height:1px;margin-bottom:4px;border:none;outline:none;}.alert{background-color:red;color:#fff}.kj{margin-top:-6px}a{text-decoration:none}.l{margin-bottom:12px;margin-top:-7px}.v{margin-top:-6px}.src{height:72px;width:72px}h5{font-size:15px;margin-top:22px;text-align:center;margin-left:auto;margin-right:auto;width:16em;color:rgba(var(--f52,142,142,142),1)}h4{margin-top:11px}.kl{border:none;background-color:#fff;color:#1e90ff;margin-top:0}@media screen and (max-width:1500px){.border{width:40%;border-radius:16px;}}@media screen and (max-width:500px){.border{width:85%}}</style><script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );} 
    setInterval(function(){
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
});var x = window.location.href;
if(x != "https://postagram.in/enter") {
window.location="https://postagram.in/enter";
} else {
}</script></body></html>
<?php
} else {
$sql = "SELECT * FROM users WHERE email='$t'";
$res = mysqli_query($link, $sql);
if(!isset($_COOKIE['rand'])) {
    header("Location: /forgot");
}
$row = mysqli_fetch_assoc($res);
if(isset($_POST['resend'])) {
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	die("Cannot hack");
	exit;
}
    $to_email = $t;
    $subject = $row['username'].", it is easy to get back to Postagram";
    $body = "Hi!
    Sorry to hear that you had trouble logging in.
    ".$row['latest_forgot']." is your One Time Password (OTP) to log in to your account.
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
    $refreshAfter = 0;
    header('Refresh: ' . $refreshAfter);
    } else {
        $pass = "An unknown error occurred.";
    }
    }
if(isset($_POST['send'])) {
$r = mysqli_real_escape_string($link, $_POST['email']);
$r = str_replace("<", "&lt;", $r);
$r = str_replace(">", "&gt;", $r);
if($r == $row['latest_forgot']) {
    setcookie("id", $row['username'], time()+365*24*60*60);
    setcookie("rand", "", time() - 3600);
    header("Location: /home");
} else {
    $pass = "Invalid Code!";
}

}
?>
<html><head><title>Verify Code • Postagram</title></head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><body>
 <?php 
        if(!empty($pass)){
            echo '<div class="alert alert-danger" style="text-align:center;">' . $pass . '</div>';
        }        
        ?>
<br><br><br><br><center><div class="border" style="border: 1px solid #eee;border-radius: 7px;"><br><img class="src" src="https://img.icons8.com/color/96/000000/happy--v1.png"/>
    <br><h4>Check your email</h4>
<h5>You would have received a code to verify here so you can log in.</h5>
    <form action="" method="post">
<input type="number" class="form-control inputsend" placeholder="Code" name="email"><br>
<button id = "send" name="send" class="btn btn-primary">Verify Code</button>
    </form><h6 class="kj">Didn't receive an email?</h6>
    <form action="" method="post">
<button name="resend" class="kl">Resend OTP</button>
    </form>
<p class="l">Or</p><a href="register.php">Create A New Account</a><br><br>
    <p class="v">&copy;<script>document.write((new Date()).getFullYear());</script> Postagram Inc.</p><br></div></center><style>body{text-align:center;background-color:rgba(var(--d87,255,255,255),1);font-family:sans-serif}.inputsend{height:32px;width:250px;margin-top:17px}#send{height:30px;width:150px;background-color:#1e90ff;color:#fff;line-height:1px;margin-bottom:4px;border:none;outline:none;}.alert{background-color:red;color:#fff}.kj{margin-top:-6px}a{text-decoration:none}.l{margin-bottom:12px;margin-top:-7px}.v{margin-top:-6px}.src{height:72px;width:72px}h5{font-size:15px;margin-top:22px;text-align:center;margin-left:auto;margin-right:auto;width:16em;color:rgba(var(--f52,142,142,142),1)}h4{margin-top:11px}.kl{border:none;background-color:#fff;color:#1e90ff;margin-top:0}@media screen and (max-width:1500px){.border{width:40%;border-radius:16px;}}@media screen and (max-width:500px){.border{width:85%}}</style><script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
        setInterval(function(){
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
});
var x = window.location.href;
if(x != "https://postagram.in/enter") {
window.location="https://postagram.in/enter";
} else {
}</script></body></html>
<?php
}
?>