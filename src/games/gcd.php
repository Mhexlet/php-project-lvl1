<?php

namespace BrainGames\gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function findGcd($numberOne, $numberTwo)  //нахождение наибольшего общего делителя
{
    $minNumber = min($numberOne, $numberTwo);
    $minNumberHalf = round($minNumber / 2, 0, PHP_ROUND_HALF_UP); //определяем половину минимального числа
    $maxNumber = max($numberOne, $numberTwo);
    for ($i = $minNumberHalf; $i > 0; $i--) {
        if ($maxNumber % $minNumber == 0) {
            return $minNumber;
        } elseif ($numberOne % $i == 0 && $numberTwo % $i == 0) {
            return $i;
        }
    }
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

function runGame()
{
    $gameGreeting = 'Find the greatest common divisor of given numbers.';
    $gameData = gcdGenerator();
    play($gameGreeting, $gameData);
}
