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
    while ($i < $progressionSize) {
        $progression[$i] = $startValueProgression + $stepProgression * $i;
        $i++;
    }
    return $progression;
}

function generateProgressionAndUserQuestion() //Формирует прогрессию по заданным параметрам и вопрос пользователю
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        //Задаем параметры прогрессии
        $progressionSize = 10; //размер прогрессии
        $stepProgression = rand(2, 5); //шаг прогрессии (от 2 до 5)
        $startValueProgression = rand(2, 5); //начальное значение прогрессии
        //запись прогрессии в переменную
        $progression = getProgression($progressionSize, $stepProgression, $startValueProgression);
        $index = rand(0, ($progressionSize - 1)); //рандомный выбор индекса для скрытия
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression); //сбор прогрессии в строку
        $correctAnswer = $startValueProgression + $stepProgression * $index;
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
