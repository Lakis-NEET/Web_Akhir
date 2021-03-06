<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$result_text;
$comic_array = [];
if (isset($_GET['genre_id'])) {
    include 'genre.php';
    $id = $_GET['genre_id'];
    $result_text= "Comic by Genre \"$id\"";
    $gen = mysqli_query($connection, "SELECT * FROM comic_genre WHERE genre_id = '$id'");
    while ($filter = mysqli_fetch_assoc($gen)) {
        $comic_id = $filter["comic_id"];
        $comic_sql = mysqli_query($connection, "SELECT * FROM comic_list WHERE comic_id = '$comic_id'");
        array_push($comic_array, mysqli_fetch_assoc($comic_sql));
    }  
} else if (isset($_GET['keyword'])) {
    $name = $_GET['keyword'];
    $result_text= "Comic Title by Keyword \"$name\"";
    $comic_sql = mysqli_query($connection, "SELECT * FROM comic_list WHERE comic_title LIKE '%$name%'");
    while ($gan = mysqli_fetch_assoc($comic_sql)) {
        array_push($comic_array, $gan);
    }
}
else if(isset($_GET['author_id'])){
    include 'author.php';
    $author=$_GET['author_id'];

    $author_sql=mysqli_query($connection,"SELECT * FROM comic_list WHERE comic_author ='$author'");
    while ($row=mysqli_fetch_assoc($author_sql)){
        array_push($comic_array, $row);
    }
    $author_name=mysqli_query($connection,"SELECT * FROM author WHERE author_id ='$author'");
    $col=mysqli_fetch_assoc($author_name);
    $col2=$col['author_name'];
    $result_text= "Comic by Author \"$col2\""; 
}
?>

<div class="row pt-3 pb-2 mb-3 border-bottom">
    <h2><a class="text-white" style="text-decoration:none;"><?php echo $result_text ?></a></h2>
</div>
<div class="d-flex flex-row flex-wrap justify-content-around">
    <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
    <?php
    foreach ($comic_array as $comic_list) {
    ?>
    <div class="col-auto mb-2">
        <div class="card p-1 card-latest bg-dark" style="height: 15rem;overflow:hidden;">
            <img src="<?php echo $comic_list['comic_cover'] ?>" class="card-img-top border border-1"
                style="height:12rem;" alt="...">
            <div class="">
                <a class=""
                    href="?page=details&id=<?php echo $comic_list['comic_id'] ?>"><?php echo $comic_list['comic_title'] ?></a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php include 'popular.php'; ?>