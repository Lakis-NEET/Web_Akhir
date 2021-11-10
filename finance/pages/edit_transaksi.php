<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Tambah Transaksi</h1>
</div>

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM kelompok_transaksi WHERE id_kelompok_transaksi = $id";
$result = mysqli_query($connection,$sql);

$row = mysqli_fetch_assoc($result);
?>

<form action="?page=update_transaksi&id=<?php echo $id;?>" method="post">
    <table class="table">
        <tr>
            <td width="20%">Nama Transaksi</td>
            <td width="30px">:</td>
            <td><input type="text" name="nm_kelompok_transaksi" value="<?php echo $row['nm_kelompok_transaksi'];?>"
                    class="form-control" /></td>
        </tr>
        <tr>
            <td>Value Transaksi</td>
            <td>:</td>
            <td><input type="text" name="value_transaksi" class="form-control" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan" name="btn btn-primary" /></td>
        </tr>
    </table>
</form>