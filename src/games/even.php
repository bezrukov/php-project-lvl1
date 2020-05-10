<?php

namespace BrainGames\Cli\games\even;

use function BrainGames\random\random;

function isEven(int $num)
{
    return $num % 2 === 0;
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
    $number = random(0, 300);
    $answer = isEven($number) ? 'yes' : 'no';

    return [
        $number, $answer,
    ];
}
