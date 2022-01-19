<?php

namespace piratthebest\guessNumber\View;

use function piratthebest\guessNumber\Controller\showGame;
use function piratthebest\guessNumber\Controller\setting;
use function piratthebest\guessNumber\Controller\greeting;

function startGame()
{
    setting();
    greeting();
    showGame();
}
function showList()
{
    echo "Вывод списка всех сохраненных игр из БД SQLite3\n";
}

function showReplay()
{
    echo " Повтор всех ходов игры с идентификатором id\n";
}
function showTop()
{
    echo " Вывод статистики по игрокам из БД SQLite3\n";
}
