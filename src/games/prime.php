<?php

namespace BrainGames\BrainPrime;

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

function gameAnswerGeneratorAndPrimeCheck() //генерация вопроса игры и проверка на простоту
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $gameAnswer = rand(2, 1000);
        checkPrime($gameAnswer) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $results[] = [$gameAnswer, $correctAnswer];
    }
    return $results;
}

function runGames()
{
    $gameGreeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $results = gameAnswerGeneratorAndPrimeCheck();
    play($gameGreeting, $results, ROUNDS_COUNT);
}
