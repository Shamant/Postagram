<?php
if(!isset($_COOKIE['id'])){
  header("location: /login");
  exit;
}
$username = $_COOKIE['id'];
require_once "signup.php";
for ($i=0; $i<1; $i++) {
    for ($j=0; $j<1; $j++) {
        $pipe[$j] = popen('script2.php', 'w');
    }

    for ($j=0; $j<1; ++$j) {
        pclose($pipe[$j]);
    }
}
if(isset($_GET['text'])) {
    $x = mysqli_real_escape_string($link, $_GET['text']);
$x = str_replace("<", "&lt;", $x);
$x = str_replace(">", "&gt;", $x);
$x = trim($x);
} else {
    $x = "";
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><base href="/"><title>Search Posts</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"><script src='https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js'></script><style>a:link{text-decoration: none!important;cursor: pointer;}</style></head><body>
<span style="display:flex;"><span class="acc ac" style="width:50%;text-align:center;padding: 5px ;">Accounts</span>&nbsp;<span class="tag" style="width:50%;text-align:center;border-bottom: 1px solid #eee; padding: 5px ;">Posts</span></span><br><center><div style="display:flex;width:100%"><input type="text" name="search" id="search" class="form-control" placeholder="Search posts by caption" autocomplete="off" value="<?php echo $x;?>"><img src="mic.png" class="record" style="height: 29px;width: 29px;margin-top: -8px;margin-left:2%"/></div><hr></center><br><div class="container"><h6 class="kl" style="visibility:hidden;margin-bottom:-10px;text-align:center;font-weight: 400;">Enter Keywords To Search For Posts</h6>
</div><div id="show-list" style="margin-top:-48px;"></div>
<script>
setInterval(function(){
(function(){
    debugger
window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
  }
}
}())
}, 100);
window.addEventListener('resize', function(event){
 window.console.log = function(){
  console.error('No hacking!');
  window.console.log = function() {
      return false;
  }
}
});
$('.acc').on('click', function(){
    const text = $("#search").val();
    window.location.replace("search/" + text);
});
    $(document).ready(function () {
        var qwety = "cce4560po";
        var t = $("#search").val();
        const val = "tag";
        if($.trim(t) == "") {
            $("html").append("<br><br><br><br><center><img class='sde' src='no.png'/></center>");
            $(".kl").css("visibility", "visible"); 
            $("#show-list").html("");
        } else {
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                      $("#show-list").html(t);
                      const observer = lozad();
observer.observe();
                  },
              })
            $("#show-list").html("");
        }
            $("#search").on("change paste keyup", function() {
        var t = $("#search").val();
        const val = "tag";
        if($.trim(t) == "") {
            $(".kl").css("visibility", "visible"); 
            $("#show-list").html("");
        } else {
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                      $(".kl").css("margin-bottom", "-40px"); 
                      $(".kl").css("visibility", "hidden"); 
                      $(".sde").remove();
                      $("#show-list").html(t);
                      const observer = lozad();
observer.observe();
                  },
              })
            $("#show-list").html("");
        }
    });
    
    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

$('.record').on('click', function(e) {
            var isSafari = window.safari !== undefined;
if (isSafari) {
  alert("Please change or update your browser to access this feature.");
} else {
    var value = readCookie('token');
     if(!value) {
     var msg = new SpeechSynthesisUtterance();
msg.text = "Say 'stop' to end voice dictation";
window.speechSynthesis.speak(msg);    
document.cookie = 'token=76489015; expires=Sun, 1 Jan 2023 00:00:00 UTC; path=/';
setTimeout(function () {
if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            navigator.getUserMedia({ audio: true }, function (e) {
var SpeechRecognition = window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
  var text = $('#search').val();
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
          $('#search').val("");
          if($.trim(text) == "") {
              var nh = Content;
              nh = capitalizeFirstLetter(nh);
          $("#search").val(nh);
      } else {
          $("#search").val(text + " " + Content);
      }
      search();
      }
  };
  recognition.onspeechend = function() {
  }
  recognition.onerror = function(event) {
    if(event.error == 'no-speech') {
    }
  }
    recognition.start();
}, function (err) {
        alert("Not able to access microphone. Go to your browser settings and click on allow microphone access.");
})
} else {
  alert("Please change or update your browser to access this feature.");
}
}, 3500);
     } else {
if ('SpeechRecognition' in window || 'webkitSpeechRecognition' in window) {
            navigator.getUserMedia({ audio: true }, function (e) {
var SpeechRecognition = window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
  var text = $('#search').val();
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
          $('#search').val("");
          if($.trim(text) == "") {
              var nh = Content;
              nh = capitalizeFirstLetter(nh);
          $("#search").val(nh);
      } else {
          $("#search").val(text + " " + Content);
      }
      search();
      }
  };
  recognition.onspeechend = function() {
  }
  recognition.onerror = function(event) {
    if(event.error == 'no-speech') {
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
}
function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}
});
    });
    function search() {
        var qwety = "cce4560po";
    var t = $("#search").val();
        const val = "tag";
        if($.trim(t) == "") {
            $(".kl").css("visibility", "visible"); 
            $("#show-list").html("");
        } else {
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                      $(".kl").css("margin-bottom", "-40px"); 
                      $(".kl").css("visibility", "hidden"); 
                      $(".sde").remove();
                      $("#show-list").html(t);
                      const observer = lozad();
observer.observe();
                  },
              })
            $("#show-list").html("");
        }     
    }
 var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
   document.activeElement.blur();
   } else {
   }
   lastScrollTop = st;
});
document.addEventListener("keydown", function (e) {});
</script><style>#search{width:80%;margin-top:-7px;height:30px;line-height:111;border-radius:4px;margin-left:8.5%;}hr{width:100%}</style></body></html>