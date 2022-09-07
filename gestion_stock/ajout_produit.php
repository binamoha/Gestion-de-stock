<?php
require_once "produit.php";
$connexion = new PDO('mysql:host=localhost;dbname=gestion_stock', 'admin', 'passer');
$request = $connexion->prepare("SELECT id, nom FROM fournisseurs");
$request->execute();
$fournisseurs = $request->fetchAll();
# ecrire le code PHP qui permet de recuperer la saisie de l'utilisateur
# verifier si l'utilisateur a bien rempli les champ (reference, nom, quantite, commentaire) avant d'enregistrer dans la base de donnees
if(isset($_POST['valider'])){
  $ref = $_POST['reference'];
  $nom = $_POST['nom'];
  $fournisseur = $_POST['fournisseur'];
  $qte = $_POST['qte'];
  $commentaire = $_POST['commentaire'];
  if($ref != "" && $nom != "" && $qte != "" && $commentaire != ""){
    Produit::ajoutProduit($ref, $nom, $fournisseur, $qte, $commentaire);
  }else{
    echo "veillez remplir tous les champs!";
  }
  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <div class="container">
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Reference</label>
        <input type="text" class="form-control" name="reference" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom">
      </div>
      <div class="mb-3">
        <div>
          <label for="exampleInputPassword1" class="form-label">Fournisseur</label>
        </div>
        <select name="fournisseur">
          <?php foreach($fournisseurs as $f){ ?>
            <option value="<?php echo $f['id'] ?>"><?php echo $f['nom'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Quantité</label>
        <input type="text" class="form-control" name="qte">
      </div>
      <div class="mb-3">
        <div>
          <label for="exampleInputPassword1" class="form-label">Commentaire</label>
        </div>
        <textarea name="commentaire" id="" cols="60" rows="7"></textarea>
      </div>
      
      <button name="valider" type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>
</body>
</html>