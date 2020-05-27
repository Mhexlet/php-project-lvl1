<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;
use function BrainGames\Engine\games;

function checkEven($value) //проверка на четность
{
    if ($value % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function valueGenerator() //генерация данных и определение правильного ответа
{
    for ($i = 0; $i < (BrainGames\Engine\QUANTROUND); $i++) {
        $number = rand(1, 15);
        if (checkEven($number) == true) {
            $correctAnswer = 'yes';
        } else {
            $correctAnswer = 'no';
        }
        $result[] = [$number, $correctAnswer];
    }
    return $result;
}

function runGamesEven()
{
    $termsEven = 'Answer "yes" if the number is even, otherwise answer "no"';
    $result = valueGenerator();
    $name = run($termsEven);
    games($termsEven, $result, $name, BrainGames\Engine\QUANTROUND);
}
