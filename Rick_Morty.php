<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://rickandmortyapi.com/api/episode',
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="stilos.css">
    <title>RICK AND MORTY</title>
</head>

<body>

<div class="topnav">
  <img src="https://1000marcas.net/wp-content/uploads/2022/04/Rick-and-Morty.png" alt="" width="140" height="80">
  <a href="codigo.php">Personajes</a>
  <a href="Rick_Morty.php">Capitulos</a>
  <a href="inicio">Inicio</a>
</div>

    <h1 class="titulito">ALL EPISODES RICKY AND MORTY</h1>

    <div class="contenedor d-flex align-content-start flex-wrap">

        <?php

        foreach ($api['results'] as $key => $value) {
            $id = $value['id'];
            $nombre = $value['name'];
            $lanzamiento = $value['air_date'];
            $episodio = $value['episode'];
            $caracteres = $value['characters'];
            $creacion = $value['created'];
            $url =  $value['url'];

        ?>
            <form action="./detalle.php" method="post">
                <div class="card" style="width: 18rem;">

                    <h5 class="card-title"><?php echo $id ?></h5>

                    <img src="https://cdn.bhdw.net/im/fondo-de-pantalla-de-la-dimension-de-dios-de-rick-y-morty-papel-pintado-57412_w635.jpg" width="288px" height="250px">
                    <div class="card-body">

                        <h5 class="card-titlle"><?php echo $nombre ?></h5>
                        <br />
                        <p class="card-text"><?php echo $episodio ?></p>

                        <p class="card-text"><?php echo $lanzamiento ?></p>

                        <p class="card-text"><?php echo $creacion ?></p>

                        <input  style="display: none;" name="url" value="<?php echo $url ?>">

                        <button class="btn btn-primary">DETALLE</button>

                    </div>
                </div>
            </form>
<?php
        }
?>


</div>

</body>


</html>