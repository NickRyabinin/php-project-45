<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Routine\gameRoutine;

const GOAL = 'What number is missing in this progression?';

function game()
{
    $gameRandomizer = function () {
        $progression = [];
        $commonDifference = rand(1, 20);
        $progression[0] = rand(1, 20);
        $pointer = rand(0, 7);

        for ($j = 1; $j <= 7; $j += 1) {
            $progression[$j] = $progression[0] + $commonDifference * $j;
        }

        $numberToGuess = $progression[$pointer];
        $progression[$pointer] = '..';
        $questionString = implode(' ', $progression);

        return [$questionString, $numberToGuess];
    };

    gameRoutine(GOAL, $gameRandomizer);
}
