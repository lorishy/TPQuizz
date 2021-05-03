<?php require_once "Entete.php";
      require_once "../Modeles/Modele.php" ?>


<div class="container">
<?php if(isset($_GET["succes"]) && $_GET["succes"] == "inscrit"){
            echo "<br><p class='text-succes'>Vous avez été inscrit avec succès, Connectez-vous !</p><br>";
        }?>
    <h1>Connexion</h1>
    <form class="mt-4" action="../Traitements/Connexion.php" method ="POST">
        <div class="mb-3">
            <input type="text" class="form-control" placeholder="Saisissez votre identifiant" name="identifiant">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="Saisissez votre mot de passe" name="mdp">
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="connexion">Se connecter</button>
        </div>
    </form>
        <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "vide"){
            echo "<br><p class='text-danger'>Tous les champs doivent être complétés !</p>";
        }?>
        <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "motdepasse"){
            echo "<br><p class='text-danger'>Mauvais mot de passe !</p>";
        }?>
        <?php if(isset($_GET["erreur"]) && $_GET["erreur"] == "identifiant"){
            echo "<br><p class='text-danger'>Cet identifiant n'existe pas !</p>";
        }?>
</div>
