<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

const GOAL = 'Find the greatest common divisor of given numbers.';

const MAX_NUMBER_OF_QUESTIONS = 3;
const QUESTION_PHRASE = 'Question: ';
const ANSWER_PHRASE = 'Your answer';
const SUCCESS_GAME = 'Congratulations, ';
const SUCCESS_QUESTION = 'Correct!';
const FAIL_GAME = 'Let\'s try again, ';
const FAIL_QUESTION = ' is wrong answer ;(. Correct answer was ';

function game($name)
{
    line(GOAL);

    for ($i = 1; $i <= MAX_NUMBER_OF_QUESTIONS; $i += 1) {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);

        line('%s%s %s', QUESTION_PHRASE, $num1, $num2);

        while ($num1 > 0 && $num2 > 0) {
            if ($num1 >= $num2) {
                $num1 = $num1 % $num2;
            } else {
                $num2 = $num2 % $num1;
            }
        }
        $numberToGuess = max($num1, $num2);

        $answer = strtolower(trim(prompt(ANSWER_PHRASE)));
        if ($answer != $numberToGuess) {
            line('\'%s\'%s\'%s\'.', $answer, FAIL_QUESTION, $numberToGuess);
            line('%s%s!', FAIL_GAME, $name);
            exit();
        }
        line(SUCCESS_QUESTION);
    }
    line('%s%s!', SUCCESS_GAME, $name);
    exit;
}
