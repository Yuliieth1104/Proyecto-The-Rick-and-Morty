<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $_POST['url'],
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
$api = json_decode($response, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="detail.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>

<div class="topnav">
  <img src="https://1000marcas.net/wp-content/uploads/2022/04/Rick-and-Morty.png" alt="" width="140" height="80">
  <a href="codigo.php">Personajes</a>
  <a href="Rick_Morty.php">Capitulos</a>
  <a href="inicio">Inicio</a>
</div>

  <div class="contenedorr d-flex align-content-start flex-wrap">

    <div class="cardcita">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="https://i0.wp.com/revistadiners.com.co/wp-content/uploads/2018/09/rickmorty_1200x800.jpg?fit=1200%2C800&ssl=1" style="width: 26rem;">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?php echo $api['id'] ?></h5>
            <h5 class="card-title"><?php echo $api['name'] ?></h5>
            <p class="card-text"><small><?php echo $api['episode'] ?></small></p>
            <p class="card-text"><small><?php echo $api['air_date'] ?></small></p>
            <p class="card-text"><small><?php echo $api['created'] ?></small></p>
            <p class="card-text"><small><?php echo $api['url'] ?></small></p>
          </div>
        </div>
      </div>
    </div>
  



    <?php


    foreach ($api['characters'] as $key => $value) {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => $value,
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
      $api = json_decode($response, true);

    ?>

      <?php

      $image = $api['image'];
      $name = $api['name'];
      $status = $api['status'];
      $species = $api['species'];
      $gender = $api['gender'];

      ?>

      <div class="card">
        <div class="voltear">
          <div class="voltearI">
            <div class="frontal">
              <img src="<?php echo $image ?>" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title"><?php echo $name ?></h5>
              </div>
            </div>
            <div class="detras">
              <div class="caracteres">
                <h2><?php echo $name ?></h2>
                <p><?php echo $status ?></p>
                <p><?php echo $species ?></p>
                <p><?php echo $gender ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
  
    <?php
    }
    ?>


</body>

</html>