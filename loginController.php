<?php
// Inclut la connexion à la base de données
require_once 'bdd.php';
session_start();

// Redirige l'utilisateur vers la page d'accueil s'il est déjà connecté
if (isset($_SESSION['ID'])) {
    header("Location: home.php");
    exit();
}

// Vérifie si le formulaire a été soumis
if (isset($_POST['submit'])) {
    $errorMsg = "";
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérifie que le nom d'utilisateur et le mot de passe ne sont pas vides
    if (!empty($username) || !empty($password)) {
        $query = "SELECT * FROM admins WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifie si un résultat a été trouvé dans la base de données
        if ($result !== false) {
            $hashedPassword = $result['password'];

            // Vérifie si le mot de passe saisi est correct
            if (password_verify($password, $hashedPassword)) {
                $_SESSION['ID'] = $result['id'];
                $_SESSION['ROLE'] = $result['role'];
                $_SESSION['NAME'] = $result['name'];
                header("Location: home.php");
                exit();
            } else {
                $errorMsg = "Mot de passe incorrect";
            }
        } else {
            $errorMsg = "Aucun utilisateur trouvé avec ce nom d'utilisateur";
        }
    } else {
        $errorMsg = "Nom d'utilisateur et mot de passe requis";
    }
}
?>
