<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Routine\gameRoutine;

const GOAL = 'Find the greatest common divisor of given numbers.';

function game()
{
    $gameRandomizer = function () {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $questionString = "{$num1} {$num2}";

        while ($num1 > 0 && $num2 > 0) {
            if ($num1 >= $num2) {
                $num1 = $num1 % $num2;
            } else {
                $num2 = $num2 % $num1;
            }
        }
        $numberToGuess = max($num1, $num2);

        return [$questionString, $numberToGuess];
    };

    gameRoutine(GOAL, $gameRandomizer);
}
