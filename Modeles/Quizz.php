<?php require_once "Modele.php";

class Quizz extends Modele {

    private $idQuizz; // int
    private $titre; // string
    private $categorie; // objet
    private $questions = []; // array of objects

    public function __construct($idQuizz = null) {

        if($idQuizz !== null){

            $requete = $this->getBdd()->prepare("SELECT titre, idCategorie FROM quizz WHERE idQuizz = ?");
            $requete->execute([$idQuizz]);
            $infos = $requete->fetch(PDO::FETCH_ASSOC);
            
            $this->idQuizz = $idQuizz;
            $this->titre = $infos["titre"];
            $this->categorie = new Categorie($infos["idCategorie"]);

            $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE idQuizz = ?");
            $requete->execute([$idQuizz]);
            $questions = $requete->fetchAll(PDO::FETCH_ASSOC);

            foreach ( $questions as $question ){

                $objetQuestion = new Question($question["idQuestion"]);
                $this->questions[] = $objetQuestion;
            }
        }
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