<?php
if(!isset($_COOKIE['loggedin'])){
    header('location: index.php');
    exit;
}
$username = $_COOKIE['id'];
require_once 'signup.php';
?>
<!DOCTYPE html>
<html lang='en'><head><title>Post</title>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js' integrity='sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css' crossorigin='anonymous' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha256-WqU1JavFxSAMcLP2WIOI+GB2zWmShMI82mTpLDcqFUg=' crossorigin='anonymous'></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css' integrity='sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=' crossorigin='anonymous' />
    <script src='https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js' integrity='sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script src='https://code.jquery.com/jquery-3.6.0.min.js'></script><script src="check.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js'></script></head><body id='style'><label for='file-input' class='btn'><img id='gugu' src='https://img.icons8.com/ios-filled/72/000000/camera--v2.png'/></label>
    <input id='file-input' type='file' id='select' class='image' name='ima' accept='image/*' style='visibility: hidden;' onchange='loadFile(event)' /><input type='submit' id='yu' class='btn btn-primary' value='Next' name='post' disabled><br><br><center><hr><br><h4 class='dream'>Comments</h4><br><label class='switch'><input id='Input' type='checkbox' checked><span class='slider round'></span></label><hr><br><div id='croppt' class='preview'><img id='output' class='responsive changed'></div><button class='btn btn-default hj changed' id='food'>Crop</button><button class='btn btn-default hjs changed' id='foods'>Rotate</button></center>
<div class='modal fade' id='modal' tabindex='-1' role='dialog' aria-labelledby='modalLabel' aria-hidden='true'>
<div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close'>
          <span class='jh'>×</span>
        </button>
      </div>
      <div class='modal-body'>
        <div class='img-container'>
            <div class='row'>
                <div class='col-md-8'>
                    <center>
                    <img id='image' src=''></center>
                </div>
        </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default jh'>Cancel</button>
        <button type='button' class='btn btn-default' id='crop'>Crop</button>
      </div>
    </div>
  </div>
</div>
<style>html,body{overflow-x:hidden;overflow-y:hidden;}@media screen and (max-width:1500px){.responsive{width:50%;object-fit:cover;visibility:hidden;margin-left:auto;margin-right:auto;}}@media screen and (max-width:500px){.responsive{position:absolute;left:0;width:100%;object-fit:cover;visibility:hidden}}#yu{right:16px;margin-top:-80px;width:58px;position:absolute;color:#fff;border:none;background-color:#1e90ff;font-size:17px;height:37px;}#gugu{height:50px;width:50px}#alert{background-color:red;color:#fff;text-align:center;height: 46px;border-radius:2px;font-size: 18px;padding-top: 10px;position:fixed;top:0;width:100%;}.cropper-bg{background-image: url();}.cropper-modal{background-color:#fff;}.modal-open .modal{height:600px;}#image{margin-top:-10px;height:300px;}@media screen and (max-width:1500px){.hj{visibility:hidden;margin-top:30px;}}@media screen and (max-width:500px){.hj{visibility:hidden;margin-top:340px;}}@media screen and (max-width:1500px){.hjs{visibility:hidden;margin-left:30px;margin-top:30px;}}@media screen and (max-width:500px){.hjs{visibility:hidden;margin-top:340px;}}.switch{display:inline-block;width:50px;height:24px;margin-top:-60px;right:0;position:fixed;margin-right:7px;}.switch input{opacity:0;width:0;height:0}.slider{position:absolute;cursor:pointer;top:0;left:0;right:0;bottom:0;background-color:#ccc;-webkit-transition:.4s;transition:.4s}.slider:before{position:absolute;content:'';height:18px;width:18px;left:3px;bottom:3.8px;background-color:#fff;-webkit-transition:.4s;transition:.4s}input:checked + .slider{background-color:#2196F3}input:focus + .slider{box-shadow:0 0 1px #2196F3}input:checked + .slider:before{-webkit-transform:translateX(26px);-ms-transform:translateX(26px);transform:translateX(26px)}.slider.round{border-radius:34px}.slider.round:before{border-radius:50%}hr{margin-top:-25px;margin-bottom:26px;}.dream{margin-top:-34px;left:0;position:fixed;margin-left:15px;}.modal-footer{border-top:1px solid #fff;}</style><script>
document.addEventListener('contextmenu', (e) => e.preventDefault()),
    document.addEventListener('keydown', function (e) {
        e.ctrlKey && e.preventDefault();
    });
    var images = document.getElementById('output');
