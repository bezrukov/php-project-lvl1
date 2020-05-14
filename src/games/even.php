<?php

namespace BrainGames\Cli\games\even;

use function BrainGames\Cli\run;

function isEven(int $num)
{
    return $num % 2 === 0;
}

function getGameData()
{
    $question = rand(0, 300);
    $answer = isEven($question) ? 'yes' : 'no';

    return [
        $question, $answer,
    ];
}

function game()
{
    $describeGame = 'Answer "yes" if the number is even, otherwise answer "no".';

    run(
        $describeGame,
        function () {
            return getGameData();
        }
    );
}
