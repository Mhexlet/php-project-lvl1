<?php

namespace BrainGames\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_COUNT;

function primeCheck($number) //Проверка числа на простоту
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

function numberGeneratorAndPrimeCheck() //генерация числа и проверка на простоту
{
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $number = rand(2, 1000);
        primeCheck($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $gameGreeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $result = numberGeneratorAndPrimeCheck();
    play($gameGreeting, $result, ROUND_COUNT);
}
