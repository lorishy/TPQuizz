<?php
require_once "Entete.php";
require_once "../Modeles/Formulaire.php";

$form = new Form($_POST);
?>


<div class="container">
    
    <h1>Inscription</h1>

    <form action="../Traitements/Inscription.php" method ="POST">
        <?php
        echo $form->inputPseudo("pseudo");
        echo $form->inputEmail("email");
        echo $form->inputMdp("mdp");
        echo $form->inputConfirmMdp("confirm_mdp");
        echo $form->submit("submit");
        ?>
    </form>
</div>