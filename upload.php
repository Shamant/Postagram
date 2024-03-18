<?php
if(!isset($_COOKIE['id'])){
    header("location: /login");
    exit;
}
$username = $_COOKIE['id'];
require_once 'signup.php';
?>
<!DOCTYPE html>
<html lang="en"><head><title>Upload a post</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="min-height:99vh;"><div>
<img class='arrow' src='https://cdn-icons-png.flaticon.com/24/2223/2223615.png'/><h6 id='p'>New Post</h6><input type='submit' id='uy' class='hg' name='subm' value='Post' style='opacity:0.7;' disabled>
<img src="set.png" class="set" style="float:right;padding-right:100px;height: 30px;
    margin-top: 5.5px;"/>
</div><br><hr class='hr'><div class='containers' style='overflow:hidden;'><img id='output' src='https://img.icons8.com/pastel-glyph/34/000000/file.png' style='margin-top:18px;margin-bottom:5px;'><br><p id="text" style="width:90%;margin-left:11px;">
First one from the left-single image upload. Stories is the second one from the left. Third one from left-audio. If you cannot find all your images, click on the "browse" option. The mic next to your name is for speech to text. Say  "stop" to end speech to text</p></div><hr class='hrs'><div style="display:flex;width:100%;padding-left:20px;">
<label for="file-input">
<img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/36/000000/external-image-photography-kiranshastry-solid-kiranshastry-1.png"/>
</label>
<label for="file-inputs">
<img src="book.png" style="height:28px;width:29px;margin-left:18px;margin-top:3px;"/></label>
<label for="video">
<img src="mic.png" style="height:29px;width:29px;margin-left:18px;margin-top:2px;"/></label>
</div>
<input id='file-input' type='file' id='select' class='image' name='ima' accept='image/*' style='visibility: hidden;display:none;' onchange='loadFile(event)' multiple/>
<input id='file-inputs' type='file' id='select' class='image' name='ima' accept='image/*' style='visibility: hidden;display:none;' onchange='story(event)' multiple/>
<input id='video' type='file' id='select' class='image' name='ima' accept='audio/*' style='visibility: hidden;display:none;' onchange='video(event)'/>
<hr class='hrs' style='margin-top:3px;'><div style="width:100%;"><h5 class='name'><?php echo mb_strimwidth($username, 0, 15, "...");?></h5><img src="mic.png" class="record" style="height: 24px;width: 24px;float: right;margin-top: -3px;margin-right: 10px;"/></div><br><br>
<center><textarea class='hu' id='l' name='input' maxlength='220' placeholder='Title'></textarea><br><hr class='df'><br></center><h5 id='na' class='name'>Please Select A Category</h5><br><div class='tech av Tech'>Tech </div><div class='tech Art'>Art</div><div class='tech avs Fashion' id='fs'>Fashion </div><div class='tech Family an' id='fs'>Family </div><div class='tech av DIY' id='hs'>DIY </div><div class='tech Music'>Music </div><div class='tech avs Wedding'>Wedding </div><div class='tech Space an'>Space </div><div class='tech av Travel'>Travel </div><div class='tech Nature'>Nature </div><div class='tech avs Lifestyle'>Lifestyle </div><div class='tech Books an'>Books </div><div class='tech av Food'>Food </div><div class='tech Party'>Party </div><div class='tech avs Comedy'>Comedy </div><div class='tech Cars an'>Cars </div><div class='tech av Sports'>Sports </div><div class='tech Love'>Love </div><div class='tech avs History'>History </div><div class='tech Vista an'>Vista </div><div class='tech av Science'>Science </div><div class='tech Service'>Service </div><div class='tech avs Finance'>Finance </div><div class='tech Animals an'>Animals </div><hr>
<div class='option' style='position: fixed;background:#fff;left:0;bottom:0;border:2px #eee;outline: 10000px solid rgba(0, 0, 0, 0.3);border-top-right-radius:16px;border-top-left-radius:16px;visibility:hidden;'> <hr style='margin-top:17px;'>
<div class='che' style='width:100%;font-weight:400;color:black;border:none;height:20px;background:none;padding-left:15px;outline:none;'><p>Allow Comments</p><input class='che' type='checkbox' id='val' style='float:right;margin-right:12px;margin-top:-36px;'></div><hr><br><br><button class='dis' style='width:50%;border-radius:6px;outline:none;bottom:0;position: absolute;background:#fff;color:black;border:1px solid #eee;height:30px;font-size:15px;left:25%;margin-bottom:10px;'>Close</button></div>
    
