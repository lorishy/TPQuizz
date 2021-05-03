<?php
session_start();

class Modele {
    
    protected function getBdd(){
        return new PDO('mysql:host=localhost;dbname=tpquizz;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
}

require_once "../Modeles/Categorie.php";
require_once "../Modeles/Question_Secrete.php";
require_once "../Modeles/Question.php";
require_once "../Modeles/Quizz.php";
require_once "../Modeles/Reponse.php";
require_once "../Modeles/Utilisateur.php";