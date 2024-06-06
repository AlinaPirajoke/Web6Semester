@extends("default")

@section("content")

    <div class="text" align="center">
        <h1>Загрузка гостевой книги</h1>
    </div>

    <div class="middleDiv">
        <div class="form">
            <form id="form" method="post"
                  action="{{ route('guestBookUpload.upload') }}">
                @csrf
                <div class="upload">
                    <br><label for="file">Выберите файл</label>
                    <br><input type="file" id="file" name="file">
                    <br><br>
                    <input type="submit" value="Отправить">
                </div>
            </form>
        </div>
    </div>
@endsection