var loadFile = function (e) {
        var files = e.target.files;
        var extension = files[0].type;
        var size = files[0].size;
        if(size > 30000000) {
         var i = document.createElement('DIV');
         i.id = 'alert';
         i.innerHTML = 'Your post is too large';
         document.body.appendChild(i);
         document.getElementById('yu').disabled = true;
         document.getElementById('gugu').style.marginTop = '50px';
         document.getElementById('output').style.visibility = 'visible';
        } else {
        extension = extension.replace('image/', '');
        localStorage.setItem('file', extension);
        (images.src = URL.createObjectURL(e.target.files[0])),
            (images.onload = function () {
                    (document.getElementById('output').style.visibility = 'visible'),
                    (document.getElementById('crop').style.visibility = 'visible'),
                    (document.getElementById('foods').style.visibility = 'visible'),
                    (document.getElementById('food').style.visibility = 'visible'),
                    (document.getElementById('output').style.height = '320px'),
                    (document.getElementById('yu').disabled = !1),
                    (document.getElementById('output').style.objectFit = 'cover');
            });
}
    },
    $modal = $('#modal'),
    image = document.getElementById('image');
localStorage.removeItem('types'),
    localStorage.removeItem('type'),
    localStorage.removeItem('img'),
    localStorage.removeItem('allow'),
    localStorage.removeItem('angle'),
    localStorage.removeItem('file'),
    $('body').on('change', '.image', function (e) {
        function t(e) {
            image.src = e;
            if(localStorage.getItem('file')) {
            $modal.modal('show');
            } else {
              $modal.modal('hide');  
            }
        }
        var o,
            e = e.target.files;
        e &&
            0 < e.length &&
            ((e = e[0]),
            URL
                ? t(URL.createObjectURL(e))
                : FileReader &&
                  (((o = new FileReader()).onload = function (e) {
                      t(o.result);
                  }),
                  o.readAsDataURL(e)));
    }),
    $modal
        .on('shown.bs.modal', function () {
            cropper = new Cropper(image, { aspectRatio: 1, viewMode: 3 });
        })
        .on('hidden.bs.modal', function () {
            cropper.destroy(), (cropper = null);
        }),
    $('.jh').click(function () {
        $modal.modal('hide');
        if(images.naturalWidth < 1500) {
            console.log('j');
        } 
        if(images.naturalWidth > 1500) {
          (canvas = cropper.getCroppedCanvas({ height: 600})),
            canvas.toBlob(function (e) {
                (url = URL.createObjectURL(e)), localStorage.setItem('types', 'crop');
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        document.getElementById('output').src = url;
                    });
            });   
        }
    }),
    $('.hj').click(function () {
        $modal.modal('show'), localStorage.setItem('type', 'normal');
    }),
    $('#crop').click(function () {
        (canvas = cropper.getCroppedCanvas({ width: 600})),
            canvas.toBlob(function (e) {
                (url = URL.createObjectURL(e)), localStorage.setItem('types', 'crop');
                var t = new FileReader();
                t.readAsDataURL(e),
                    (t.onloadend = function () {
                        document.getElementById('output').src = url;
                    });
            });
    });
