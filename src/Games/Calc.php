<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

const GOAL = 'What is the result of the expression?';

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

        line('%s%s %s %s', QUESTION_PHRASE, $firstOperand, $operation, $secondOperand);
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
