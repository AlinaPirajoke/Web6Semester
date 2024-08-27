@extends("default")

@section("content")

<div class="HeaderTest" align=center>
    <h2>Регистрация</h2>
</div>

<form method="POST" class="namingIsMyMiddleNameForm" action="{{ route('register') }}" style="margin: 0 auto; width: 200px;background-color: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 5px">
    @csrf


    <div style="margin-bottom: 20px">
        <label for="name">
            ФИО
        </label>
        <input id="name" name="name" required />
        @if($errors->has('name'))
            <p style="color: red">{{ $errors->get('name')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="email">
            Почта
        </label>
        <input id="email" type="email" name="email" required autofocus />
        @if($errors->has('email'))
            <p style="color: red">{{ $errors->get('email')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="login">
            Логи
        </label>
        <input id="login" type="text" name="login" required />
        @if($errors->has('login'))
            <p style="color: red">{{ $errors->get('login')[0] }}</p>
        @endif
    </div>

    <div style="margin-bottom: 20px">
        <label for="password">
            Пароль
        </label>
        <input id="email" type="password" name="password" required />
        @if($errors->has('password'))
            <p style="color: red">{{ $errors->get('password')[0] }}</p>
        @endif
    </div>

    <div>
        <button>
            Зарегистрироваться
        </button>
    </div>
</form>
@endsection
