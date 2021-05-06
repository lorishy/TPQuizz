<?php require_once "Entete.php"?>



<div class="container mt-5">
      <?php if(isset($_GET["succes"]) && $_GET["succes"] == "reussite") {
            echo "<div class='alert alert-primary'>Votre quizz a bien été créé, il va être vérifié par un administrateur</div>";
            header("refresh:3;Index.php");}
      ?>
      <h1 class="mb-5">Liste des catégories de Quizz</h1>
      <div class="row">
<?php 
      $Categories = new Categorie();
      $ListeCategories = $Categories->getListeCategorie();

      foreach ($ListeCategories as $Categorie) {?>

            <div class="col-md-6">
                  <div class="card text-white bg-secondary mb-3">
                  <div class="card-header">Quizz</div>
                        <div class="card-body">
                              <h5 class="card-title"><?=$Categorie["nom"]?></h5>
                              <p class="card-text">Jouez à différents quizz sur le thème de <?=$Categorie["nom"]?>.</p>
                              <a href="ListeQuizz.php?id=<?=$Categorie["id_categorie"]?>" class="btn btn-danger">Voir les Quizz</a>
                        </div>
                  </div>
            </div>
<?php } ?>
      </div>
</div>
  

<?php require_once "Pied.php"; ?>