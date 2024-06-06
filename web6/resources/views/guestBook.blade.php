@extends("default")

@section("content")
    <div class="text" align="center">
        <h1>Гостевая книга</h1>
    </div>

    <div class="middleDiv">
        <div class="form">
            <form id="form" method="post" action="{{ route('guestBook.store') }}">
                @csrf
                <div class="guestBookInputForm">
                    <div class="guestBook1">
                        <label><p>Фамилия</p></label>
                        <input type="text" name="surname" required>
                    </div>
                    <div class="guestBook2">
                        <label><p>Имя</p></label>
                        <input type="text" name="name" required>
                    </div>
                    <div class="guestBook3">
                        <label><p>Отчество</p></label>
                        <input type="text" name="patronymic" required>
                    </div>
                    <div class="guestBook4">
                        <label><p>E-mail</p></label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="guestBook5">
                        <label><p>Текст отзыва</p></label>
                        <textarea name="message" rows="5" required></textarea>
                    </div>
                    <div class="guestBookButton" style="height: 30px">
                        <input type="submit" value="Отправить">
                    </div>
                </div>
            </form>
        </div>
        <div class="def_margin_left">
        <table class="table">
            <thead>
            <tr>
                <th>Дата</th>
                <th>ФИО</th>
                <th>E-mail</th>
                <th>Текст отзыва</th>
            </tr>
            </thead>
            <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message['date'] }}</td>
                    <td>{{ $message['name'] }}</td>
                    <td>{{ $message['email'] }}</td>
                    <td>{{ $message['message'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="namingIsMyMiddleNamePagination">
            {{ $messages->links() }}
        </div>
        </div>
    </div>
@endsection
