<?php

/**
 * PARAMÈTRE CONNECTION A LA BDD
 */ 
class Bdd
{
    
    private $conn;

    public function __construct($dsn, $user, $password)
    {
        $this->conn = new PDO($dsn, $user, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnexion()
    {
        return $this->conn;
    }
}

/**
 * FUNCTION SAUVEGARDE
 */
class CodeSaver
{
    private $conn;

    public function __construct($dsn, $user, $password)
    {
        $bdd = new Bdd($dsn, $user, $password);
        $this->conn = $bdd->getConnexion();
    }

    /**
     * 
     * PERMET DE SAUVEGARDER UN EXEMPLE DE CODE DANS LA BASE DE DONNÉES.
     *
     * @param [string] $title
     * @param [string] $language
     * @param [string] $content
     * @param [string] $url
     * @return void
     */
    public function save($title, $language, $content, $url) 
    {
        $sql = "INSERT INTO code (`title`, `language`, `content`, `url`) VALUES (:title, :language, :content, :url)";
        $query  = $this->conn->prepare($sql);
        $query ->bindParam(':title', $title);
        $query ->bindParam(':language', $language);
        $query ->bindParam(':content', $content);
        $query ->bindParam(':url', $url);
        $query ->execute();
        return $this->conn->lastInsertId();
    }
}

// CONFIGURATION DE LA BASE DE DONNÉES
$dsn = "mysql:host=localhost;dbname=code_snippet";
$user = "root";
$password = "";

$CodeSaver = new CodeSaver($dsn, $user, $password);

// LORSQUE LE FORMULAIRE EST SOUMIS
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['save_code'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : null;
    $language = isset($_POST['language']) ? $_POST['language'] : null;
    $content = isset($_POST['content']) ? $_POST['content'] : null;
    $url = isset($_POST['url']) ? $_POST['url'] : null;

    // SI LES DONNÉES SUIVANTES SONT RÉCUPÉRÉES
    // LA FONCTION sauvegarder SERA UTILISÉE
    if ($title && $language && $content) {
        $id = $CodeSaver->save($title, $language, $content, $url);
    }
}

include_once 'views.php';
?>
