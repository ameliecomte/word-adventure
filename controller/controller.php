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

function createCharacter($name)
{
    //  new CharacterManager -> addCharactertoDb
    $characterManager = new CharactersManager();
    $character = $characterManager->addCharacter($name);
}

function deleteCharacter($characterId)
{
    //  new CharacterManager -> deleteCharacterfromDb
}

function loadGameplay($characterId)
{
    $characterManager = new CharactersManager();
    $storyManager = new StoryManager();

    $character = $characterManager->getCharacter($characterId);
    $story = $storyManager->getStory($characterId);

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
    session_destroy();
    header('Location: .');
    exit();
}
