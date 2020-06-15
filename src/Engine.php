<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const QUANTROUND = 3;  //количество раундов игры

function askNameUser()
{
    $name = prompt('May I have your name?');
    return $name;
}

function compareAnswer(array $resultRound, $name) //функция получения ответа пользователя и сравнение с правильным
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

function play($termsEven, $result, $QUANTROUND) //собственно игра
{
    //Начало приветствия пользователя
    line('Welcome to the Brain Games!');
    line("{$termsEven}");
    line('');
    $name = askNameUser();
    line("Hello, %s!", $name);
    //Конец приветствия
    for ($i = 0; $i < $QUANTROUND; $i++) {
        $countArray = count($result);
        $resultRound = $result[$i];
        compareAnswer($resultRound, $name);
    }
    line("Congratulations, %s!", $name);
}
