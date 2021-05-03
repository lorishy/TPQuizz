<?php require_once "../Modeles/Modele.php";

if (isset($_POST["connexion"])) {

    $identifiant = $_POST["identifiant"];
    $mdp = $_POST["mdp"];

    if(!empty($identifiant) && !empty($mdp)) {

        $Utilisateur = new Utilisateur();
        $retour = $Utilisateur->connexion($identifiant, $mdp);

        if($retour["succes"] != false) {

            $Utilisateur = new Utilisateur($retour["idUtilisateur"]);

            $_SESSION["id_utilisateur"] = $Utilisateur->getIdUtilisateur();
            $_SESSION["idrole"] = $Utilisateur->getIdRole();
            $_SESSION["identifiant"] = $Utilisateur->getIdentifiant();
            $_SESSION["email"] = $Utilisateur->getEmail();
            $_SESSION["mdp"] = $Utilisateur->getMdp();
            header("location:../index.php");

        } else {
            header("location:../Membre/Connexion.php?erreur=" . $retour['erreur']);
        }

    } else {
        header("location:../Membre/Connexion.php?erreur=vide");
    }
}