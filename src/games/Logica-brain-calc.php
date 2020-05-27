<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\run;
use function BrainGames\Engine\games;

function checkRightAnswer()
{
    for ($i = 0; $i < (BrainGames\Engine\QUANTROUND); $i++) {
        //генерируем данные и вопрос пользователю
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathOperation = array('+', '-', '*');
        $countMathOperation = count($mathOperation);
        $math = rand(0, ($countMathOperation - 1));//рандомный выбор оператора
        $number = $numberOne . $mathOperation[$math] . $numberTwo;//генерация строки выражения
        $correctAnswer = eval("return ${number};"); //использование оператора для выполнени выражения
        $question = "{$numberOne} {$mathOperation[$math]} {$numberTwo}"; //генерация строки выражения для пользователя
        $result[] = [$question, $correctAnswer];
    }
    return $result;
}

function runGamesCalc()
{
    $termsEven = 'What is the result of the expression?';
    $result = checkRightAnswer();
    $name = run($termsEven);
    games($termsEven, $result, $name, BrainGames\Engine\QUANTROUND);
}
