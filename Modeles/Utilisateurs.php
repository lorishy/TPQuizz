<?php

class Utilisateurs {

    private $idUtilisateur; // int
    private $identifiant; // string
    private $idRole; // int
    private $email; //string
    private $mdp; // string
    private $questionSecrete; // string
    private $reponseSecrete; // string

    public function __construct($idUtilisateur = null)
    {
        
    }
    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }
    public function getIdentifiant() {
        return $this->identifiant;
    }
    public function getIdRole() {
        return $this->idRole;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getMdp() {
        return $this->mdp;
    }
    public function getQuestionSecrete() {
        return $this->questionSecrete;
    }
    public function getReponseSecrete() {
        return $this->reponseSecrete;
    }
    public function setIdRole($idRole) {
        return $this->idRole = $idRole;
    }
    public function setIdentifiant($identifiant) {
        return $this->identifiant = $identifiant;
    }
    public function setMdp($mdp) {
        return $this->mdp = $mdp;
    }
    public function setQuestionSecrete($questionSecrete) {
        return $this->questionSecrete = $questionSecrete;
    }
    public function setReponseSecrete($reponseSecrete) {
        return $this->reponseSecrete = $reponseSecrete;
    }
}