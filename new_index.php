<!DOCTYPE html>
<html>

<head>
    <title>User deatils</title>
</head>

<body>
    <a href="new_users.php">create user </a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>DOB</th>
                <th>GENDER</th>
            </tr>
        </thead>
        <tbody>

            <?php

            include_once('database.php');
            $result = mysqli_query($phpcon, "select * from new_users");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['NAME']; ?></td>
                    <td><?php echo $row['DOB']; ?></td>
                    <td><?php echo $row['GENDER']; ?></td>
                    <td>
                    <td> <a href="new_edit.php?id=<?php echo $row['ID']; ?>"> Edit</a></td>
                    <td> <a href="new_delete.php?id=<?php echo $row['ID']; ?>">Delete</a></td>
                <?php
            }

                ?>


        </tbody>
    </table> <br>
    <?php echo $msg = $_GET['msg'] ?? ''; ?>
    <?php echo $del = $_GET['del'] ?? ''; ?>
    <?php echo $upd = $_GET['upd'] ?? ''; ?>
</body>


</html>