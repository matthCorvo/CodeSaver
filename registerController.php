<?php
  require_once 'bdd.php';

/**
 * Inscription
 */
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $verifyPassword = $_POST['verify_password'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Verify that the password and verify_password fields match
    if ($password !== $verifyPassword) {
        $errorMsg = "Password and Verify Password fields do not match.";
    } else {
        // Check if the username already exists
        $query = $conn->prepare("SELECT * FROM admins WHERE username = :username");
        $query->bindValue(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            // Username already exists
            $errorMsg = "This username is already taken. Please choose another username.";
        } else {
            // Hash the password using bcrypt algorithm
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insert the data into the database
            $query = $conn->prepare("INSERT INTO admins (name, username, password, role) VALUES (:name, :username, :password, :role)");
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':password', $hashedPassword);
            $query->bindValue(':role', $role);
            $query->execute();

            // Check if the query was successful
            if ($query->rowCount() > 0) {
                header("Location: login.php");
                exit();
            } else {
                $errorMsg = "You are not registered. Please try again.";
            }
        }
    }
}
?>