<div class='error' style='width:220px;background:red;color:white;border-radius:6px;bottom:0;position:absolute;height: 40px;padding-top: 7px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:7px;text-align:center;visibility:hidden;'>Your File Is Too Large</div><style>html, body { max-width: 100%; overflow-x: hidden; position:relative; }@media screen and (max-width:1500px){.avatar{width:300px;min-height:120px;max-height:300px;border-radius:7px;border: 2px solid #eee;object-fit:cover;margin-top:-33px;}}@media screen and (max-width:900px){.avatar{width:320;min-height:120px;max-height:320px;border-radius:7px;object-fit:cover;border: 2px solid #eee;margin-top:-5%;}}@media screen and (max-width:550px){.avatar{width:90%;max-height:270px;border-radius:7px;object-fit:cover;min-height:80px;border: 2px solid #eee;margin-top:-7%;}}.arrow{left:0;position:absolute;margin-left:10px;margin-top:11px;height:21px}.hg{right:0;position:absolute;margin-right:7px;height:30px;border:none;background-color:#1e90ff;color:#fff;border-radius:5px;width:70px;margin-top:5px;padding-bottom:2.5px;}h6{left:0;position:absolute;margin-left:55px;top:11;font-size:18px;}.name{left:0;position:absolute;margin-top:2px;margin-left:5%;font-size:16px;}.hu{width:90%;border-radius:4px;border-color:#fff;height:105px;text-align:left;margin-top:-15px;margin-left:-2px;border:none;}textarea{outline:none}.df{margin-bottom:-12px;}.tech{margin-top:12px;margin-left:5.5%;cursor: context-menu;border-radius:16px;background:#e9ecef;width:60px;text-align:center;height:30px;line-height:1.9;display:inline-block;}.row{display:flex;}button{outline:none;}#fr{visibility:hidden;margin-top:50px;margin-bottom:-50px;}#p{margin-top:10px;}.avs{width:78px;}.containers{text-align:center;width:280px;background:#eeeeee54;border-radius:5px;margin:auto;height:249px;margin-top:5px;}.an{width:67px;}@media screen and (max-width:1500px){.option{ width: 30%;cursor:pointer;
  height: 180px; left: 0;right: 0; margin-left: auto; margin-right: auto;margin-bottom:10%;    border-bottom-right-radius: 16px;
    border-bottom-left-radius: 16px;}}@media screen and (max-width:600px){.option{ width: 100%;
  height: 154px;margin-bottom:0px;    border-bottom-right-radius: 0px;
    border-bottom-left-radius: 0px;cursor: none;}}</style>
