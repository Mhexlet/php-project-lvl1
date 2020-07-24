<?php

namespace BrainGames\BrainGCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_COUNT;

function findGcd($numberOne, $numberTwo)  //нахождение наибольшего общего делителя
{
    $minNumber = min($numberOne, $numberTwo);
    $minNumberHalf = round($minNumber / 2, 0, PHP_ROUND_HALF_UP); //определяем половину минимального числа
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
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        $question = "{$numberOne} {$numberTwo}";
        $correctAnswer = findGcd($numberOne, $numberTwo);
        $result[] = [$question, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $gameGreeting = 'Find the greatest common divisor of given numbers.';
    $result = gcdGenerator();
    play($gameGreeting, $result, ROUND_COUNT);
}
