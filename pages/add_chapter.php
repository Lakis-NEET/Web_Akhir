<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
    die("Anda Bukan Admin");
}

?>

<form action="" method="get">
    <div>
        <label>Input Chapter</label>
        <label>:</label>
        <input type="number" name="chapter" />
    </div>
    <div>
        <label>Input Jumlah Halaman</label>
        <label>:</label>
        <input type="number" name="jml_halaman" />
    </div>
    <input type="text" name="page" value="add_chapter" hidden>
    <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
    <input type="submit" value="Input" name="btn btn-primary" />
</form>

<h1>Input Halaman Comic</h1>
<?php if (isset($_GET['jml_halaman'])){ 
    $jml=$_GET['jml_halaman']
    ?>
<form action="?page=save_chapter" method="post" enctype="multipart/form-data">
    <?php for($i=1;$i<=$jml;$i++){?>
    <div>
        <label>Halaman <?php echo $i ?></label>
        <label>:</label>
        <input type="file" name="gambar[]">
    </div>
    <?php } ?>
    <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
    <input type="text" name="chapter" value="<?php echo $_GET['chapter'] ?>" hidden>
    <input type="submit" value="Input" name="btn btn-primary" />
</form>
<?php } ?>