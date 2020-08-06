<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;  //количество раундов игры

function askUserName()
{
    $name = prompt('May I have your name?');
    return $name;
}

function play($gameGreeting, $gameData) //собственно игра
{
    //Начало приветствия пользователя
    line('Welcome to the Brain Games!');
    line("{$gameGreeting}");
    line('');
    $name = askUserName();
    line("Hello, %s!", $name);
    //Конец приветствия
    foreach ($gameData as $data) {
        //извлечение из массива вопроса пользователю и правильного ответа
        [$questionNumber, $correctAnswer] = $data;
        line("Question: {$questionNumber}");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            exit(0);
        }
    }
    line("Congratulations, %s!", $name);
}
