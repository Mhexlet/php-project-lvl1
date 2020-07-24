<?php

namespace BrainGames\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_COUNT;

function getProgression($progressionCount, $stepProgression) //генерирует прогрессию
{
    $progression = array(); //объявление переменной с прогрессией
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
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        //Задаем параметры прогрессии
        $progressionCount = 10; //размер прогрессии
        $stepProgression = rand(2, 5); //шаг прогрессии (от 2 до 5)
        //
        $progression = getProgression($progressionCount, $stepProgression); //запись прогрессии в переменную
        $index = rand(0, (count($progression) - 1)); //рандомный выбор индекса для скрытия
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression); //сбор прогрессии в строку
        $correctAnswer = $stepProgression + $stepProgression * $index;
        $result[] = [$progressionImplode, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $gameGreeting = 'What number is missing in the progression?';
    $result = randProgression();
    play($gameGreeting, $result, ROUND_COUNT);
}
