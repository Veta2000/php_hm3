<?php
// Створіть файл 'test.txt' , запишіть у нього рядок 'Hello Palmo''.
$file1 = fopen('backend/storage/test.txt', 'w');
fwrite($file1, 'Hello Palmo');
fclose($file1);

//  Відобразіть вміст файлу на сторінці
echo "test.txt : " . file_get_contents('backend/storage/test.txt') . "<br>";

//  Відобразіть розмір файлу на сторінці (У байтах, мегабайтах, гігабайтах)
$fileSize = filesize('backend/storage/test.txt');
echo "У байтах : " . $fileSize . "<br>";
echo " мегабайтах : " . round($fileSize / 1024 / 1024, 2) . "<br>";
echo " гігабайтах : " . round($fileSize / 1024 / 1024 / 1024, 2) . "<br>";

// Створіть файл 'test2.txt'
$file2 = fopen('backend/storage/test2.txt', 'w');
fclose($file2);

// Видаліть 'test.2.txt'
unlink('backend/storage/test2.txt');

// Створіть папку TestDir
$testDir = 'backend/storage/TestDir';
if (!is_dir($testDir)) {
    mkdir($testDir, 0777, true);
}

// Дано масив ['test1','test2','test3'], створіть у папці Test папки, назвами яких слугують рядки масиву 
$folders = ['test1', 'test2', 'test3'];

// Створіть у кожній вкладеній у TestDir папці, файл Hello.txt, у кожен із них запишіть рядок "Hello world", виведіть на екран вміст усіх файлів.
foreach ($folders as $folder) {
    $folderPath = $testDir . '/' . $folder;
    if (!is_dir($folderPath)) {
        mkdir($folderPath);
    }
    $file3 = fopen($folderPath . '/Hello.txt', 'w'); 
    if ($file3) {
        fwrite($file3, 'Hello world');
        fclose($file3); 
    } else {
        echo "Не удалось создать файл в папке: $folderPath<br>";
    }
}

foreach ($folders as $folder) {
    $filePath = $testDir . '/' . $folder . '/Hello.txt';
    if (file_exists($filePath)) {
        echo "Содержимое '$filePath': " . file_get_contents($filePath) . "<br>";
    } else {
        echo "Файл '$filePath' не найден.<br>";
    }
}

// Напишіть функцію, яка приймає назву файлу або папки і перевіряє, чи є передане значення файлом або папкою (повернути рядок)
function checkType($path) {
    if (is_dir($path)){
        return "папка";
    } elseif (is_file($path)){
        return "файл";
    } else{
        return "Не найдено";
    }
    };

    echo "Проверка TestDir: " . checkType($testDir) . "<br>";


// Timestamp: time та mktime
// Для вирішення завдань цього блоку вам знадобляться такі функції: time, mktime.
//   Виведіть поточний час у форматі timestamp.
echo "поточний час у форматі timestamp: " . time() . "<br>";

//   Виведіть 1 березня 2025 року у форматі timestamp.
echo "1 березня 2025 року у форматі timestamp: " . mktime(0, 0, 0, 3, 1, 2025) . "<br>";

//   Виведіть 31 грудня поточного року у форматі timestamp. Скрипт повинен працювати незалежно від року, коли він запущений.
echo "31 грудня поточного року у форматі timestamp: " . mktime(0, 0, 0, 12, 31, date('Y')) . "<br>";


//   Знайдіть кількість секунд, що пройшли з 13:12:59 15 березня 2000 року до теперішнього часу.
$date = mktime(13, 12, 59, 3, 15, 2000);
$now = time();
echo "кількість секунд, що пройшли з 13:12:59 15 березня 2000 року до теперішнього часу: " . ($now - $date) . "<br>";

//   Знайдіть кількість годин, що пройшли з 7:23:48 поточного дня до цього часу.
$time = mktime(7, 23, 48);
$sinceHours = ($time - $now) / 3600;
echo "пройшли з 7:23:48: " . floor($sinceHours) . "<br>";


// Функція date
// Для вирішення завдань цього блоку вам знадобляться такі функції: date.
//   Виведіть на екран поточний рік, місяць, день, годину, хвилину, секунду.
echo "год: " . date('Y') . "<br>";
echo "месяц: " . date('m') . "<br>";
echo "день: " . date('d') . "<br>";
echo "час: " . date('H') . "<br>";
echo "минута: " . date('i') . "<br>";
echo "секунда: " . date('s') . "<br>";

