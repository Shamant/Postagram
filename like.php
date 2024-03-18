<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
$post_err = "";
$sqls = "SELECT * FROM avatar WHERE username='$username'";
$res = mysqli_query($link, $sqls);
$row = mysqli_fetch_array($res);
    $re = $row['prof'];
    $rs = $row['tyr'];
  if (isset($_POST['post']) && isset($_FILES['ima'])) {
    $img_name = $_FILES['ima']['name'];
	$img_size = $_FILES['ima']['size'];
	$tmp_name = $_FILES['ima']['tmp_name'];
	$error = $_FILES['ima']['error'];
	if ($error === 0) {
		if ($img_size > 12000000) {
$post_err = "Your post is too large.";
        }else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);
			$allowed_exs = array("jpg", "jpeg", "png", "gif", "tiff", "jfif", "ico"); 
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
$txt = mysqli_real_escape_string($link, $_POST['postgh']);
$txt = str_replace("<", "&lt;", $txt);
$txt = str_replace(">", "&gt;", $txt);
$username = str_replace("<", "&lt;", $username);
$username = str_replace(">", "&gt;", $username);
$reason = "mentioned you in a post.";
$pat = array('/#(\w+)/', '/@(\w+)/');
$rep = array('<a class="res" href="tag.php?tag=$1">#$1</a>', 
             '<a class="res" href="discover.php?search=$1">@$1</a>');
$new_msg = preg_replace($pat, $rep, $txt);
$filename = compress_image($tmp_name, $img_upload_path, 90);
$sql = "INSERT INTO posts(username, imagesData, caption, avatar, tyr, type, allow, likes) 
	    VALUES('$username', '$new_img_name', '$new_msg', '$re', '$rs', '', 'yes', '0')";
				mysqli_query($link, $sql);
                header("Location: /profile");
            }else {
				$post_err = "You cannot upload these types of files";
			}
		}
	}else {
		$post_err = "An unknown error occured";
	}
}
?>
<!DOCTYPE html>
<html lang="en"><head><title>Postagram</title>
<meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></head><body>
<?php
if(!empty($post_err)){
            echo '<div class="alert alert-danger">' . $post_err . '</div>';
        }      
        ?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
    <label for="file-input" class="btn"><img id="gugu" src="https://img.icons8.com/ios-filled/72/000000/camera--v2.png"/></label>
    <input id="file-input" type="file" id="select" class="image" name="ima" accept="image/*" style="visibility: hidden;" onchange="loadFile(event)" /><input type="submit" id="yu" class="btn btn-primary" value="Next" name="post" disabled><br><br><br><center><textarea type="text" class="form-control" id="input1" placeholder="Write about your post." name="postgh" maxlength='250'></textarea><br><br><hr><br><h4 class="dream">Allow Comments</h4><br><label class="switch"><input type="checkbox" checked><span class="slider round"></span></label><hr><br><div id="croppt" class="preview"><img id="output" class="responsive"></div></center></form><br><center><button class="btn btn-default hj"  data-toggle="modal" data-target="#modal" id="food">Crop</button><button class="btn btn-default hjs" id="foods">Rotate</button></center>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close">
          <span class="jh">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="img-container">
            <div class="row">
                <div class="col-md-8">
                    <center>
                    <img id="image" src=""></center>
                </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default jh">Cancel</button>
        <button type="button" class="btn btn-default" id="crop">Post</button>
      </div>
    </div>
  </div>
</div>
<style>html,body{overflow-x:hidden;overflow-y:scroll;}@media screen and (max-width:1500px){.responsive{width:50%;object-fit:cover;visibility:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:700px){.responsive{position:absolute;left:0;width:100%;object-fit:cover;visibility:hidden}}#yu{right:16px;margin-top:-77px;width:58px;position:absolute;color:#fff;border:none;background-color:#1e90ff;font-size:17px;height:35px;}@media screen and (max-width:1500px){#input1{height:65px;font-family:inherit;font-size:16px;line-height:2;width:50%;margin-bottom:12px;margin-top:-30px;}}@media screen and (max-width:700px){#input1{height:65px;font-family:inherit;font-size:16px;line-height:2;width:92%;margin-bottom:12px;margin-top:-30px}}#useless{width:auto;object-fit:cover}#gugu{height:50px;width:50px}.alert{background-color:red;color:#fff}.cropper-bg{background-image: url();}.cropper-modal{background-color:#fff;}.modal-open .modal{height:600px;}#image{margin-top:-10px;height:300px;}@media screen and (max-width:1500px){.hj{visibility:hidden;}}@media screen and (max-width:700px){.hj{visibility:hidden;margin-top:400px;}}@media screen and (max-width:1500px){.hjs{visibility:hidden;margin-left:30px;}}@media screen and (max-width:700px){.hjs{visibility:hidden;margin-top:400px;margin-left:30px;}}.switch{display:inline-block;width:60px;height:24px;margin-top:-60px;right:0;position:absolute;margin-right:7px;}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:"";height:18px;width:18px;left:9px;bottom:4px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked + .slider{background-color:#2196F3}input:focus + .slider{box-shadow:0 0 1px #2196F3}input:checked + .slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}hr{margin-top:-25px;margin-bottom:26px;}.dream{margin-top:-34px;left:0;position:absolute;margin-left:15px;}.modal-footer{border-top:1px solid #fff;}</style><script>
      var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      document.getElementById("output").style.visibility = "visible";
      document.getElementById("crop").style.visibility = "visible";
                  document.getElementById("foods").style.visibility = "visible";
            document.getElementById("food").style.visibility = "visible";
            document.getElementById("output").style.height = "390px";
      document.getElementById("yu").disabled = false;
      document.getElementById("output").style.objectFit = "cover";
    }
  };
var $modal = $('#modal');
var image = document.getElementById('image');
$("body").on("change", ".image", function(e){
        var files = e.target.files;
    var done = function (url) {
      image.src = url;
      $modal.modal('show');
    };   
    var reader;
    var file;
    var url;

    if (files && files.length > 0) {
      file = files[0];

      if (URL) {
        done(URL.createObjectURL(file));
      } else if (FileReader) {
        reader = new FileReader();
        reader.onload = function (e) {
          done(reader.result);
        };
        reader.readAsDataURL(file);
      }
    }
});

$modal.on('shown.bs.modal', function () {
    cropper = new Cropper(image, {
    aspectRatio: 1,
    viewMode: 3
});
}).on('hidden.bs.modal', function () {
   cropper.destroy();
   cropper = null;
});
$(".jh").click(function(){
    var define = output.src;
          console.log(define);
          $modal.modal('hide');
          var fg = false;
    });
$("#crop").click(function(){
    canvas = cropper.getCroppedCanvas({
      width: 1290,
      height: 1290,
    });
        canvas.toBlob(function(blob) {
        url = URL.createObjectURL(blob);
         let img = document.getElementById("output");
         img.src = url;
         $("#croppt").append(img);
        var reader = new FileReader();
         reader.readAsDataURL(blob); 
         reader.onloadend = function() {
            var base64data = reader.result;  
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "upload.php",
                data: {image: base64data},
                success: function(data){
                    console.log(data);
                    $modal.modal('hide');
                    alert("success upload image");
                }
              });
         }
    });
})
var angle = 0;
$('#foods').on('click', function() {
    angle += 90;
    $('#output').css('transform','rotate(' + angle + 'deg)');
});
</script></body></html>