<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Конструктор лифта</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="body">
<h1 class="h1">Онлайн-конструктор лифта</h1>
<!-- Ссылки для переключения вкладок -->
<div class="tab-links">
    <div class="tab-link walls active">Стены</div>
    <div class="tab-link ceiling">Потолок</div>
    <div class="tab-link cost">Готовая модель</div>
</div>
<!-- Вкладки -->
<div class="tabs">
    <div class="tab walls active">
        <h2>Стены</h2>
        <ul class="dropdown">
            <li><a href="#" data-price="101">Желтые</a></li>
            <li><a href="#" data-price="100">Красные</a></li>
            <li><a href="#" data-price="10000">Синие</a></li>
            <li><a href="#" data-price="1000">Серые</a></li>
        </ul>
        <button class="next-button">Далее</button>
    </div>
    <div class="tab ceiling" data-tab="ceiling">
        <h2>Потолок</h2>
        <ul class="dropdown">
            <li><a href="#" data-price="100000">Центральная панель</a></li>
            <li><a href="#" data-price="150000">Потолок подвесной</a></li>
            <li><a href="#" data-price="123567">Подвес для ПСБ</a></li>
            <li><a href="#" data-price="1">Потолок подвесной</a></li>
        </ul>
        <button class="prev-button">Назад</button>
        <button class="next-button">Далее</button>
    </div>
    <div class="tab cost">
        <h2>Готовая модель</h2>
        <button class="prev-button">Назад</button>
        <button class="order-button">Оформить заказ</button>
    </div>
    <div class="img">
        <img src="lift.png">
    </div>
</div>

<!-- Всплывающее окно с формой -->
<div class="modal-overlay">
    <div class="modal">
        <h3>Форма заказа</h3>
        <form id="order-form" method="POST" action="footer.php">
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="button" class="close-button">Закрыть</button>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="index.js"></script>
</body>
</html>
