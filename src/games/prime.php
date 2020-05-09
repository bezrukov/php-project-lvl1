<?php

namespace BrainGames\Cli\games\prime;

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

function validationAnswer($playerAnswer, $systemAnswer)
{
    return $playerAnswer === $systemAnswer;
}

function getInfo()
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function makeQuiz()
{
    $number = random();
    $answer = isPrime($number) ? 'yes' : 'no';

    return [
        $number, $answer,
    ];
}
