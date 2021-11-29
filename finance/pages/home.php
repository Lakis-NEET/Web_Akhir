<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
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
                <div class="card-body">
                    <p class="" style="font-size: 0.8rem;">Title</p>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-8">
        <div class="row pt-3 pb-2 mb-3 border-bottom">
            <h2 class="">Latest Manga</h2>
        </div>
        <div class="row justify-content-center">
            <!-- row-cols-xl-3 row-cols-md-2 row-cols-sm-1 -->
            <?php
            for ($i = 0; $i < 9; $i++) {
            ?>
                <div class="col-auto mb-2">
                    <div class="card p-2 card-latest">
                        <img src="https://via.placeholder.com/100x150" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h6 class="fs-6">Title</h6>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <!-- <a href="#" class="btn btn-dark">Read</a> -->
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-4">
        <div class="row pt-3 pb-2 mb-3 border-bottom">
            <h2 class="">Top Manga</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i < 5; $i++) {
                ?>
                    <tr class="border-1">
                        <th scope="row"><?= $i ?></th>
                        <td> <img src="https://via.placeholder.com/50x75" class="card-img-top" alt="...">
                        </td>
                        <td class="d-flex flex-column border-0">
                            <p>Title</p>
                            <p>Genre</p>
                            <p>Score</p>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>

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