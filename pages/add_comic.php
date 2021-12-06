<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
if($_SESSION['login']!=1){
    die("Anda Bukan Admin");
}

$aut=mysqli_query($connection, "SELECT * FROM author");
$gen=mysqli_query($connection, "SELECT * FROM genre");


?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Add Comic</h1>
</div>

<form action="?page=save_comic" method="post" enctype="multipart/form-data">
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
            <td> <select name="author" id="author">
                    <?php while($author=mysqli_fetch_assoc($aut)){ ?>
                    <option value="<?php echo $author['author_id'] ?>"><?php echo $author['author_name'] ?> </option>
                    <?php } ?>
                </select></td>
        </tr>
        <tr>
            <td>Genre</td>
            <td>:</td>
            <td>
                <div style="width:12rem; height:8rem" class="border border-1 border-dark">
                    <?php while($genre=mysqli_fetch_assoc($gen)){ ?>
                    <input type="checkbox" id="genre" name="genre[]" value="<?php echo $genre['genre_name'] ?>" />
                    <label for="genre"><?php echo $genre['genre_name'] ?></label>
                    <?php } ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>Cover</td>
            <td>:</td>
            <td><input type="file" name="cover" class="form-control" /></td>
        </tr>
        <tr>
            <td>Released Date</td>
            <td>:</td>
            <td><input type="date" name="release_date" class="form-control" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" value="Simpan" name="btn btn-primary" /></td>
        </tr>
    </table>
</form>