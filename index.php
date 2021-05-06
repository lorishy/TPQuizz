<?php
if(!empty($_SESSION['idrole']) && $_SESSION['idrole'] == 2) {
    header("location:/Admin/IndexAdmin.php");
} else {
    header('location:/Membre/Index.php');
}
?>