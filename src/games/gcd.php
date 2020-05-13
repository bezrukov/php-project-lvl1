<?php

namespace BrainGames\Cli\games\gcd;

use function BrainGames\Cli\run;

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}

function playRound()
{
    $firstOperand = rand(1, 50);
    $secondOperand = rand(1, 50);
    $answer = gcd($firstOperand, $secondOperand);

    return [
        "{$firstOperand} {$secondOperand}",
        $answer,
    ];
}

function game()
{
    $describeGame = 'Find the greatest common divisor of given numbers.';

    run(
        $describeGame,
        '\BrainGames\Cli\games\gcd\playRound',
        function ($playerAnswer, $systemAnswer) {
            return (int)$playerAnswer === (int)$systemAnswer;
        }
    );
}
