<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUND_COUNT;

function calculate($numberOne, $numberTwo, $mathOperation) //функция калькулятор
{
    if ($mathOperation == '+') {
        return $numberOne + $numberTwo;
    } if ($mathOperation == '-') {
        return $numberOne - $numberTwo;
    } if ($mathOperation == '*') {
        return $numberOne * $numberTwo;
    }
}

function checkRightAnswer()
{
    for ($i = 0; $i < ROUND_COUNT; $i++) {
        //генерируем данные и вопрос пользователю
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathOperation = array('+', '-', '*');
        $countMathOperation = count($mathOperation);
        $math = rand(0, ($countMathOperation - 1));//рандомный выбор оператора
        $correctAnswer = calculate($numberOne, $numberTwo, $mathOperation[$math]);
        $question = "{$numberOne} {$mathOperation[$math]} {$numberTwo}"; //генерация строки выражения для пользователя
        $result[] = [$question, $correctAnswer];
    }
    return $result;
}

function runGames()
{
    $termsEven = 'What is the result of the expression?';
    $result = checkRightAnswer();
    play($termsEven, $result, ROUND_COUNT);
}
