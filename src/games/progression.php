<?php

namespace BrainGames\Cli\games\progression;

use function BrainGames\random\random;

function validationAnswer($playerAnswer, $systemAnswer)
{
    return (int)$playerAnswer === (int)$systemAnswer;
}

function getProgression()
{
    $progression = array_fill(0, 10, 0);
    $progression[0] = random(1, 20);
    $d = random(1, 10);

    foreach ($progression as $key => $item) {
        if ($key === 0) {
            continue;
        }

        $progression[$key] = $progression[$key - 1] + $d;
    }

    return $progression;
}

function getInfo()
{
    return 'What number is missing in the progression?';
}

function makeQuiz()
{
    $randomKey = random(0, 9);
    $progression = getProgression();
    $answer = $progression[$randomKey];
    $progression[$randomKey] = '..';

    return [
        implode(' ', $progression),
        $answer,
    ];
}
