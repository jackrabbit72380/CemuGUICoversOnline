<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CemuGUI</title>
<style type="text/css">

body, html {
  height: 100%;
}

* {box-sizing: border-box}
body {
  font-family: "Lato", sans-serif;

  /* The image used */
  background-image: url("background.jpg");
  background: linear-gradient(to bottom right, #00f2ea 0%, #ff0050 100%);

  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;

}

/* Style the tab */
.tab {
  float: left;
  border: 2px solid #000;
  background-color: #f1f1f1;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.2); /* Black w/opacity/see-through */
  width: 30%;
  height: 400px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: white;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.6); /* Black w/opacity/see-through */
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 2px solid #000;
  width: 70%;
  border-left: none;
  height: 400px;

}

.bg-image {
  /* The image used */
  background-image: url("background.jpg");
  background: linear-gradient(to bottom right, #00f2ea 0%, #ff0050 100%);


  /* Add the blur effect */
  filter: blur(5px);
  -webkit-filter: blur(5px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.bg-blur {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #000;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

.hidden {
  display: none;
}

<!--
li{
	list-style-type:none;
	margin-right:10px;
	margin-bottom:10px;
	float:left;
}
-->
</style></head>

<body>

<div class="bg-image"></div>

<div class="bg-blur">

<div align="center">
  <img src="Config.png" id="input" />
  <h3>CemuGUI covers manager</h3>
</div>


<div class="tab">
  <button class="tablinks" onclick="openTab(event, 'upload')" id="defaultOpen">Upload</button>
  <button class="tablinks" onclick="openTab(event, 'gamecube')" >Gamecube Gallery</button>
  <button class="tablinks" onclick="openTab(event, 'wii')" >Wii Gallery</button>
  <button class="tablinks" onclick="openTab(event, 'wiiu')" >WiiU Gallery</button>
  <button class="tablinks" onclick="openTab(event, 'switch')" >Switch Gallery</button>
</div>

<div id="upload" class="tabcontent">

</br>
</br>
</br>

    <form action="fileUploadScript.php" method="post" enctype="multipart/form-data">
       <input type="file" name="the_file" id="fileToUpload" accept=".jpg">

       <img id="blah" src="border-tranparent.png" alt="" width="302" height="200" style="display:none"/>
       <img id="blah2" src="border-tranparent.png" alt="" width="302" height="200"/>

       <div id="result2" style="display:none">
          </br>
          </br>


  <label for="system"><h4>Choose cover path : </h4></label>
  <select name="system" id="system">
    <option value="gamecube">Gamecube</option>
    <option value="wii">Wii</option>
    <option value="wiiu">WiiU</option>
    <option value="switch">Switch</option>
  </select>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        <input type="submit" name="submit" class="btn btn-primary" value="Start Upload">

  </div>


    </form>

</div>


<div id="gamecube" class="tabcontent" style="overflow:auto; max-height: 100vh;">
<ul>
	<?php
		$dirname = "gamecube/";
		$images = scandir($dirname);
		shuffle($images);
		$ignore = array(".", "..");
		foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
				echo "<li>
                              <a href=\"$dirname$curimg\">
                              <img src='img.php?src=$dirname$curimg&w=180&zc=1' alt='' /></a></li>\n ";
			}
		} 				
	?>
</ul>
</div>


<div id="wii" class="tabcontent" style="overflow:auto; max-height: 100vh;">
<ul>
	<?php
		$dirname = "wii/";
		$images = scandir($dirname);
		shuffle($images);
		$ignore = array(".", "..");
		foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
				echo "<li>
                              <a href=\"$dirname$curimg\">
                              <img src='img.php?src=$dirname$curimg&w=180&zc=1' alt='' /></a></li>\n ";
			}
		} 				
	?>
</ul>
</div>

<div id="wiiu" class="tabcontent" style="overflow:auto; max-height: 100vh;">
<ul>
	<?php
		$dirname = "wiiu/";
		$images = scandir($dirname);
		shuffle($images);
		$ignore = array(".", "..");
		foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
				echo "<li>
                                 <a href=\"$dirname$curimg\">
                                 <img src='img.php?src=$dirname$curimg&w=180&zc=1' alt=''/></a>
                              </li>\n ";
			}
		} 				
	?>
</ul>
</div>

<div id="switch" class="tabcontent" style="overflow:auto; max-height: 100vh;">
<ul>
	<?php
		$dirname = "switch/";
		$images = scandir($dirname);
            $sImgX = imagesx($image);
            $size = getimagesize("$dirname$images");
		shuffle($images);
		$ignore = array(".", "..");
		foreach($images as $curimg){
			if(!in_array($curimg, $ignore)) {
                        $sData = filesize("switch/$curimg");
                        $file = getimagesize("switch/$curimg");
                        $size = getimagesize("switch/$images");
                        $file_size = $file[0]*$file[1]*$file["bits"];
                        list($width, $height, $type, $attr) = getimagesize("switch/$curimg");
				echo "<li>
                              <h6>$curimg - $width x $height</h6>
                              <a href=\"$dirname$curimg\">
                              <img src='img.php?src=$dirname$curimg&w=180&zc=1' alt='' /></a></li>\n ";
			}
		} 				
	?>
</ul>
</div>

<script>

function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();

var MyBlobBuilder = function() {
  this.parts = [];
}

fileToUpload.onchange = evt => {
  const [fileToUpload] = fileToUpload.files
  if (fileToUpload) {
    blah.src = URL.createObjectURL(fileToUpload)
  }
}

MyBlobBuilder.prototype.append = function(part) {
  this.parts.push(part);
  this.blob = undefined; // Invalidate the blob
};


function Refresh() {
window.location.reload();
}

MyBlobBuilder.prototype.write = function(part) {
  this.append(part);
}

MyBlobBuilder.prototype.getBlob = function(atype) {
  if (!this.blob) {
    this.blob = new Blob(this.parts, {
      type: !atype ? "text/plain" : atype
    });
  }
  return this.blob;
};

const img = document.getElementById('input'),
  a = document.getElementById('a'),
  a2 = document.getElementById('a2'),
  file1 = document.getElementById('fileToUpload');

let imgSize = 0,
  imgBlob;

img.onload = e => {
  fetch(img.src).then(resp => resp.blob())
    .then(blob => {
      imgBlob = blob;
      imgSize = blob.size;
    });
};

function convertToIco(imgSize, imgBlob) {
  let file = new MyBlobBuilder(),
  buff;
  buff = new Uint8Array([0, 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([1, 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([1, 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([img.width < 128 ? img.width : 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([img.height < 128 ? img.height : 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([1, 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint8Array([32, 0]).buffer;
  file.write(buff, 'binary');
  buff = new Uint32Array([imgSize]).buffer;
  file.write(buff, 'binary');
  buff = new Uint32Array([22]).buffer;
  file.write(buff, 'binary');
  file.write(imgBlob, 'binary');
  return file.getBlob('image/vnd.microsoft.icon');
}


file1.addEventListener('change', () => {
  var file = file1.files[0];
  var fileReader = new FileReader();
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
  fileReader.onloadend = function(e) {
    var arrayBuffer = e.target.result;
    const blobFile = new Blob([arrayBuffer]);
    document.getElementById('result2').style.display = '';
    document.getElementById('blah').style.display = '';
    document.getElementById('blah2').style.display = 'none';
  }
  fileReader.readAsArrayBuffer(file);
});
</script>
</body>
</html>
