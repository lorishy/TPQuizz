<?php
require_once "Entete.php";
require_once "../Modeles/Formulaire.php";

$form = new Form($_GET);
?>


<div class="container">
    <h1>Connexion</h1>
    <form action="../Traitements/Connexion.php" method ="GET">
        <?php
        echo $form->inputEmail("email");
        echo $form->inputMdp("mdp");
        echo $form->submit("submit");
        ?>
    </form>
</div>
