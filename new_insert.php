<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['dob'] = $_POST['dob'];
$_SESSION['gender'] = $_POST['gender'];

$error = "";

if (empty($_POST["name"])) {
    $error = 1;
} else if (!preg_match("/^[a-zA-z]*$/", htmlspecialchars(stripslashes(trim($_POST["name"]))))) {
    $error = 2;
} else if (empty($_POST['gender'])) {
    $error = 3;
} else if (empty($_POST['dob'])) {
    $error = 4;
} else if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $_POST['dob'])) {
    $error = 5;
}
if ($error == "") {
    include_once('database.php');
    if ($phpcon->connect_error) {
        die("Connection failed: " . $phpcon->connect_error);
    }
    echo "Connected successfully<br>";




    $sql = "INSERT INTO users(NAME,DOB,GENDER) values('" . $_POST['name'] . "','" . $_POST['dob'] . "','" . $_POST['gender'] . "')";

    if (mysqli_query($phpcon, $sql)) {
        $msg = "New record created successfully";
        header("location:new_index.php?msg=$msg");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($phpcon);
    }
} else {

    header("location:new_users.php?error=" . $error);
}
