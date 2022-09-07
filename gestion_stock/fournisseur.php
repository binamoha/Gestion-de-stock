<?php
# creer la classe fournisseur avec les attributs
class Fournisseur{ # debut classe 
  # les attributs 
  private $id;
  private $nom;
  private $adresse;
  private $cp;
  private $ville;
  private $commentaire;

  # le constructeur
  public function __construct($n, $a, $cp, $v, $com){
    $this->nom = $n;
    $this->adresse = $a;
    $this->cp = $cp;
    $this->ville = $v;
    $this->commentaire = $com;
  }

  # creer une methode static ajoutFournisseur() qui va prendre 5 parametres (societe, adresse, ville, code postale, commentaire) 
  public static function ajoutFournisseur($sc, $ad, $ville, $cp, $com){
    # connexion à la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour enregistrer
    $request = $connexion->prepare("INSERT INTO fournisseurs (nom, adresse, cp, ville, commentaire) VALUES (?, ?, ?, ?, ?)");
    # executer la requette
    $request->execute(array($sc, $ad, $ville, $cp, $com));
  }

  # creer une methode static listeFournisseur() qui va retourner l'ensemble des fournisseurs de la table fournisseurs
  public static function listeFournisseur(){
    # connexion a la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour recuperer l'ensembles des fournisseurs
    $request = $connexion->prepare("SELECT * FROM fournisseurs");
    $request->execute();
    $fournisseurs = $request->fetchAll();

    return $fournisseurs;
  }

  # creer une mathode qui prendre en parametre l'identifiant du formnisseur et retourner l'ensemble des ses informations
  public static function infoFournisseur($id){
    # connexion à la BD
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette permettant de recuperer les infos du fournisseur en question
    $request = $connexion->prepare("SELECT * FROM fournisseurs WHERE id = ?");
    $request->execute(array($id));
    $fournisseur = $request->fetch();

    #retrourener les infos du fournisseur
    return $fournisseur;
  }

  #pethode static pour modifier un produit elle prend comme parametre (id, societe, adresse, ville, code postale, commentaire)
  public static function modifierFournisseur($id, $sc, $ad, $ville, $cp, $com){
    # connexion à la base de donnees
    $connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
    # requette pour modifier le produit en question
    $request = $connexion->prepare("UPDATE fournisseurs SET nom = ?, adresse = ?, cp = ?, ville = ?, commentaire = ? WHERE id = ?");
    #execution de la requette
    $request->execute(array( $sc, $ad, $cp, $ville, $com, $id));
  }
} # fin classe