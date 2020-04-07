<?php

use function cli\line;
use function cli\prompt;

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
        line("Question: {$number}");
        global $result;
        $result = primeCheck($number);
        //line($result);
        global $answer;
        $answer = prompt('Your answer');
        if ($answer !== 'yes' && $answer !== 'no') {
            wrongAnswerCalc();
            return 0;
        }
        if ($answer === $result) {
            line('Correct!');
        } else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
}
