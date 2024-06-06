@extends("default")

@section("content")

<div class="HeaderTest" align=center>
    <h2>Редактор блога</h2>
</div>

<form id="form" class="namingIsMyMiddleNameForm" enctype="multipart/form-data" method="post" action="{{ route('blogUpload.upload') }}">
    @csrf
    <div class="blogInputForm">
        <br><br>
        <label for="file">Выберите файл</label>
        <br><br>
        <input type="file" id="file" name="file">

        <br><br>
        <input type="submit" value="Отправить">

        <br><br><br><br>
        <a href="./blogDownload">Скачать записи блога</a>
    </div>
</form>
@endsection
