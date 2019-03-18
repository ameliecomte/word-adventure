<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= 'Word Adventure' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
  <div class="container">
  <section class="section">
    
      <h1 class="title">
      -- WORD ADVENTURE -- 
      </h1>
      <p class="subtitle">
        text-based adventure <strong>in browser</strong>
      </p>
    </div>
  </section>

<div class="container">

<?php 

if (isset($character)) // Si on utilise un personnage (nouveau ou pas).
{
?>
<?= $playingGame ?>

<?php
}
else
{
?>
<?= $mainPage ?>
<?
}
?>
</div>
  </body>
</html>


