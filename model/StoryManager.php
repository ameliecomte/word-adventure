<?php
require_once("model/DbManager.php");

class StoryManager extends DbManager
{
    public function getStory($characterId)
    {
        $db = $this->dbConnect();
        $texts = $db->prepare('(SELECT id, text FROM story WHERE character_id = ? ORDER BY id DESC LIMIT 10) ORDER BY id');
        $texts->execute(array($characterId));

        return $texts;
    }

    public function sendToStory($characterId, $text)
    {
        $db = $this->dbConnect();
        $command = $db->prepare('INSERT INTO story(character_id, text) VALUES(?, ?)');
        $affectedLines = $command->execute(array($characterId, $text));

        return $affectedLines;
    }
}