<script>
const MAX_WIDTH = 640;
const MAX_HEIGHT = 640;
const MIME_TYPE = "image/jpeg";
const QUALITY = 0.92;
var urls = "";
var string = "";
var loadFile = function (e) {
    if(e.target.files.length > 5) {
         window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
         $(".error").text("You can choose 5 images at a time");
         $(".error").css("width", "280px");
         $(".error").css("visibility", "visible");
        setTimeout(function () {
   $(".error").css("visibility", "hidden");
    }, 2500);       
    } else if(e.target.files.length > 1 && e.target.files.length < 6) {

    } else {
        var files = e.target.files;
        var size = files[0].size;
        var name = files[0].name;
        if(size > 40000000) {
       window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
         $(".error").css("visibility", "visible");
        setTimeout(function () {
   $(".error").css("visibility", "hidden");
    }, 2500);    
        } else if(size < 5000) {
       window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
         $(".error").text("You cannot upload images less than 5kb");
         $(".error").css("width", "98%");
         $(".error").css("visibility", "visible");
        setTimeout(function () {
   $(".error").css("visibility", "hidden");
    }, 2500);     
            } else {
          var files = e.target.files;
          var type = files[0].type;
          type = type.toLowerCase();
          type = type.replace("image/", "");
          type = type.replace("x-", "");
          if(type == "png" || type == "jpeg" || type == "jpg" || type == "webp" || type == "gif" || type == "icon" || type == "tiff" || type == "jiff") {
                        
        if(files) {
          document.getElementById('output').src='loader.gif';

          var images = document.createElement('img');
                            
                $("#output").css("object-fit", "contain");
                $("#text").text("");
$(".containers").css("background", "white");
        $("#output").css("border-radius", "5px");
        $(".containers").css("border", "2px solid #eee");
        $(".containers").css("height", "220px");
        $("#output").css("height", "200px");
        $("#output").css("width", "50%");
        images.src = URL.createObjectURL(e.target.files[0]);
        document.getElementById('output').src='loader.gif';

        if(files[0].size > 80000) {
          images.onload = function () {
            const [newWidth, newHeight] = calculateSize(images, MAX_WIDTH, MAX_HEIGHT);
                const canvas = document.createElement("canvas");
    canvas.width = newWidth;
    canvas.height = newHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(images, 0, 0, newWidth, newHeight);
    canvas.toBlob(
      (blob) => {
        var newImg = document.createElement('img'),
      urls = URL.createObjectURL(blob);
      newImg.id = "output";
      newImg.src = urls;
      string = urls;
  newImg.onload = function() {
      ctx.drawImage(newImg, 0, 0);
  };
  $(".containers").html("");
  var container = document.querySelector('.containers');
  container.appendChild(newImg);
    $("#output").css("margin-top", "0px");
                $("#output").css("object-fit", "cover");
$(".containers").css("background", "white");
        $("#output").css("border-radius", "5px");
        $(".containers").css("border", "2px solid #eee");
        $(".containers").css("height", "220px");
        $("#output").css("width", "100%");
        $("#output").css("height", "215px");
  var jpegUrl = canvas.toDataURL("image/jpeg");
        if($('.te').length == 0) {
  document.getElementById('uy').disabled = true;
  document.getElementById('uy').style.opacity = "0.7";
   document.getElementById("na").innerHTML = "Please Select A Category";
        } else {
document.getElementById('uy').disabled = false;
document.getElementById('uy').style.opacity = "1";
}
      },
      MIME_TYPE,
      QUALITY
    );
          };
        } else {
          document.getElementById('output').src = images.src;
          string = images.src;
          $("#output").css("margin-top", "0px");
                $("#output").css("object-fit", "scale-down");
$(".containers").css("background", "white");
        $("#output").css("border-radius", "5px");
        $(".containers").css("border", "2px solid #eee");
        $(".containers").css("height", "220px");
        $("#output").css("height", "220px");
        $("#output").css("width", "100%");
        }
        }
          } else {
      window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
         $(".error").text("You can upload only png, jpeg, gif, webp, tiff, jiff & ico images");
         $(".error").css("width", "95%");
         $(".error").css("overflow", "hidden");
         $(".error").css("visibility", "visible");
        setTimeout(function () {
   $(".error").css("visibility", "hidden");
    }, 2500);  
          }
    }
}
}
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
function calculateSize(images, maxWidth, maxHeight) {
  let width = images.width;
  let height = images.height;
  if (width > height) {
    if (width > maxWidth) {
      height = Math.round((height * maxWidth) / width);
      width = maxWidth;
    }
  } else {
    if (height > maxHeight) {
      width = Math.round((width * maxHeight) / height);
      height = maxHeight;
    }
  }
  return [width, height];
}
$('.arrow').click(function() {
    navigator.vibrate(100);
window.history.back();
});
     $('#uy').click(function(page) {
    navigator.vibrate(100);
    var img = $("#output").attr("src");
    if($("#output").attr("src") == "" || $("#output").attr("src") == undefined || img.includes("https://") == false || img == "https://img.icons8.com/pastel-glyph/34/000000/file.png" || img == "http://img.icons8.com/pastel-glyph/34/000000/file.png") {
        window.location.replace("/profile");
    } else {
    document.getElementById('uy').disabled = true;
document.getElementById('uy').style.opacity = "0.7";
    fetch(string)
    .then(res => res.blob())
    .then(blob => {
        const file = new File([blob], "capture.jpeg", {
            type: 'image/jpeg'
        });
        var capt = $("#l").val();
        var fet = document.getElementById("val").checked;
        var fd = new FormData();
        fd.append("file", file);
        fd.append("upload", capt);
        fd.append("comm", fet);
        $.ajax({
            method: "POST",
            enctype: 'multipart/form-data',
            url: "work.php",
            data: fd,
            processData: false,
            contentType: false,
            cache: false,
            success: (data) => {
                if(data == "Fail") {
              window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
         $(".error").text("An Unknown Error Occurred");
         $(".error").css("width", "280px");
         $(".error").css("visibility", "visible");
        setTimeout(function () {
   $(".error").css("visibility", "hidden");
    }, 2500);         
                } else {
                window.location.replace("/profile");
                }
            },
            error: function(xhr, status, error) {
                alert("An unknown error occurred.");
            }
        });
});
}
});
$(".set").click(function() {
    $(".option").css("visibility", "visible");
});
$(".dis").click(function() {
    $(".option").css("visibility", "hidden");
});
$('.tech').click(function() {
navigator.vibrate(100);
    var text = $(this).text();
    if($(this).hasClass( "te" )) {
     $(this).removeClass("te");   
    $(this).css("background","#e9ecef");
  $(this).css("color","black");
} else {
        if($('.te').length > 4) {
       document.getElementById("na").innerHTML = "Select Categories: LIMIT 5";
        } else {
    $(this).css("background","black");
    $(this).css("color","white");
    $(this).addClass("te");
  document.getElementById("na").innerHTML = "Selected Categories";
        }
}
        if($('.te').length == 0) {
  document.getElementById('uy').disabled = true;
  document.getElementById('uy').style.opacity = "0.7";
   document.getElementById("na").innerHTML = "Please Select A Category";
        } else {
            var i = $("#output").attr("src");
    if($("#output").attr("src") == "" || $("#output").attr("src") == undefined || i.includes("https://") == false || i == "https://img.icons8.com/pastel-glyph/34/000000/file.png" || i == "http://img.icons8.com/pastel-glyph/34/000000/file.png") {
        } else {
document.getElementById('uy').disabled = false;
document.getElementById('uy').style.opacity = "1";
}
        }
});
$('.record').on('click', function(e) {
            var isSafari = window.safari !== undefined;
if (isSafari) {
  alert("Please change or update your browser to access this feature.");
} else {
                   if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            navigator.getUserMedia({ audio: true }, function (e) {
var SpeechRecognition = window.webkitSpeechRecognition;
  
  var recognition = new SpeechRecognition();
  
  var text = $('#l').val();
  var instructions = $('.name');
  
  var Content = '';
  
  recognition.continuous = true;
  
  recognition.onresult = function(event) {
  
    var current = event.resultIndex;
  
    var transcript = event.results[current][0].transcript;
   
      Content += transcript;
      var nf = transcript.toLowerCase();
      if(nf.includes("stop")) {
           recognition.stop();
       var msg = new SpeechSynthesisUtterance();
msg.text = "Voice Dictation Ended";
window.speechSynthesis.speak(msg);      
      } else {
          $('#l').val("");
          if($.trim(text) == "") {
              var nh = Content;
              nh = capitalizeFirstLetter(nh);
          $("#l").val(nh);
      } else {
          $("#l").val(text + " " + Content);
      }
      }
    
  };
  recognition.onspeechend = function() {
  }
  
  recognition.onerror = function(event) {
    if(event.error == 'no-speech') {
      instructions.text('Please Try again.');  
    }
  }
    recognition.start();
}, function (err) {
        alert("Not able to access microphone. Go to your browser settings and click on allow microphone access.");
})
} else {
  alert("Please change or update your browser to access this feature.");
}
}
});
</script></body></html>