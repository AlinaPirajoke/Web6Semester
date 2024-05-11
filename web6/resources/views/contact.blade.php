@extends("default")

@section("content")
    <script src="js/contact.js"></script>
    <div class="middleDiv">
        <div class="form">
            <h1>Оставьте контакты о себе!</h1>
            <form method=post action="/contact">
                @csrf
                <div>
                    <p>Ваше ФИО</p>
                    <input name="fio" id="fio" type=text placeholder="Введите ФИО"></input>
                </div>
                <div>
                    <p>Ваш пол</p>
                    <input name="radio" type=radio value="m">Мужской</input>
                    <input name="radio" type=radio value="f">Женский</input>
                    <input name="radio" type=radio value="o">Другой</input>
                </div>
                <div>
                    <p>Ваша дата рождения</p>
                    <input type="text" name="birthday" id="dateInput" class="form-control"/>
                    <div class="container">
                        <span id="datePickerWrapper"></span><a class="btn btn-primary" id="label"
                                                               onclick="showCalend(this)">Открыть календарь</a>
                    </div>
                </div>
                <div>
                    <p>Ваш email</p>
                    <input name="mail" type=text placeholder="Введите email"></input>
                </div>
                <div>
                    <p>Ваш телефон</p>
                    <input name="phone" id="phone" type="number" placeholder="Введите телефон"></input>
                </div>
                <div style="margin-top: 20px; display:inline-block">
                    <button type=submit value="Проверить">Отправить</button>
                    <button type=button onClick="action" value="Очистить">Очистить</button>
                </div>
            </form>
            <?php
            echo $errors;
            ?>
        </div>
    </div>
@endsection
