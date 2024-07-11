<?php
include "connection.php";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if both username and password are provided
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Prepare the SQL query with placeholders
        $sql = "SELECT * FROM users WHERE username = :username AND pass = :password";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind the parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Successful login, redirect to a dashboard or home page.
            
            
            header("Location: home.html");
            exit();
        } else {
            // Incorrect credentials, display an error message.
            $error_message = "Invalid username or password. Please try again.";
            header("Location: login.html?status=" . urlencode($error_message));
     }
    }
}
?>
