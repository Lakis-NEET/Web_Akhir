<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Transaksi</h1>
</div>

<form action="?page=save_user" method="post">
    <table class="table">
        <tr>
            <td width="20%">Nama User</td>
            <td width="30px">:</td>
            <td><input type="text" name="nm_user" class="form-control" /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td>:</td>
            <td><input type="text" name="user_username" class="form-control" /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td>:</td>
            <td><input type="text" name="user_password" class="form-control" /></td>
        </tr>
        <tr>
            <td>Role</td>
            <td>:</td>
            <td><input type="text" name="id_role" class="form-control" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan" name="btn btn-primary" /></td>
        </tr>
    </table>
</form>