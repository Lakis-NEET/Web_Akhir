<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id=$_POST['id'];
$ch=$_POST['chapter'];
$halaman=$_FILES["gambar"]["tmp_name"];
$target_dir="assets/comic_read/$id/ch$ch/";
if(!file_exists($target_dir)){
    mkdir($target_dir, 0777, true);
}else if(file_exists($target_dir)){
    echo"<p>Chapter sudah ada</p>
    <a href='?page=details&&id=$id'>Kembali</a>";
    die;
};

foreach ($halaman as $key => $value) {
    $target_file = $target_dir . $key . ".png";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($value);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($value, $target_file)) {
      echo "The file has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}
redirect("?page=details&&id=$id");
?>