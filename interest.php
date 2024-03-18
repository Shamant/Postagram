<?php
$user = $_COOKIE['id'];
require_once "signup.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Interests  • Postagram</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head><body><center><h5>Topics</h5><hr>
<div class="btn-group l" data-toggle="buttons">
  <label class="btn btn-primary k">
    <input type="checkbox" class="tech" name="tech" value="tech"> Tech
  </label></div>
         <div class="btn-group l" data-toggle="buttons">
 <label class="btn btn-primary">
    <input type="checkbox" class="fash" name="fad" value="fad"> Fad
  </label></div>
          <div class="btn-group l" data-toggle="buttons">
<label class="btn btn-primary">
    <input type="checkbox" class="life" name="life" value="life"> Life
  </label></div> <div class="btn-group l" data-toggle="buttons">
<label class="btn btn-primary">
    <input type="checkbox" class="creat" name="art" value="art"> Art
  </label></div> <div class="btn-group j" data-toggle="buttons">
<label class="btn btn-primary">
    <input type="checkbox" class="food" name="food" value="food"> Food
  </label></div><div class="btn-group l" data-toggle="buttons">
<label class="btn btn-primary">
    <input type="checkbox" class="sport" name="sports" value="sports"> Sports
  </label></div>
  <div class="btn-group" data-toggle="buttons">
<label class="btn btn-primary l">
    <input type="checkbox" class="travel" name="travel" value="travel"> Travel
  </label></div><br><br><br><button class="btn btn-primary" onclick="next()">Next</button><br><br>
  <small>Note:  fad stands for fashion and life for lifestyle.</small>
  <span class="row"><a href=""><li>6</li><li>Following</li></a><a href=""><li>6</li><li> Followers</li></a></span>
</center><style>.btn{width:150px;height:40px;}
.j{margin-right:6px;}.tech{margin-right:18px;}
.fash{margin-right:25px;}.food{margin-right:12px;}.sport{margin-right:5px;}
.travel{margin-right:8px;}.life{margin-right:24.5px;}.creat{margin-right:26.8px;}
label{display:block!important;margin:4px!important;padding-left:32px!important}
h5{margin-top:8px;margin-left:22px;color:#1e90ff;font-size:16px;}hr{margin-top:0px;}li { list-style-type: none; }a{color:black;margin-left:20px;}.row{display:flex;}
</style>
<script></script>
</body></html>