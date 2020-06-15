<?php

namespace BrainGames\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\QUANTROUND;

function getProgression() //генерирует прогрессию
{
    $progression = array(); //объявление переменной с прогрессией
    $progressionCount = 10; //размер прогрессии
    $stepProgression = rand(2, 5); //шаг прогрессии (от 2 до 5)
    $progression[0] = $stepProgression;
    $i = 0;
    while ($i < ($progressionCount - 1)) {  //наполнение прогрессии
        $progression[$i + 1] = $progression[$i] + $stepProgression;
        $i++;
    }
    return $progression;
}

function randProgression() //Рандомный выбор значения и передача правильного ответа
{
    for ($i = 0; $i < QUANTROUND; $i++) {
        $progression = getProgression(); //запись прогрессии в переменную
        $index = rand(0, (count($progression) - 1)); //рандомный выбор индекса для скрытия
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression); //сбор прогрессии в строку
        $progression[$index] = $correctAnswer;
        $result[] = [$progressionImplode, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $termsEven = 'What number is missing in the progression?';
    $result = randProgression();
    play($termsEven, $result, QUANTROUND);
}
