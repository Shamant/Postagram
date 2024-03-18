<?php
require_once "signup.php";
$username = $_COOKIE['id'];
$dghs = "SELECT * FROM request WHERE seen!='1' ORDER BY rand() LIMIT 200"; 
$data = mysqli_query($link, $dghs);
while($row = mysqli_fetch_array($data)) {
         $r = $row['receiver'];
         $d =  $row['sender'];
         $y = $row['reason'];
         $sql = "SELECT * FROM users WHERE username='$r'";
         $res = mysqli_query($link, $sql);
         while($rowd = mysqli_fetch_array($res)) {
         $kn = $rowd['username'];
$to_email = $rowd['email'];
$subject = $d." has";
$headers = "From: help.postagram@gmail.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$body = "<html>
<body>
<h2>Hello $kn.</h2>
<h2>There are a few notifications which you haven't read on Postagram.</h2>
<button style=\"border:none;background-color:#1e90ff;width:60px;height:30px;border-radius:16px;color:white;font-size:18px;text-align:center;\"><a style=\"text-decoration:none;color:white;font-family:sans-serif;\" href='postagram.in/Notification.php'>Go</a></button>
</body></html>";
ini_set("SMTP","smtp.gmail.com");
ini_set("smtp_port","587");
ini_set('sendmail_from','help.postagram@gmail.com');
if (mail($to_email, $subject, $body, $headers)) {
    echo "sent";
} else {
    echo "f";
}
         }
    }
?>