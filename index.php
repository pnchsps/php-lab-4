<?php
// index.php

?>
<style>
  .nav-buttons {
    margin: 20px 0;
    text-align: center;
  }
  .nav-buttons a {
    text-decoration: none;
    margin: 0 5px;
  }
  .nav-buttons button {
    padding: 8px 16px;
    font-size: 14px;
    cursor: pointer;
  }
</style>
<div class="nav-buttons">
  <a href="task4.php"><button>Задание 4</button></a>
  <a href="task5.php"><button>Задание 5</button></a>
</div>

<?php
// --- Задание 1: Цикл for ---
$a = 0;
$b = 0;
echo "<h2>Задание 1: Цикл <code>for</code></h2>";
for ($i = 0; $i <= 5; $i++) {
    $a += 10;
    $b += 5;
    echo "Итерация {$i}: a = {$a}, b = {$b}<br>";
}
echo "Конец цикла for: a = {$a}, b = {$b}<hr>";

// --- Задание 2: Цикл while ---
$a = 0;
$b = 0;
$i = 0;
echo "<h2>Задание 2: Цикл <code>while</code></h2>";
while ($i <= 5) {
    $a += 10;
    $b += 5;
    echo "Итерация {$i}: a = {$a}, b = {$b}<br>";
    $i++;
}
echo "Конец цикла while: a = {$a}, b = {$b}<hr>";

// --- Задание 3: Работа с массивами ---
echo "<h2>Задание 3: Работа с массивами</h2>";
$numbers = [];
for ($j = 0; $j < 10; $j++) {
    $numbers[] = rand(1, 100);
}
echo "Сгенерированный массив:<br><pre>";
print_r($numbers);
echo "</pre><hr>";
