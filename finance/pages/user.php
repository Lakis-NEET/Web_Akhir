<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Kelompok Transaksi</h1>
</div>

<p>
    <a href="?page=create_user" class="btn btn-success">Tambah Transaksi</a>
</p>

<table class="table table-striped">
    <tr>
        <th>No.</th>
        <th>Nama User</th>
        <th>Username</th>
        <th>Password</th>
        <th>Role</th>
        <th>Waktu Dibuat</th>
        <th>Waktu Diupdate</th>
    </tr>
    <?php
    # Mengambil data yang belum dihapus dari database
    $sql = "SELECT * FROM user WHERE deleted_at is NULL";
    # Memasukkannya ke variabel hasil
    $hasil = mysqli_query($connection,$sql);
    $no = 1;
    while($row = mysqli_fetch_assoc($hasil))
    {
        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$row['nm_user']."</td>";
        echo "<td>".$row['user_username']."</td>";
        echo "<td>".$row['user_password']."</td>";
        echo "<td>".$row['id_role']."</td>";
        echo "<td>".$row['created_at']."</td>";
        echo "<td>".$row['updated_at']."</td>";
        echo "</tr>";
        $no++;
    }
?>
</table>