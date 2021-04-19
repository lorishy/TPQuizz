<?php
if(!empty($_SESSION['idrole']) && $_SESSION['idrole'] == 2) {
    header("location:/CoursPHP/TPQuizz/Admin/IndexAdmin.php");
} else {
    header('location:/CoursPHP/TPQuizz/Membre/Index.php');
}
?>