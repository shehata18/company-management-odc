<?php
include "../general/env.php";
include "../general/functions.php";
include "../shared/header.php";
include "../shared/nav.php";


if (isset($_POST['Login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $select = "SELECT * FROM `admins` WHERE `username` = '$name' AND `password`= '$password'";
    $s = mysqli_query($conn,$select);
    $count = mysqli_num_rows($s);
    if($count == 1){
        $_SESSION['admin']= $name;
        header("location:/odc/index.php");
   }else{
        echo "False Admin <br>";
   }
}

print_r($_SESSION);




?>
<h1 class=" pt-2 text-center">Login Page </h1><br>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>User Name: </label>
                    <input class="form-control" name="name" type="text">
                </div>
                <div class="form-group">
                    <label>User Password: </label>
                    <input class="form-control" name="password" type="text">
                </div>
                <button name="Login" class="btn btn-success ">Login</button>
            </form>
        </div>
    </div>

    <?php include "../shared/footer.php"; ?>