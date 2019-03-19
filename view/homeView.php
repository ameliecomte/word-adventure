<?php $title = 'Word Adventure'; ?>

<?php ob_start(); ?>

<div class = "container">
  <button id="createCharacter" class="button" type="buttton">Create a character</button>
  <p class="show">
    <input id="nameForm" class="input" type="text" name="name" maxlength="30" />
  </p>
</div>

<script>
$('#nameForm').hide();
$('#createCharacter').click(function() {
  $('#nameForm').show();
  $('#createCharacter').hide();
})
</script>


<?php 
while ($data = $characters->fetch())
{
?>

  <div class="box">
    <h3>
      <strong><?= htmlspecialchars($data['name']) ?></strong>
      LVL: <?= $data['level'] ?> HP: <?= $data['health'] ?>
    </h3>
        
    <p>
      <input class="button" type="submit" value="play" name="play" />
      <input class="button" type="submit" value="delete" name="delete" />
    </p>
  </div>

<?php
}
$characters->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>