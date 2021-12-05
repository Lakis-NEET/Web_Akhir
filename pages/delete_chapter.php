<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id=$_GET['id'];
$ch=$_GET['chapter'];

$files =glob("assets/comic_read/$id/ch$ch/*", GLOB_MARK);
foreach ($files as $key => $value) {
    var_dump($value);

    unlink($value);
}
rmdir("assets/comic_read/$id/ch$ch");
redirect("?page=details&&id=$id");
?>