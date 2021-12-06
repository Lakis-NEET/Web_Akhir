<?php
if (defined('GELANG') === false) {
    //tidak memiliki gelang
    die("Anda tidak berhak membuka file ini secara langsung");
}

if (isset($_POST['submit'])){
    if($_POST['password']==$_POST['password1']){
    $email=$_POST['email'];
    $password=sha1($_POST['password']);
    $username=$_POST['username'];
    //menyiapkan data tambahan
    $now=date("Y-m-d H:i:s");
    $role=2;
    //data yang akan disimpan
    $data = [
        'user_name'         => $username,
        'user_email'        => $email,
        'user_password'     => $password,
        'user_role'         => $role,
        'created_at'        => $now
    ];
    //Insert data
    insert_data($connection, "user_list", $data);
    redirect('?page=login');
    }
    else{
        echo "Password tidak sama";
    }
}
?>

<form action="" method="post">
    <div>
        <label>Username</label>
        <label>:</label>
        <input type="text" name="username" />
    </div>
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
    <div>
        <label>Confirm Password</label>
        <label>:</label>
        <input type="password" name="password1" />
    </div>
    <input type="submit" value="Sign Up" name="submit" />
</form>