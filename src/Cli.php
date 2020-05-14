<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const COUNT_TRUE_ANSWER = 3;

function answerIteration($getGameData, $count = 0)
{
    if (COUNT_TRUE_ANSWER === $count) {
        return true;
    }

    [$question, $answer] = $getGameData();
    line('Question: %s', $question);
    $playerAnswer = prompt('Your answer');

    if ($playerAnswer === $answer) {
        line('Correct!');
        return answerIteration($getGameData, $count + 1);
    }

    line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);

    return false;
}

function run($describe, $getGameData)
{
    line('Welcome to Brain Games!');
    line($describe);
    $name = prompt('May I have your name', false, '? ');
    line("Hello, %s!", $name);

    $result = answerIteration($getGameData, 0);

    if ($result) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}
