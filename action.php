<?php
    require_once "database.php";

    if (isset($_POST['add'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, address) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $email, $phone, $address);
            try {
                $stmt->execute();
                header("Location: index.php");
                exit();

            } catch (mysqli_sql_exception $e) {
                echo "Error adding user: " . $e->getMessage();
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            try {
                $stmt->execute();
                header("Location: index.php");
                exit();
            } catch (mysqli_sql_exception $e) {
                echo "Error deleting user: " . $e->getMessage();
            }
        }
 
    }

    if (isset($_POST['update'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        if ($conn instanceof mysqli) {
            $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
            $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
            try {

                $stmt->execute();
                header("Location: index.php");
                exit();
                
            } catch (mysqli_sql_exception $e) {
                echo "Error updating user: " . $e->getMessage();
                return "Error updating user: " . $e->getMessage();
            }
        }
    }

?>