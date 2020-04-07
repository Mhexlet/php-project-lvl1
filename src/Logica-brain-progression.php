<?php

use function cli\line;
use function cli\prompt;

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
    //print_r($progression);
    for ($i = 0; $i < 3; $i++) {
        $index = rand(0, 9);
        global $result;
        $result = $progression[$index];
        $progression[$index] = '..';
        $progressionImplode = implode("  ", $progression);
        line("Question: {$progressionImplode}");
        $progression[$index] = $result;
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
