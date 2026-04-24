// <?php
// 
// class Database {
//     private $host = "localhost";
//     private $db_name = "users_db";
//     private $username = "root";
//     private $password = "03007470";
//     private $conn;
// 
//     public function getConnection() {
//         $this->conn = null;
// 
//         try {
//             // Using PDO for better security and flexibility
//             $this->conn = new PDO("mysql:host=". $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
//         } catch(PDOException $exception) {
//             echo "Connection error: " . $exception->getMessage();
//         }
//         return $this->conn;
//     }
// }
// 
// ?>

<?php

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "03007470";
    $db_name = "users_db";
    /** @var mysqli|null $conn*/
    $conn = null;

    try {

        $conn = new mysqli($db_server, $db_user, $db_pass, $db_name);
        $conn->set_charset("utf8mb4");

        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            phone VARCHAR(20) NOT NULL,
            address Text NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $conn->query($sql);
        echo "Table 'users' created successfully";


    }
    catch (mysqli_sql_exception $e) {
        echo "Could not connect! " . $e->getMessage();
    }
?>
