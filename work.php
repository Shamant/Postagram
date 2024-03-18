<?php
$username = $_COOKIE['id'];
$cute = $_COOKIE['avatar'];
require_once "signup.php";
if(isset($_FILES['file']) && isset($_POST['upload'])){
   // file name
   // Location
   // file extension
   $img_name = $_FILES['file']['name'];
   $file_extension = pathinfo($img_name, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);
$new_img_name = uniqid("", true).'.'.$file_extension;
   // Valid extensions
  $img_upload_path = 'uploads/'.$new_img_name;
      if(file_exists($img_upload_path)) {
          $new_img_name = uniqid("", true).'.'.$file_extension;
   // Valid extensions
  $img_upload_path = 'uploads/'.$new_img_name;
  check();
      } else {
      }
      function check() {
       if(file_exists($img_upload_path)) {
          $new_img_name = uniqid("", true).'.'.$file_extension;
   // Valid extensions
  $img_upload_path = 'uploads/'.$new_img_name;
  check();
      } else {
      }   
      }
$tmp_name = $_FILES['file']['tmp_name'];
      // Upload file
      $size = $_FILES['file']['size'];
      if($size > 65000) {
function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        $exif = exif_read_data($source_url);
                $image = imagecreatefromjpeg($source_url);
    if (!empty($exif['Orientation'])) {
        switch ($exif['Orientation']) {
            case 3:
                $image = imagerotate($image, 180, 0);
                break;

            case 6:
                $image = imagerotate($image, -90, 0);
                break;

            case 8:
                $image = imagerotate($image, 90, 0);
                break;
                
            case 3:
                $image = imagerotate($image, 180, 0);
                break;
        }
        imagejpeg($image, $destination_url, $quality);
        imagedestroy($image);
    } else {
        imagejpeg($image, $destination_url, $quality);
        imagedestroy($image);
    }
    }
$filename = compress_image($tmp_name, $img_upload_path, 70);
      } else {
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_upload_path)){
      } else {
          echo "Fail";
      }
      }
$txt = mysqli_real_escape_string($link, $_POST['upload']);
$txt = str_replace("<", "&lt;", $txt);
$txt = str_replace(">", "&gt;", $txt);
$pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="/tag/$1">#$1</a>', 
             '<a class="res" href="/discover/$1">@$1</a>');
$txt = preg_replace($pat, $rep, $txt);
   $tr = $_POST['comm'];
$sql = "INSERT INTO posts(username, imagesData, caption, avatar, tyr, type, allow, likes) 
	    VALUES('$username', '$new_img_name', '$txt', '$cute', 'private', '', '$tr', '0')";
mysqli_query($link, $sql);
   exit;
}

?>