<?php

namespace BrainGames\Cli\games\gcd;

use function BrainGames\Cli\run;
use function BrainGames\random\random;

function getRandomNumber()
{
    return random(1, 50);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function playRound()
{
    $firstOperand = getRandomNumber();
    $secondOperand = getRandomNumber();
    $answer = gcd($firstOperand, $secondOperand);

    return [
        "{$firstOperand} {$secondOperand}",
        $answer,
    ];
}

function game()
{
    run(
        'Find the greatest common divisor of given numbers.',
        '\BrainGames\Cli\games\gcd\playRound',
        function ($playerAnswer, $systemAnswer) {
            return (int)$playerAnswer === (int)$systemAnswer;
        }
    );
}
