<?php

namespace BrainGames\Cli\games\calc;

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

function validationAnswer($playerAnswer, $systemAnswer)
{
    return (int)$playerAnswer === (int) $systemAnswer;
}

function getInfo()
{
    return 'What is the result of the expression?';
}

function makeQuiz()
{
    $number1 = random(1, 300);
    $number2 = random(1, 300);
    $operation = getRandomOperation();
    $answer = makeAnswer($number1, $number2, $operation);

    return [
        "{$number1} {$operation} {$number2}",
        $answer,
    ];
}
