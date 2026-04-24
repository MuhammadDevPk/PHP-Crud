<?php

    require_once "database.php";

    if ($conn instanceof mysqli){

        $query = "SELECT * FROM users";
        $result = $conn->query($query);

    } else {
        echo "Connection is not a valid mysqli instance.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation Using PHP & MySQL | Codehal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <div class="container">
        <h1>User List</h1>
        <a href="add.php">Add User</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
                $no = 1;
                while ($user = mysqli_fetch_assoc($result)) :?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['phone'] ?></td>
                <td><?= $user['address'] ?></td>
                <td>
                    <a href="edit.php">Edit</a>
                    <a href="#" class="btn-delete">Delete</a>
                </td>
            </tr>

            <?php endwhile; ?>
        </table>
    </div>

</body>
</html>