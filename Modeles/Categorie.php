<?php
class Categorie extends Modele {

    private $idCategorie;
    private $nomCategorie;

    public function __construct($idCat = null)
    {
        if($idCat != null) {
            
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
    public function setNomCategorie($newNomCategorie) {
        return $this->nomCategorie = $newNomCategorie;
    }
    public function setIdCategorie($newIdCategorie) {
        return $this->idCategorie = $newIdCategorie;
    }
    public function getListeCategorie() {
        $requete = $this->getBdd()->prepare("SELECT * FROM categories");
        $requete->execute();
        $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    }
}