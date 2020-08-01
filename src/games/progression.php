<?php

namespace BrainGames\BrainProgression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function getProgression($progressionSize, $stepProgression, $startValueProgression) //генерирует прогрессию
{
    $progression = array(); //объявление переменной с прогрессией
    $i = 0;
    while ($i < ($progressionSize - 1)) {
        $progression[$i] = $startValueProgression + $stepProgression * $i;
        $i++;
    }
    return $progression;
}

function randProgression() //Рандомный выбор значения и передача правильного ответа
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        //Задаем параметры прогрессии
        $progressionSize = 10; //размер прогрессии
        $stepProgression = rand(2, 5); //шаг прогрессии (от 2 до 5)
        $startValueProgression = 0; //начальное значение прогрессии
        //
        $progression = getProgression($progressionSize, $stepProgression, $startValueProgression); //запись прогрессии в переменную
        $index = rand(0, (count($progression) - 1)); //рандомный выбор индекса для скрытия
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression); //сбор прогрессии в строку
        $correctAnswer = $startValueProgression + $stepProgression * $index;
        $results[] = [$progressionImplode, $correctAnswer];
    }
    return $results;
}

function runGames()
{
    $gameGreeting = 'What number is missing in the progression?';
    $results = randProgression();
    play($gameGreeting, $results, ROUNDS_COUNT);
}
