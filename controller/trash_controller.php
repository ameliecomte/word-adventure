<?php




function loadClass($classname)
{
  require $classname.'.php';
}

spl_autoload_register('loadClass');




// should be elseif

if (isset($_POST['hit'])) // Si on a cliqué sur un personnage pour le frapper.
{
  if (!isset($character))
  {
    $message = 'Create a character or log in.';
  }
  
  else
  {
    if (!$manager->exists((int) $_POST['hit']))
    {
      $message = 'Le personnage que vous voulez frapper n\'existe pas !';
    }
    
    else
    {
      $toHit = $manager->get((int) $_POST['hit']);
      
      $return = $character->hit($toHit); // On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
      
      switch ($return)
      {
        case Character::CEST_MOI :
          $message = 'Mais... pourquoi voulez-vous vous frapper ???';
          break;
        
        case Character::PERSONNAGE_FRAPPE :
          $message = 'Le personnage a bien été frappé !';
          
          $manager->update($character);
          $manager->update($toHit);
          
          break;
        
        case Character::PERSONNAGE_TUE :
          $message = 'Vous avez tué ce personnage !';
          
          $manager->update($character);
          $manager->delete($toHit);
          
          break;
      }
    }
  }
}

