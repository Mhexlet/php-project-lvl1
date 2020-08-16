<?php

namespace BrainGames\calc;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\play;

use const BrainGames\Engine\ROUNDS_COUNT;

function calculate($numberOne, $numberTwo, $mathematicalOperator) //функция калькулятор
{
    switch ($mathematicalOperator) {
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
        $randKeysMathematicalOperations = array_rand($mathematicalOperations, 1);
        //рандомный выбор оператора
        $mathematicalOperator = $mathematicalOperations[$randKeysMathematicalOperations];
        $correctAnswer = calculate($numberOne, $numberTwo, $mathematicalOperator);
        //генерация строки выражения для пользователя
        $question = "{$numberOne} {$mathematicalOperator} {$numberTwo}";
        $results[] = [$question, $correctAnswer];
    }
    return $results;
}

function runGame()
{
    $termsEven = 'What is the result of the expression?';
    $gameData = checkRightAnswer();
    play($termsEven, $gameData);
}