var angle = 0;
$('#foods').on('click', function () {
    (angle -= 90), $('#output').css('transform', 'rotate(' + angle + 'deg)');
    var e = document.querySelector('#output').computedStyleMap().get('transform');
    localStorage.setItem('angle', e),
        500 < screen.width
            ? ((document.getElementById('output').style.height = '300px'), (document.getElementById('output').style.width = '300px'), (document.getElementById('output').style.marginTop = '30px'))
            : ((height = $(window).innerWidth()), $('.responsive').css('height', height), (document.getElementById('food').style.marginTop = '105%'), (document.getElementById('foods').style.marginTop = '105%'));
}),
    $('#yu').click(function () {
   document.getElementById('Input').checked ? localStorage.setItem('allow', 'yes') : localStorage.setItem('allow', 'no');
$('body > *').addClass('changed');$(".changed").css("visibility", "hidden");
var uri = document.getElementById("output").src;
console.log(uri);
localStorage.setItem("img", uri);
$('html').html("<img class='arrow' src='https://img.icons8.com/fluency-systems-filled/48/000000/long-arrow-left.png' onclick='location.href = 'post.php';'/><h6 id='p'>New Post</h6><form action='' method='POST'><input type='submit' id='uy' class='hg' name='subm' value='Post' required><br><hr class='hr'><br><br><center><img id='output' class='avatar'><hr class='hrs'></center><h5 class='name'><?php echo $username;?></h5><br><br><center><textarea class='hu' id='l' name='input' maxlength='220' placeholder='Title'></textarea><br><hr class='df'><br></center><h5 id='na' class='name'>Categories</h5><br><div class='tech av Tech'>Tech </div><div class='tech Art'>Art</div><div class='tech avs Fashion' id='fs'>Fashion </div><div class='tech Family' id='fs'>Family </div><div class='tech av DIY' id='hs'>DIY </div><div class='tech Music'>Music </div><div class='tech avs Wedding'>Wedding </div><div class='tech Space'>Space </div><div class='tech av Travel'>Travel </div><div class='tech Nature'>Nature </div><div class='tech avs Lifestyle'>Lifestyle </div><div class='tech Books'>Books </div><div class='tech av Food'>Food </div><div class='tech Party'>Party </div><div class='tech avs Comedy'>Comedy </div><div class='tech Cars'>Cars </div><div class='tech av Sports'>Sports </div><div class='tech Love'>Love </div><div class='tech avs History'>History </div><div class='tech Vista'>Vista </div><div class='tech av Science'>Science </div><div class='tech Service'>Service </div><div class='tech avs Finance'>Finance </div><div class='tech Animals'>Animals </div></form><hr>");            
var style = document.getElementById('style');
style.innerHTML = 'html, body { max-width: 100%; overflow-x: hidden; }@media screen and (max-width:1500px){.avatar{width:300px;height:300px;border-radius:7px;object-fit:cover;margin-top:-33px;}}@media screen and (max-width:900px){.avatar{width:320;height:320px;border-radius:7px;object-fit:cover;margin-top:-5%;}}@media screen and (max-width:550px){.avatar{width:90%;height:270px;border-radius:7px;object-fit:cover;margin-top:-10%;}}.arrow{left:0;position:absolute;margin-left:10px;top:12;height:21px}.hg{right:0;position:absolute;margin-right:7px;height:30px;border:none;background-color:#5d00ffd9;color:#fff;border-radius:5px;width:70px;top:5;padding-bottom:2.5px;}h6{left:0;position:absolute;margin-left:55px;top:11;font-size:18px;}.name{left:0;position:absolute;margin-top:2px;margin-left:5%;font-size:16px;}.hu{width:90%;border-radius:4px;border-color:#fff;height:105px;text-align:left;margin-top:-15px;margin-left:-2px;}textarea{outline:none}.df{margin-bottom:-12px;}.tech{margin-top:12px;margin-left:6%;border-radius:16px;background:#e9ecef;width:60px;text-align:center;height:30px;line-height:1.9;display:inline-block;}.row{display:flex;}button{outline:none;}#fr{visibility:hidden;margin-top:50px;margin-bottom:-50px;}';
  document.head.appendChild(style);
    });
</script></body></html>