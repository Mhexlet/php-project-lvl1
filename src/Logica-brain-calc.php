<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\responseToUser;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\finalBrainGames;
use function BrainGames\Engine\question;
use function BrainGames\Engine\wrongAnswerCalc;

function checkRightAnswer() //генерация числа и проверка ответа
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathOperation = array('+', '-', '*');
        $math = rand(0, 2);
        $number = $numberOne . $mathOperation[$math] . $numberTwo;
        $question = "{$numberOne} {$mathOperation[$math]} {$numberTwo}";
        question($question);
        global $result;
        $result = eval("return ${number};");
        global $answer;
        $answer = getAnswer();
        if ($answer == $result) {
            responseToUser();
        } else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}
