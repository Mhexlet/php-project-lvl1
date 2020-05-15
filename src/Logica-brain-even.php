<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\responseToUser;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\finalBrainGames;
use function BrainGames\Engine\question;

function checkEven($value) //проверка на четность
{
    if ($value % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}
function checkAnswer($value) //проверка корректности ответа
{
    if ($value !== 'yes' && $value !== 'no') {
        return false;
    }
    return true;
}
function valueGenerator() //генерация числа и проверка ответа
{
    for ($i = 0; $i <= 2; $i++) {
        $number = rand(1, 15);
        question($number);
        $answer = getAnswer();
        if (checkAnswer($answer)) {
            if (checkEven($number) === $answer) {
                responseToUser();
            } else {
                wrongAnswer();
                return 0;
            }
        } else {
            wrongAnswer();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}
