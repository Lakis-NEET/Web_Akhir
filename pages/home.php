<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$total=mysqli_query($connection,"SELECT * FROM comic_list");
$page_limit = 4;
$jml_page=round(mysqli_num_rows($total)/$page_limit);
$limit_up = $page_limit;
$limit_down = 0;
if(isset($_GET['count'])){
    $count=$_GET['count'];
    $limit_up = $page_limit * $count;
    $limit_down = $limit_up - $page_limit;
}
else{
    $_GET['count']=1;
}

# Mengambil data yang belum dihapus dari database
$sql = "SELECT * FROM comic_list WHERE deleted_at is NULL ORDER BY comic_release DESC LIMIT $limit_down,$limit_up";
# Memasukkannya ke variabel hasil
$hasil = mysqli_query($connection, $sql);
$hasil2 = mysqli_query($connection, "SELECT * FROM comic_list WHERE deleted_at is NULL ORDER BY bookmark_count DESC");
$no = 1;


include 'popular.php';
?>


<div class="row">
    <div class="">
        <div class="row pt-3 pb-2 mb-3 border-bottom">
            <h2 class="text-white">Latest Manga</h2>
        </div>
        <div class="row justify-content-center">
            <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
            <?php
            while ($row = mysqli_fetch_assoc($hasil)) {
            ?>
            <div class="col-auto mb-2">
                <div class="card p-1 card-latest bg-dark" style="height: 15rem;overflow:hidden;">
                    <img src="<?php echo $row['comic_cover'] ?>" class="card-img-top border border-1"
                        style="height:12rem;" alt="...">
                    <div class="">
                        <a class=""
                            href="?page=details&id=<?php echo $row['comic_id'] ?>"><?php echo $row['comic_title'] ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


<ul class="pagination text-center d-flex justify-content-center">
    <?php if(isset($_GET['count'])){ 
                $count=$_GET['count'];
                if($count > 1){
                ?>
    <li class="page-item">
        <a class="page-link" href="?page=home&&count=<?php echo $count-1 ?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
        </a>
    </li>
    <?php }}for($i=1;$i<=$jml_page;$i++){ ?>
    <li class="page-item"><a class="page-link" href="?page=home&&count=<?php echo $i ?>"><?php echo $i ?></a>
    </li>
    <?php } ?>
    <?php if($_GET['count']<$jml_page){ 
                $count=$_GET['count'];
                ?>
    <li class="page-item">
        <a class="page-link" href="?page=home&&count=<?php echo $count+1 ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
    </li>
    <?php } ?>
</ul>