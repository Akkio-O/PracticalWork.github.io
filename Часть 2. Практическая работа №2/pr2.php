<!DOCTYPE html>
<html>
<head>
    <title>Пример с PHP</title>
    <style>
        h3 {
            background-color: #1E1E1E;
            color: #c9c9c9;
            border-radius: 1lvh;
            padding: 0.4vw;
        }
        .FirstBlock, .SecondBlock, p, .ThirdBlock, .FourBlock, .FiveBlock, .SixBlock, .SevenBlock, .EightBlock{
            background-color: #c9c9c9;
            padding: 0.4vw;
            border-radius: 0.9lvh;
            line-height: 1;
        }
    </style>
</head>
<body style="font-size: 1em;">
    <h3>1.	Объявите в начале скрипта две целочисленных переменных $а и $b, начальные значения определите с помощью констант. Написать скрипт:</h3>
    <div class="FirstBlock">
        <?php
                define ("a", "5");
                define ("b", "15");
            $Text1 = "a. Если а и b положительные - выведите их сумму.<br> 
            b. Если а и b отрицательные - выведите из разность.<br>
            c. Если а и b разных знаков - выведите их произведение.<br>
            Ноль можно считать положительным числом.<br>";
            echo $Text1;
            if (a && b >= 0) {
                echo "a. Ответ: ". a + b;
            }
            elseif (a && b < 0) {
                echo "b. Ответ: ". a - b;
            }
            else {
                echo "c. Ответ: ". a * b;
            }
        ?>
    </div>
    <h3>2. Выведите большее из чисел используя тернарный оператор.</h3>
    <div class="SecondBlock">
        <?php 
            $c = (a > b) ? a."не меньше ".b : a." меньше ".b;
            echo $c;
        ?>
    </div>
    <h3>3. Присвойте $а значение в промежутке [0..9]. С помощью оператора switch организуйте вывод чисел от $a до 9.</h3>
    <div class="ThirdBlock">
        <?php
            $a = 5;
            switch ($a) {
                case 0:
                    echo "0,";
                case 1:
                    echo "1,";
                case 2:
                    echo "2,";
                case 3:
                    echo "3,";
                case 4:
                    echo "4,";
                case 5:
                    echo "5,";
                case 6:
                    echo "6,";
                case 7:
                    echo "7,";
                case 8:
                    echo "8,";
                case 9:
                    echo "9,";
                    break;
            }
        ?>
    </div>
    <h3>4. Реализуйте все арифметические операции в виде функций с двумя параметрами.</h3>
    <div class="FourBlock">
        <?php
            function addition($a, $b) {
                return $a + $b;
            }

            function subtraction($a, $b) {
                return $a - $b;
            }

            function multiplication($a, $b) {
                return $a * $b;
            }

            function division($a, $b) {
                if ($b != 0) {
                    return $a / $b;
                } else {
                    return "Ошибка: деление на ноль";
                }
            }

            function modulus($a, $b) {
                if ($b != 0) {
                    return $a % $b;
                } else {
                    return "Ошибка: деление на ноль";
                }
            }

            $a = 5;
            $b = 3;

            echo "Сложение: " . addition($a, $b) . "<br>";
            echo "Вычитание: " . subtraction($a, $b) . "<br>";
            echo "Умножение: " . multiplication($a, $b) . "<br>";
            echo "Деление: " . division($a, $b) . "<br>";
            echo "Остаток от деления: " . modulus($a, $b) . "<br>";
        ?>
    </div>
    <h3>5. Реализуйте функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 - значения аргументов. $operation - строка с названием операции. 
        В зависимости от переданного значения операции выполните одну из арифметических операций (используйте функции из пункта 4) и верните полученное значение (используйте switch).</h3>
    <div class="FiveBlock">
        <?php
            function mathOperation($arg1, $arg2, $operation) {
                switch ($operation) {
                    case "addition":
                        return addition($arg1, $arg2);
                    case "subtraction":
                        return subtraction($arg1, $arg2);
                    case "multiplication":
                        return multiplication($arg1, $arg2);
                    case "division":
                        return division($arg1, $arg2);
                    case "modulus":
                        return modulus($arg1, $arg2);
                    default:
                        return "Ошибка: недопустимая операция";
                }
            }

            $a = 5;
            $b = 3;

            echo "Сложение: " . mathOperation($a, $b, "addition") . "<br>";
            echo "Вычитание: " . mathOperation($a, $b, "subtraction") . "<br>";
            echo "Умножение: " . mathOperation($a, $b, "multiplication") . "<br>";
            echo "Деление: " . mathOperation($a, $b, "division") . "<br>";
            echo "Остаток от деления: " . mathOperation($a, $b, "modulus") . "<br>";
        ?>
    </div>
    <h3>6. С помощью рекурсии организуйте функцию возведения числа в степень. Формат: function power($val, $pow), где $val - заданное число, $pow - степень.</h3>
    <div class="SixBlock">
        <?php
            function power($val, $pow) {
                if ($pow == 0) {
                    return 1;
                } elseif ($pow < 0) {
                    return 1 / power($val, -$pow);
                } else {
                    return $val * power($val, $pow - 1);
                }
            }

            $value = 2;
            $power = 3;

            $result = power($value, $power);
            echo "$value в степени $power равно: $result";
        ?>
    </div>
    <h3>7. Написать функцию, которая принимают в качестве аргументов два числа и вычисляет из них большее. Написать такую же функцию, чтобы она вычисляла меньшее число. 
        Проверить, если произведение $a и $b больше 100, но меньше 1000, то от большего числа отнять меньшее и вывести результат на экран. 
        А если произведение этих чисел больше 1000, то произведение этих чисел разделить на большее из чисел.</h3>
    <div class="SevenBlock">
        <?php
            function findMax($a, $b) {
                return $a > $b ? $a : $b;
            }

            function findMin($a, $b) {
                return $a < $b ? $a : $b;
            }

            $a = 10;
            $b = 20;

            $product = $a * $b;

            if ($product > 100 && $product < 1000) {
                $result = findMax($a, $b) - findMin($a, $b);
                echo "Результат: $result";
            } elseif ($product > 1000) {
                $result = $product / findMax($a, $b);
                echo "Результат: $result";
            } else {
                echo "Произведение чисел не удовлетворяет условиям";
            }
        ?>
    </div>
</body>
</html>