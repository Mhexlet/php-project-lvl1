<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\responseToUser;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\finalBrainGames;
use function BrainGames\Engine\question;
use function BrainGames\Engine\wrongAnswerCalc;

function primeCheck($number) //Проверка числа на простоту
{
    if ($number == 1) {
        return o;
    }
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return 'no';
        }
    }
    return 'yes';
}
function prime()    //Генерирует простое число и проверяет ответ пользователя
{
    for ($i = 0; $i < 3; $i++) {
        $number = rand(2, 1000);
        question($number);
        global $result;
        $result = primeCheck($number);
        global $answer;
        $answer = getAnswer();
        if ($answer !== 'yes' && $answer !== 'no') {
            wrongAnswerCalc();
            return 0;
        }
        if ($answer === $result) {
            responseToUser();
        } else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
}
