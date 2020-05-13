<?php

namespace BrainGames\Cli\games\progression;

use function BrainGames\Cli\run;

function getProgression($length, $firstElement, $step)
{
    $progression = array_fill(0, $length, 0);
    $progression[0] = $firstElement;

    foreach ($progression as $key => $item) {
        if ($key === 0) {
            continue;
        }

        $progression[$key] = $progression[$key - 1] + $step;
    }

    return $progression;
}

function playRound()
{
    $randomKey = rand(0, 9);
    $progression = getProgression(10, rand(1, 20), rand(1, 10));
    $answer = $progression[$randomKey];
    $progression[$randomKey] = '..';
    $question = (string) implode(' ', $progression);

    return [
        $question,
        $answer,
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
