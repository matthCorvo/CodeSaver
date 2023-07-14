# Code Saver Web App

L'application web Code Saver est une plateforme qui permet aux utilisateurs de sauvegarder et gérer leurs extraits de code. Elle offre des fonctionnalités d'authentification des utilisateurs, de création de code, de liste de code et de suppression de code. L'application est développée en utilisant PHP et MySQL pour le backend.

## Fonctionnalités

- **Inscription des utilisateurs** : Les utilisateurs peuvent créer un compte en fournissant leur nom d'utilisateur, leur mot de passe, leur nom et leur rôle (administrateur ou utilisateur).
```
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
```
- **Connexion des utilisateurs** : Les utilisateurs enregistrés peuvent se connecter en utilisant leur nom d'utilisateur et leur mot de passe.
```
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

```

- **Sauvegarde du code** : Les utilisateurs connectés peuvent créer de nouveaux extraits de code en fournissant un titre, un langage de programmation, le contenu du code et une URL source.
** Controller **
```

/**
 * sauvegarde
 */
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_code'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $language = isset($_POST['language']) ? $_POST['language'] : null;
    $content = isset($_POST['content']) ? $_POST['content'] : null;
    $url = isset($_POST['url']) ? $_POST['url'] : null;

    // SI LES DONNÉES SUIVANTES SONT RÉCUPÉRÉES
    // LA FONCTION sauvegarder SERA UTILISÉE
    if ($title && $language && $content) {
        $id = $codeSaver->save($title, $language, $content, $url,$id );
   
        // Redirection après la soumission du formulaire
   header("Location: index.php");
   exit();
}
}
```
** Model **
``` 
  /**
     * 
     * PERMET DE SAUVEGARDER ET MODIFIER UN EXEMPLE DE CODE DANS LA BASE DE DONNÉES.
     *
     * @param [string] $title
     * @param [string] $language
     * @param [string] $content
     * @param [string] $url
     * @return void
     */
    public function save($title, $language, $content, $url, $id) 
    {
        //appel la function de connexion a la BDD
        $conn = connect();

        if($id){
            $query = $conn->prepare("UPDATE code 
             SET title = :title, language = :language, content = :content, url = :url
             WHERE id = :id");
              //on rajoute du htmlspecialchars pour eviter l'attaque XSS
            $query->bindParam('id', $id);
            $query->bindParam('title', $title);
            $query->bindParam('language', $language);
            $query->bindParam('content',$content);
            $query->bindParam('url', $url);
            //execution
            $query->execute();
        return $id;
        }

        $query = $conn->prepare("INSERT INTO code (`title`, `language`, `content`, `url`) VALUES (:title, :language, :content, :url)");
        $query ->bindParam(':title', $title);
        $query ->bindParam(':language', $language);
        $query ->bindParam(':content', $content);
        $query ->bindParam(':url', $url);
        $query ->execute();
        return $conn->lastInsertId();

}

```
- **Afficher la liste des codes sauvegardés** : L'application affiche une liste de tous les extraits de code enregistrés, permettant aux utilisateurs de filtrer par langage de programmation.
**Model**
```
   /**
    * Récupère tous les extraits de code de la base de données.
    *
    * @return array
    */
    public function getAllCode() : array{
        //appel la function de connexion a la BDD
        $conn = connect();
        //preparation de requete
        $query = $conn->prepare("SELECT * FROM code");
        //execution
        $query->execute();
        //recuperer les resultats
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

$codeSaver = new CodeSaver();
$codeSnippet = $codeSaver->getAllCode();



```
** html **
``` 
  <ul id="codeSnippets">
        <?php foreach ($codeSnippet as $row): ?>
            <li class="d-flex justify-content-between border rounded bg-light mb-3 p-2 filter" data-language="<?= $row['language'] ?>">
                <a href="index.php?id=<?= $row['id'] ?>">
                    <?= $row['title'] ?>
                </a>

                <span class="btn btn-secondary btn-sm fw-bold">
                    <?= $row['language'] ?>
                </span>
            </li>
        <?php endforeach ?>
    </ul>
</div>
```
- **Suppression de code** : Les utilisateurs ayant le rôle d'administrateur ont la possibilité de supprimer des extraits de code.
** Controller **
```

// Check if the delete button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $codeSaver->deleteCode($id);
    // Redirect to the index page after deleting the code
    header("Location: index.php");
    exit();
}

```
** Model **
``` 
/**
 * Supression du code 
 * 
 * @param [int] $id
 * @return void
 */
    public function deleteCode($id){
        //appel la function de connexion a la BDD
        $conn = connect();

        //preparation de requete
        $query = $conn->prepare("
            DELETE FROM code
            WHERE id = :id
        ");
        $query->bindValue('id', $id);
        //execution
        $query->execute();
    }

```
** HTML **
``` 
       <?php if( $_SESSION['ROLE'] === 'super_admin'): ?>
        <?php if($id): ?>
        <hr>
        <h4>Souhaitez-vous supprimer ce code ? </h4> 
        <button type="submit" name="delete" class="btn btn-light mt-2" onclick="return confirm('Are you sure you want to delete this code?')">Supprimer</button>
        <hr>
        <?php endif; ?>
        <?php endif; ?>
```
## Installation

Pour exécuter l'application web Code Saver en local, suivez ces étapes :

1. Clonez le dépôt du projet sur votre machine locale.
2. Assurez-vous d'avoir un serveur PHP et une base de données MySQL configurés sur votre environnement de développement.
3. Importez le fichier de base de données fourni (fichier SQL) dans votre base de données MySQL.
4. Configurez les informations de connexion à la base de données dans le fichier de configuration.
5. Démarrez votre serveur local.
6. Accédez à l'application via votre navigateur en utilisant l'URL locale correspondante.
