<?php
require_once "signup.php";
$username = $email = $password = $confirm_password = "";
$username_err = $email_err = $password_err = $confirm_password_err = "";
$check_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter your name.";
    } elseif(strlen(trim($_POST["username"])) < 4){
        $username_err = "Please enter your real name";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
            $username = mysqli_real_escape_string($link, $_POST["username"]);
                    $username = str_replace("<", "&lt;", $username);
$username = str_replace(">", "&gt;", $username);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                } else{
                    $email = trim($_POST["email"]);
            $email = mysqli_real_escape_string($link, $_POST["email"]);
                    $email = str_replace("<", "&lt;", $email);
$email = str_replace(">", "&gt;", $email);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
        $password = mysqli_real_escape_string($link, $_POST["password"]);
        $password = str_replace("<", "&lt;", $password);
$password = str_replace(">", "&gt;", $password);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            if(isset($_POST['check'])) {
            if(mysqli_stmt_execute($stmt)){
            setcookie("registered", "true", time()+365*24*60*60);
            setcookie("id", $username, time()+365*24*60*60);
                header("location: avatar.php");
            } else {
                $check_err = "Something has gone wrong.";
            }
            } else{
                $check_err = "Please check the required field.";
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
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
body{text-align:center;width:auto!important;overflow-x:hidden!important;font:14px sans-serif;overflow-x:hidden;object-fit:cover;background-image: url(https://images.unsplash.com/photo-1483356256511-b48749959172?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8ZXhwbG9yZXxlbnwwfHwwfHw%3D&w=1000&q=80);background-size: cover;}@media screen and (max-width:1500px){.wrapper{width:50%;padding:10px;margin:auto;right:-10px;background-color:#fff;margin-top:5%;border-radius:17px}}@media screen and (max-width:700px){.wrapper{width:100%;padding:10px;margin:auto;right:-10px;background-color:#fff;margin-top:21%;border-top-left-radius: 17px;border-top-right-radius: 17px;border-bottom-left-radius: 0px;border-bottom-right-radius:0px;height:88.3vh;}}.j{padding-left:30px}.row{display:flex;margin:auto}.alert{background-color:red;color:#fff}.check{margin-top:2px}a{font-size:15px}p{font-size:15px;margin-top:2px}@media screen and (max-width:1500px){.terms{padding-left:5px;margin-top:0px}}@media screen and (max-width:900px){.terms{padding-left:14px;margin-top:-16px}}.btnd{margin-top:-11px}.btn{width:200px;background-color:#0095f6;color:#fff;height:30px;line-height:2px}.btn:hover{width:200px;background-color:#0095f6;color:#fff;height:30px;line-height:2px}.btn:active{width:200px;background-color:#0095f6;color:#fff;height:30px;line-height:2px}.rgei{margin-top:20px;}
    </style>
</head>
<body>
<br>
<center>
    <div class="wrapper">
        <h4 class="rgei">Sign Up</h4>
        <br>
          <?php 
        if(!empty($check_err)){
            echo '<div class="alert alert-danger">' . $check_err . '</div>';
        }        
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <input type="text" placeholder="Name" name="username" maxlength='15' class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>  
            <div class="form-group">
                <input type="email" placeholder="Email" name="email" maxlength='50' class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>      
            <div class="form-group">
                <input type="password" placeholder="Password" name="password" maxlength='20' class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Confirm Password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
            <span class="row">
            <input type="checkbox" name="check" class="check">
            &nbsp;&nbsp;
<p class="terms">I agree that I am 13+ and have read the terms of service.</p>
            </span>
                <input type="submit" id="btn" class="btn" value="Sign Up">
                <br>
                <br>
            </div>
            <p class="btnd">Or</p>
            <p>Already have an account? <a href="index.php">Login here</a>.</p>
        </form><a href="privacy.html">Privacy Policy</a><br><br>
        <p>&copy; <script>document.write((new Date()).getFullYear());</script> Postagram</p>
    </div></center><script>
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
setInterval(function(){
var value = readCookie('id');
if(value) {
    document.getElementById("btn").disabled = true;
    window.location.replace("home");
} else {
}
}, 170);
    var x = window.location.href;
if(x != "https://postagram.in/register") {
window.location="https://postagram.in/register";
} else {
}</script></body></html>