<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
  die("Anda Bukan Admin");
}
//query database
$comic_title = $_POST['title'];
$comic_description = $_POST['description'];
$comic_author = $_POST['author'];
$comic_genre = $_POST['genre'];
//$comic_cover = $_POST['cover'];
$comic_release = $_POST['release_date'];

//menyiapkan data tambahan
$now=date("Y-m-d");

//data yang akan disimpan
$data = [
    'comic_title'           => $comic_title,
    'comic_cover'           => upload(),
    'comic_description'     => $comic_description,
    'comic_author'          => $comic_author,
    'comic_score'           => 0,
    'comic_content_id'      => 0,
    'bookmark_count'        => 0,
    'comic_release'         => $comic_release,
    'added_at'              => $now,
    'edited_at'             => $now,
    'comic_status'          => 1
];

//Insert data
insert_data($connection, "comic_list", $data);
$comid=mysqli_query($connection, "SELECT MAX(comic_id) FROM comic_list");
$comic_id=mysqli_fetch_assoc($comid);
foreach ($comic_genre as $value) {
    $data_genre=[
        'comic_id'  => $comic_id['MAX(comic_id)'],
        'genre_id'  => $value
    ];
    insert_data($connection, "comic_genre", $data_genre);
}

function upload(){
    $target_dir = "assets/cover/";
    $target_file = $target_dir . uniqid() . ".png";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["cover"]["tmp_name"]);
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
  
  // Check file size
  if ($_FILES["cover"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
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
    if (move_uploaded_file($_FILES["cover"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["cover"]["name"])). " has been uploaded.";
      return $target_file;
    } else {
      echo "Sorry, there was an error uploading your file.";
      return NULL;
    }
  }
  return false;
}

redirect('?page=home');
?>