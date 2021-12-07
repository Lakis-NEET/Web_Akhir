<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=sha1($_POST['password']);
    $sql="SELECT * FROM user_list WHERE user_email='$email'";
    $result= mysqli_query($connection, $sql);
    if(mysqli_num_rows($result)==1){
        $row= mysqli_fetch_assoc($result);
        if($row['user_password']==$password){
            $_SESSION['login']=$row['user_role'];
            $_SESSION['username']=$row['user_name'];
            $_SESSION['id']=$row['user_id'];
            redirect("?page=home");
        }
        else{
        echo "password salah";
    }
}else{
    echo "Email salah";
}
}

?>

<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
                <label>Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" placeholder="Input Your Email..." />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" placeholder="Input Your Password..." />
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Log in" name="submit" />
        </div>
    </form>
</div>