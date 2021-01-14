<?php

echo '<h1> Решение задач по работе со строковым типом данных в PHP </h1>';

echo '1. Строка в верхний регистр: \'string\' <br>';
$string = 'string';
echo strtoupper($string) . "<hr>";

echo '2. Строка в нижний регистр: \'STRING\' <br>';
$string = 'STRING';
echo strtolower($string) . "<hr>";

echo '3. Первая буква в верхний регистр: \'string\' . <br>';
$string = 'string';
echo ucfirst($string) . "<hr>";

echo '4. Первая буква в нижний регистр: \'String\' . <br>';
$string = 'String';
echo lcfirst($string) . "<hr>";

echo '5. Записать каждое слово строки с большой буквы: \'london is the capital of great britain\' . <br>';
$string = 'london is the capital of great britain';
echo ucwords($string) . "<hr>";

echo '6. Найти количество символов в строке: \'html css php\' . <br>';
$string = 'html css php';
echo strlen($string) . "<hr>";

echo '7. Дана переменная $password, в которой хранится пароль пользователя.
         Если количество символов пароля больше 5-ти и меньше 10-ти, то выведите
         пользователю сообщение о том, что пароль подходит, иначе сообщение о том,
         что нужно придумать другой пароль. <br>';

$password = '123459';
echo "Пароль: $password <br>";

if(strlen($password) > 5 && strlen($password) < 10){
    echo "Пароль подходит <hr>";
}else{
    echo "Придумайте другой пароль <hr>";
}

echo '8. Дана строка \'html css php\'. Вырезать из нее и вывести на экран слово
\'html\', слово \'css\' и слово \'php\'. <br>';
$string = 'html css php';
echo mb_substr($string, 0, 4) . "<br>";
echo mb_substr($string, 5, 3) . "<br>";
echo mb_substr($string, -3) . "<br> <hr>";

echo '9. Дана строка. Проверить, что она начинается на \'http://\' или на \'https://\'.
         Если это так, вывести \'да\', если не так - \'нет\' . <br>';

$string = 'http://1234567890';
echo "Строка: $string . <br>";

if(mb_substr($string, 0, 7) == 'http://' || mb_substr($string, 0, 7) == 'https://'){
    echo 'Да <hr>';
}else{
    echo 'Нет <hr>';
}

echo '10. Дана строка \'31.12.2013\'. Заменить все точки на дефисы. <br>';
$string = '31.12.2013';
echo str_replace('.', '-', $string) . "<br> <hr>";

echo '11. Дана строка \'abcdeacbacb\'. Заменить в ней все буквы \'a\' на цифру 1, буквы \'b\' - на 2, а буквы \'c\' - на 3.
          Решить задачу двумя способами работы с функцией strtr (массив замен и две строки
          замен). <br>';

$string = 'abcdeacbacb';
echo strtr($string, ['a' => 1, 'b' => 2, 'c' => 3]) . "<br> <hr>";

echo '12. Дана строка \'abcdefg\'. Вырезать из нее подстроку с 3-го символа (отсчет с нуля), 3 штуки и вместо нее вставить \'!!!\'. <br>';
$string = 'abcdefg';
echo substr_replace($string, "!!!", 2, 3) . "<br> <hr>";

echo '13. Дана строка \'abc abc abc\'. Определить позицию первой буквы \'b\'. <br>';
$string = 'abc abc abc';
echo strpos($string, "b") . "<br> <hr>";

echo '14. Проверить, входит ли подстрока в строку. <br>';
$string = 'string';
$substr = 'rin';
echo "Строка: $string, подстрока: $substr <br>";

if(strpos($string, $substr) != false){
    echo "Да <hr>";
}else{
    echo "Нет <hr>";
}

echo '15. Проверьте, что в строке есть две точки подряд. Если это так - выведите \'есть\',
если не так - \'нет\'. <br>';
$string = 'lkdajgh..gah.fk';
echo "Строка: $string <br>";

if(strpos($string, "..") ){
    echo "Да <hr>";
}else{
    echo "Нет <hr>";
}

echo '16. Дана строка \'html css php\'. Запишите каждое слово этой строки в отдельный
элемент массива. <br>';

$string = 'html css php';
$strArray = explode(" ", $string);
print_r($strArray);
echo "<hr>";

echo '17. Работа с текстом: <br>';
// Текст:
$text = 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione
voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi
consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam
nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?';

// Выделить каждую заглавную букву красным цветом
$textArray = preg_split("/ |\n/", $text);
$wordsNum = sizeof($textArray);
for($i = 0; $i < $wordsNum; $i++){
    if(mb_strtoupper(mb_substr($textArray[$i], 0, 1)) == mb_substr($textArray[$i], 0, 1)){
        echo '<span style="color:red">' . mb_substr($textArray[$i], 0, 1) . '</span>' . mb_substr($textArray[$i], 1) . " ";
        unset($textArray[$i]);
    }
    echo $textArray[$i] . " ";
}

echo "<br> <br> Количество слов: " . str_word_count($text) . "<br>";
// Сделать с помощью регулярного выражения
$dotsCnt = substr_count($text, ".");
$questionsCnt = substr_count($text, "?");
$exclamationCnt = substr_count($text, "!");
$threeDotsCnt = substr_count($text, "...");

$sentences = $dotsCnt + $questionsCnt + $exclamationCnt + $threeDotsCnt;
echo "Количество предложений: " . $sentences . "<br>"; 