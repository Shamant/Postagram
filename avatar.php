<?php
if(!isset($_COOKIE['registered'])){
    header("location: index.php");
    exit;
}
if(isset($_COOKIE['loggedin'])) {
    header("Location: home.php");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
$post_err = "";
  // If upload button is clicked ...
  if (isset($_POST['post']) && isset($_FILES['ima'])) {
    $img_name = $_FILES['ima']['name'];
	$img_size = $_FILES['ima']['size'];
	$tmp_name = $_FILES['ima']['tmp_name'];
	$error = $_FILES['ima']['error'];

	if ($error === 0) {
		if ($img_size > 12500000) {
$post_err = "Your image is too large.";
        }else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png", "gif", "jfif", "tiff"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
function compress_image($source_url, $destination_url, $quality) {
        $info = getimagesize($source_url);
        $exif = exif_read_data($source_url);
                 if($info['mime'] == 'image/jpeg') {
                $image = imagecreatefromjpeg($source_url);
 } elseif ($info['mime'] == 'image/gif') {
        $image = imagecreatefromgif($source_url);
        } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_url);
        }
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
                $filename = compress_image($tmp_name, $img_upload_path, 25);
				$sql = "INSERT INTO avatar(username, prof, tyr, type) 
				        VALUES('$username', '$new_img_name', '', '')";
				mysqli_query($link, $sql);
                $sql_2 = "UPDATE users
                SET status='1'
                WHERE username='$username'";
      mysqli_query($link, $sql_2);
                setcookie("loggedin", "true", time()+365*24*60*60);
                setcookie("avatar", $new_img_name, time()+365*24*60*60);
				header("Location: /home");
            }else {
				$post_err = "You cannot upload these types of files";
			}
		}
	}else {
	$post_err = "An unkown problem occured.";
}
	}
?>
<html>
<head>
<title>Postagram</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php
if(!empty($post_err)){
            echo '<div class="alert alert-danger">' . $post_err . '</div>';
        }      
        ?><br>
        <h6 class="d" align="center">Upload Your Avatar</h6><hr><br>
<form action="" method="post" enctype="multipart/form-data">
    <label for="file-input" class="btn"><img id="pass" src="https://img.icons8.com/ios/72/000000/compact-camera.png"> </label>
    <input id="file-input" name="ima" type="file" id="select" accept="image/*" style="visibility: hidden;" onchange="loadFile(event)" />
    <p>Have a favorite image? Upload your avatar now. When you upload an avatar, people can recognize you.</p>
     <input type="submit" id="button1" class="btn btn-primary" value="Upload" name="post" disabled><br><br><br><br><img id="output" class="responsive">
    </form>
<style>
body{text-align:center;width:auto!important;overflow-x:hidden!important;overflow-y:scroll;font-family:sans-serif;background-color:#80808001;}.responsive{position:relative;margin-top:23px;}#button1{bottom:0;position:absolute;display:block;margin-left:auto;margin-right:auto;left:13%;width:75%;height:40px;line-height:1px;color:#fff;background-color:#1e90ff;}#pass{height:50px;}p{color:rgba(0,0,0,1.00);overflow-wrap:break-word;margin-top:-29px;font-weight:400;}.row{display:flex}h5{margin-bottom: 10px;}.btn{display:block;margin-left:auto;margin-right:auto}.cf{border:1px solid #ccc!important;padding:.01em 16px;width:60%;height:100px;text-align:center;border-radius:12px;margin-top:-3px;}.uiux{margin-bottom:10px;margin-top:15px;font-size:17px;}.ghk{background-color:#1e90ff;color:white;border-radius:3px;border:0;width:40px;height:25px;margin-top:4px}.alert{background-color:red;color:white;}.d{margin-top:-15.6px;font-size: 18px;color:#1e90ff;}.av{height:110px;width:110px;object-fit:cover;border-radius:50%;margin-top:-14px;margin-bottom:10px;}hr{margin-top:-5px;}h5{margin-top:-4px;}
</style>
<script>
    window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#lod';
        window.location.reload();
    }
}
var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) // free memory
        document.getElementById("button1").disabled = false;
        document.getElementById("button1").style.opacity = "1";
        document.getElementById("output").style.width = "160px";
        document.getElementById("output").style.height = "160px";
        document.getElementById("output").style.borderRadius = "360px";
        document.getElementById("output").style.objectFit = "cover";
    }
};
</script></body></html>