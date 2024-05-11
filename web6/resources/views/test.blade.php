@extends("default")

@section("content")
    <script src="js/test.js"></script>
    <div class="middleDiv">
        <div class="form">
            <h1>Пройдите тест по основам дискретной математики!<br></h1>
            <form method=post action="/test">
                @csrf
                <div>
                    <p>Каково количество различных перестановок букв в слове “MATH”?</p>
                    <input name="math" type=radio value="6">6</input>
                    <input name="math" type=radio value="12">12</input>
                    <input name="math" type=radio value="24">24</input>
                    <input name="math" type=radio value="120">120</input>
                </div>
                <div>
                    <p>Какое максимальное количество ребер может быть в простом графе с n вершинами?</p>
                    <select name="graph_option" size=1>
                        <option value=1>n - 1
                        <option value=2>n(n - 1) / 2
                        <option value=3>n(n + 1) / 2
                        <option value=4>n^2 - n
                        <option value=5>n^2 + n
                    </select>
                </div>
                <div>
                    <p>Каково количество различных графов, которые можно построить на множестве из 3 вершин?</p>
                    <textarea name="graph_text" rows=2 placeholder="Ответ" id="3rd answer">
                        </textarea>
                </div>
                <div>
                    <p>Введите ваше фио</p>
                    <textarea name="fio" placeholder="Ответ">
                        </textarea>
                </div>
                <div>
                    <p>Введите вашу группу</p>
                    <select name="group" size=1>
                        <option value=1>ИС/б-21-1-о</option>
                        <option value=2>ИС/б-21-2-о</option>
                        <option value=3>ИС/б-21-3-о</option>
                        <option value=4>ПИ/б-21-1-о</option>
                        <option value=5>ИС/б-20-1-о</option>
                        <option value=6>ИС/б-20-2-о</option>
                        <option value=7>ИС/б-20-3-о</option>
                        <option value=8>ПИ/б-20-1-о</option>
                    </select>
                </div>
                <div class="def_margin_top">
                    <button type=submit value="Проверить">Отправить</button>
                    <button type=button onClick="window.location.reload();" value="Очистить">Очистить</button>
                </div>
            </form>
            <div class="def_margin_top">
            <?php
            if ($result != "") {
                echo $result;
            } else {
                echo $errors;
            }
            ?>
            </div>
        </div>
    </div>
@endsection
