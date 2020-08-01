<?php

namespace BrainGames\BrainEven;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function generateRoundData() //генерация данных и определение правильного ответа
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameAnswer = rand(1, 15);
        ($gameAnswer % 2 === 0) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $results[] = [$gameAnswer, $correctAnswer];
    }
    return $results;
}

function runGames()
{
    $gameGreeting = 'Answer "yes" if the number is even, otherwise answer "no"';
    $results = generateRoundData();
    play($gameGreeting, $results, ROUNDS_COUNT);
}
