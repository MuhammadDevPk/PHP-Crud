<?php

    require_once "database.php";

    if (!isset($_GET['id'])) {
            echo "No user ID provided.";
            exit();
    }
    
    if ($conn instanceof mysqli) {


        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $_GET['id']);

        try {
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();
        } catch (mysqli_sql_exception $e) {
            echo "Error fetching users: " . $e->getMessage();
        }
    }
    else {
        echo "Connection is not a valid mysqli instance.";
    }
            

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="wrapper">
        <div class="form-wrapper">
            <h1>Edit User</h1>
            <form method="POST" action="action.php">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input value="<?= $user['name'] ?>" type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input value="<?= $user['email'] ?>" type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input value="<?= $user['phone'] ?>" type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" required><?= $user['address'] ?></textarea>
                </div>
                <div class="btn-box">
                    <button type="submit" class="btn" name="update">Update User</button>
                    <a href="index.php" class="btn">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>