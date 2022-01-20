<?php

namespace piratthebest\guessNumber\Controller;

use function piratthebest\guessNumber\Model\setting;
use function piratthebest\guessNumber\View\MenuGame;
use function piratthebest\guessNumber\DataBase\openDatabase;

function startGame()
{
    setting();
    openDatabase();
    MenuGame();
}
