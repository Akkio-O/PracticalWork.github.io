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
<body>
    <h3>1.	С помощью цикла while выведите все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.</h3>
    <div class="FirstBlock">
        <?php
            $num = 0;
            while ($num <= 100) {
                if ($num % 3 == 0) {
                    echo $num . ", ";
                }
                $num++;
            }
        ?>
    </div>
    <h3>2.	С помощью цикла do.. .while напишите функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:</h3>
    <div class="SecondBlock">
        <?php 
            $num = 0;
            do {
                if ($num == 0) {
                    echo "{$num} - это ноль<br>";
                } elseif ($num % 2 == 0) {
                    echo "{$num} - четное число<br>";
                } else {
                    echo "{$num} - нечетное число<br>";
                }
                $num++;
            } while ($num <= 10);
        ?>
    </div>
    <h3>3.	Выведите с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно вот так:</h3>
    <div class="ThirdBlock">
        <?php
            for ($i = 0; $i < 10; $i++) {
                echo $i . ", ";
            }
        ?>
    </div>
    <h3>4.	Объявите массив, где в качестве ключей будут использоваться названия областей, а в качестве значений - массивы с названиями городов из соответствующей области. Выведите в цикле значения массива, чтобы результат был таким:
        Московская область: Москва, Зеленоград, Клин 
        Ленинградская область: Санкт-Петербург, Всеволожск, Павловск, Кронштадт 
        Рязанская область(названия городов можно найти на maps.yandex.ru)
    </h3>
    <div class="FourBlock">
        <?php
        $cities = array (
            "Московская область" => array ("Москва","Зеленоград","Клин"), 
            "Ленинградская область" => array ("Санкт Петербург", "Всеволожск", "Павловск", "Кронштадт"), 
            "Рязанская область" => array ("Рязань","Касимов","Скопин")
        );
        foreach ($cities as $area => $region){
            echo $area;
            foreach ($region as $city){
                echo ($city);
            }
        }
            // $cities = array(
            //     "Московская область" => array("Москва", "Зеленоград", "Клин"),
            //     "Ленинградская область" => array("Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"),
            //     "Рязанская область" => array("Рязань", "Касимов", "Скопин")
            // );

            // foreach ($cities as $region => $cityArray) {
            //     echo $region . ":<br>";
            //     foreach ($cityArray as $city) {
            //         echo $city . ", ";
            //     }
            //     echo "<br>";
            // }

        ?>
    </div>
    <h3>5.	Повторите предыдущее задание, но выводите на экран только города, начинающиеся с буквы «К».
Объявите массив, индексами которого являются буквы русского языка, а значениями - соответствующие латинские буквосочетания (‘а’=> ’а’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, _, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
</h3>
    <div class="FiveBlock">
        <?php
            foreach ($cities as $region => $cityArray) {
                echo $region . ":<br>";
                foreach ($cityArray as $city) {
                    if (mb_substr($city, 0, 1, 'UTF-8') == "К") {
                        echo $city . ", ";
                    }
                }
                echo "<br>";
            }
        ?>
    </div>
    <h3>6.	Напишите функцию транслитерации строк.
</h3>
    <div class="SixBlock">
        <?php
            function transliterate($string) {
                $translitTable = array(
                    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
                    'е' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'й' => 'y',
                    'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
                    'ф' => 'f', 'х' => 'kh', 'ц' => 'ts', 'ч' => 'ch', 'ш' => 'sh',
                    'щ' => 'shch', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e',
                    'ю' => 'yu', 'я' => 'ya',
                );

                $string = mb_strtolower($string, 'UTF-8');
                $result = strtr($string, $translitTable);

                return $result;
            }

            $inputString = "Пример текста на русском";
            $transliterated = transliterate($inputString);
            echo $transliterated;
        ?>
    </div>
    <h3>7. Напишите функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.
        Объедините две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).
    </h3>
    <div class="SevenBlock">
        <?php
            function urlify($string) {
                $string = transliterate($string);
                $string = str_replace(' ', '_', $string);
                return $string;
            }

            $inputString = "Пример текста на русском";
            $urlFriendly = urlify($inputString);
            echo $urlFriendly;
        ?>
    </div>
</body>
</html>