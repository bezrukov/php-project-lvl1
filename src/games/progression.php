<?php

namespace BrainGames\Cli\games\progression;

use function BrainGames\Cli\run;
use function BrainGames\random\random;

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

function playRound()
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

function game()
{
    run(
        'What number is missing in the progression?',
        '\BrainGames\Cli\games\progression\playRound',
        function ($playerAnswer, $systemAnswer) {
            return (int)$playerAnswer === (int)$systemAnswer;
        }
    );
}
