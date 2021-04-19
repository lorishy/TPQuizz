<?php

class Question extends Modele {

    private $idQuestion; // int
    private $question; // string
    private $reponses = []; // array of objects

    public function __construct($idQ=null) {
        if($idQ!=null) {
            $requete = $this->getBdd()->prepare("SELECT * FROM questions WHERE id_question = ?");
            $requete->execute([$idQ]);
            $LaQuestion = $requete->fetch(PDO::FETCH_ASSOC);

            $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE id_question = ?");
            $requete->execute([$idQ]);
            $reponses = $requete->fetchAll(PDO::FETCH_ASSOC);

            $this->idQuestion = $idQ;
            $this->question = $LaQuestion["question"];
            
            foreach ($reponses as $reponse) {
                $objetReponse = new Reponse($reponse["id_reponse"]);
                $this->reponses[] = $objetReponse;
            }
        }
    }
    public function getIdQuestion() {
        return $this->idQuestion;
    }
    public function getQuestion() {
        return $this->question;
    }
    public function getReponseQuestion() {
        return $this->reponses;
    }
    public function setQuestion($newQ) {
        $this->question = $newQ;
    }
}