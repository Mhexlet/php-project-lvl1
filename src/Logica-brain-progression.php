<?php

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\getAnswer;
use function BrainGames\Engine\responseToUser;
use function BrainGames\Engine\wrongAnswer;
use function BrainGames\Engine\finalBrainGames;
use function BrainGames\Engine\question;
use function BrainGames\Engine\wrongAnswerCalc;

function progression()  //Функция генерирующая прогрессию + проверяет ответ пользователя
{
    global $progression;
    $progression = array();
    $progression[0] = 5;
    $i = 0;
    while ($i < 9) {
        $progression[$i + 1] = $progression[$i] + 5;
        $i++;
    }
    for ($i = 0; $i < 3; $i++) {
        $index = rand(0, 9);
        global $result;
        $result = $progression[$index];
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression);
        question($progressionImplode);
        $progression[$index] = $result;
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
