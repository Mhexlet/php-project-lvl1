<?php

namespace BrainGames\BrainPrime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\QUANTROUND;

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
    for ($i = 0; $i < QUANTROUND; $i++) {
        $number = rand(2, 1000);
        primeCheck($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $termsEven = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $result = numberGeneratorAndPrimeCheck();
    play($termsEven, $result, QUANTROUND);
}
