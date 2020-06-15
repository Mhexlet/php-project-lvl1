<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\QUANTROUND;

function valueGenerator() //генерация данных и определение правильного ответа
{
    for ($i = 0; $i < QUANTROUND; $i++) {
        $number = rand(1, 15);
        ($number % 2 === 0) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $termsEven = 'Answer "yes" if the number is even, otherwise answer "no"';
    $result = valueGenerator();
    play($termsEven, $result, QUANTROUND);
}
