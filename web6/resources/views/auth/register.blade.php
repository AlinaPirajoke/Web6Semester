@extends("default")

@section("content")

<script>
    const checkLoginUnique = () => {
        const btn = document.getElementById('submit-btn')
        const loginField = document.getElementById('login')

        const params = new URLSearchParams()

        // params.set('login', loginField.value)

        btn.disabled = false

        fetch("{{ route('checkLogin')}}?login=" + loginField.value)
            .then(res => res.json())
            .then(res => {
                console.log('success');
                btn.disabled = !res.data.is_unique;
                
                // if(res.data.is_unique){
                //     btn.textContent = "Логин занят!";
                // } else {
                //     btn.textContent = "Зарегистрироваться";
                // } todo заставить работать!
                
            })
            .catch(error => {
                console.error('Ошибка:', error);
            });
    }
</script>

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
            Логин
        </label>
        <input id="login" type="text" name="login" required onblur="checkLoginUnique(event)" />
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
        <button id="submit-btn" disabled>
            Зарегистрироваться
        </button>
    </div>
</form>
@endsection