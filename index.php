<?php
if(isset($_COOKIE['id'])){
    header("location: /home");
    exit;
}
require_once "signup.php";
ob_start( 'ob_gzhandler' );
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        $username = trim($_POST["username"]);
        $username = mysqli_real_escape_string($link, $_POST["username"]);
                    $username = str_replace("<", "&lt;", $username);
$username = str_replace(">", "&gt;", $username);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
        $password = mysqli_real_escape_string($link, $_POST["password"]);
        $password = str_replace("<", "&lt;", $password);
        $password = str_replace(">", "&gt;", $password);
    }
    
    if(empty($username_err) && empty($password_err)){
        for ($i=0; $i<5; $i++) {
            for ($j=0; $j<5; $j++) {
                $pipe[$j] = popen('script2.php', 'w');
            }
        
            for ($j=0; $j<5; ++$j) {
                pclose($pipe[$j]);
            }
        }
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                                   $sequel = "SELECT * FROM avatar WHERE username='$username'"; 
                  $response = mysqli_query($link, $sequel);
                  $row = mysqli_fetch_assoc($response);
                  $avatar = $row['prof'];
                            $sql_2 = "UPDATE users
                            SET status='1'
                            WHERE username='$username'";
                  mysqli_query($link, $sql_2);            
                            setcookie("loggedin", "true", time()+365*24*60*60);
                            setcookie("id", $username, time()+365*24*60*60);
                             $tortu = "avatar";
                            setcookie($tortu, $avatar, time()+365*24*60*60, "/");
                            header("location: home");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Postagram</title>
   <meta name="google-site-verification" content="wKI1rVVatqwgN6fK3oUHMYL5Hs6fqNZgK377QSi9Kp8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="wrapper"><img src="favicon.ico"><br><br><br>
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Name" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" id="login" value="Login">
            </div>
            </form>
            <br>
            <a class="j" href="forgot">Forgot Password?</a>
            <p class="s">Or</p>
            <p>Don't have an account? <a href="register">Sign up</a>.</p><a href="privacy.html">Privacy Policy</a><br><br><p>&copy; <script>document.write((new Date()).getFullYear());</script> Postagram</p>
    </div>
<style>body{font:12px sans-serif;text-align:center;overflow-x:hidden;object-fit:cover;background-image: url(https://images.unsplash.com/photo-1483356256511-b48749959172?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZXhwbG9yZXxlbnwwfHwwfHw%3D&w=1000&q=80);background-size: cover;}.j{margin-left:30px}@media screen and (max-width:1500px){.wrapper{width:40%;padding:10px;margin:auto;right:-10px;background-color:#fff;margin-top:10%;border-radius:10px;height:80%;}}@media screen and (max-width:700px){.wrapper{width:100%;padding:10px;margin-top:30%;right:-10px;background-color:#fff;border-top-left-radius:17px;border-top-right-radius:17px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;height:86.2vh;}}.alert{background-color:red;color:#fff;margin-top:-11px;}a{font-size:15px;color:#0095f6}p{font-size:15px;margin-top:4px}.s{margin-top:15px}.j{color:#0095f6;text-align:center;margin-top:-12px}.btn:hover{background-color:#0095f6;color:#fff;height:30px;line-height:2px;margin-bottom:-8px;}.btn:active{background-color:#0095f6;color:#fff;height:30px;line-height:2px;margin-bottom:-8px;width:50%;}.btn{background-color:#0095f6;color:#fff;height:30px;line-height:2px;margin-bottom:-8px;width:50%;}h4{margin-top:15px}.invalid-feedback{display:none;width:100%;margin-top:.25rem;font-size:12px;color:#dc3545}.form-control{width:90%;display: table-caption;}img{height:76px;width:76px;object-fit:cover;border-radius: 50%;margin-top:18px;}</style><script>
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
    window.location.replace("home");
} else {
}
var x = window.location.href;
if(x != "https://postagram.in/login") {
window.location="https://postagram.in/login";
} else {
}
</script></body></html>