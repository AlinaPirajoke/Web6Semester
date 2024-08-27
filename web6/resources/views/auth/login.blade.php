@extends("default")

@section("content")

<div class="HeaderTest" align=center>
    <h2>Вход</h2>
</div>

<form method="POST" class="namingIsMyMiddleNameForm" action="{{ route('login') }}" style="margin: 0 auto; width: 200px;background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 5px">
    @csrf

    <div style="margin-bottom: 20px">
        <label for="email">
            Почта
        </label>
        <input id="email" type="email" name="email" required autofocus />
    </div>

    <div style="margin-bottom: 20px">
        <label for="password">
            Пароль
        </label>
        <input id="email" type="password" name="password" required />
    </div>

    <div style="margin-bottom: 30px">
        <a href="{{ route('register') }}">
            Регистрация
        </a>
    </div>

    <div>
        <button>
            Войти
        </button>
    </div>
</form>
@endsection