<?php namespace piratthebest\guessNumber\Controller;
    use function piratthebest\guessNumber\View\showGame;

    function startGame() {
        echo "Game started".PHP_EOL;
        showGame();
    }
?> 