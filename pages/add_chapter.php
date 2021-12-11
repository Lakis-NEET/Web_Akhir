<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
    die("Anda Bukan Admin");
}

?>
<div class="container">
    <form action="" method="get">
        <table class="table">
            <tr>
                <td width=20%>Input Chapter</td>
                <td width="30px">:</td>
                <td>
                    <input type="number" name="chapter" class="form-control" />
                </td>
            </tr>
            <tr>
                <td>Input Jumlah Halaman</td>
                <td>:</td>
                <td>
                    <input type=" number" name="jml_halaman" class="form-control" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type="text" name="page" value="add_chapter" hidden>
                    <input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                    <input type="submit" value="Input" class="btn btn-primary" />
                </td>
            </tr>
        </table>
    </form>

    <h1>Input Halaman Comic</h1>
    <?php if (isset($_GET['jml_halaman'])){ 
    $jml=$_GET['jml_halaman']
    ?>
    <form action="?page=save_chapter" method="post" enctype="multipart/form-data">
        <table class="table">
            <?php for($i=1;$i<=$jml;$i++){?>
            <tr>
                <td width=10%><label>
                        Halaman <?php echo $i ?></label></td>
                <td width="20px">:</td>
                <td>
                    <input type="file" name="gambar[]" class="form-control" />
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <input type=" text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                    <input type="text" name="chapter" value="<?php echo $_GET['chapter'] ?>" hidden>
                    <input type="submit" value="Submit" class="btn btn-primary" />
                </td>
            </tr>
        </table>
    </form>
    <?php } ?>
</div>