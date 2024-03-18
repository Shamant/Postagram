<?php
if(!isset($_COOKIE['loggedin'])){
    header("location: index.php");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
$sql = "SELECT 
  id, 
  username, 
  prof 
FROM avatar 
WHERE tyr='private' AND username!='$username' AND username NOT IN
  (SELECT 
     following_id 
   FROM following 
   WHERE userid='$username')";
$resul = mysqli_query($link, $sql);
?>
<!DOCTYPE html>
<html lang="">
<html>
<head><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>Postagram</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
</head>
<body>
  
<?php
if(mysqli_num_rows($resul) > 0) {
    while($row = mysqli_fetch_array($resul)) {
        $xy = "discover.php?search=".$row['username'];
        ?>
       <span class="row">
           <a href="<?php echo $xy; ?>"><img class="lozad" data-src="uploads/<?=$row['prof']?>"></a>
           <h5 class="see"><?php echo $row['username']; ?></h5><br>
       </span>
       <br>
       <?php 
        }
    } else {   
    }
        ?>
            <style>
html, body {width: auto!important; overflow-x: hidden!important;font-family:sans-serif;} 
.lozad {
    margin-right: 10px;
    height: 36px;
    width: 36px;
    border-radius: 50%;
    object-fit: cover;
    border-color: black;
      aspect-ratio: auto 198 / 198;
          display: block;
          box-sizing: border-box;
}
h6 {
    font-size: 0.75em;
    color:#202020;
}
.g {
       margin-left: auto;
    margin-right: auto;
    width: 16em;
    margin-top: 2px;
    color:#202020;
    font-size: 0.75em;
    text-align:center;
}
.deletes {
    background-color: #1e90ff;
    margin-top: 2px;
    right: 5px;
position: absolute;
height: 25px;
    width: 70px;
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    font-size: 12px;
    font-weight: 600;
    border: none;
    background-color: #1e90ff;
    color: white;
} 
.see {
    margin-bottom: 2px;
    margin-top: 10px;
    font-size: 15px;
}
.l {
    margin-left: 24px;
}
.row {
    display: flex;
}
.people {
    margin-top: 29px;
    text-align: center;
    color: #1e90ff;
}
.menu{
    width:100%;
    position:fixed;
    top:0;
    margin-top:-20px;
    margin-left:-24px;
    left:0;
    border-bottom:1px solid silver;
    background-color:white;
    height: 50px;
}
</style><script>
const observer = lozad();
observer.observe();
</script></body></html>