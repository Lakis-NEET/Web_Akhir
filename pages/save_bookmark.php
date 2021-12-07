<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

if($_SESSION['login']==3){
    redirect("?page=login");
}

$id;
$user_id=$_SESSION['id'];
if (isset($_GET['id'])) {
    //page tidak ditemukan
    $id = $_GET['id'];
}
if(isset($_POST['ismarked'])){
    $mark = $_POST['ismarked'];
    echo $mark;
    if($mark==1){
        mysqli_query($connection, "DELETE FROM bookmarks WHERE comic_id = $id AND user_id = $user_id");
        echo "dihapus";
    }else if($mark==0){
        $data = [
            'comic_id'              => $id,
            'user_id'               => $user_id
        ];
        insert_data($connection, "bookmarks", $data); 
        echo "ditambah";
    }
}
redirect("?page=details&&id=$id");
?>