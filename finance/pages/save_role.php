<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

//query database
$nm_role = $_POST['nm_role'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = [
    'nm_role'              => $nm_role,
    'created_at'            => $now,
    'updated_at'            => $now
];

//Insert data
insert_data($connection, "role", $data);

redirect('?page=list_role');

?>