<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
  die("Anda Bukan Admin");
}

$id=$_GET['id'];

mysqli_query($connection, "DELETE FROM comic_list WHERE comic_id = $id");
mysqli_query($connection, "DELETE FROM comic_genre WHERE comic_id = $id");
rrmdir("assets/comic_read/$id");
unlink($_GET['gambar']);
function rrmdir($dir) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") 
             rrmdir($dir."/".$object); 
          else unlink   ($dir."/".$object);
        }
      }
      reset($objects);
      rmdir($dir);
    }
}
   
redirect("?page=home");
?>