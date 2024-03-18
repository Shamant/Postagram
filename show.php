<?php
require_once "signup.php";
$username = $_COOKIE['id'];
$val = $_POST['uri'];
if(isset($_POST['uri']) && $val == "c4c6995edca5c600") {
$searchTerm = mysqli_real_escape_string($link, $_POST['user']);
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
if($rowt['tyr'] == 'private' && !mysqli_num_rows($c)) {
    echo "p";
} else {
    if($check == "posts") {
$query = "SELECT * FROM posts WHERE username='$searchTerm' ORDER BY id DESC";
$res = mysqli_query($link, $query);
if(!mysqli_num_rows($res)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No posts yet by $searchTerm</h4></center><br>";
} else {
while ($rowa = mysqli_fetch_assoc($res)) {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$searchTerm;
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }
}
} elseif($check == "ment") {
    $results = "SELECT * FROM posts WHERE caption LIKE '%{$searchTerm}%' AND tyr='' ORDER BY id DESC";
$sqls = mysqli_query($link, $results);
if(!mysqli_num_rows($sqls)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>No one has mentioned $searchTerm in their posts yet</h4></center><br>";
} else {
 while ($rowa = mysqli_fetch_array($sqls)) {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$rowa['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }   
}
} elseif($check == "like") {
    $rest = "SELECT *
FROM likes
JOIN posts
ON (imagesData=image)
WHERE likes.username='$searchTerm' AND likes.action='like' AND posts.tyr=''
ORDER BY likes.id DESC
";
$sqlt = mysqli_query($link, $rest);
if(!mysqli_num_rows($sqlt)) {
echo "<br><center><img class='sde' src='no.png'/><h3 style='font-weight: 90;
    color: darkgrey;'>Post Not Found</h3><br><h4 style='font-weight:400;'>$searchTerm has not liked any post yet</h4></center><br>";
} else {
 while ($rowa = mysqli_fetch_array($sqlt)) {
$echo = "view_posts?image=".$rowa['imagesData']."&search=".$rowa['username'];
echo "<a href='$echo'><img class='lozad' data-src='uploads/$rowa[imagesData]'></a>";
    }   
}    
} else {
}
}
} else {
echo "Cannot hack!";
}
mysqli_close($link);
?>