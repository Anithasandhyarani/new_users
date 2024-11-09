<?php
include_once('database.php');
$id = $_GET['id'];
$sql = "DELETE FROM new_users WHERE id='$id'";
if (mysqli_query($phpcon, $sql)) {
    $del = "deleted successfully";
    header("location:new_index.php?del=$del");
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($phpcon);
}
mysqli_close($phpcon);
