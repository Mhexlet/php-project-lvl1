<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\responseToUser;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\finalBrainGames;
use function BrainGames\Engine\question;
use function BrainGames\Engine\wrongAnswerCalc;

function gcd() //Функция по наименьшему общему делителю
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        $question = "{$numberOne} {$numberTwo}";
        question($question);
        global $result;
        $gcd = gmp_gcd("{$numberOne}", "{$numberTwo}");
        $result = gmp_strval($gcd);
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
