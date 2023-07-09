<?php
// Include database connectivity
require_once 'bdd.php';
session_start();

if (isset($_SESSION['ID'])) {
    header("Location: home.php");
    exit();
}


if (isset($_POST['submit'])) {
    $errorMsg = "";
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) || !empty($password)) {
        $query = "SELECT * FROM admins WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            $hashedPassword = $result['password'];

            // Verify the entered password
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['ID'] = $result['id'];
                $_SESSION['ROLE'] = $result['role'];
                $_SESSION['NAME'] = $result['name'];
                header("Location: home.php");
                exit();
            } else {
                $errorMsg = "Incorrect password";
            }
        } else {
            $errorMsg = "No user found with this username";
        }
    } else {
        $errorMsg = "Username and Password are required";
    }
}

?>