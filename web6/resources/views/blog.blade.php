@extends("default")

@section("content")
<div class="HeaderTest" align=center>
    <h2>Блог</h2>
</div>

<form id="form" class="namingIsMyMiddleNameForm" enctype="multipart/form-data" method="post" action="{{ route('blog.store') }}">
    @csrf
    <div class="blogInputForm">
    <label for="title">Тема сообщения:</label>
        <p><input type="text" name="title" id="title" required></p>

    <label for="image">Изображение:</label>
        <p> <input type="file" name="image" id="image"></p>

    <label for="content">Текст сообщения:</label>
        <p><textarea name="message" id="message" rows="5" required></textarea></p>

        <p><input type="submit" value="Отправить"></p>
    </div>

    <table class="namingIsMyMiddleNameTable">
        <thead>
        <tr>
            <th>Дата</th>
            <th>Заголовок</th>
            <th>Сообщение</th>
            <th>Изображение</th>
        </tr>
        </thead>
        <tbody>

        @foreach($blogPosts as $posts)
            <tr>
                <td>{{ $posts->created_at->format('d.m.Y H:i') }}</td>
                <td>{{ $posts->title }}</td>
                <td>{{ $posts->message }}</td>
                <td>
                    @if ($posts->image)
                        <img src="{{ Storage::url('blog_images/' . $posts->image) }}" alt="{{ $posts->title }}" style="max-width: 40%;">
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="namingIsMyMiddleNamePagination">
        {{ $blogPosts->links() }}
    </div>
</form>
@endsection
