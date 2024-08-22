<?php
include "../general/env.php";
include "../general/functions.php";
include "../shared/header.php";
include "../shared/nav.php";

if (isset($_GET['show'])) {
    $id = $_GET['show'];
    $select = "SELECT * FROM `employeesJoinDepartments` WHERE empId = $id";
    $one_Employee = mysqli_query($conn, $select);
    $row = mysqli_fetch_assoc($one_Employee);
}

auth();
?>
<h2 class=" pt-2 text-center ">Show Employee <i class="fa-solid fa-id-card"></i></h2>
<h4 class="text-center text-info"><?= "''" . $row['empName'] . "''" ?></h4>

<div class="container-fluid col-md-3 text-center">
    <div class="card">
        <img src="/odc/employees/<?= $row['image'] ?>" class="card-image-top" alt="">
        <div class="card-body">
            <p>Name:&nbsp;&nbsp;<?= $row['empName'] ?></p>
            <p>Phone:&nbsp;&nbsp;<?= $row['phone'] ?></p>
            <p>Salary:&nbsp;&nbsp;<?= $row['salary'] ?></p>
            <p>City:&nbsp;&nbsp;<?= $row['city'] ?></p>
            <p>Department:&nbsp;&nbsp;<?= $row['depName'] ?></p>

        </div>
    </div>

    <?php include "../shared/footer.php"; ?>