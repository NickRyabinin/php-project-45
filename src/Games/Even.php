<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const GOAL = 'Answer "yes" if the number is even, otherwise answer "no".';
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
        $numberToGuess = rand(2, 222);
        $isEven = ($numberToGuess % 2 === 0) ? 'yes' : 'no';

        line('%s%s', QUESTION_PHRASE, $numberToGuess);
        $answer = strtolower(trim(prompt(ANSWER_PHRASE)));
        if ($answer !== $isEven) {
            line('\'%s\'%s\'%s\'.', $answer, FAIL_QUESTION, $isEven);
            line('%s%s!', FAIL_GAME, $name);
            exit();
        }
        line(SUCCESS_QUESTION);
    }
    line('%s%s!', SUCCESS_GAME, $name);
    exit;
}
