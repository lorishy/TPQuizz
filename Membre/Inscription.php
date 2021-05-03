<?php require_once "Entete.php";
      require_once "../Modeles/Modele.php"?>


<div class="container">
    
    <h1>Inscription</h1>

    <form class="mt-4" action="../Traitements/Inscription.php" method ="POST">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Saisissez un identifiant" name="identifiant">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="Saisissez une adresse E-mail" name="email">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Saisissez un mot de passe" name="mdp">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Confirmez votre mot de passe" name="mdpConfirm">
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="questionSecrete">
                <option selected>Choisissez une question secrète</option>
                <?php 
                $Question = new Question_Secrete(); 
                $listeQuestions = $Question->getListe();

                foreach ($listeQuestions as $question) { ?>
                    <option value="<?=$question["id_question_s"];?>"><?=$question["question_s"];?></option>
                <?php } ?>
            </select>        
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Saisissez une réponse" name="reponseSecrete">
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="inscription">S'inscrire</button>
        </div>
    </form>
    <div class="mt-4">
        <?php
            if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi") {
                echo "<div class='text-danger'>Erreur lors de l'envoie du formulaire !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Vide") {
                echo "<div class='text-danger'>Tous les champs doivent être complétés !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Mdp") {
                echo "<div class='text-danger'>Les mots de passe ne correspondent pas !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Mdp2") {
                echo "<div class='text-danger'>Le mot de passe doit contenir au moins 8 caractère !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "identifiant") {
                echo "<div class='text-danger'>Cet identifiant existe déjà !</div>";}

            else if(isset($_GET["erreur"]) && $_GET["erreur"] == "email") {
                echo "<div class='text-danger'>Cette adresse E-mail est déjà utilisée !</div>";}
        ?>
    </div>
</div>