<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function run($info, $makeQuiz, $validationAnswer)
{
    line('Welcome to Brain Games!');
    line($info());
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $countCorrectAnswers = 3;
    $correctAnswers = 0;

    while ($correctAnswers < $countCorrectAnswers) {
        [$question, $answer] = $makeQuiz();
        line('Question: %s', $question);
        $playerAnswer = prompt('Your answer:');

        if ($validationAnswer($playerAnswer, $answer)) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line('"%s" is wrong answer ;(. Correct answer was "%s".', $playerAnswer, $answer);
            line('Let\'s try again, %s!', $name);
            $correctAnswers = 0;
        }
    }

    line('Congratulations, %s!', $name);
}
