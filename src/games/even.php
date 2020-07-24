<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_COUNT;

function valueGenerate() //генерация данных и определение правильного ответа
{
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $gameAnswer = rand(1, 15);
        ($gameAnswer % 2 === 0) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $result[] = [$gameAnswer, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $gameGreeting = 'Answer "yes" if the number is even, otherwise answer "no"';
    $result = valueGenerate();
    play($gameGreeting, $result, ROUND_COUNT);
}
