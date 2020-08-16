<?php

namespace BrainGames\progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function getProgression($progressionSize, $progressionStep, $progressionStartValue) //генерирует прогрессию
{
    $progression = array(); //объявление переменной с прогрессией
    $i = 0;
    while ($i < $progressionSize) {
        $progression[$i] = $progressionStartValue + $progressionStep * $i;
        $i++;
    }
    return $progression;
}

function generateProgressionAndUserQuestion() //Формирует прогрессию по заданным параметрам и вопрос пользователю
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        //Задаем параметры прогрессии
        $progressionSize = 10; //размер прогрессии
        $progressionStep = rand(2, 5); //шаг прогрессии (от 2 до 5)
        $progressionStartValue = rand(2, 5); //начальное значение прогрессии
        //запись прогрессии в переменную
        $progression = getProgression($progressionSize, $progressionStep, $progressionStartValue);
        $index = rand(0, ($progressionSize - 1)); //рандомный выбор индекса для скрытия
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression); //сбор прогрессии в строку
        $correctAnswer = $progressionStartValue + $progressionStep * $index;
        $results[] = [$progressionImplode, $correctAnswer];
    }
    return $results;
}

function runGame()
{
    $gameGreeting = 'What number is missing in the progression?';
    $gameData = generateProgressionAndUserQuestion();
    play($gameGreeting, $gameData);
}
