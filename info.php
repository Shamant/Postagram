<?php
require_once "signup.php";
$username = $_COOKIE['id'];
$err = "";
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$x = $_COOKIE['avatar'];

?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Postagram</title><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script></head><body>
<div id="react-root">
<center>
    <br>
    <img class="av" src="uploads/<?=$x?>">
    <h5 class="des">Describe yourself</h5><br>
    <h6>Write something about yourself? Don't think, have fun. You can enter your hobbies or interests. </h6><br>
<textarea class="form-control" id="g" name="txt" maxlength='250'></textarea>
    <br>
    <input type="submit" value="Submit" class="btn btn-primary" id="gh" name="info">
<br><br><button class="btn btn-primary" id="gh" name="infos">Skip</button></center>
 </div>
    <style>.logo{margin:auto;height:60px;margin-bottom:-60px;border-radius:10%}h3{font-weight:300;color:black;font-family:sans-serif}h6{font-weight:400;color:grey;font-size:14px;margin-left:auto;margin-right:auto;width:20em;margin-top:-12px}#g{width:75%}#react-root{text-align:center}.alert{background-color:#f00;color:white}.av{height:70px;width:70px;border-radius:50%;object-fit:cover;}.des{margin-top:8px;}</style><script>
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}

</script></body></html>