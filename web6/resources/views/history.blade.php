@extends("default")

@section("content")
<br />
<div class="text">
    <h1>Статистика посещений</h1>
</div>
<br />
<table class="namingIsMyMiddleNameTable">
    <thead>
        <tr>
            <th>Дата и время посещения</th>
            <th>Web-страница посещения</th>
            <th>IP-адрес компьютера посетителя</th>
            <th>Имя хоста компьютера посетителя</th>
            <th>Название браузера, который использовал посетитель</th>
        </tr>
    </thead>
    <tbody>

        @foreach($statistics as $statistic)
        <tr>
            <td>{{ $statistic->created_at->format('d.m.Y H:i') }}</td>
            <td>{{ $statistic->page }}</td>
            <td>{{ $statistic->ip }}</td>
            <td>{{ $statistic->host_name }}</td>
            <td>{{ $statistic->browser_name }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="namingIsMyMiddleNamePagination">
    {{ $statistics->links() }}
</div>
@endsection