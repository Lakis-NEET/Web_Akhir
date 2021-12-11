<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$hasil2 = mysqli_query($connection, "SELECT * FROM comic_list WHERE deleted_at is NULL ORDER BY bookmark_count DESC LIMIT 0,7");

?>
<div class="row">
    <div class="row pt-3 pb-2 mb-3 border-bottom">
        <h2 class="text-white">Popular Manga</h2>
    </div>
    <div class="d-flex flex-row flex-wrap justify-content-around">
        <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
        <?php
    while ($row = mysqli_fetch_assoc($hasil2)) {
    ?>
        <div class="card p-2 card-popular card-home bg-dark text-white">
            <img src="<?php echo $row['comic_cover'] ?>" class="card-img-top" alt="...">
            <div class="">
                <a href="?page=details&id=<?php echo $row['comic_id'] ?>"><?php echo $row['comic_title'] ?></a>
                <div><?php echo $row['bookmark_count'] ?> Bookmarks</div>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
        </div>
        <?php } ?>
    </div>
</div>