//   Виведіть поточну дату-час у форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59'.
echo "в формате '2025-12-31': " . date('Y-m-d') . "<br>";
echo "в формате '31.12.2025': " . date('d.m.Y') . "<br>";
echo "в формате '31.12.13': " . date('d.m.y') . "<br>";
echo "в формате '12:59:59': " . date('H:i:s') . "<br>";

//   За допомогою функцій mktime та date виведіть 12 лютого 2025 року у форматі '12.02.2025'.
$date12 = mktime(0, 0, 0, 2, 12, 2025);
echo "12 лютого 2025 року у форматі '12.02.2025': " . date('d.m.Y', $date12) . "<br>";

//   Створіть масив днів тижня $week. Виведіть на екран назву поточного дня тижня за допомогою масиву $week та функції date. Дізнайтеся, який день тижня був 06.06.2006, у ваш день народження.
$week = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];

echo "Сегодня: " . $week[date('w')] . "<br>";

$dateJune6 = mktime(0, 0, 0, 6, 6, 2006);
echo "06.06.2006 был " . $week[date('w', $dateJune6)] . "<br>";

$birthDate = mktime(0, 0, 0, 4, 20, 2000);
echo "др: " . $week[date('w', $birthDate)] . "<br>";

//   Створіть масив місяців $month. Виведіть на екран назву поточного місяця за допомогою масиву $month та функції date.
$months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

echo "текущий месяц: " . $months[date('n') - 1] . "<br>";

//   Знайдіть кількість днів у поточному місяці. Скрипт повинен працювати незалежно від місяця, коли він запущений.
echo "кількість днів у поточному місяці: " . date('t') . "<br>";


//   Зробіть поле введення, в яке користувач вводить рік (4 цифри), а скрипт визначає чи високосний рік.
?>

<form method="POST">
    Введите год: <input type="number" name="year" required>
    <button type="submit">Проверить</button>
</form>

<?php
function isLeap($year) {
    return date("L", mktime(0, 0, 0, 7, 7, $year));
}

if (isset($_POST['year'])) {
    $year = (int)$_POST['year'];
    
    if (isLeap($year)) {
        echo "$year - високосный <br>";
    } else {
        echo "$year - не високосный <br>";
    }
}


//   Зробіть форму, яка запитує дату у форматі '31.12.2025'. За допомогою mktime та explode переведіть цю дату у формат timestamp. Дізнайтесь день тижня (словом) за введену дату.
?>

<form method="post">
        Введите дату: 
        <input type="text" name="date" placeholder="дд.мм.гггг">
        <input type="submit" value=" день недели">
    </form>

<?php

if (isset($_POST['date'])) {
    $date = $_POST['date'];

    if (preg_match('/^\d{2}\.\d{2}\.\d{4}$/', $date)) {
        $parts = explode('.', $date);

        if (count($parts) === 3) {
            $timestamp = mktime(0, 0, 0, $parts[1], $parts[0], $parts[2]);

            $dayOfWeek = date('w', $timestamp);
            echo "День недели: " . $week[$dayOfWeek];
        } else {
            echo "Ошибка: неверный формат даты.";
        }
    } else {
        echo "Ошибка: введите дату в формате дд.мм.гггг.";
    }
}

//   Зробіть форму, яка запитує дату у форматі '2025-12-31'. За допомогою mktime та explode переведіть цю дату у формат timestamp. Дізнайтесь місяць (словом) за введену дату.
?>
    <form method="post">
        Введите дату: 
        <input type="text" name="date" placeholder="гггг-мм-дд">
        <input type="submit" value="узнать месяц">
    </form>

<?php

if (isset($_POST['date'])) {
    $date = $_POST['date'];

    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        $parts = explode('-', $date);

        if (count($parts) === 3) {
    
            $timestamp = mktime(0, 0, 0, $parts[1], $parts[2], $parts[0]);
            $monthNumber = date('n', $timestamp);
            echo "Месяц: " . $months[$monthNumber - 1]; 
        } else {
            echo "Ошибка: неверный формат даты.";
        }
    } else {
        echo "Ошибка: введите дату в формате гггг-мм-дд";
    }
}



