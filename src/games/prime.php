<?php

namespace BrainGames\prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function checkPrime($number) //Проверка числа на простоту
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function gameQuestionGeneratorAndPrimeCheck() //генерация вопроса игры и проверка на простоту
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameQuestion = rand(2, 1000);
        checkPrime($gameQuestion) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $results[] = [$gameQuestion, $correctAnswer];
    }
    return $results;
}

function runGame()
{
    $gameGreeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $gameData = gameQuestionGeneratorAndPrimeCheck();
    play($gameGreeting, $gameData);
}
