<?php
$username = $_COOKIE['id'];
require_once "signup.php";
if(isset($_POST['uri']) && $_POST['uri'] == "c4c6995edca5c600") {
if(isset($_POST['follow'])) {
    $id = $_POST['follow'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sqls = "SELECT * FROM following WHERE userid='$id' AND following_id='$username'";
$querys = mysqli_query($link, $sqls);
if(mysqli_num_rows($querys)) {
        $elon = "DELETE FROM following WHERE userid='$id' AND following_id='$username'";
    mysqli_query($link, $elon);
    $os = "DELETE FROM request WHERE sender='$id' AND receiver='$username' AND reason='requested to follow you'";
    mysqli_query($link, $os);
} else {
}
    }
    // suwdsfws
    
    
    
           if(isset($_POST['follows'])) {
    $id = $_POST['follows'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sqls = "SELECT * FROM following WHERE userid='$id' AND following_id='$username'";
$querys = mysqli_query($link, $sqls);
if(mysqli_num_rows($querys)) {
        $elon = "UPDATE following SET verfied='1' WHERE userid='$id' AND following_id='$username'";
    mysqli_query($link, $elon);
    $os = "DELETE FROM request WHERE sender='$id' AND receiver='$username' AND reason='requested to follow you'";
    mysqli_query($link, $os);
} else {
}
    }
    // wjhqrfewr
    
    
    
               if(isset($_POST['public'])) {
$id = $_POST['public'];
$id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sql = "SELECT * FROM following WHERE userid='$username' AND following_id='$id'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query)) {
} else {
$bg = "INSERT INTO following(userid, following_id, verfied) 
    VALUES('$username', '$id', '1')";
    mysqli_query($link, $bg);
}
    }
    // hje
    
    
if (isset($_POST['unfollow'])) {
    $raes = "requested to follow you";
$id = $_POST['unfollow'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$idcssf = "DELETE FROM following WHERE userid = '$username' AND following_id = '$id'";
    mysqli_query($link, $idcssf);
 $idcssr = "DELETE FROM request WHERE sender = '$username' AND receiver = '$id' AND reason='$raes'";
    mysqli_query($link, $idcssr);
$sqls = "SELECT * FROM avatar WHERE username='$id'";
$querys = mysqli_query($link, $sqls);
$row = mysqli_fetch_assoc($querys);
if(mysqli_num_rows($querys) && $row['tyr'] == 'private') {
    echo "Request";
} else {
    echo "Follow";
}
}
// efgwee


if (isset($_POST['request'])) {
    $raes = "requested to follow you";
 $id = $_POST['request'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id); 
$sqli = "SELECT * FROM following WHERE userid='$username' AND following_id='$id'";
$data = mysqli_query($link, $sqli);
if(mysqli_num_rows($data)) {
} else {
    $video = "INSERT INTO request(sender, receiver, reason) 
    VALUES('$username', '$id', '$raes')";
    mysqli_query($link, $video);
    $bgs = "INSERT INTO following(userid, following_id, verfied) 
    VALUES('$username', '$id', '0')";
    mysqli_query($link, $bgs);
}
}
// hu

if(isset($_POST['refollow'])) {
$id = mysqli_real_escape_string($link, $_POST['refollow']);
$id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$sql = "SELECT * FROM following WHERE userid='$id' AND following_id='$username'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query)) {
} else {
$bg = "INSERT INTO following(userid, following_id, verfied) 
    VALUES('$id', '$username', '1')";
    mysqli_query($link, $bg);
}
    }
    
// mark query

if(isset($_POST['mark'])) {
    $id = $_POST['mark'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sql = "SELECT * FROM likes WHERE username='$username' AND image='$id' AND action='book'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query)) {
} else {
$bg = "INSERT INTO likes(username, image, action) 
    VALUES('$username', '$id', 'book')";
    mysqli_query($link, $bg);
}
    }

// unmark query

if (isset($_POST['unmark'])) {
$id = $_POST['unmark'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sqls = "SELECT * FROM likes WHERE username='$username' AND image='$id' AND action='book'";
$querys = mysqli_query($link, $sqls);
if(mysqli_num_rows($querys)) {
$mark = "DELETE FROM likes WHERE username = '$username' AND image = '$id' AND action='book'";
    mysqli_query($link, $mark);
} else {
}
}
// like query

if(isset($_POST['like'])) {
    $id = $_POST['like'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sql = "SELECT * FROM likes WHERE username='$username' AND image='$id' AND action='like'";
$query = mysqli_query($link, $sql);
if(mysqli_num_rows($query)) {
} else {
$bg = "INSERT INTO likes(username, image, action) 
    VALUES('$username', '$id', 'like')";
    mysqli_query($link, $bg);
$post = "UPDATE posts SET likes = likes + 1 WHERE imagesData='$id'";
mysqli_query($link, $post);
}
    }

// unlike query

if (isset($_POST['unlike'])) {
$id = $_POST['unlike'];
    $id = str_replace("<", "&lt;", $id);
$id = str_replace(">", "&gt;", $id);
$id = mysqli_real_escape_string($link, $id);
$sqls = "SELECT * FROM likes WHERE username='$username' AND image='$id' AND action='like'";
$querys = mysqli_query($link, $sqls);
if(mysqli_num_rows($querys)) {
$mark = "DELETE FROM likes WHERE username = '$username' AND image = '$id' AND action='like'";
    mysqli_query($link, $mark);
$post = "UPDATE posts SET likes = likes - 1 WHERE imagesData='$id'";
mysqli_query($link, $post);
} else {
}
}

if (isset($_POST['notify'])) {
$dfg = "SELECT * FROM request WHERE receiver='$username' AND seen!='1'";
$r = mysqli_query($link, $dfg);
if(mysqli_num_rows($r)) {
    echo 'https://img.icons8.com/pastel-glyph/36/000000/notification-mail--v1.png';
} else {
echo 'https://img.icons8.com/pastel-glyph/24/000000/notification-mail--v2.png';
}
}
//get posts


// comment


if(isset($_POST['text'])) {
    $x = mysqli_real_escape_string($link, $_POST['text']);
    $x = str_replace("<", "&lt;", $x);
    $x = str_replace(">", "&gt;", $x);
    $x = trim($x);
$y = mysqli_real_escape_string($link, $_POST['image']);
    $y = str_replace("<", "&lt;", $y);
    $y = str_replace(">", "&gt;", $y);
$query = "SELECT * FROM comments WHERE image_url='$y'";
$comms = mysqli_query($link, $query);
if(mysqli_num_rows($comms) > 159) {
    echo "MAX number of comments...";
} else {
    $bytes = substr(md5(mt_rand()), 0, 8);
$s = "SELECT * FROM comments WHERE image_url='$y' AND rand='$bytes'";
$q = mysqli_query($link, $s);
if(mysqli_num_rows($q) > 0) {
    $bytes = substr(md5(mt_rand()), 0, 8);
}
    $re = $_COOKIE['avatar'];
    $word = "@";
    $username = str_replace("<", "&lt;", $username);
    $username = str_replace(">", "&gt;", $username);
    $pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="/tag/$1">#$1</a>', 
             '<a class="res" href="/discover/$1">@$1</a>');
$new_msg = preg_replace($pat, $rep, $x);
$sql = "INSERT INTO comments(image_url, username, caption, prof, rand) VALUES('$y', '$username', '$new_msg', '$re', '$bytes')";
mysqli_query($link, $sql);
}
}

// echo comments
if(isset($_POST['delete'])) {
   $y = mysqli_real_escape_string($link, $_POST['delete']);
    $y = str_replace("<", "&lt;", $y);
    $y = str_replace(">", "&gt;", $y);
    $chrf = "DELETE FROM comments WHERE username='$username' AND rand='$y'";
    mysqli_query($link, $chrf);
}

//
if(isset($_POST['deletes'])) {
     $id = mysqli_real_escape_string($link, $_POST['deletes']);
     $id = str_replace("<", "&lt;", $id);
     $id = str_replace(">", "&gt;", $id);
     $delete = true;
     sleep(1);
$sqls = "DELETE FROM posts WHERE imagesData='$id' AND username='$username'";
     mysqli_query($link, $sqls);
$sqlss = "DELETE FROM comments WHERE image_url='$id' AND username='$username'";
     mysqli_query($link, $sqlss);
$wo = "DELETE FROM request WHERE receiver='$id'";
     mysqli_query($link, $wo);
$like = "DELETE FROM likes WHERE image='$id'";
     mysqli_query($link, $like);
     $ch = "uploads/".$id;
     unlink($ch);
     header("Location: /profile");
}


// space
if(isset($_POST['subm'])) {
$word = "@";
$y = $_POST['url'];
$txt = mysqli_real_escape_string($link, $_POST['edit']);
$txt = str_replace("<", "&lt;", $txt);
$txt = str_replace(">", "&gt;", $txt);
if($txt) {
  $reason = "mentioned you in a post.";
$pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="/tag/$1">#$1</a>', 
             '<a class="res" href="/discover/$1">@$1</a>');
$new_msg = preg_replace($pat, $rep, $txt);
$url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';  
$new_msg = preg_replace($url, '<a class="res" target="_blank" href="$0 " > $0</a>', $new_msg);
$sql = "UPDATE posts SET caption='$new_msg' WHERE imagesData='$y' AND username='$username'";
    mysqli_query($link, $sql);
    $angry = str_replace("@", "", $txt);
} else {
$pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="/tag/$1">#$1</a>', 
             '<a class="res" href="/discover/$1">@$1</a>');
$new_msg = preg_replace($pat, $rep, $txt);
$url = '/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';
$new_msg = preg_replace($url, '<a class="res" target="_blank" href="$0 " > $0</a>', $new_msg);
$sql = "UPDATE posts SET caption='$new_msg' WHERE imagesData='$y' AND username='$username'";
    mysqli_query($link, $sql);
}
}

if(isset($_POST['lock'])) {
    $sqld = "UPDATE avatar SET tyr='private' WHERE username='$username'";
    mysqli_query($link, $sqld);
    $sqld = "UPDATE posts SET tyr='private' WHERE username='$username'";
    mysqli_query($link, $sqld);
    header("Location: /profile");
}
if(isset($_POST['unlock'])) {
    $sqld = "UPDATE avatar SET tyr='' WHERE username='$username'";
    mysqli_query($link, $sqld);
    $sqld = "UPDATE posts SET tyr='' WHERE username='$username'";
    mysqli_query($link, $sqld);
    $norvasts = "UPDATE following SET verfied='1' WHERE verfied='0' AND following_id='$username'";
    mysqli_query($link, $norvasts);
    $norvastss = "DELETE FROM request WHERE receiver='$username' AND reason='requested to follow you'";
    mysqli_query($link, $norvastss);
}



//

if(isset($_POST['report'])) {
$x = mysqli_real_escape_string($link, $_POST['report']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
$query = "SELECT * FROM request WHERE receiver='$x'";
$res = mysqli_query($link, $query);
$quer = "SELECT * FROM posts WHERE imagesData='$x'";
$re = mysqli_query($link, $quer);
if(!mysqli_num_rows($res)) {
    if(mysqli_num_rows($re)) {
    $querys = "INSERT INTO request(sender, receiver, reason) 
VALUES('$username', '$x', 'post reporting')";
mysqli_query($link, $querys);    
echo "t";
    }
echo "t";
}
echo "t";
}

if(isset($_POST['message'])) {
$x = mysqli_real_escape_string($link, $_POST['message']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);    
    $sql = "UPDATE avatar SET message='$x' WHERE username='$username'";
    mysqli_query($link, $sql);
}
if(isset($_POST['mail'])) {
for ($i=0; $i<1; $i++) {
    for ($j=0; $j<1; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<1; ++$j) {
        pclose($pipe[$j]);
    }
}
$u = mysqli_real_escape_string($link, $_POST['mail']);
$u = str_replace("<", "&lt;", $u);
$u = str_replace(">", "&gt;", $u);
if (!filter_var($u, FILTER_VALIDATE_EMAIL)) {
  echo "Invalid email format";
} else {
 $sql = "SELECT * FROM users WHERE email='$u' AND status='1'";
$res = mysqli_query($link, $sql);
$row = mysqli_num_rows($res);
$namh = mysqli_fetch_array($res);
$name = $namh['username'];
if($row > 0) {
$to_email = $u;
$x = rand(9999, 100000000);
$subject = $name.", it is easy to get back to Postagram";
$body = "Hi!
Sorry to hear that you had trouble logging in.
".$x." is your One Time Password (OTP) to log in to your account.
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
    setcookie("rand", $u, time()+365*24*60*60);
    $update = "UPDATE users SET latest_forgot='$x' WHERE email='$u'";
    mysqli_query($link, $update);
} else {
    echo "An unkown error occured.";
}       
} else {
    echo "Invalid Email.";
}   
}
}
} else {
echo "The beatles rock!";
}
?>