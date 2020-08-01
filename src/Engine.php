<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;  //количество раундов игры

function askNameUser()
{
    $name = prompt('May I have your name?');
    return $name;
}

function play($gameGreeting, $results, $ROUNDS_COUNT) //собственно игра
{
    //Начало приветствия пользователя
    line('Welcome to the Brain Games!');
    line("{$gameGreeting}");
    line('');
    $name = askNameUser();
    line("Hello, %s!", $name);
    //Конец приветствия
    foreach ($results as $result) {
        [$questionNumber, $correctAnswer] = $result; //извлечение из массива вопроса пользователю и правильного ответа
        line("Question: {$questionNumber}");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            exit;
        }
    }
    line("Congratulations, %s!", $name);
}
