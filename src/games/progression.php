<?php

namespace BrainGames\Cli\games\progression;

use function BrainGames\Cli\run;

function getProgression()
{
    $progression = array_fill(0, 10, 0);
    $progression[0] = rand(1, 20);
    $d = rand(1, 10);

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
    $randomKey = rand(0, 9);
    $progression = getProgression();
    $answer = $progression[$randomKey];
    $progression[$randomKey] = '..';

    return [
        implode(' ', $progression),
        (string) $answer,
    ];
}

function game()
{
    $describeGame = 'What number is missing in the progression?';

    run(
        $describeGame,
        '\BrainGames\Cli\games\progression\playRound'
    );
}
