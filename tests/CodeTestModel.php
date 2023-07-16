<?php

use PHPUnit\Framework\TestCase;

require_once './bdd.php';
require_once './CodeModel.php';
require_once './vendor/autoload.php';

class CodeTestModel extends TestCase
{
    public function testSaveMethodSavesCode()
    {
        
        $codeSaver = new CodeSaver();
        // Fournir les dépendances nécessaires, telles que la connexion à la base de données ou des objets simulés

        $title = "Code de test";
        $language = "PHP";
        $content = "echo 'Bonjour, le monde !';";
        $url = "https://example.com/code";
        $id = null; // Définir à null pour sauvegarder un nouveau code

        $savedId = $codeSaver->save($title, $language, $content, $url, $id);

        // Assert
        // Effectuer des assertions pour vérifier que le code est sauvegardé correctement
        // Par exemple, vous pouvez vérifier que savedId n'est pas null et correspond au nouveau code sauvegardé dans la base de données
        $this->assertNotNull($savedId);
        // Ajouter d'autres assertions spécifiques au besoin
    }

    public function testGetAllCodeMethodReturnsAllCodes()
    {
        $codeSaver = new CodeSaver();
        // Fournir les dépendances nécessaires, telles que la connexion à la base de données ou des objets simulés

        $codes = $codeSaver->getAllCode();

        // Assert
        // Effectuer des assertions pour vérifier que tous les codes sont renvoyés correctement
        // Par exemple, vous pouvez vérifier que le tableau $codes n'est pas vide et contient le nombre attendu de codes
        $this->assertNotEmpty($codes);
        // Ajouter d'autres assertions spécifiques au besoin
    }

    public function testDeleteCodeMethodDeletesCode()
    {
        $codeSaver = new CodeSaver();
        // Fournir les dépendances nécessaires, telles que la connexion à la base de données ou des objets simulés

        $id = 1; // Définir l'ID du code à supprimer

        // Act
        $codeSaver->deleteCode($id);

        // Assert
        // Effectuer des assertions pour vérifier que le code est supprimé correctement
        // Par exemple, vous pouvez vérifier que le code avec l'ID spécifié n'existe plus dans la base de données
        $deletedCode = $codeSaver->getCode($id);
        $this->assertEmpty($deletedCode);
        // Ajouter d'autres assertions spécifiques au besoin
    }
}