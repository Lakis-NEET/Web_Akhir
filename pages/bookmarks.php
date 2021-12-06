<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
$id=$_SESSION['id'];
$comic_mark=[];
$sql="SELECT * FROM bookmarks WHERE user_id = $id";
$result=mysqli_query($connection,$sql);
while($bookmark=mysqli_fetch_assoc($result)){
    $comid=$bookmark['comic_id'];
    $sql1="SELECT * FROM comic_list WHERE comic_id = $comid";
    $result1=mysqli_query($connection,$sql1);
    array_push($comic_mark,mysqli_fetch_assoc($result1));
}

?>

<div class="row pt-3 pb-2 mb-3 border-bottom">
    <h2 class=""> BOOKMARK </h2>
</div>
<div class="d-flex flex-row flex-wrap justify-content-around">
    <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
    <?php
    foreach ($comic_mark as $comic_list) {
    ?>
    <div class="card p-2 card-popular card-home">
        <img src="<?php echo $comic_list["comic_cover"] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <a class="" style="font-size: 0.8rem;"
                href="?page=details&id=<?php echo $comic_list['comic_id'] ?>"><?php echo $comic_list["comic_title"] ?></a>
            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
        </div>
    </div>
    <?php } ?>
</div>