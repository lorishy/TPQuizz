<?php require_once "../Modeles/Modele.php"; ?>
<?php
function getBdd(){
    return new PDO('mysql:host=localhost;dbname=tpquizz;charset=UTF8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

if(isset($_POST["envoie"])) {
    $a = $_POST["question"];
    $requete = getBdd()->prepare("INSERT INTO categories (nom) VALUES (?)");
    $requete->execute([$a]);
}

?>
<form method="POST">
    <input name="question">
    <button name="envoie" type="submit">inserer</button>
</form>

