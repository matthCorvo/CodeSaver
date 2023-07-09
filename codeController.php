<?php
require_once 'codeModel.php';

$codeSaver = new CodeSaver();

/**
 * Recuperation des informations 
 */
$id = "";
$content = "";
$title = "";
$language = "";
$url = "";

// Vérification si l'ID est défini dans la requête GET
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $codeSaver->getCode($id);
        // Vérification si des données ont été récupérées
    if($data) {
        $content = $data['content'];
        $title = $data['title'];
        $language = $data['language'];
        $url = $data['url'];

    }
}

/**
 * Envoie de la data quand LE FORMULAIRE EST envoyé
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

// Check if the delete button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $codeSaver->deleteCode($id);
    // Redirect to the index page after deleting the code
    header("Location: index.php");
    exit();
}







?>
