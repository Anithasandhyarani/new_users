<?php

include_once('database.php');
if ($phpcon->connect_error) {
    die("Connection failed: " . $phpcon->connect_error);
}
echo "Connected successfully<br>";

$name = $_POST['name'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$id = $_POST['id'];

$sql = "UPDATE new_users SET NAME='$name',DOB='$dob',GENDER='$gender' WHERE id='$id'";

if (mysqli_query($phpcon, $sql)) {
    $upd = "updated successfully";
    header("location:new_index.php?upd=$upd");
} else {

    echo "Error: " . $sql . "<br>" . mysqli_error($phpcon);
}
mysqli_close($phpcon);
