<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

const GOAL = 'Answer "yes" if given number is prime. Otherwise answer "no".';
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

    $primeNumbers = [];

    for ($i = 2; $i < 100; $i++) {
        for ($j = 2, $flag = true; $j < $i; $j++) {
            if (($i % $j) === 0) {
                $flag = false;
                break;
            }
        }
        if ($flag) {
            $primeNumbers[] = $i;
        }
    }

    for ($i = 1; $i <= MAX_NUMBER_OF_QUESTIONS; $i += 1) {
        $numberToGuess = rand(2, 99);
        $isPrime = (in_array($numberToGuess, $primeNumbers)) ? 'yes' : 'no';
        line('%s%s', QUESTION_PHRASE, $numberToGuess);
        $answer = strtolower(trim(prompt(ANSWER_PHRASE)));
        if ($answer !== $isPrime) {
            line('\'%s\'%s\'%s\'.', $answer, FAIL_QUESTION, $isPrime);
            line('%s%s!', FAIL_GAME, $name);
            exit();
        }
        line(SUCCESS_QUESTION);
    }
    line('%s%s!', SUCCESS_GAME, $name);
    exit;
}
