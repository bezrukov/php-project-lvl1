<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

define("COUNT_TRUE_ANSWER", 3);

function answerIteration($playRound, $name, $count = 0)
{
    if (COUNT_TRUE_ANSWER === $count) {
        return true;
    }

    [$question, $answer] = $playRound();
    line('Question: %s', $question);
    $playerAnswer = prompt('Your answer');

    if ($playerAnswer === $answer) {
        line('Correct!');
        return answerIteration($playRound, $name, $count + 1);
    }

    line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);
    line('Let\'s try again, %s!', $name);

    return answerIteration($playRound, $name, 0);
}

function run($describe, $playRound)
{
    line('Welcome to Brain Games!');
    line($describe);
    $name = prompt('May I have your name', false, '? ');
    line("Hello, %s!", $name);

    answerIteration($playRound, $name, 0);

    line('Congratulations, %s!', $name);
}
