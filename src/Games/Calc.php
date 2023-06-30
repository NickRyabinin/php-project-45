<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Routine\gameRoutine;

const GOAL = 'What is the result of the expression?';

function game()
{
    $gameRandomizer = function () {
        $firstOperand = rand(1, 30);
        $secondOperand = rand(1, 30);
        $operation = match (rand(1, 3)) {
            1 => '+',
            2 => '-',
            3 => '*',
        };
        $numberToGuess = match ($operation) {
            '+' => $firstOperand + $secondOperand,
            '-' => $firstOperand - $secondOperand,
            '*' => $firstOperand * $secondOperand,
        };
        $expression = implode(' ', [$firstOperand, $operation, $secondOperand]);

        return [$expression, $numberToGuess];
    };

    gameRoutine(GOAL, $gameRandomizer);
}
