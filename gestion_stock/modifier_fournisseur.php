<?php
require_once "fournisseur.php";
$fournisseur = Fournisseur::infoFournisseur($_GET['id']);
if(isset($_POST['valider'])){
  $societe = $_POST['societe'];
  $adresse = $_POST['adresse'];
  $cp = $_POST['cp'];
  $ville = $_POST['ville'];
  $commentaire = $_POST['commentaire'];

  if($societe != "" && $adresse != "" && $cp != "" && $ville != "" && $commentaire != ""){
    # appel de methode permettant de valider les modification en BD
    Fournisseur::modifierFournisseur($_GET['id'], $societe, $adresse, $ville, $cp, $commentaire);
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
        <label for="exampleInputEmail1" class="form-label">Societé</label>
        <input type="text" class="form-control" name="societe" value="<?php echo $fournisseur['nom']?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Adresse</label>
        <input type="text" class="form-control" name="adresse" value="<?php echo $fournisseur['adresse']?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Code postale</label>
        <input type="text" class="form-control" name="cp" value="<?php echo $fournisseur['cp']?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Ville</label>
        <input type="text" class="form-control" name="ville" value="<?php echo $fournisseur['ville']?>">
      </div>
      <div class="mb-3">
        <div>
          <label for="exampleInputPassword1" class="form-label">Commentaire</label>
        </div>
        <textarea name="commentaire" id="" cols="60" rows="7"><?php echo $fournisseur['commentaire']?></textarea>
      </div>
      
      <button name="valider" type="submit" class="btn btn-primary">Valider</button>
    </form>
  </div>
</body>
</html>