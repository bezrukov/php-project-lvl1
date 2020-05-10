<?php

namespace BrainGames\Cli\games\even;

use function BrainGames\Cli\run;
use function BrainGames\random\random;

function isEven(int $num)
{
    return $num % 2 === 0;
}

function makeQuiz()
{
    $number = random(0, 300);
    $answer = isEven($number) ? 'yes' : 'no';

    return [
        $number, $answer,
    ];
}

function game()
{
    run(
        'Answer "yes" if the number is even, otherwise answer "no".',
        '\BrainGames\Cli\games\even\makeQuiz',
        function ($playerAnswer, $systemAnswer) {
            return $playerAnswer === $systemAnswer;
        }
    );
}
