<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
{{--    <LINK REL="img" TYPE="text/css" HREF="{{ HTML::style('css/app.css') }}">--}}
    <title>Рузманов Владислав</title>
    <script src="{{URL::asset('js/default.js')}}"></script>
</head>
<body>
<div class="lonely" id="date">
    <p id="dateLabel">asdf</p>
</div>
<header class="header">
    <nav>
        <ol>
            <div style="float:left" class="headerText">
                <li class="headerPage"><a href="./main">Главная</a></li>
                <li class="headerPage"><a href="./about">Обо мне</a></li>
                <li class="dropdown">
                    <a href="./interests">Мои интересы</a>
                    <ol class="dropdown-content">
                        <li><a href="./interests#Программирование">Программирование</a></li>
                        <li><a href="./interests#Изучение языков">Изучение языков</a></li>
                        <li><a href="./interests#Глубокое обучение">Глубокое обучение</a></li>
                    </ol>
                </li>
            </div>
            <div style="float:left" class="headerText">
                <li class="headerPage"><a href="./studying">Учеба</a></li>
                <li class="headerPage"><a href="./photo">Фотоальбом</a></li>
                <li class="headerPage"><a href="./contact">Контакт</a></li>
            </div>
            <div style="float:left" class="headerText">
                <li class="headerPage"><a href="./test">Тест по основам дискретной математики</a></li>
                <li class="headerPage"><a href="./history">История</a></li>
                <li class="headerPage"><a href="./guest_book/main">Гостевая книга</a></li>
            </div>
            <div style="float:left" class="headerText">
                <li class="headerPage"><a href="./guest_book/upload">Записи гостевой книги</a></li>
                <li class="headerPage"><a href="./testAnswer">Результаты теста</a></li>
                <li class="headerPage"><a href="./blog">Блог</a></li>
            </div>
            <div style="float:left" class="headerText">
                <li class="headerPage"><a href="./blogUpload">Блог редактор</a></li>
                <!-- <li class="headerPage"><a href="./blogDownload">Блог загрузка</a></li> -->
            </div>
        </ol>
    </nav>
</header>
@yield("content")
</body>
</html>
