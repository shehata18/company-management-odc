<?php
// The $condition is => (mysqli_query)
session_start();

function testMessage($condition, $message)
{
    if ($condition == TRUE) {
        echo  "<div class='alert alert-success col-4 mx-auto'>
        $message Done Successfly
        </div>";
    } else {
        echo  "<div class='alert alert-danger col-4 mx-auto'>
        $message Failed Process
        </div>";
    }
}









// Connect to Database
$host = "localhost";
$user = "root";
$password = "";
$db_Name = "odc";
$conn = mysqli_connect($host, $user, $password, $db_Name);



// Create
if (isset($_POST['send'])) {
    $name = $_POST['empName'];
    $phone = $_POST['empPhone'];
    $salary = $_POST['empSalary'];
    $city = $_POST['empCity'];

    $insert = "INSERT INTO `employees` VALUES(NULL,'$name','$phone',$salary,'$city')";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Employee ");
}

// --Read--
$select = "SELECT * FROM `employees`";
$employees = mysqli_query($conn, $select);
// testMessaage($employees, "Select Employess");
$name="";
$phone="";
$salary="";
$city="";
$update= false;

// --Update--
if (isset($_GET['edit'])) {
    $update = TRUE;
    $id = $_GET['edit']; // contains id
    $select = "SELECT * FROM `employees` WHERE id=$id";
    $oneEmployee = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($oneEmployee);
    $name=$row['name'];
    $phone=$row['phone'];
    $salary=$row['salary'];
    $city=$row['city'];
    if (isset($_POST['update'])) {
        $name = $_POST['empName'];
        $phone = $_POST['empPhone'];
        $salary = $_POST['empSalary'];
        $city = $_POST['empCity'];
        $update = "UPDATE `employees` SET `name`='$name',`phone`=$phone,`salary`=$salary,`city`='$city' WHERE id=$id";
        $u = mysqli_query($conn, $update);
        header("location: index.php");
    }
}


// --Delete--
// $_GET['delete] contains the id ,it will back from URL
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM `employees` WHERE id=$id";
    $d = mysqli_query($conn, $delete);
    header("location: index.php");
}


print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/bootstrap.min.css">
    <link rel="stylesheet" href="./CSS/main.css">
    <title>ODC/CRUD</title>
</head>

<body>

    <?php if (!empty($testMessage)) : ?>

    <?php endif; ?>
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="">Employee Name:</label>
                        <input type="text" class="form-control" value="<?= $name ?>" name="empName">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Phone: </label>
                        <input type="text" class="form-control" value="<?= $phone ?>" name="empPhone">
                    </div>
                    <div class="form-group">
                        <label for="">Employee Salary: </label>
                        <input type="text" class="form-control" value="<?= $salary ?>" name="empSalary">
                    </div>
                    <div class="form-group">
                        <label for="">Employee City: </label>
                        <input type="text" class="form-control" value="<?= $city ?>" name="empCity">
                    </div>

                    <?php if($update):?>
                        <button name="update" class="btn btn-info">Update Data</button>
                    <?php else: ?>
                        <button name="send" type="submit" class="btn btn-primary">Insert Employee</button>
                    <?php endif; ?>
                </form>
            
            </div>
        </div>
    </div>

    <div class="container col-7 mt-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-dark">
                    <tr>
                        <th>#ID</th>
                        <th>Employee Name</th>
                        <th>Employee Phone</th>
                        <th>Employee Salary</th>
                        <th>Employee City</th>
                        <th class="text-center" colspan="2">Action</th>
                    </tr>
                    <tr>
                        <?php foreach ($employees as $data) : ?>
                            <td> <?= $data['id'] ?> </td>
                            <td> <?= $data['name'] ?> </td>
                            <td> <?= $data['phone'] ?> </td>
                            <td> <?= $data['salary'] ?> </td>
                            <td> <?= $data['city'] ?> </td>
                            <!-- Here I use anchor tag <a> Not <button> to show data in URL without using GET method  -->
                            <!-- Question mark '?' is optional parameter -->
                            <td><a href="index.php?edit=<?= $data['id'] ?>" name="edit" class="btn btn-primary">Edit</a></td>
                            <td><a href="index.php?delete=<?= $data['id'] ?>" name="delete" class="btn btn-danger">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</body>

</html>