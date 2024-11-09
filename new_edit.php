<?php

$id = $_GET['id'];
include_once('database.php');
$result = mysqli_query($phpcon, "select * from new_users where id = " . $id);
$user = mysqli_fetch_assoc($result);
//print_r($user);
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title> User form</title>
</head>

<body>
    <div class="container mt-4">
        <h2>Edit form</h2>
        <form action="new_update.php" method="post">

            <input type="hidden" class="form-control w-25" value="<?php echo $user['ID']; ?>" name="id"><br>

            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" value="<?php echo $user['NAME']; ?>" name="name"><br>
            </div>

            <div class="mb-3">
                <label for="dob" class="form-label">Enter the DOB:</label>
                <input type="date" class="form-control w-25" name="dob" value="<?php echo $user['DOB']; ?>" <br>
            </div>

            <div class="mb-3">
                <label class="form-label">Select gender:</label>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" <?php if ($user['GENDER'] == 'female') echo 'checked' ?> id="female">

                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" <?php if ($user['GENDER'] == 'male') echo 'checked' ?> id="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="others" <?php if ($user['GENDER'] == 'others') echo 'checked' ?> id="others">
                        <label class="form-check-label" for="others">others</label><br>

                    </div>
                </div>
            </div><br>

            <button type="update" class="btn btn-primary">update</button>


        </form>

    </div>


</body>
<html>