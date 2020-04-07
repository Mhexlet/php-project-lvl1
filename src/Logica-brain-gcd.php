<?php

use function cli\line;
use function cli\prompt;

function gcd() //Функция по наименьшему общему делителю
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        line("Question: {$numberOne} {$numberTwo}");
        global $result;
        $gcd = gmp_gcd("{$numberOne}", "{$numberTwo}");
        $result = gmp_strval($gcd);
        //line($gmp);
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
