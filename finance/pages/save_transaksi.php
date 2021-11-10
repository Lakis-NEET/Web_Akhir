<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

//query database
$nm_kelompok_transaksi = $_POST['nm_kelompok_transaksi'];
$value_transaksi = $_POST['value_transaksi'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = [
    'nm_kelompok_transaksi' => $nm_kelompok_transaksi,
    'value_transaksi'       => $value_transaksi,
    'created_at'            => $now,
    'updated_at'            => $now
];

//Insert data
insert_data($connection, "kelompok_transaksi", $data);

redirect('?page=kelompok_transaksi');

?>