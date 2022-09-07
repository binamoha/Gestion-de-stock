<?php
require_once "produit.php";
# ecrire le code php et html qui permet d'avoir l'ensembles de produits sous forme d'un tableau comme sur le pdf
# la liste des produits
$produits = Produit::listeProduit();

if(isset($_POST['delete'])){
  $id = $_POST['delete'];
  # appel de la methode qui permet de supprimer un produit selectionne
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
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Reference</th>
          <th>Nom</th>
          <th>Fournisseur</th>
          <th>Quantite</th>
          <th>Commentaire</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($produits as $p){ ?>
          <tr>
            <td><?php echo $p['id']; ?></td>
            <td><?php echo $p['reference']; ?></td>
            <td><?php echo $p['nom']; ?></td>
            <td><?php echo $p['fournisseur']; ?></td>
            <td><?php echo $p['quantite']; ?></td>
            <td><?php echo $p['commentaire']; ?></td>
            <td class="action">
              <button class="btn btn-warning"><a href="modifier_produit.php?id=<?php echo $p['id']; ?>">Modifier</a></button>
              <form method="post">
                <button class="btn btn-danger" name="delete" value="<?php echo $p['id']; ?>">Supprimer</button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>