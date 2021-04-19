<?php
class Categorie extends Modele {

    private $idCategorie;
    private $nomCategorie;

    public function __construct($idCat=null)
    {
        if($idCat!=null){
            $requete = $this->getBdd()->prepare("SELECT * FROM categories WHERE id_categorie=?");
            $requete->execute([$idCat]);
            $categorie = $requete->fetch(PDO::FETCH_ASSOC);
            $this->idCategorie = $idCat;
            $this->nomCategorie = $categorie["nom"];
        }
    }
    public function getNomCategorie() {
        return $this->nomCategorie;
    }
    public function getIdCategorie() {
        return $this->idCategorie;
    }
    public function setNomCategorie($newCategorie) {
        return $this->nomCategorie = $newCategorie;
    }
}