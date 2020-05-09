<?php

namespace BrainGames\Cli\games\even;

function isEven(int $num)
{
    return $num % 2 === 0;
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
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function makeQuiz()
{
    $number = random();
    $answer = isEven($number) ? 'yes' : 'no';

    return [
        $number, $answer,
    ];
}
