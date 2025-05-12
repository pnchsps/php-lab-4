<?php
// task4.php

// --- Задание 4: Ассоциативные массивы и функции ---

// 1) Исходный массив + ещё 3 транзакции
$transactions = [
    [
        "transaction_id"          => 1,
        "transaction_date"        => "2019-01-01",
        "transaction_amount"      => 100.00,
        "transaction_description" => "Payment for groceries",
        "merchant_name"           => "SuperMart",
    ],
    [
        "transaction_id"          => 2,
        "transaction_date"        => "2020-02-15",
        "transaction_amount"      => 75.50,
        "transaction_description" => "Dinner with friends",
        "merchant_name"           => "Local Restaurant",
    ],
    [
        "transaction_id"          => 3,
        "transaction_date"        => "2021-07-22",
        "transaction_amount"      => 200.00,
        "transaction_description" => "Monthly rent",
        "merchant_name"           => "City Landlord",
    ],
    [
        "transaction_id"          => 4,
        "transaction_date"        => "2022-11-05",
        "transaction_amount"      => 45.25,
        "transaction_description" => "Book purchase",
        "merchant_name"           => "BookStore",
    ],
    [
        "transaction_id"          => 5,
        "transaction_date"        => "2023-03-18",
        "transaction_amount"      => 150.75,
        "transaction_description" => "Electronics repair",
        "merchant_name"           => "FixIt Service",
    ],
];

// 2) Функции для работы с массивом
function calculateTotalAmount(array $tx): float {
    return array_reduce($tx, function($sum, $item) {
        return $sum + $item['transaction_amount'];
    }, 0.0);
}

function calculateAverage(array $tx): float {
    $count = count($tx);
    return $count > 0
        ? calculateTotalAmount($tx) / $count
        : 0.0;
}

function mapTransactionDescriptions(array $tx): array {
    return array_map(fn($item) => $item['transaction_description'], $tx);
}

// Собираем результаты
$totalAmount   = calculateTotalAmount($transactions);
$averageAmount = calculateAverage($transactions);
$descriptions  = mapTransactionDescriptions($transactions);

// --- Дополнительное задание: Класс Transaction и объекты ---
class Transaction {
    public int    $id;
    public string $date;
    public float  $amount;
    public string $description;
    public string $merchant;

    public function __construct(int $id, string $date, float $amount, string $description, string $merchant) {
        $this->id          = $id;
        $this->date        = $date;
        $this->amount      = $amount;
        $this->description = $description;
        $this->merchant    = $merchant;
    }

    public static function calculateTotal(array $txObjects): float {
        return array_reduce($txObjects, fn($sum, $obj) => $sum + $obj->amount, 0.0);
    }

    public static function calculateAverage(array $txObjects): float {
        $count = count($txObjects);
        return $count > 0
            ? self::calculateTotal($txObjects) / $count
            : 0.0;
    }
}

// Массив объектов
$txObjects = [
    new Transaction(1, "2019-01-01", 100.00, "Payment for groceries",   "SuperMart"),
    new Transaction(2, "2020-02-15", 75.50,  "Dinner with friends",     "Local Restaurant"),
    new Transaction(3, "2021-07-22", 200.00, "Monthly rent",            "City Landlord"),
    new Transaction(4, "2022-11-05", 45.25,  "Book purchase",           "BookStore"),
    new Transaction(5, "2023-03-18", 150.75, "Electronics repair",      "FixIt Service"),
];

$totalObj   = Transaction::calculateTotal($txObjects);
$averageObj = Transaction::calculateAverage($txObjects);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Task 4: Транзакции</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; }
        th, td { border: 1px solid #999; padding: 8px; text-align: left; }
        th { background: #a6a6a6; color: #252525; }
        h2 { margin-top: 1.5em; }
        pre { background: #f4f4f4; padding: 10px; }
        .nav-buttons { text-align: center; margin: 20px 0; }
        .nav-buttons a { text-decoration: none; margin: 0 5px; }
        .nav-buttons button {
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="nav-buttons">
  <a href="index.php"><button>Главная</button></a>
</div>
    <h2>Задание 4: Ассоциативные массивы и функции</h2>

    <!-- Таблица исходных транзакций -->
    <table>
        <tr>
            <th>ID</th><th>Дата</th><th>Сумма</th><th>Описание</th><th>Организация</th>
        </tr>
        <?php foreach ($transactions as $t): ?>
        <tr>
            <td><?= htmlspecialchars($t['transaction_id']) ?></td>
            <td><?= htmlspecialchars($t['transaction_date']) ?></td>
            <td><?= number_format($t['transaction_amount'], 2, '.', '') ?></td>
            <td><?= htmlspecialchars($t['transaction_description']) ?></td>
            <td><?= htmlspecialchars($t['merchant_name']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Результаты функций -->
    <p><strong>Общая сумма транзакций:</strong> <?= number_format($totalAmount, 2, '.', '') ?></p>
    <p><strong>Средняя сумма транзакции:</strong> <?= number_format($averageAmount, 2, '.', '') ?></p>

    <h3>Список описаний транзакций:</h3>
    <pre><?= htmlspecialchars(print_r($descriptions, true)) ?></pre>

    <hr>

    <h2>Дополнительное задание: Класс <code>Transaction</code> и объекты</h2>

    <!-- Таблица объектов -->
    <table>
        <tr>
            <th>ID</th><th>Дата</th><th>Сумма</th><th>Описание</th><th>Организация</th>
        </tr>
        <?php foreach ($txObjects as $o): ?>
        <tr>
            <td><?= $o->id ?></td>
            <td><?= $o->date ?></td>
            <td><?= number_format($o->amount, 2, '.', '') ?></td>
            <td><?= htmlspecialchars($o->description) ?></td>
            <td><?= htmlspecialchars($o->merchant) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <p><strong>Общая сумма (классы):</strong> <?= number_format($totalObj, 2, '.', '') ?></p>
    <p><strong>Средняя сумма (классы):</strong> <?= number_format($averageObj, 2, '.', '') ?></p>

</body>
</html>
