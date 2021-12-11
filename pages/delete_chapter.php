<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
    die("Anda Bukan Admin");
}

$id=$_GET['id'];
$ch=$_GET['chapter'];

mysqli_query($connection, "DELETE FROM chapter WHERE chapter_id = $ch");

$files =glob("assets/comic_read/$id/ch$ch/*", GLOB_MARK);
foreach ($files as $key => $value) {
    var_dump($value);

    unlink($value);
}
rmdir("assets/comic_read/$id/ch$ch");
redirect("?page=details&&id=$id");
?>