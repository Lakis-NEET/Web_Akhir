<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

$_SESSION['login']=3;
$_SESSION['username']="Blocked";
$_SESSION['id']="Blocked";
redirect("?page=home");
?>