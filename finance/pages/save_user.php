<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

//query database
$nm_user        = $_POST['nm_user'];
$user_username  = $_POST['user_username'];
$user_password  = $_POST['user_password'];
$id_role        = $_POST['id_role'];

//menyiapkan data tambahan
$now=date("Y-m-d H:i:s");

//data yang akan disimpan
$data = [
    'nm_user'               => $nm_user,
    'user_username'         => $user_username,
    'user_password'         => $user_password,
    'id_role'               => $id_role,
    'created_at'            => $now,
    'updated_at'            => $now
];

//Insert data
insert_data($connection, "user", $data);

redirect('?page=user');

?>