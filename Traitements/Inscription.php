<?php require_once "../Modeles/Modele.php";

if(isset($_POST["inscription"])) {

    $identifiant = $_POST["identifiant"];
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $mdpConfirm = $_POST["mdpConfirm"];
    $idQuestionSecrete = $_POST["questionSecrete"];
    $reponseSecrete = $_POST["reponseSecrete"];

    if(!empty($identifiant) && !empty($email) && !empty($mdp) && !empty($mdpConfirm) && !empty($idQuestionSecrete) && !empty($reponseSecrete)) {

        if(strlen($mdp) > 8) {

            if($mdp == $mdpConfirm) {

                $newUtilisateur = new Utilisateur();
                $retour = $newUtilisateur->inscription($identifiant, $email, $mdp, $idQuestionSecrete, $reponseSecrete);

                if($retour["succes"] != false) {
                    header("location:../Membre/Connexion.php?succes=inscrit");

                } else {
                    header("location:../Membre/Inscription.php?erreur=" . $retour['erreur']);
                }

            } else {
                header("location:../Membre/Inscription.php?erreur=Mdp");
            }
        } else {
            header("location:../Membre/Inscription.php?erreur=Mdp2");
        } 

    } else {
        header("location:../Membre/Inscription.php?erreur=Vide");
    }
    
} else {
    header("location:../Membre/Inscription.php?erreur=Envoi");
}
