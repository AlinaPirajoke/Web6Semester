@extends("default")

@section("content")
    <script src="scripts/history.js"></script>
    <h2>История за все время</h2>
    <table id="sessionHistory">
        <tr>
            <th>Страница-1</th>
            <th>Количество посещений</th>
        </tr>
        <!-- Таблица для истории текущего сеанса будет здесь -->
    </table>

    <h2>История текущего сеанса</h2>
    <table id="allTimeHistory">
        <tr>
            <th>Страница-1</th>
            <th>Количество посещений</th>
        </tr>
        <!-- Таблица для истории за все время будет здесь -->
    </table>
@endsection
