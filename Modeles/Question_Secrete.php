<?php

class Question_Secrete extends Modele {
    
    private $idQuestion_s;
    private $question_s;

    public function __construct($idQuestion_s = null) {
        
        if($idQuestion_s !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM questions_secretes WHERE id_question_s = ?");
            $requete->execute([$idQuestion_s]);
            $infoQuestionSecrete = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idQuestion_s = $infoQuestionSecrete["id_question_s"];
            $this->question_s = $infoQuestionSecrete["question_s"];
        }
    }
    public function getIdQuestion_s() {
        return $this->idQuestion_s;
    }
    public function getQuestion_s() {
        return $this->question_s;
    }
    public function setIdQuestion_s($idQuestion_s) {
        return $this->getIdQuestion_s = $idQuestion_s;
    }
    public function setQuestion_s($question_s) {
        return $this->quesiton_s = $question_s;
    }

    public function getListe(){
        $requete = $this->getBdd()->prepare("SELECT * FROM questions_secretes");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
}