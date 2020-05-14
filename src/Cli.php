<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

define("COUNT_TRUE_ANSWER", 3);

function answerIteration($playRound, $count = 0)
{
    if (COUNT_TRUE_ANSWER === $count) {
        return true;
    }

    [$question, $answer] = $playRound();
    line('Question: %s', $question);
    $playerAnswer = prompt('Your answer');

    if ($playerAnswer === $answer) {
        line('Correct!');
        return answerIteration($playRound, $count + 1);
    }

    line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);

    return false;
}

function run($describe, $playRound)
{
    line('Welcome to Brain Games!');
    line($describe);
    $name = prompt('May I have your name', false, '? ');
    line("Hello, %s!", $name);

    $result = answerIteration($playRound, 0);

    if ($result) {
        line('Congratulations, %s!', $name);
    } else {
        line('Let\'s try again, %s!', $name);
    }
}
