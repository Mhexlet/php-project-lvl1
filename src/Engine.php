<?php

//Все функции взаимодействия с пользователем

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function run($terms) //функция запуска и приветствия
{
    line('Welcome to the Brain Games!');
    line("{$terms}");
    global $name;
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
}

function wrongAnswer() //функция выводит сообщения при неверном ответе
{
    global $name;
    line("'yes' is wrong answer ;(. Correct answer was 'no'.");
    line("Let's try again, %s!", $name);
}

function finalBrainGames() //функция успешного окончания игры
{
    global $name;
    line("Congratulations, %s!", $name);
}

function getAnswer() //функция получения ответа пользователя
{
    //global $answer;
    $answer = prompt('Your answer');
    return $answer;
}

function wrongAnswerCalc() //функция выводит сообщения при неверном ответе
{
    global $name;
    global $answer;
    global $result;
    line("'{$answer}' is wrong answer ;(. Correct answer was '{$result}'.");
    line("Let's try again, %s!", $name);
}

function responseToUser()
{
    line('Correct!');
}

function question($number)
{
    //global $number;
    line("Question: {$number}");
}