// Порівняння дат
//   Зробіть форму, яка запитує дві дати у форматі '2025-12-31'. Першу дату запишіть у змінну $date1, а другу в $date2. Порівняйте, яка із введених дат більше. Виведіть її на екран.
?>
<form method="post">
    Введите первую дату (гггг-мм-дд): <input type="text" name="date1" placeholder="2025-12-31">
    Введите вторую дату (гггг-мм-дд): <input type="text" name="date2" placeholder="2025-12-31">
    <button type="submit">Сравнить даты</button>
</form>

<?php

if (isset($_POST['date1']) && isset($_POST['date2'])) {
    $date1 = strtotime($_POST['date1']);
    $date2 = strtotime($_POST['date2']);

    if ($date1 && $date2) { 
        if ($date1 > $date2) {
            echo "Дата {$_POST['date1']} больше, чем {$_POST['date2']}.<br>";
        } elseif ($date1 < $date2) {
            echo "Дата {$_POST['date2']} больше, чем {$_POST['date1']}.<br>";
        } else {
            echo "Даты равны.<br>";
        }
    } else {
        echo "Неверный формат даты.<br>";
    }
}
// На strtotime
// Для вирішення завдань цього блоку вам знадобляться такі функції: strtotime.
//   Дана дата у форматі '2025-12-31'. За допомогою функції strtotime та date перетворіть її на формат '31-12-2025'.
$dateStr = '2025-12-31';
$timestamp = strtotime($dateStr);
echo "Дата в формате '31-12-2025': " . date('d-m-Y', $timestamp) . "<br>";

//   Зробіть форму, яка запитує дату-час у форматі '2025-12-31T12:13:59'. За допомогою функції strtotime та функції date перетворіть її на формат '12:13:59 31.12.2025'.
if (isset($_POST['datetime'])) {
    $datetime = $_POST['datetime'];
    $timestamp = strtotime($datetime);
    echo "Дата и время в формате '12:13:59 31.12.2025': " . date('H:i:s d.m.Y', $timestamp) . "<br>";
}
?>

<form method="POST">
    Введите дату-время (гггг-мм-ддTчч:мм:сс): <input type="text" name="datetime" placeholder="2025-12-31T12:13:59">
    <button type="submit">Преобразовать</button>
</form>

<?php
// Додаток та забирання дат
// Для вирішення завдань цього блоку вам знадобляться такі функції: date_create, date_modify, date_format.
//   У змінній $date лежить дата у форматі '2025-12-31'. Додайте до цієї дати 2 дні, 1 місяць та 3 дні, 1 рік. Заберіть від цієї дати 3 дні.

$date = date_create('2025-12-31');

date_modify($date, '+2 days');
date_modify($date, '+1 month');
date_modify($date, '+3 days');
date_modify($date, '+1 year');
echo "Дата после добавления: " . date_format($date, 'Y-m-d') . "<br>";


date_modify($date, '-3 days');
echo "Дата после вычитания 3 дней: " . date_format($date, 'Y-m-d') . "<br>";


// Завдання
//   Дізнайтеся, скільки днів залишилося до Нового Року. Скрипт має працювати у будь-якому році.

$now = time();
$newYear = mktime(0, 0, 0, 1, 1, date('Y') + 1);
$daysUntilNewYear = ($newYear - $now) / (60 * 60 * 24);
echo "До Нового Года осталось: " . floor($daysUntilNewYear) . " дней.<br>";

//   Зробіть форму з одним полем введення, яке користувач вводить рік. Знайдіть усі п'ятниці 13-те цього року. Результат виведіть у вигляді масиву дат.

if (isset($_POST['year_friday'])) {
    $year = (int)$_POST['year_friday'];
    $fridays13 = [];

    for ($month = 1; $month <= 12; $month++) {
        $date = mktime(0, 0, 0, $month, 13, $year);
        if (date('w', $date) == 5) {  
            $fridays13[] = date('d.m.Y', $date);
        }
    }

    echo "Пятницы 13-го в году $year: " . implode(', ', $fridays13) . "<br>";
}
?>

<form method="POST">
    Введите год: <input type="number" name="year_friday" placeholder="2024">
    <button type="submit">Найти пятницы 13-е</button>
</form>

<?php
//   Дізнайтеся, який день тижня був 100 днів тому.
$timestamp100DaysAgo = strtotime('-100 days');
echo "100 дней назад был: " . $week[date('w', $timestamp100DaysAgo)] . "<br>";
?>
