<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
    die("Anda Bukan Admin");
}
//query database
$author_name = $_POST['author'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = ['author_name'              => $author_name];

//Insert data
insert_data($connection, "author", $data);

redirect('?page=add_comic');

?>