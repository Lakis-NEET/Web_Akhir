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


<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-25">
                <label>Username</label>
            </div>
            <div class="col-75">
                <input type="text" name="username" />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Email</label>
            </div>
            <div class="col-75">
                <input type="email" name="email" />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password" />
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label>Confirm Password</label>
            </div>
            <div class="col-75">
                <input type="password" name="password1" />
            </div>
        </div>
        <br>
        <div class="row">
            <input type="submit" value="Sign Up" name="submit" />
        </div>
    </form>
</div>