<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id = $_GET['id'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = [
    'deleted_at'            => $now,
    'updated_at'            => $now
];

//Insert data
update_data($connection, "kelompok_transaksi", $data, $id, "id_kelompok_transaksi");

redirect('?page=kelompok_transaksi');
?>