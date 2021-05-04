<?php require_once "../Modeles/Modele.php";

if(isset($_POST["envoyer"])) {

    $titre = $_POST["titre"];
    $categorie = $_POST["categorie"];
    $questions = $_POST["question"];
    $reponses = $_POST["reponse"];
    $utilisateur = $_SESSION["id_utilisateur"];
    $erreur = 0;


    if(!empty($titre) && !empty($categorie) && !empty($questions) && !empty($reponses)) {
        
        foreach($questions as $cleQuestion => $question) {
            
            if(empty($question)) {
                $erreur++;
            }
            foreach($reponses[$cleQuestion] as $reponse){
                if(empty($reponse)) {
                    $erreur++;
                }
            }   
        }
            if($erreur == 0) {

                $insertQuizz = new Quizz();
                $idQuizz = $insertQuizz->insertQuizz($titre, $categorie, $utilisateur);

                    foreach($questions as $cleQuestion => $question) {
                        $insertQuestion = new Question();
                        $idQuestion = $insertQuestion->insertQuestions($question, $idQuizz);

                        foreach($reponses[$cleQuestion] as $cleReponse => $reponse) {

                            if($cleReponse == 1) {
                                $statut = 1;
                            } else {
                                $statut = 0;
                            }
                            $insertReponse = new Reponse();
                            $insertReponse->insertReponse($reponse, $idQuestion, $statut);
                        } 

                    } header("location:../Membre/Index.php?succes=reussite");

            } else {
                header("location:../Membre/CreerQuizz.php?erreur=Vide2");
            }

    } else {
        header("location:../Membre/CreerQuizz.php?erreur=Vide");
    }    

} else {
    header("location:../Membre/CreerQuizz.php?erreur=Envoi");
}