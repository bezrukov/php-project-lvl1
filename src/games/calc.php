<?php

namespace BrainGames\Cli\games\calc;

use function BrainGames\Cli\run;
use function BrainGames\random\random;

function getRandomOperation()
{
    $operations = ['+', '-', '*'];

    return $operations[random(0, 2)];
}

function makeAnswer($firstOperand, $secondOperand, $operation)
{
    switch ($operation) {
        case '+':
            return $firstOperand + $secondOperand;
        case '-':
            return $firstOperand - $secondOperand;
        case '*':
            return $firstOperand * $secondOperand;
        default:
            return null;
    }
}

function playRound()
{
    $firstOperand = random(1, 300);
    $secondOperand = random(1, 300);
    $operation = getRandomOperation();
    $answer = makeAnswer($firstOperand, $secondOperand, $operation);

    return [
        "{$firstOperand} {$operation} {$secondOperand}",
        $answer,
    ];
}

function game()
{
    run(
        'What is the result of the expression?',
        '\BrainGames\Cli\games\calc\playRound',
        function ($playerAnswer, $systemAnswer) {
            return (int)$playerAnswer === (int) $systemAnswer;
        }
    );
}
