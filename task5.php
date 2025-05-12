<?php
// task5.php

// 1) Путь к директории с картинками
$dir = 'image/';

// 2) Сканируем папку и фильтруем только JPG/JPEG
$files = scandir($dir);
if ($files === false) {
    $files = [];
}
$images = array_filter($files, function($file) use ($dir) {
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return is_file($dir . $file) && in_array($ext, ['jpg', 'jpeg']);
});
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Task 5: Галерея котиков</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; }
        header { background: #f4f4f4; padding: 20px; }
        nav { text-align: center; }
        nav a { text-decoration: none; color: #333; margin: 0 10px; }
        main { max-width: 1000px; margin: 20px auto; padding: 0 10px; }
        h1 { margin-bottom: 5px; }
        .subtitle { color: #888; margin-top: 0; margin-bottom: 20px; }
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .gallery-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        footer {
            background: #f4f4f4;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
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
    <!-- Хедер с меню -->
    <header>
        <nav>
            <a href="#">About Cats</a> | 
            <a href="#">News</a> | 
            <a href="#">Contacts</a>
        </nav>
    </header>

    <!-- Основной контент -->
    <main>
        <h1>#cats</h1>
        <p class="subtitle">Explore a world of cats</p>
        <div class="gallery">
            <?php foreach ($images as $img): ?>
                <div class="gallery-item">
                    <img src="<?= htmlspecialchars($dir . $img) ?>"
                         alt="<?= htmlspecialchars(pathinfo($img, PATHINFO_FILENAME)) ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- Футер -->
    <footer>
        USM &copy; <?= date('Y') ?>
    </footer>

</body>
</html>
