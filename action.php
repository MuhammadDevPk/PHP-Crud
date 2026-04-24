<?php

    if (isset($_POST['add'])) {
        require_once "database.php";

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address) VALUES ($name, $email, $phone, $address)");
            try {
                $conn->query($stmt);
                header("Location: index.php");
                exit();

            } catch (mysqli_sql_exception $e) {
                echo "Error adding user: " . $e->getMessage();
            }
        }
    }


?>