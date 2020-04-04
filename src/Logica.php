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
function gcd()
{
    for ($i = 0; $i <= 2; $i++) {
        $numberOne = rand(1, 30);
        $numberTwo = rand(1, 30);
        line("Question: {$numberOne} {$numberTwo}");
        global $gmp;
        $gcd = gmp_gcd("{$numberOne}", "{$numberTwo}");
        $gmp = gmp_strval($gcd);
        line($gmp);
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
