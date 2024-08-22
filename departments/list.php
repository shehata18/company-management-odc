<?php
include "../general/env.php";
include "../general/functions.php";
include "../shared/header.php";
include "../shared/nav.php";

$select = "SELECT * FROM `departments`";
$departments = mysqli_query($conn, $select);
auth();


?>
<h1 class=" pt-2 text-center">List Departments :</h1><br>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <table class="table table-strip table-dark text-center">
                <tr>
                    <th>#ID</th>
                    <th>Department Name</th>
                </tr>
                <?php foreach ($departments as $data) : ?>
                    <tr>
                        <td> <?= $data['id']; ?> </td>
                        <td> <?= $data['name']; ?> </td>
                    </tr>
                <?php endforeach;  ?>

            </table>
        </div>
    </div>

    <?php include "../shared/footer.php"; ?>