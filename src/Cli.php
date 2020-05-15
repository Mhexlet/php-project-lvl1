<?php

//Текст взаимодействия с пользователем

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

//Условия игр (Обращение к игроку)
const TERMSEVEN = 'Answer "yes" if the number is even, otherwise answer "no"';
const TERMSCALC = 'What is the result of the expression?';
const TERMSGCD = 'Find the greatest common divisor of given numbers.';
const TERMSPROGRESSION = 'What number is missing in the progression?';
const TERMSPRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';
