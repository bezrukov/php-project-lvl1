<?php

namespace BrainGames\Cli\games\calc;

use function BrainGames\Cli\run;

function getRandomOperation($operationCount)
{
    $operations = ['+', '-', '*'];

    return $operations[rand(0, $operationCount - 1)];
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
    $firstOperand = rand(1, 300);
    $secondOperand = rand(1, 300);
    $operation = getRandomOperation(3);
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
