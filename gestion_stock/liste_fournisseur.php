<?php
require_once "fournisseur.php";
# ecrire le code php et html qui permet d'avoir l'ensembles des fournisseurs sous forme d'un tableau comme sur le pdf
$fournisseurs = Fournisseur::listeFournisseur();

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
          <th>Societe</th>
          <th>Adresse</th>
          <th>Code Postale</th>
          <th>Ville</th>
          <th>Commentaire</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($fournisseurs as $f){ ?>
          <tr>
            <td><?php echo $f['id']; ?></td>
            <td><?php echo $f['nom']; ?></td>
            <td><?php echo $f['adresse']; ?></td>
            <td><?php echo $f['cp']; ?></td>
            <td><?php echo $f['ville']; ?></td>
            <td><?php echo $f['commentaire']; ?></td>
            <td>
              <button class="btn btn-warning"> <a href="modifier_fournisseur.php?id=<?php echo $f['id']; ?>">Modifier</a></button>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>