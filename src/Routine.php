<?php

namespace BrainGames\Routine;

use function cli\line;
use function cli\prompt;

const MAX_NUMBER_OF_QUESTIONS = 3;
const QUESTION_PHRASE = 'Question: ';
const ANSWER_PHRASE = 'Your answer';
const SUCCESS_GAME = 'Congratulations, ';
const SUCCESS_QUESTION = 'Correct!';
const FAIL_GAME = 'Let\'s try again, ';
const FAIL_QUESTION = ' is wrong answer ;(. Correct answer was ';

function gameRoutine(string $goal, callable $data)
{
    line('Welcome to the Brain Games!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);
    line($goal);

    for ($i = 1; $i <= MAX_NUMBER_OF_QUESTIONS; $i += 1) {
        [$gameQuestion, $correctAnswer] = $data();

        line('%s%s', QUESTION_PHRASE, $gameQuestion);
        $answer = strtolower(trim(prompt(ANSWER_PHRASE)));
        if ($answer != $correctAnswer) {
            line('\'%s\'%s\'%s\'.', $answer, FAIL_QUESTION, $correctAnswer);
            line('%s%s!', FAIL_GAME, $playerName);
            exit();
        }
        line(SUCCESS_QUESTION);
    }
    line('%s%s!', SUCCESS_GAME, $playerName);
    exit();
}
