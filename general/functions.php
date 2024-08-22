<?php

// The $condition is => (mysqli_query)
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
function auth(){
    if (!$_SESSION['admin']) {
        header("location:/odc/auth/login.php");
    }
}