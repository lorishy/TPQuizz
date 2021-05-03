<?php

class Utilisateur extends Modele {

    private $idUtilisateur; // int
    private $identifiant; // string
    private $idRole; // int
    private $email; //string
    private $mdp; // string
    private $questionSecrete; // Object
    private $reponseSecrete; // string

    public function __construct($idUtilisateur = null) {

        if($idUtilisateur !== null) {

            $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur = ?");
            $requete->execute([$idUtilisateur]);
            $infoUtilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            $this->idUtilisateur = $idUtilisateur;
            $this->identifiant = $infoUtilisateur["identifiant"];
            $this->idRole = $infoUtilisateur["id_role"];
            $this->email = $infoUtilisateur["email"];
            $this->mdp = $infoUtilisateur["mdp"];
            $this->questionSecrete = new Question_Secrete($infoUtilisateur["id_question_s"]);
            $this->reponseSecrete = $infoUtilisateur["reponse_s"];

        }
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
    public function setIdUtilisateur($idUtilisateur) {
        return $this->idUtilisateur = $idUtilisateur;
    }
    public function setIdentifiant($identifiant) {
        return $this->identifiant = $identifiant;
    }
    public function setIdRole($idRole) {
        return $this->idRole = $idRole;
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
    public function connexion($identifiant, $mdp) {
        
        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        $identifiantExiste = $requete->rowcount();

        if($identifiantExiste == 1) {

            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            if(password_verify($mdp, $utilisateur["mdp"])) {

                return ["succes" => true, "erreur" => "", "idUtilisateur" => $utilisateur["id_utilisateur"]];

            } else {
                return ["succes" => false, "erreur" => "motdepasse", "idUtilisateur" => 0 ];
            }

        } else {
            return ["succes" => false, "erreur" => "identifiant", "idUtilisateur" => 0 ];
        }
    }
    public function inscription($identifiant, $email, $mdp, $idQuestionSecrete, $reponseSecrete){

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE identifiant = ?");
        $requete->execute([$identifiant]);
        $identifiantExiste = $requete->rowcount();

        $requete = $this->getBdd()->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $requete->execute([$email]);
        $emailExiste = $requete->rowcount();


        if($identifiantExiste != 1) {

            if($emailExiste != 1 ) {

                $requete = $this->getBdd()->prepare("INSERT INTO utilisateurs (identifiant, email, mdp, id_question_s, reponse_s) VALUES (?,?,?,?,?)");
                $requete->execute([$identifiant, $email, password_hash($mdp, PASSWORD_BCRYPT), $idQuestionSecrete, $reponseSecrete]);

                return ["succes" => true, "erreur" => ""];

            } else {
                return ["succes" => false, "erreur" => "email"];
            }

        } else {
            return ["succes" => false, "erreur" => "identifiant"]; 
        }

    }
}