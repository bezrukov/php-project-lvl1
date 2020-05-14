<?php

namespace BrainGames\Cli\games\calc;

use function BrainGames\Cli\run;

function getRandomOperation()
{
    $operations = ['+', '-', '*'];

    return $operations[array_rand($operations)];
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

function getGameData()
{
    $firstOperand = rand(1, 300);
    $secondOperand = rand(1, 300);
    $operation = getRandomOperation();
    $question = "{$firstOperand} {$operation} {$secondOperand}";
    $answer = (string) makeAnswer($firstOperand, $secondOperand, $operation);

    return [
        $question,
        $answer,
    ];
}

function game()
{
    $describeGame = 'What is the result of the expression?';

    run(
        $describeGame,
        function () {
            return getGameData();
        }
    );
}
