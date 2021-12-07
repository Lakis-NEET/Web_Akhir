<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}
$id;
if (isset($_GET['id'])) {
    //page tidak ditemukan
    $id = $_GET['id'];
}


if(!isset($_SESSION['login'])){
    $_SESSION['login']=3;
}
if($_SESSION['login']==3){
    $_SESSION['id']="Blocked";
    $_SESSION['username']="Blocked";
}
$user_id=$_SESSION['id'];
$isbooked="Bookmark";
if($user_id!="Blocked"){
$book="SELECT * FROM bookmarks WHERE user_id = $user_id AND comic_id = $id";
$result2=mysqli_query($connection, $book);
$ismarked;
if(mysqli_num_rows($result2)==1){
    $ismarked=1;
    $isbooked="Remove";
}
else{
    $ismarked=0;
}
}
$jml=0;
$users=mysqli_query($connection,"SELECT comic_id FROM bookmarks WHERE comic_id = $id");
while($fa=mysqli_fetch_assoc($users)){
    $jml+=1;
}



# Mengambil data yang belum dihapus dari database
$sql = "SELECT * FROM comic_list WHERE comic_id = '$id'";
# Memasukkannya ke variabel hasil
$hasil = mysqli_query($connection, $sql);
$no = 1;
$comic = mysqli_fetch_assoc($hasil);
$gen = mysqli_query($connection, "SELECT * FROM comic_genre WHERE comic_id = '$id'");
$thor_id = $comic["comic_author"];
$thor = mysqli_query($connection, "SELECT * FROM author WHERE author_id = '$thor_id'");
$author = mysqli_fetch_assoc($thor);
$author["author_name"];


$sql5 = mysqli_query($connection, "SELECT * FROM chapter WHERE comic_id= $id");

$files = glob("assets/comic_read/$id/*", GLOB_ONLYDIR);
?>
<?php if ($_SESSION['login'] == 1) { ?>
<div class="mt-2">
    <a class="btn btn-danger" href="?page=edit_comic&&id=<?php echo $id ?>">Edit</a>
    <a class="btn btn-danger"
        href="?page=delete_comic&&id=<?php echo $id ?>&&gambar=<?php echo $comic['comic_cover'] ?>">Delete</a>
</div>
<?php } ?>
<img src="<?php echo $comic['comic_cover'] ?>" alt=""
    style="position: absolute; z-index:-99; top:0;left:0;filter: blur(8px) brightness(50%); width: 100%;">
<!-- <div style="width: 100%; height:100%; position:absolute;left:0;top:0; z-index:-98;" class="bg-dark"></div> -->
<div class="text-light" style="
display: flex;
flex-direction: row; 
padding: 5%;
column-gap:20px;
">
    <div style="
    display: flex;
    flex-direction: column;
    width:25%;
    row-gap:10px;
    ">
        <div>
            <img src="<?php echo $comic['comic_cover'] ?>" alt="" style="object-fit: cover;width:100%; height:auto;">
        </div>
        <form action="?page=save_bookmark&&id=<?php echo $id ?>" method="post">
            <input type="text" name="ismarked" value="<?php echo $ismarked ?>" hidden>
            <button type="submit" class="btn btn-danger" name="submit"
                style="width: 100%;"><?php echo $isbooked ?></button>
        </form>
        <div class="text-white fw-bold text-center"><?php echo $jml ?> people bookmarked</div>
        <div class="p-1 bg-dark rounded-1">
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Score</div>
                <div><?php echo $comic['comic_score'] ?></div>
            </div>
        </div>
        <div class="p-1 bg-dark rounded-1">
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div class="fw-bolder">Status</div>
                <div><?php if ($comic['comic_status']) {
                            echo "Ongoing";
                        } else {
                            echo "Completed";
                        }
                        ?></div>
            </div>
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Author</div>
                <div><?php echo $author["author_name"]; ?></div>
            </div>
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Posted</div>
                <div><?php echo $comic['added_at'] ?></div>
            </div>
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Released</div>
                <div><?php echo $comic['comic_release'] ?></div>
            </div>
            <div class="d-flex justify-content-between mb-1 text-secondary" style="font-size:x-small;">
                <div>Updated</div>
                <div><?php echo $comic['edited_at'] ?></div>
            </div>
        </div>
    </div>
    <div class="" style="width: 75%;">
        <div class="bg-dark text-white p-2 mb-4 rounded-1 shadow">
            <div style="font-size:large;"><strong><?php echo $comic['comic_title'] ?></strong></div>
            <div style="font-size: x-small; color:gray;">Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Ipsum, dele.</div>
            <div class="d-flex" style="column-gap: 5px; font-size:x-small;">
                <?php
                while ($genres = mysqli_fetch_assoc($gen)) { ?>
                <a class="p-1 text-decoration-none text-light rounded-1 bg-danger style=" background-color: #000000;"
                    href="?page=filter_genre&&genre_id=<?php echo $genres["genre_id"] ?>"><?php echo $genres['genre_id'] ?></a>

                <?php } ?>
            </div>
            <br>
            <div>
                <div style="font-size: x-small; color:white; font-weight:500;">Synopsis</div>
                <div style="font-size: x-small; color:#eaeaea; font-weight:100;">
                    <?php echo $comic['comic_description'] ?>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white rounded-1 shadow">
            <div class="d-flex bg-danger fs-5 justify-content-between px-2 py-1">
                <div>Chapters</div>

                <?php if($_SESSION['login']==1){ ?>
                <div><a href="?page=add_chapter&&id=<?php echo $id ?>"><i
                            class="bi bi-plus-circle-fill fs-5 text-light"></i></a></div>
                <?php } ?>
            </div>

            <div class="d-flex p-2 flex-wrap" style="height: 12rem; overflow:auto">
                <?php
                while ($chap = mysqli_fetch_assoc($sql5)) {
                    $value = str_replace("assets/comic_read/$id/ch", '', $chap['chapter_id']);
                ?>
                <div style=" width:9rem; border-radius:0.2em; height:3.5rem;"
                    class="d-flex p-1 mb-1 mx-2 border border-1 border-light">
                    <div style="width: 90%;">
                        <a style="font-size: xx-small;"
                            href="?page=read_comic&&id=<?php echo $id ?>&&ch=<?php echo $value ?>">Chapter
                            <?php echo $value ?></a>
                        <div style="font-size: xx-small; color:gray"><?php echo $chap['added_at'] ?></div>
                    </div>
                    <?php if ($_SESSION['login'] == 1) { ?>
                    <div>
                        <a href="?page=delete_chapter&&id=<?php echo $id ?>&&chapter=<?php echo $value ?>"><i
                                class="bi bi-trash-fill"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>