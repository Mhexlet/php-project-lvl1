<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;  //количество раундов игры

function askNameUser()
{
    $name = prompt('May I have your name?');
    return $name;
}

function getAndCompareAnswer(array $resultRound, $name) //функция получения ответа пользователя и сравнение с правильным
{
    [$questionNumber, $correctAnswer] = $resultRound; //извлечение из массива вопроса пользователю и правильного ответа
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

function play($gameGreeting, $result, $ROUND_COUNT) //собственно игра
{
    //Начало приветствия пользователя
    line('Welcome to the Brain Games!');
    line("{$gameGreeting}");
    line('');
    $name = askNameUser();
    line("Hello, %s!", $name);
    //Конец приветствия
    for ($i = 0; $i < $ROUND_COUNT; $i++) {
        $countArray = count($result);
        $resultRound = $result[$i];
        getAndCompareAnswer($resultRound, $name);
    }
    line("Congratulations, %s!", $name);
}
