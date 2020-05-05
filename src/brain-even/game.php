<?php

namespace BrainGames\Cli\brainEven;

use function cli\line;
use function cli\prompt;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function random(): int
{
    return rand(1, 300);
}

function makeQuestion($name)
{

    $number = random();
    line('Question: %s', $number);
    $answer = prompt('Your answer:');

    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    $result = $answer === $correctAnswer;

    if (!$result) {
        line('"%s" is wrong answer ;(. Correct answer was "%s".', $answer, $correctAnswer);
        line('Let\'s try again, %s!', $name);
    } else {
        line('Correct!');
    }

    return $result;
}

function run()
{
    $countCorrectAnswers = 3;

    line('Welcome to Brain Games!');
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $correctAnswers = 0;

    while ($correctAnswers < $countCorrectAnswers) {
        $result = makeQuestion($name);
        if ($result) {
            $correctAnswers++;
        } else {
            $correctAnswers = 0;
        }
    }

    line('Congratulations, %s!', $name);
}
