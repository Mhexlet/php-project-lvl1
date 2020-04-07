<?php

use function cli\line;
use function cli\prompt;

function checkRightAnswer() //генерация числа и проверка ответа
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathOperation = array('+', '-', '*');
        $math = rand(0, 2);
        $number = $numberOne . $mathOperation[$math] . $numberTwo;
        line("Question: {$numberOne} {$mathOperation[$math]} {$numberTwo}");
        //line($number);
        global $result;
        $result = eval("return ${number};");
        //line($result);
        global $answer;
        $answer = prompt('Your answer');
        if ($answer == $result) {
            line('Correct!');
        } else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}
