<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$id;
$ch;
if (isset($_GET['id'])&&isset($_GET['ch'])) {
    //page tidak ditemukan
    $id=$_GET['id'];
    $ch=$_GET['ch'];
}

// $read=mysqli_query($connection, "SELECT * FROM comic_list WHERE comic_id = '2'");
// $hen=mysqli_fetch_assoc($read);

$files = glob("assets/comic_read/$id/ch$ch/*.{jpg,png,gif}", GLOB_BRACE);

?>
<?php
foreach($files as $file) { ?>
<div class="container-fluid">
    <img src="<?php echo $file ?>" alt="">
</div>
<?php } 

?>

<a href="?page=details&&id=<?php echo $id ?>">Kembali</a>