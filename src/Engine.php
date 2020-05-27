<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const QUANTROUND = 3;

function run($terms) //функция запуска и приветствия
{
    line('Welcome to the Brain Games!');
    line("{$terms}");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}

function interaction(array $resultRound, $name) //функция получения ответа пользователя и сравнение с правильным
{
    $number = $resultRound[0];
    $correctAnswer = $resultRound[1];
    line("Question: {$number}");
    $answer = prompt('Your answer');
    if ($answer == $correctAnswer) {
        line('Correct!');
    } else {
        line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        line("Let's try again, %s!", $name);
        exit;
    }
}

function games($terms, $result, $name, $QUANTROUND) //собственно игра
{
    for ($i = 0; $i < $QUANTROUND; $i++) {
        $countArray = count($result);
        $resultRound = $result[$i];
        interaction($resultRound, $name);
    }
    line("Congratulations, %s!", $name);
}
