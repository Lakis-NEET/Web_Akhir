<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$gen=mysqli_query($connection, "SELECT * FROM author");

?>

<div class="ms-2 me-auto">
    <div class="row pt-3 pb-1 mb-2">
        <h2 class="">Author</h2>
    </div>
</div>

<div class="container-fluid">
    <ul class="d-flex flex-row flex-wrap">
        <?php while($author=mysqli_fetch_assoc($gen)){ ?>
        <li class="col-6 col-sm-2 col-md-2">
            <a class=""
                href="?page=filter_genre&&author_id=<?php echo $author["author_id"] ?>"><?php echo $author["author_name"] ?>
                <span class="badge bg-primary rounded-pill">14</span></a>
        </li>
        <?php } ?>
    </ul>
</div>