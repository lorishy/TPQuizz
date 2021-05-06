<?php require_once "Entete.php";
        
        $Quizz = new Quizz();
        $ListeQuizz = $Quizz->getListeQuizz();

        $Categorie = new Categorie();
        $CategorieQuizz = $Categorie->getCategorieDuQuizz();
?>

<div class="container mt-5">
    <h1 class="mb-5">Liste des quizz de la catégorie <span class="text-warning"><?=$CategorieQuizz["nom"]?></span></h1>
        <div class="row">
        <?php

            foreach ($ListeQuizz as $Quizz) {?>

                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">Jouez au quizz !</div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$Quizz["titre"]?></h5>
                                <a href="Quizz.php?id=<?=$Quizz["id_quizz"]?>" class="btn btn-warning">JOUER !</a>
                            </div>
                    </div>
                </div>
            <?php } ?>
        </div>

</div>