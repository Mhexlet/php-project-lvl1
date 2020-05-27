<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;
use function BrainGames\Engine\games;

function primeCheck($number) //Проверка числа на простоту
{
    if ($number == 1) {
        return false;
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

function prime()
{
    for ($i = 0; $i < (BrainGames\Engine\QUANTROUND); $i++) {
        $number = rand(2, 1000);
        primeCheck($number) ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function runGamesPrime()
{
    $termsEven = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $result = prime();
    $name = run($termsEven);
    games($termsEven, $result, $name, BrainGames\Engine\QUANTROUND);
}
