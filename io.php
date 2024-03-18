<!DOCTYPE html> 
<html> 
 <head> 
  <title> Ajax JavaScript File Upload Example </title> 
 </head> 
 <body>
  <!-- HTML5 Input Form Elements -->
  <input id="fileupload" type="file" name="fileupload" /> 
  <button id="upload-button" onclick="uploadFile()"> Upload </button>

  <!-- Ajax JavaScript File Upload Logic -->
  <script>
         const MAX_WIDTH = 430;
const MAX_HEIGHT =430;
const MIME_TYPE = "image/jpeg";
const QUALITY = 1.0;

const input = document.getElementById("fileupload");
input.onchange = function (ev) {
  const file = ev.target.files[0]; // get the file
  const blobURL = URL.createObjectURL(file);
  const images = new Image();
  images.src = blobURL;
  images.onerror = function () {
    URL.revokeObjectURL(this.src);
    // Handle the failure properly
    console.log("Cannot load image");
  };
  images.onload = function () {
    URL.revokeObjectURL(this.src);
    const [newWidth, newHeight] = calculateSize(images, MAX_WIDTH, MAX_HEIGHT);
    const canvas = document.createElement("canvas");
    canvas.width = newWidth;
    canvas.height = newHeight;
    const ctx = canvas.getContext("2d");
    ctx.drawImage(images, 0, 0, newWidth, newHeight);
    canvas.toBlob(
      (blob) => {
        var newImg = document.createElement('img'),
      url = URL.createObjectURL(blob);
localStorage.setItem("img", url);
  newImg.onload = function() {
let formDatas = new FormData(); 
  formDatas.append("file", url);
  console.log(url);
  };
  newImg.src = url;
  document.body.appendChild(canvas);
      },
      MIME_TYPE,
      QUALITY
    );
  };
};




function calculateSize(images, maxWidth, maxHeight) {
  let width = images.width;
  let height = images.height;

  // calculate the width and height, constraining the proportions
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
  async function uploadFile() {
  let formData = new FormData(); 
  var h = localStorage.getItem("img");
  formData.append("file", fileupload.files[0]);
  console.log(formData);
  await fetch('process.php', {
    method: "POST", 
    body: formData
  }); 
  alert('The file has been uploaded successfully.');
  }
  </script>

 </body> 
</html>