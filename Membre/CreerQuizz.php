<?php require_once "Entete.php"?>

<div class="container">
    <h1 class="text-center">Créer un Quizz</h1>
    <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "Envoi") {
            echo "<div class='alert alert-danger mt-3 mb'>Erreur lors de la création du quizz !</div>";}

        else if(isset($_GET["erreur"]) && $_GET["erreur"] == "Vide") {
            echo "<div class='alert alert-danger mt-3 mb-3'>Tous les champs doivent être complété !</div>";}
    ?>
    <form method="POST" action="../Traitements/InsertionQuizz.php">
        <h3 class="mb-3">Titre</h3>
        <input type="text" class="form-control mb-3" id="titre" placeholder="Saisissez le titre du quizz" name="titre">
        <h3 class="mb-3">Catégorie</h3>
            <select class="form-select" aria-label="Default select example" name="categorie">
                <option selected>Choisissez une catégorie</option>
                <?php 
                $Categorie = new Categorie(); 
                $listeCategorie = $Categorie->getListeCategorie();
                foreach ($listeCategorie as $categorie) { ?>
                    <option value="<?=$categorie["id_categorie"];?>"><?=$categorie["nom"];?></option>
                <?php } ?>
            </select>
        
        <?php
    for ($i=1; $i <=10; $i++) { ?>
        <h3 class="mt-5 mb-2">Question <?=$i?></h3>

        <input type="text" class="form-control mb-3" placeholder= "Saisissez la question <?=$i?> du quizz" name="question[<?=$i?>]">
        <h3 class="mb-2">Réponses</h3> 

        <input type="text" class="form-control mb-3" placeholder=" Saisissez la bonne réponse" name="reponse[<?=$i?>][1]">
        <input type="text" class="form-control mb-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][2]">
        <input type="text" class="form-control mb-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][3]">
        <input type="text" class="form-control mb-3" placeholder=" Saisissez une réponse " name="reponse[<?=$i?>][4]">
        
        <?php
        }
        ?>
        <div class="text-center mb-3">
            <input class="btn btn-primary" type="submit" name="envoyer" value="Envoyer">
        </div>
    </form>
</div>