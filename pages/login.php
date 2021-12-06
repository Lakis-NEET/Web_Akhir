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
        }
        else{
        echo "password salah";
    }
}else{
    echo "Email salah";
}
}

?>

<form action="" method="post">
    <div>
        <label>Email</label>
        <label>:</label>
        <input type="email" name="email" />
    </div>
    <div>
        <label>Password</label>
        <label>:</label>
        <input type="password" name="password" />
    </div>
    <input type="submit" value="Log in" name="submit" />
</form>