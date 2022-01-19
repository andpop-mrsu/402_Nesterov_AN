<?php

    $autoloadPathForGithub = __DIR__ . '/../vendor/autoload.php';
    $autoloadPathForPackagist = __DIR__ . '/../../../autoload.php';

if (file_exists($autoloadPathForGithub)) {
    require_once($autoloadPathForGithub);
} else {
    require_once($autoloadPathForPackagist);
}
    use function piratthebest\guessNumber\Controller\startGame;

    startGame();
