<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;
use function BrainGames\Engine\games;

function getProgression() //генерирует прогрессию
{
    $progression = array();
    $progression[0] = 5;
    $i = 0;
    while ($i < 9) {
        $progression[$i + 1] = $progression[$i] + 5;
        $i++;
    }
    return $progression;
}

function randProgression() //Рандомный выбор значения и передача правильного ответа
{
    $progression = getProgression();
    for ($i = 0; $i < (BrainGames\Engine\QUANTROUND); $i++) {
        $index = rand(0, (count($progression) - 1));
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression);
        $progression[$index] = $correctAnswer;
        $result[] = [$progressionImplode, $correctAnswer];
    }
    return $result;
}

function runGamesProgression()
{
    $termsEven = 'What number is missing in the progression?';
    $result = randProgression();
    $name = run($termsEven);
    games($termsEven, $result, $name, BrainGames\Engine\QUANTROUND);
}
