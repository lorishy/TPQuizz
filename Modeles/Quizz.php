<?php require_once "Modele.php";

class Quizz extends Modele {

    private $idQuizz; // int
    private $titre; // string
    private $categorie; // objet
    private $questions = []; // array of objects

    public function __construct($idQuizz = null)
    {
        if($idQuizz !== null){
            $requete = $this->getBdd()->prepare("SELECT titre, id_categorie FROM quizz WHERE id_quizz = ?");
            $requete->execute([$idQuizz]);
            $infoQuizz = $requete->fetch(PDO::FETCH_ASSOC);

            $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE id_quizz = ?"); // on veu initialiser toutes nos question dans quizz donc : on recup toutes les question et toutes les reponses de c question
            $requete->execute([$idQuizz]);
            $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idQuizz = $idQuizz;
            $this->titre  = $infoQuizz["titre"];
            $this->categorie = new Categorie($infoQuizz["id_categorie"]);

            // Pour chaque question 
            foreach ( $questions as $question ){
                $objetQuestion = new Question();
                $objetQuestion->initialiserQuestion($question["id_question"], $question["question"]);
                $this->questions[] = $objetQuestion;
            }
        }
    }
    public function insertQuizz($titre, $id_categorie, $idUtilisateur)
    {
        $requete = $this->getBdd()->prepare("INSERT INTO quizz(titre, id_categorie, id_utilisateur) VALUES(?, ?, ?)");
        $requete->execute([$titre, $id_categorie, $idUtilisateur]);
        $requete = $this->getBdd()->prepare("SELECT MAX(id_quizz) AS maximum FROM quizz");
        $requete->execute();
        $idQuizz = $requete->fetch(PDO::FETCH_ASSOC);
        return $idQuizz["maximum"];

    }
    public function getIdQuizz() {
        return $this->idQuizz;
    }
    public function getTitreQuizz() {
        return $this->titre;
    }
    public function getCategorieQuizz() {
        return $this->categorie;
    }
    public function getQuestionQuizz() {
        return $this->questions;
    }
    public function setIdQuizz($idQuizz) {
        return $this->titre = $idQuizz;
    }
    public function setTitreQuizz($titre) {
        return $this->titre = $titre;
    }
    public function setCategorieQuizz($categorie) {
        return $this->categorie = $categorie;
    }
    public function addQuestion($question) {

        $requete = $this->getBdd()->prepare("INSERT INTO question FROM questions VALUES (?)");
        $requete->execute(["$question"]);
        $Q = $requete->fetch(PDO::FETCH_ASSOC);
    }
    public function getListeQuizz(){

        $requete = $this->getBdd()->prepare("SELECT * FROM quizz");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
}