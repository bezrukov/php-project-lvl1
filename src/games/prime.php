<?php

namespace BrainGames\Cli\games\prime;

use function BrainGames\Cli\run;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

function getGameData()
{
    $question = rand(1, 300);
    $answer = isPrime($question) ? 'yes' : 'no';

    return [
        $question, $answer,
    ];
}

function game()
{
    $describeGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    run(
        $describeGame,
        function () {
            return getGameData();
        }
    );
}
