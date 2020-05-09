<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

define("COUNT_TRUE_ANSWER", 3);

function answerIteration($makeQuiz, $validationAnswer, $name, $count = 0)
{
    if (COUNT_TRUE_ANSWER === $count) {
        return true;
    }

    [$question, $answer] = $makeQuiz();
    line('Question: %s', $question);
    $playerAnswer = prompt('Your answer:');

    if ($validationAnswer($playerAnswer, $answer)) {
        line('Correct!');
        return answerIteration($makeQuiz, $validationAnswer, $name, $count + 1);
    }

    line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);
    line('Let\'s try again, %s!', $name);

    return answerIteration($makeQuiz, $validationAnswer, $name, 0);
}

function run($info, $makeQuiz, $validationAnswer)
{
    line('Welcome to Brain Games!');
    line($info());
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    answerIteration($makeQuiz, $validationAnswer, $name, 0);

    line('Congratulations, %s!', $name);
}
