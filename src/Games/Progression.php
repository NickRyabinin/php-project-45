<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

const GOAL = 'What number is missing in this progression?';
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
        line('%s%s', QUESTION_PHRASE, $questionString);
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
