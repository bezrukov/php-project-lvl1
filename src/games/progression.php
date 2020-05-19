<?php

namespace BrainGames\Cli\games\progression;

use function BrainGames\Cli\run;

function getProgression($length, $firstElement, $step)
{
    $progression = array_fill(0, $length, 0);
    for ($i = 0; $i < $length; $i++) {
        $progression[$i] = $firstElement + $step * $i;
    }

    return $progression;
}

function getGameData()
{
    $progressionLength = 10;
    $progressionFirstElement = rand(1, 20);
    $progressionStep = rand(1, 10);

    $progression = getProgression($progressionLength, $progressionFirstElement, $progressionStep);
    $randomKey = array_rand($progression);
    $answer = (string)($progressionFirstElement + $progressionStep * $randomKey);
    $progression[$randomKey] = '..';
    $question = implode(' ', $progression);

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
        function () {
            return getGameData();
        }
    );
}
