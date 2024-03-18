<?php
require_once "signup.php";
$pass = "";

?>
<html>
<head>
    <title>Forgot Your Password? • Postagram</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body><div class="6qerty6qi"><div style="border-bottom:1px solid #eee;height:40px;"><img class="arrow" src="https://cdn-icons-png.flaticon.com/24/2223/2223615.png" onclick="back()" style="float:left;margin-left:10px;margin-top:10px;height:20px;"/><div style="padding-top:8px;font-size: 17px;padding-left:40px;">Forgot Your Password</div></div><br><br>
        <br><center><div class="border" style="background:white;"><br>
<img class="src" src="https://img.icons8.com/color/100/000000/confused--v1.png"/><br><h4>Forgot Your Password?</h4><h5>Don't worry it happens! Enter your email and we will send you a code to get back into your account.</h5>
<input type="text" class="form-control mail" placeholder="Don't paste. Type email."><span class="invalid-feedback"><?php echo $pass; ?></span>
    <br><button id = "send" class="btn btn-primary" disabled>Send Code</button><br><br>
<p class="l">Or</p><a href="register.php">Create A New Account</a><br><br><p class="v">&copy; <script>document.write((new Date()).getFullYear());</script> Postagram</p><br></div></center></div><div class='error' style='width:220px;background:red;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;opacity:0;'></div><style>body{font-family:sans-serif}.mail{height:32px;width:250px;margin-top:17px}#send{height:30px;width:150px;background-color:#1e90ff;color:white;line-height:1px;margin-bottom:4px;border:none;outline:none;}.alert{background-color:#f00;color:white}a{text-decoration:none}.l{margin-bottom:12px}.src{height:72px;width:72px}.v{margin-top:-6px}h5{font-size:15px;margin-top:22px;margin-left:auto;margin-right:auto;width:16em;color:#00000080}h4{margin-top:11px}.arrow:hover{background:#eee;border-radius:50%}@media screen and (max-width:1500px){.border{width:40%;border-radius:16px;}}@media screen and (max-width:500px){.border{width:85%}}</style><script>if ( window.history.replaceState ) {window.history.replaceState( null, null, window.location.href );}
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
setInterval(function(){
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
if(value) {
    document.getElementById("send").disabled = true;
    window.location.replace("home");
} else {
}
}, 170);
var x = window.location.href;
if(x != "https://postagram.in/forgot") {
window.location="https://postagram.in/forgot";
} else {
}function back() {window.history.back()}

$(".mail").on("change keyup input",function () {
    var mail = $(".mail").val();
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
  if (filter.test(mail))
    $("#send").attr("disabled", false);
  else {
   $("#send").attr("disabled", true); 
  }
});
 $('#send').click(function(){
   var tljfei = "c4c6995edca5c600";
    var mail = $(".mail").val();
    $(".mail").val("");
    var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
  if (filter.test(mail)) {
      $.ajax({
    url:'func.php',
    method:'POST',
    data:{"mail": mail, uri: tljfei},
    success:function(result) {
    if(result == "Invalid Email." || result == "An unkown error occured."){
        $(".error").text(result);
        $(".error").css("opacity", "1");
        setInterval(function (){
          $(".error").animate({ opacity: 0 });
        }, 2500);
    } else {
window.location.replace("/enter");
    }
    },
     error: function() {

       }
});
  } else {
    alert("Please enter valid email address!")
  }    
  });
</script></body></html>