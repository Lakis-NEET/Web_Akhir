<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$comic_array = [];
if (isset($_GET['genre_id'])) {
    //page tidak ditemukan
    include 'genre.php';
    $id = $_GET['genre_id'];
    $gen = mysqli_query($connection, "SELECT * FROM comic_genre WHERE genre_id = '$id'");
    while ($filter = mysqli_fetch_assoc($gen)) {
        $comic_id = $filter["comic_id"];
        $comic_sql = mysqli_query($connection, "SELECT * FROM comic_list WHERE comic_id = '$comic_id'");
        array_push($comic_array, mysqli_fetch_assoc($comic_sql));
    }
} else if (isset($_GET['keyword'])) {
    $name = $_GET['keyword'];
    $comic_sql = mysqli_query($connection, "SELECT * FROM comic_list WHERE comic_title LIKE '%$name%'");
    while ($gan = mysqli_fetch_assoc($comic_sql)) {
        array_push($comic_array, $gan);
    }
}
?>

<div class="row pt-3 pb-2 mb-3 border-bottom">
    <h2 class="">Results</h2>
</div>
<div class="d-flex flex-row flex-wrap justify-content-around">
    <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
    <?php
    foreach ($comic_array as $comic_list) {
    ?>
        <div class="card p-2 card-popular card-home">
            <img src="<?php echo $comic_list["comic_cover"] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <a class="" style="font-size: 0.8rem;" href="?page=details&id=<?php echo $comic_list['comic_id'] ?>"><?php echo $comic_list["comic_title"] ?></a>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
        </div>
    <?php } ?>
</div>