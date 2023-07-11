<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Routine\gameRoutine;

const GOAL = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function game()
{
    $primeNumbers = [];
    $flag = true;

    for ($i = 2; $i < 100; $i++) {
        for ($j = 2, $flag = true; $j < $i; $j++) {
            if (($i % $j) === 0) {
                $flag = false;
                break;
            }
        }
        if ($flag === true) {
            $primeNumbers[] = $i;
        }
    }

    $gameRandomizer = function () use ($primeNumbers) {
        $numberToGuess = rand(2, 99);
        $isPrime = (in_array($numberToGuess, $primeNumbers, false)) ? 'yes' : 'no';
        return [$numberToGuess, $isPrime];
    };

    gameRoutine(GOAL, $gameRandomizer);
}
