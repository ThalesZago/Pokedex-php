<?php
$url = "https://www.canalti.com.br/api/pokemons.json";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$pokemons = json_decode(curl_exec($ch));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="css/style-main.css">
  <link rel="icon" href="https://img.icons8.com/officexs/480/pokedex.png">

  <title>Online Pokedex - PHP</title>
</head>

<body class="background">
  <div class="container">
    <div class="nav">
      <img src="https://img.icons8.com/officexs/480/pokedex.png" width="60px" height="60px" alt="">
      <div class="navText">
        <h1> Welcome to Online Pokedex
        </h1>
      </div>
      <div class="navLinks">
        <ul style="display: flex; flex-direction: row; padding-left: 10px; padding-right: 10px;">
          <li>
            <a href="index.php">
              Home
            </a>
          </li>
          <li>
            <a href="about.html">
              About
            </a>
          </li>
        </ul>
      </div>
    </div>
    <?php
    if (count($pokemons->pokemon)) {
      $i = 0;
      foreach ($pokemons->pokemon as $objPokemon) {
        $i++;
    ?>
        <?php if ($i % 3 == 1) { ?>
          <div class="cards-pokemons">
          <?php  } ?>
          <figure class="figure">
            <img src="<?= $objPokemon->img ?>" class="img-fluid" alt="...">
            <figcaption class="span-pokemon-name"> <?= $objPokemon->name ?></figcaption>
            <?php
            $teste = (is_array($objPokemon->next_evolution) ? count($objPokemon->next_evolution) : 0);
            if ($teste) { ?>
              <span class="span-evolutions"> Next evolution:

                <?php
                foreach ($objPokemon->next_evolution as $ProximaEvolucao) {
                  echo $ProximaEvolucao->name . " ";
                } ?>
              </span>
            <?php
            } else { ?>

              <span class="span-dont-evolution"> Doesn't have evolution</span>
            <?php
            }
            ?>
          </figure>
          <?php if ($i % 3 == 0) { ?>

          </div>
      <?php }
        }
      } else { ?>
      <strong> None Pokemons returned.</strong>
    <?php } ?>

  </div>

</body>

</html>