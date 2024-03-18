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
?>
<!DOCTYPE html><html lang="en"><head><base href="/"><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Search</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"><style>a:link{text-decoration: none!important;cursor: pointer;}</style><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></head><body>
<span style="display:flex;"><span class="acc ac" style="width:50%;text-align:center;border-bottom: 1px solid #eee; padding: 5px ;" onclick="search()">Accounts</span>&nbsp;<span class="tag" style="width:50%;text-align:center; padding: 5px ;">Posts</span></span><br><center><input type="text" name="search" id="search" class="form-control" placeholder="Search" autocomplete="off" value="<?php echo $x;?>"> <hr></center><div class="container"><h6 class="kl" style="visibility:hidden;margin-bottom:-10px;text-align:center;font-weight: 400;">Enter Keywords To Search For Accounts</h6>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto rounded p-4" style="margin-top: -12px;">
                <br></div>
               <div class="col-md-5" id="show-list" style="margin-top: -61px;"></div></div></div>
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
$('.tag').on('click', function(){
   const text = $("#search").val();
    window.location.replace("tags/" + text);
});
    $(document).ready(function () {
        var qwety = "cce4560po";
        var t = $("#search").val();
        if($.trim(t) == "") {
          $(".kl").css("visibility", "visible"); 
           $("html").append("<center class='sde'><img class='sde' src='no.png'/></center>");
        }
        const val = "acc";
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                      $("#show-list").html(t);
                  },
              })
            $("#show-list").html("");
            $("#search").on("change keyup input",function () {
        var t = $("#search").val();
        if($.trim(t) == "") {
                     $(".row").css("visibility", "hidden");  
           $("html").append("<center class='sde'><img class='sde' src='no.png' style='margin-top:-60px;'/><br><br><h6 class='kl'>Enter Keywords To Search For Accounts</h6></center>");  
        } else {
        $(".kl").css("visibility", "hidden"); 
        $(".sde").remove();
        const val = "acc";
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                                   $(".row").css("visibility", "visible"); 
                      $("#show-list").html(t);
                  },
              })
            $("#show-list").html("");            
        }
    });
});
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
   document.activeElement.blur();
   } else {
   }
   lastScrollTop = st;
});
document.addEventListener("contextmenu", (event) => event.preventDefault());
document.addEventListener("keydown", function (e) {
    e.ctrlKey && e.preventDefault();
});
function search() {
    window.location.replace("search");
}
function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script><style>#search{width:80%;margin-top:-7px;height:30px;line-height:111;border-radius:4px}hr{width:100%}</style></body></html>
<?php
} else {
    $x = "";
    ?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><title>Search</title><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css"><style>a:link{text-decoration: none!important;cursor: pointer;}</style><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script></head><body>
<span style="display:flex;"><span class="acc ac" style="width:50%;text-align:center;border-bottom: 1px solid #eee; padding: 5px ;">Accounts</span>&nbsp;<span class="tag" style="width:50%;text-align:center; padding: 5px ;">Posts</span></span><br><center><input type="text" name="search" id="search" class="form-control" placeholder="Search" autocomplete="off" value="<?php echo $x;?>"> <hr></center><div class="container"><h6 class="kl" style="visibility:hidden;margin-bottom:-10px;">Recent</h6><button class="clear" style="visibility:hidden;border: none; background: #fff; float: right; height: 20px; font-size: 14px; color: #21a5f3; margin-top: -12.99px;outline:none;">Clear All</button>
        <div class="row mt-4">
            <div class="col-md-8 mx-auto rounded p-4">
                <br></div>
               <div class="col-md-5" id="show-list" style="margin-top: -38px;"></div></div></div>
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
var value = document.getElementById("search").value;
const flag = localStorage.getItem('search');
$('.tag').on('click', function(){
   const text = $("#search").val();
    window.location.replace("tags/" + text);
});
    $(document).ready(function () {
    var qwety = "cce4560po";
            $("#search").on("change keyup input",function () {
        var t = $("#search").val();
        if($.trim(t) == "") {
        $(".kl").css("visibility", "visible"); 
    $(".kl").css("text-align", "center"); 
    $(".kl").css("font-weight", "400"); 
    if($(".avatar").length > 0) {
        
    } else {
    $("html").append("<center class='sde'><img class='sde' src='no.png'/></center>");
    }
    $(".kl").text("Enter Keywords To Search For Accounts");
        } else {
              const val = "acc";
                    $(".kl").remove();
                    $(".sde").remove();
                      $(".clear").remove();
            $.ajax({
                  url: "/searches",
                  method: "POST",
                  minlength: 2,
                  data: { query: t, type: val, user: qwety },
                  success: function (t) {
                      $(".p-4").css("margin-top", "-12px");
                       $("#show-list").css("margin-left", "0px");
                      $("#show-list").html(t);
                  },
              })
            $("#show-list").html("");      
        }
    });
});
 var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
   document.activeElement.blur();
   } else {
   }
   lastScrollTop = st;
});
document.addEventListener("keydown", function (e) {
    e.ctrlKey && e.preventDefault();
});
if(!flag) {
    $(".kl").css("visibility", "visible"); 
    $(".kl").css("text-align", "center"); 
    $(".kl").css("font-weight", "400"); 
    $("html").append("<center><img class='sde' src='no.png'/></center>");
    $(".kl").text("Enter Keywords To Search For Accounts"); 
} else {
  $(".kl").css("visibility", "visible"); 
  $(".clear").css("visibility", "visible"); 
  $("#show-list").css("margin-left", "215px");
  $("#show-list").html(flag);
}
$('.clear').on('click', function(){
    if (confirm("Are you sure you want clear your search history?")) {
           localStorage.removeItem('search');
           $("#show-list").html("");
           $(".clear").remove();
               $(".kl").css("visibility", "visible"); 
    $(".kl").css("text-align", "center"); 
    $(".kl").css("font-weight", "400"); 
    $(".kl").text("Enter Keywords To Search For Accounts"); 
        } else {
        }
});
function beforeUnloadListener(e){return e.preventDefault(),e.returnValue="Are you sure you want to exit?"}onPageHasUnsavedChanges(()=>{window.addEventListener("beforeunload",beforeUnloadListener)}),onAllChangesSaved(()=>{window.removeEventListener("beforeunload",beforeUnloadListener)});
</script><style>#search{width:80%;margin-top:-7px;height:30px;line-height:111;border-radius:4px}hr{width:100%}.list-group-item{margin-left:-175px;border:none;color:#000;margin-top:-47px;margin-bottom:7px;font-weight:450;outline:none;}.avatar{margin-left:-220px;height:45px;width:45px;border-radius:50%;object-fit:cover;border-color:#000;aspect-ratio:auto 198 / 198;display:block;box-sizing:border-box;padding:1px;border:2px solid #eee}.select{margin-top:-30px}a:link{text-decoration: none!important;cursor: pointer;outline:none;}</style></body></html>
    <?php
}
?>