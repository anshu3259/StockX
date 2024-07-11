<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL query with placeholders for INSERT
        $sql = "INSERT INTO users (username, pass) VALUES (:username, :password)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        try {
            // Execute the statement
            $stmt->execute();
            // Successful registration, redirect to the index page with a success message.
            $status = "Registration successful! You can now log in.";
            header("Location: login.html?status=" . urlencode($status));
            exit();
        } catch (PDOException $e) {
            // Registration failed, display an error message.
            $error_message = "Registration failed. Error: " . $e->getMessage();
            header("Location: login.html?status=" . urlencode($error_message));
            exit();
        }
    }
}
?>
