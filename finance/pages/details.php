<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
?>

<img src="https://flamescans.org/wp-content/uploads/2021/11/Volume_1.jpg" alt="" style="position: absolute; z-index:-99; top:0;left:0;filter: blur(8px) brightness(50%); width: 100%;">
<!-- <div style="width: 100%; height:100%; position:absolute;left:0;top:0; z-index:-98;" class="bg-dark"></div> -->
<div class="text-light" style="
display: flex;
flex-direction: row; 
padding: 10%;
column-gap:20px;
">


    <div style="
    display: flex;
    flex-direction: column;
    width:25%;
    row-gap:10px;
    ">
        <div>
            <img src="https://flamescans.org/wp-content/uploads/2021/11/Volume_1.jpg" alt="" style="object-fit: cover;width:100%; height:auto;">
        </div>
        <button class="btn btn-danger">Bookmark</button>
        <div class="text-white fw-bold text-center">100 people bookmarked</div>
        <div class="p-1 bg-dark rounded-1">
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Status</div>
                <div>Ongoing</div>
            </div>
        </div>
        <div class="p-1 bg-dark rounded-1">
            <?php for ($i = 0; $i < 9; $i++) { ?>
                <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                    <div>Status</div>
                    <div>Ongoing</div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="" style="width: 75%;">
        <div class="bg-dark text-white p-2 mb-4 rounded-1 shadow">
            <div style="font-size:large;"><strong>Title</strong></div>
            <div style="font-size: x-small; color:gray;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, dele.</div>
            <div class="d-flex" style="column-gap: 5px; font-size:x-small;">
                <div class="p-1" style="background-color: #000000;">Action</div>
                <div class="p-1" style="background-color: #000000;">Action</div>
                <div class="p-1" style="background-color: #000000;">Action</div>
            </div>
            <br>
            <div>
                <div style="font-size: x-small; color:white; font-weight:500;">Synopsis</div>
                <div style="font-size: x-small; color:#eaeaea; font-weight:100;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum maxime nisi nihil illum reprehenderit. At, fugit tempora veritatis accusamus ipsum necessitatibus impedit deleniti eaque perspiciatis harum! Accusantium iste reprehenderit totam?
                </div>
            </div>
        </div>
        <div class="bg-dark text-white rounded-1 shadow">
            <div class=" bg-danger p-2">Chapters</div>
            <div class="d-flex p-2 flex-wrap justify-content-around" style="height: 12rem; overflow:auto">
                <?php
                for ($i = 0; $i < 15; $i++) {
                ?>
                    <div style=" width:9rem; border-radius:0.2em;" class="p-1 mb-2 border border-1 border-light">
                        <div style="font-size: xx-small;">Chapter 121</div>
                        <div style="font-size: xx-small; color:gray">November 27, 2021</div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>