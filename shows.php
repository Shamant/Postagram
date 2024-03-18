<?php
require_once "signup.php";
$username = $_COOKIE['id'];
$val = $_POST['uri'];
if(isset($_POST['uri']) && $val == "c4c6995edca5c600") {
$searchTerm = mysqli_real_escape_string($link, $username);
$searchTerm = str_replace("<", "&lt;", $searchTerm);
$searchTerm = str_replace(">", "&gt;", $searchTerm);
$searchTerm = trim($searchTerm);
$check = mysqli_real_escape_string($link, $_POST['image']);
$check = str_replace("<", "&lt;", $check);
$check = str_replace(">", "&gt;", $check);
$sq = "SELECT * FROM following WHERE userid='$username' AND following_id='$searchTerm' AND verfied='1'";
$c = mysqli_query($link, $sq);
$sql = "SELECT * FROM avatar WHERE username='$searchTerm'";
$result = mysqli_query($link, $sql);
$rowt = mysqli_fetch_assoc($result);
    if($check == "posts") {
$query = "SELECT * FROM posts WHERE username='$searchTerm' ORDER BY id DESC";
$res = mysqli_query($link, $query);
if(!mysqli_num_rows($res)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No posts yet by you</h4></center><br>";
} else {
while ($rowa = mysqli_fetch_assoc($res)) {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$searchTerm;
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }
}
} elseif($check == "ment") {
    $results = "SELECT * FROM posts WHERE caption LIKE '%{$searchTerm}%' ORDER BY id DESC";
$sqls = mysqli_query($link, $results);

if(!mysqli_num_rows($sqls)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No one has mentioned you in their posts yet</h4></center><br>";
} else {
    
 while ($rowa = mysqli_fetch_array($sqls)) {
     $room = "SELECT * FROM following WHERE userid='$username' AND following_id='$rowa[username]' AND verfied='1'";
$quo = mysqli_query($link, $room);
if($rowa['tyr'] == 'private' && $rowa['username'] != $username && !mysqli_num_rows($quo)) {
    
} else {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$rowa['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }   
}
}
} elseif($check == "like") {
    $rest = "SELECT *
FROM likes
JOIN posts
ON (imagesData=image)
WHERE likes.username='$searchTerm' AND likes.action='like'
ORDER BY likes.id DESC
";
$sqlt = mysqli_query($link, $rest);
if(!mysqli_num_rows($sqlt)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>You have not liked any post yet</h4></center><br>";
} else {
    
 while ($rowa = mysqli_fetch_array($sqlt)) {
     $room = "SELECT * FROM following WHERE userid='$username' AND following_id='$rowa[username]' AND verfied='1'";
$quo = mysqli_query($link, $room);
if($rowa['tyr'] == 'private' && $rowa['username'] != $username && !mysqli_num_rows($quo)) {
    
} else {
if($rowa['username'] == $username) {
  $echo = "user_posts/".$rowa['imagesData'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";  
} else {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$rowa['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
}
    }   
 }
}    
} elseif($check == "book") {
    $req = "SELECT *
FROM likes
JOIN posts
ON (imagesData=image)
WHERE likes.username='$searchTerm' AND likes.action='book'
ORDER BY likes.id DESC
";
$sq = mysqli_query($link, $req);
if(!mysqli_num_rows($sq)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>You have not saved any post yet</h4></center><br>";
} else {
while($ro = mysqli_fetch_assoc($sq)) {
    $room = "SELECT * FROM following WHERE userid='$username' AND following_id='$ro[username]' AND verfied='1'";
$quo = mysqli_query($link, $room);
if($ro['tyr'] == 'private' && $ro['username'] != $username && !mysqli_num_rows($quo)) {
    
} else {
if($ro['username'] == $username) {
  $echo = "user_posts/".$ro['imagesData'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$ro[imagesData]'></a>";  
} else {
$echo = "view_posts?image=".$ro['imagesData']."&search=".$ro['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$ro[imagesData]'></a>";
}   
}
}
}
} else {
    $req = "SELECT *
FROM comments
JOIN posts
ON (imagesData=image_url)
WHERE comments.username='$searchTerm'
ORDER BY comments.id DESC
";
$sq = mysqli_query($link, $req);
if(!mysqli_num_rows($sq)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No comments by you yet</h4></center><br>";
} else {
while($ro = mysqli_fetch_assoc($sq)) {
$room = "SELECT * FROM following WHERE userid='$username' AND following_id='$ro[username]' AND verfied='1'";
$quo = mysqli_query($link, $room);
if($ro['tyr'] == 'private' && $ro['username'] != $username && !mysqli_num_rows($quo)) {
    
} else {
if($ro['username'] == $username) {
  $echo = "user_posts/".$ro['imagesData'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$ro[imagesData]'></a>";  
} else {
$echo = "view_posts?image=".$ro['imagesData']."&search=".$ro['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$ro[imagesData]'></a>";
}   
}
}
}
}
} else {
echo "Cannot hack!";
}
mysqli_close($link);
?>