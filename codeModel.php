<?php 
require_once './bdd.php';

class CodeSaver
{

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




    /**
     *  Récupère code de la base de données par ID.
     *
     * @param [int] $id
     * @return array
     */
    public function getCode($id) : array{
        //appel la function de connexion a la BDD
        $conn = connect();
        //preparation de requete
        $query = $conn->prepare("SELECT * FROM code
        WHERE id = :id
        ");
        $query ->bindParam(':id', $id);
        //execution
        $query->execute();
        //recuperer les resultats
        $result = $query->fetchAll(PDO::FETCH_ASSOC);


        // Vérification s'il y a des résultats
        if (isset($result[0])) {
            // S'il y a des résultats, on retourne le premier élément du tableau
            $result = $result[0];
        } else {
            // Sinon, on retourne un tableau vide
            $result = [];
        }

        return $result;

    }


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




}
