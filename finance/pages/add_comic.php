<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Add Comic</h1>
</div>

<form action="?page=save_transaksi" method="post">
    <table class="table">
        <tr>
            <td width="20%">Comic Title</td>
            <td width="30px">:</td>
            <td><input type="text" name="title" class="form-control" /></td>
        </tr>
        <tr>
            <td>Description</td>
            <td>:</td>
            <td><textarea type="text" name="description" class="form-control"> </textarea></td>
        </tr>
        <tr>
            <td>Author</td>
            <td>:</td>
            <td><input type="text" name="author" class="form-control" /></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td>:</td>
            <td><input type="text" name="genre" class="form-control" /></td>
        </tr>
        <tr>
            <td>Cover</td>
            <td>:</td>
            <td><input type="text" name="cover" class="form-control" /></td>
        </tr>
        <tr>
            <td>Chapter</td>
            <td>:</td>
            <td><input type="text" name="chapter" class="form-control" /></td>
        </tr>
        <tr>
            <td>Content</td>
            <td>:</td>
            <td><input type="text" name="content" class="form-control" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan" name="btn btn-primary" /></td>
        </tr>
    </table>
</form>