<?php

namespace BrainGames\Games\Even;

use function BrainGames\Routine\gameRoutine;

const GOAL = 'Answer "yes" if the number is even, otherwise answer "no".';

function game()
{
    $gameRandomizer = function () {
        $numberToGuess = rand(2, 222);
        $isEven = ($numberToGuess % 2 === 0) ? 'yes' : 'no';
        return [$numberToGuess, $isEven];
    };

    gameRoutine(GOAL, $gameRandomizer);
}
