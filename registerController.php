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

    // Vérifier que les champs password et verify_password correspondent
    if ($password !== $verifyPassword) {
        $errorMsg = "Password and Verify Password fields do not match.";
    } else {
        // Vérifier si le nom d'utilisateur existe déjà
        $query = $conn->prepare("SELECT * FROM admins WHERE username = :username");
        $query->bindValue(':username', $username);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            // Le nom d'utilisateur existe déjà
            $errorMsg = "This username is already taken. Please choose another username.";
        } else {
            // Hacher le mot de passe à l'aide de l'algorithme bcrypt
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insérer les données dans la base de données
            $query = $conn->prepare("INSERT INTO admins (name, username, password, role) VALUES (:name, :username, :password, :role)");
            $query->bindValue(':name', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':password', $hashedPassword);
            $query->bindValue(':role', $role);
            $query->execute();

            // Vérifier si la requête a abouti
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