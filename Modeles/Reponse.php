<?php

class Reponse extends Modele {

    private $idReponse; // int
    private $reponse; // string
    private $statut; // booléen (reponse correcte ou incorrecte)

    public function __construct($idR = null) {
        
        if($idR != null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM reponses WHERE id_reponse = ?");
            $requete->execute([$idR]);
            $LaReponse = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idReponse = $idR;
            $this->reponse = $LaReponse["reponse"];
            $this->statut = $LaReponse["statut"];
        }
    }
    public function getIdReponse() {
        return $this->idReponse;
    }
    public function getReponse() {
        return $this->reponse;
    }
    public function getStatut() {
        return $this->statut;
    }
}