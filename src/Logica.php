<?php

//namespace BrainGames\Cli;
//require __DIR__ . '/../vendor/autoload.php';


use function cli\line;
use function cli\prompt;

function checkEven($value) //проверка на четность
{
    if ($value % 2 === 0) {
        return 'yes';
    }
    else {
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

function checkRightAnswer() //генерация числа и проверка ответа
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 5);
        $numberTwo = rand(1, 5);
        $mathOperation = array('+', '-', '*');
        $math = rand(0, 2);
        $number = $numberOne . $mathOperation[$math] . $numberTwo;
        line("Question: {$numberOne} {$mathOperation[$math]} {$numberTwo}");
        //line($number);
        global $result;
        $result = eval("return ${number};");
        //line($result);
        global $answer;
        $answer = prompt('Your answer');
        if ($answer == $result) {
            line('Correct!');
        }
        else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}


function valueGenerator() //генерация числа и проверка ответа
{
    for ($i = 0; $i <= 2; $i++) {
        $number = rand(1, 15);
        line("Question: {$number}");
        $answer = prompt('Your answer');
        if (checkAnswer($answer)) {
            if (checkEven($number) === $answer) {
                line('Correct!');
            } 
            else {
                wrongAnswer();
                return 0;
            }
        }
        else {
            wrongAnswer();
            return 0;
        }
      
    }
    finalBrainGames();
    return 0;
}
function gcd() //Функция по наименьшему общему делителю
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        line("Question: {$numberOne} {$numberTwo}");
        global $gmp;
        $gcd = gmp_gcd("{$numberOne}", "{$numberTwo}");
        $gmp = gmp_strval($gcd);
        //line($gmp);
        global $answer;
        $answer = prompt('Your answer');
        if ($answer == $gmp) {
            line('Correct!');
        }
        else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}
function progression()
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
        }
        else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
    return 0;
}
function primeCheck($number)
{
    if ($number == 1)
        return o;
    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0)
        return 'no';
    }
    return 'yes';
}
function prime()    //Простое ли число
{
    for ($i = 0; $i < 3; $i++) {
        $number = rand(2, 1000);
        line("Question: {$number}");
        global $result;
        $result = primeCheck($number);
        //line($result);
        global $answer;
        $answer = prompt('Your answer');
        if ($answer !== 'yes' && $answer !== 'no') {
            wrongAnswerCalc();
            return 0;
        }
        if ($answer === $result) {
            line('Correct!');
        }
        else {
            wrongAnswerCalc();
            return 0;
        }
    }
    finalBrainGames();
} 
