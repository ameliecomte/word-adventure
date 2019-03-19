<?php
// -- loading autoload

// loading classes
require_once('model/CharactersManager.php');
require_once('model/StoryManager.php');

function listCharacters()
{
    $charactersManager = new CharactersManager();
    $characters = $charactersManager->getCharacters();

    require('view/homeView.php');
}

function createCharacter()
{
    //  new CharacterManager -> addCharactertoDb
}

function deleteCharacter()
{
    //  new CharacterManager -> deleteCharacterfromDb
}

function loadGameplay()
{
    $characterManager = new CharactersManager();
    $storyManager = new StoryManager();

    $character = $characterManager->getCharacter($_GET['id']);
    $story = $storyManager->getStory($_GET['id']);

    require('view/gameplayView.php');
}

function addText($characterId, $text)
{
    $storyManager = new StoryManager();

    $affectedLines = $storyManager->sendToStory($characterId, $text);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le text !');
    }
    else {
        header('Location: index.php?action=post&id=' . $characterId);
    }
}

function logOut()
{

}
