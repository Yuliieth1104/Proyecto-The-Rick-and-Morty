<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://rickandmortyapi.com/api/character',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);

$api = json_decode($response,true);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="Cod.css">
  <title>API RICK AND MORTY</title>
</head>
<body>
<table class="table table-striped table-dark table-hover table-bordered border-white">
  <thead>
  
  <div class="topnav">
  <img src="https://1000marcas.net/wp-content/uploads/2022/04/Rick-and-Morty.png" alt="" width="140" height="80">
  <a href="codigo.php">Personajes</a>
  <a href="Rick_Morty.php">Capitulos</a>
  <a href="inicio">Inicio</a>
  </div>

    <h1 class="titulo">PERSONAJES RICK AND MORTY</h1>
    <tr>
      <th scope="col">IMAGEN</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">GENERO</th>
      <th scope="col">ESPECIE</th>
      <th scope="col">FECHA DE CREACION</th>
      <th scope="col">URL</th>
    </tr>
  </thead>
  <tbody>

  <?php

foreach ($api['results'] as $key => $value) {
  $nombre = $value['name'];
  $especie = $value['species'];
  $genero = $value['gender'];
  $imagen = $value['image'];
  $creacion = $value['created'];
  $url = $value['url'];

?>

    <tr>
      <th scope="row"><img src="<?php echo $imagen ?>" width="200px"></th>
      <td><?php echo $nombre ?></td>
      <td><?php echo $especie ?></td>
      <td><?php echo $genero ?></td>
      <td><?php echo $creacion?></td>
      <td><?php echo $url?></td>
    </tr>
  <?php
  }
  ?>

  </tbody>
</table>
</body>
</html>