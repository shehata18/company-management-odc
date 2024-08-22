<?php
include "../general/env.php";
include "../general/functions.php";
include "../shared/header.php";
include "../shared/nav.php";


if (isset($_POST['send'])) {
    $name = $_POST['empName'];
    $phone = $_POST['empPhone'];
    $salary = $_POST['empSalary'];
    $city = $_POST['empCity'];
    // image Code
    $image_Name = time() . $_FILES['image']['name'];
    $temp_Name = $_FILES['image']['tmp_name'];
    $location = "./upload/" . $image_Name;
    if (move_uploaded_file($temp_Name, $location)) {
        echo "Upload Done";
    } else {
        echo "Upload Failed";
    }

    $department_id = $_POST['departmentId'];
    $insert = "INSERT INTO `employees` VALUES(NULL,'$name','$phone',$salary,'$city','$location',$department_id)";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Employee");
}
$select = "SELECT * FROM `departments`";
$deps = mysqli_query($conn, $select);

// print_r($_FILES);
auth();
?>
<h1 class=" pt-2 text-center">Add Employee :</h1><br>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Employee Name: </label>
                    <input class="form-control" type="text" name="empName">
                </div>
                <div class="form-group">
                    <label>Employee Phone: </label>
                    <input class="form-control" type="text" name="empPhone">
                </div>
                <div class="form-group">
                    <label>Employee Salary: </label>
                    <input class="form-control" type="text" name="empSalary">
                </div>
                <div class="form-group">
                    <label>Employee City: </label>
                    <input class="form-control" type="text" name="empCity">
                </div>
                <div class="form-group">
                    <label>Profile Image </label>
                    <input class="form-control-file" type="file" name="image">
                </div>
                <div class="form-group">
                    <label for="">Department ID</label>
                    <select name="departmentId" class="form-control">
                        <?php foreach ($deps as $data) : ?>
                            <option value="<?= $data['id'] ?>"> <?= $data['name'] ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button name="send" class="btn btn-info">Send Data</button>
            </form>
        </div>
    </div>







    <?php include "../shared/footer.php" ?>