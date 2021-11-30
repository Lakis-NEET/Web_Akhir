<?php
if(defined('GELANG')===false){
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
include 'genre.php';
?>

<div class="row pt-3 pb-2 mb-3 border-bottom">
    <h2 class="">Results</h2>
</div>
<div class="d-flex flex-row flex-wrap justify-content-around">
    <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
    <?php
    for ($i = 0; $i < 6; $i++) {
    ?>
    <div class="">
        <div class="card p-2 card-popular card-home">
            <img src="https://via.placeholder.com/100x150" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="" style="font-size: 0.8rem;">Title</p>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
            </div>
        </div>
    </div>
    <?php } ?>
</div>