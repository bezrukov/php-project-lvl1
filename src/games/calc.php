<?php

namespace BrainGames\Cli\games\calc;

function getRandomNumber()
{
    return rand(1, 300);
}

function getRandomOperation()
{
    $operations = ['+', '-', '*'];

    return $operations[rand(0, 2)];
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
    $number1 = getRandomNumber();
    $number2 = getRandomNumber();
    $operation = getRandomOperation();
    $answer = makeAnswer($number1, $number2, $operation);

    return [
        "{$number1} {$operation} {$number2}",
        $answer,
    ];
}
