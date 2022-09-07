<?php
# creer la classe produit avec ses attributs
class Produit{ # debut classe
  # attributs
  private $id;
  private $reference;
  private $nom;
  private $quantite;
  private $commentaire;
  private $fournisseur;

  # constructeur de la classe
  public function __construct($r, $n, $qt, $com, $f){
    $this->reference = $r;
    $this->nom = $n;
    $this->quantite = $qt;
    $this->commentaire = $com;
    $this->fournisseur = $f;
  }

  # creer une methode static ajoutProduit() avec 5 parametres (reference, nom, fournisseur, quantite, commentaire)
  public static function ajoutProduit($ref, $nom, $f, $qte, $com){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette 
    $request = $connexion->prepare("INSERT INTO produits (reference, nom, quantite, commentaire, fournisseur) VALUES (?, ?, ?, ?, ?)");
    $request->execute(array($ref, $nom, $qte, $com, $f));
  }

  # creer une methode static listeProduit() qui va retourner lensemble des produits de la tables produits
  public static function listeProduit(){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour recuperer l'ensemble des produits
    $request = $connexion->prepare("SELECT * FROM produits");
    $request->execute();
    $produits = $request->fetchAll();
    # retourner le tableau contenant l'ensemble des produits
    return $produits;
  }

  # crer une methode infoProduit() qui comme parametre l'identifiant du produit est retourne les informations du produit en question
  public static function infoProduit($id){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour recuperer les infos du produit en question
    $request = $connexion->prepare("SELECT * FROM produits WHERE id = ?");
    $request->execute(array($id));
    $produit = $request->fetch();
    # rerouner le tableau contenant les infos du produit
    return $produit;
  }

  # methode pour modifier un produit elle sera static avec comme paramettre (reference, nom, fournisseur, quantite, commentaire)
  public static function modifierProduit($id, $ref, $nom, $f, $qte, $com){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette permettant de modifier le produit en question
    $request = $connexion->prepare("UPDATE produits SET reference = ?, nom = ?, quantite = ?, commentaire = ?, fournisseur = ? WHERE id = ?");
    # execution de la requette
    $request->execute(array($ref, $nom, $qte, $com, $f, $id));
  }

  # creer la methode qu permet de supprimer un produit selectionne
  public static function supprimerProduit($id){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour supprimer le produit en question
    $request->execute(array($id));
    #execution de la requette
    $request->execute(array($ref, $nom, $qte, $com, $f, $id));
  }
}# fin de la classe