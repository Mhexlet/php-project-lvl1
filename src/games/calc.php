<?php

namespace BrainGames\BrainCalc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function calculate($numberOne, $numberTwo, $mathematicalOperations) //функция калькулятор
{
    switch ($mathematicalOperations) {
        case '+':
            return $numberOne + $numberTwo;
        case '-':
            return $numberOne - $numberTwo;
        case '*':
            return $numberOne * $numberTwo;
    }
}

function checkRightAnswer()
{
    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        //генерируем данные и вопрос пользователю
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathematicalOperations = array('+', '-', '*');
        $mathematicalOperationsCount = count($mathematicalOperations);
        $math = rand(0, ($mathematicalOperationsCount - 1));//рандомный выбор оператора
        $correctAnswer = calculate($numberOne, $numberTwo, $mathematicalOperations[$math]);
        //генерация строки выражения для пользователя
        $question = "{$numberOne} {$mathematicalOperations[$math]} {$numberTwo}";
        $results[] = [$question, $correctAnswer];
    }
    return $results;
}

function runGames()
{
    $termsEven = 'What is the result of the expression?';
    $results = checkRightAnswer();
    play($termsEven, $results, ROUNDS_COUNT);
}
