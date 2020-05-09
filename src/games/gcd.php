<?php

namespace BrainGames\Cli\games\gcd;

function getRandomNumber()
{
    return rand(1, 50);
}

function gcd($a,$b) {
    return ($a % $b) ? gcd($b,$a % $b) : $b;
}

function validationAnswer($playerAnswer, $systemAnswer)
{
    return (int)$playerAnswer === (int)$systemAnswer;
}

function getInfo()
{
    return 'Find the greatest common divisor of given numbers.';
}

function makeQuiz()
{
    $firstOperand = getRandomNumber();
    $secondOperand = getRandomNumber();
    $answer = gcd($firstOperand, $secondOperand);

    return [
        "{$firstOperand} {$secondOperand}",
        $answer,
    ];
}

