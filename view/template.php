<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
  
  <div class="container">
    <h1 class="title">
      -- WORD ADVENTURE -- 
    </h1>
    <h2 class="subtitle">
      A text-based adventure <strong>in browser</strong>
    </h2>
  </div>
  
  <div class="container">
    <?= $content ?>
  </div>
  
  </body>
</html>


