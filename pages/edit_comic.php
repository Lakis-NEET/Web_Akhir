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
$id = $_GET['id'];
$sql = "SELECT * FROM comic_list WHERE comic_id = $id";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);
// $gen_com= mysqli_query($connection, "SELECT * FROM comic_genre WHERE comic_id = '$id'");
// $banding=[];
// while($genre=mysqli_fetch_assoc($gen)){
//     $banding[$genre['genre_name']]=false;
//     while($regen=mysqli_fetch_assoc($gen_com)){
//         echo $regen['genre_id'];
//         if($regen['genre_id']==$genre['genre_name']){
//         $banding[$genre['genre_name']]=true;
//         }
//     }
// }
// var_dump($banding);
// die;
?>
<div class="container">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Add Comic</h1>
    </div>

    <form action="?page=save_edit_comic" method="post" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td width="20%">Comic Title</td>
                <td width="30px">:</td>
                <td><input type="text" name="title" class="form-control" value="<?php echo $row['comic_title']?>" />
                </td>
            </tr>
            <tr>
                <td>Description</td>
                <td>:</td>
                <td><textarea type="text" name="description" class="form-control"
                        value=""><?php echo $row['comic_description']?></textarea>
                </td>
            </tr>
            <tr>
                <td>Author</td>
                <td>:</td>
                <td> <select name="author" id="author">
                        <?php while($author=mysqli_fetch_assoc($aut)){ ?>
                        <option <?php if($author['author_id']==$row['comic_author']){ echo "selected='selected'"; }?>
                            value="<?php echo $author['author_id'] ?>">
                            <?php echo $author['author_name'] ?> </option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td>Genre</td>
                <td>:</td>
                <td>
                    <div style="width:18rem; height:8rem"
                        class="border border-1 border-dark d-flex flex-wrap justify-content-around">
                        <?php while($genre=mysqli_fetch_assoc($gen)){ ?>
                        <div>
                            <input type="checkbox" id="genre" name="genre[]"
                                value="<?php echo $genre['genre_name'] ?>" />
                            <label for="genre"><?php echo $genre['genre_name'] ?></label>
                        </div>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>:</td>
                <td><img src="<?php echo $row['comic_cover']?>" alt="">
                    <br>
                    <input type="file" name="cover" class="form-control" value="<?php echo $row['comic_cover']?>" />
                </td>
            </tr>
            <tr>
                <td>Released Date</td>
                <td>:</td>
                <td><input type="date" name="release_date" class="form-control"
                        value="<?php echo $row['comic_release']?>" /></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>:</td>
                <td><select name="status" id="status">
                        <option type="date" name="status" class="form-control" value="1">Ongoing
                        </option>
                        <option type="date" name="status" class="form-control" value="0">Completed
                        </option>
                    </select></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="text" name="id" value="<?php echo $_GET['id'] ?>" hidden>
                    <input type="submit" value="Submit" name="btn btn-primary" />
                </td>
            </tr>
        </table>
    </form>
</div>