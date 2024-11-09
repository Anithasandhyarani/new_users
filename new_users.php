<?php
session_start();
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
        <h2>User details</h2>
        <form action="new_insert.php" method="post">
            <div style="font-size:11px;color:red">


                <?php

                $error_array = ["0" => "", "1" => "name required", "2" => 'Name contains special characters', "3" => 'DOB is required', "4" => 'DOB is invalid', "5" => 'Gender is required'];
                $enum = $_GET["error"] ?? 0;
                echo $error_array[$enum];

                ?>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Enter Name:</label>
                <input type="text" class="form-control w-25" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>" <br>
            </div>

            <div class=" mb-3">
                <label for="dob" class="form-label">Enter the DOB:</label>
                <input type="date" class="form-control w-25" name="dob" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : '' ?>"><br>
            </div>

            <div class="mb-3">
                <label class="form-label">Select gender:</label>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "female") ? 'checked' : ''; ?> id="female">

                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "male") ? 'checked' : ''; ?> id="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                </div>
                <div class="form-check form-check-inline">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="others" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == "others") ? 'checked' : ''; ?> id="others">
                        <label class="form-check-label" for="others">Others</label><br>

                    </div>
                </div>
            </div><br>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    </div>


</body>
<html>