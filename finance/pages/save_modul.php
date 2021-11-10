<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

//query database
$nm_modul = $_POST['nm_modul'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = [
    'nm_modul'              => $nm_modul,
    'created_at'            => $now,
    'updated_at'            => $now
];

//Insert data
insert_data($connection, "modul", $data);

redirect('?page=modul');

?>