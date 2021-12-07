<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<?php
# Mengambil data yang belum dihapus dari database
$sql = "SELECT * FROM comic_list WHERE deleted_at is NULL";
# Memasukkannya ke variabel hasil
$hasil = mysqli_query($connection, $sql);
$no = 1;
?>

<div class="row pt-3 pb-2 mb-3 border-bottom">
    <h2 class="">Popular Manga</h2>
</div>
<div class="d-flex flex-row flex-wrap justify-content-around">
    <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
    <?php
    for ($i = 0; $i < 6; $i++) {
    ?>
        <div class="">
            <div class="card p-2 card-popular card-home">
                <img src="https://via.placeholder.com/100x150" class="card-img-top" alt="...">
                <div class="">
                    <a>Title</a>
                    <div>8 Bookmarks</div>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="">
        <div class="row pt-3 pb-2 mb-3 border-bottom">
            <h2 class="">Latest Manga</h2>
        </div>
        <div class="row justify-content-center">
            <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
            <?php
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
                <div class="col-auto mb-2">
                    <div class="card p-1 card-latest" style="height: 16rem;overflow:hidden;">
                        <img src="<?php echo $row['comic_cover'] ?>" class="card-img-top border border-1" alt="...">
                        <div class="">
                            <a class="" href="?page=details&id=<?php echo $row['comic_id'] ?>"><?php echo $row['comic_title'] ?></a>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <!-- <a href="#" class="btn btn-dark">Read</a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="">
    <nav aria-label="Page navigation example" class="">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><span class="page-link">...</span></li>

            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>