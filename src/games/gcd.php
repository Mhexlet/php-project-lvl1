<?php

namespace BrainGames\BrainGCD;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function findGcd($numberOne, $numberTwo)  //нахождение наибольшего общего делителя
{
    $minNumber = min($numberOne, $numberTwo);
    $minNumberHalf = round($minNumber / 2, 0, PHP_ROUND_HALF_UP); //определяем половину минимального числа
    $maxNumber = max($numberOne, $numberTwo);
    $results = 1;
    for ($i = 2; $i <= $minNumberHalf; $i++) {
        if ($maxNumber % $minNumber == 0) {
            $results = $minNumber;
        } elseif ($numberOne % $i == 0 && $numberTwo % $i == 0) {
            $results = $i;
        }
    }
    return $results;
}

function gcdGenerator() //Функция по наибольшему общему делителю
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        $question = "{$numberOne} {$numberTwo}";
        $correctAnswer = findGcd($numberOne, $numberTwo);
        $results[] = [$question, $correctAnswer];
    }
    return $results;
}

function runGames()
{
    $gameGreeting = 'Find the greatest common divisor of given numbers.';
    $results = gcdGenerator();
    play($gameGreeting, $results);
}
