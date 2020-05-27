<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;
use function BrainGames\Engine\games;

function gcd($numberOne, $numberTwo)
{
    $minNumber = min($numberOne, $numberTwo);
    $minNumberHalf = round($minNumber / 2, 0, PHP_ROUND_HALF_UP);
    $maxNumber = max($numberOne, $numberTwo);
    $result = 1;
    for ($i = 2; $i <= $minNumberHalf; $i++) {
        if ($maxNumber % $minNumber == 0) {
            $result = $minNumber;
        } elseif ($numberOne % $i == 0 && $numberTwo % $i == 0) {
            $result = $i;
        }
    }
    return $result;
}

function gcdGenerator() //Функция по наибольшему общему делителю
{
    for ($i = 0; $i < (BrainGames\Engine\QUANTROUND); $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        $question = "{$numberOne} {$numberTwo}";
        $correctAnswer = gcd($numberOne, $numberTwo);
        $result[] = [$question, $correctAnswer];
    }
    return $result;
}

function runGamesGCD()
{
    $termsEven = 'Find the greatest common divisor of given numbers.';
    $result = gcdGenerator();
    $name = run($termsEven);
    games($termsEven, $result, $name, BrainGames\Engine\QUANTROUND);
}
