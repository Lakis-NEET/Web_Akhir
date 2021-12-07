<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$gen=mysqli_query($connection, "SELECT * FROM genre");

?>


<div class="ms-2 me-auto">
    <div class="row pt-3 pb-1 mb-2">
        <h2 style="color:red;">Genre</h2>
    </div>
</div>

<div class="container-fluid">
    <ul class="d-flex flex-row flex-wrap">
        <?php while($genres=mysqli_fetch_assoc($gen)){ ?>
        <li class="col-6 col-sm-2 col-md-2 fs-6">
            <a class="text-white text-decoration-none"
                href="?page=filter_genre&&genre_id=<?php echo $genres["genre_name"] ?>"><?php echo $genres["genre_name"] ?>
                <!-- <span class="badge bg-primary rounded-pill">14</span></a> -->
        </li>
        <?php } ?>
    </ul>
</div>