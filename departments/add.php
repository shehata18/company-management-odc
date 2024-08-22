<?php
include "../general/env.php";
include "../general/functions.php";
include "../shared/header.php";
include "../shared/nav.php";


if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $insert = "INSERT INTO `departments` VALUES(NULL,'$name')";
    $i = mysqli_query($conn, $insert);
    testMessage($i, "Insert Department");
}

auth();

?>
<h1 class=" pt-2 text-center">Add Department :</h1><br>

<div class="container col-6">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label>Department Name: </label>
                    <input class="form-control" name="name" type="text">
                </div>
                <button name="send" class="btn btn-info">Send Data</button>
            </form>
        </div>
    </div>
    
<?php include "../shared/footer.php"; ?>