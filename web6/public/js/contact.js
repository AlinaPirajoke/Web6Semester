
window.addEventListener('load', () => {
    var phoneInput = document.getElementById("phone");
    phoneInput.addEventListener("blur", validatePhoneInput);
    var nameInput = document.getElementById("fio");
    nameInput.addEventListener("blur", validateNameInput);
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        var fio = document.querySelector('input[name="fio"]');
        var radio = document.querySelector('input[type=radio]:checked');
        var birthday = document.querySelector('input[id="dateInput"]');
        var mail = document.querySelector('input[name="mail"]');
        var phone = document.querySelector('input[name="phone"]');

        if (!fio.value) {
            alert('Пожалуйста, введите ваше ФИО.');
            fio.focus();
            return;
        }
        console.log(birthday);
        if (radio == null) {
            alert('Пожалуйста, выберите ваш пол.');
            return;
        }
        if (!birthday.value) {
            alert('Пожалуйста, выберите ваш возраст.');
            select.focus();
            return;
        }

        if (!mail.value) {
            alert('Пожалуйста, введите ваш email.');
            mail.focus();
            return;
        }


        if (!isValidName(fio.value)) {
            alert('Пожалуйста, введите корректные фамилию, имя и отчество');
            fio.focus();
            return;
        }

        if (!isValidPhone(phone.value)) {
            alert('Телефон должен состоять только из цифр, начинаться с "+7" или "+3", не содержать пробелов и содержать от 9 до 11 цифр.');
            phone.focus();
            return;
        }
        console.log("finish");
        this.submit();
    });
});

function isValidName(name) {
    var words = name.split(' ');
    return (words.length == 3);
    //return true;
}

function isValidPhone(phone) {

    if (phone.length < 9 || phone.length > 12) {
        console.log("Проёб по 1му пункту")
        return false;
    }

    if (phone.indexOf(' ') !== -1) {
        console.log("Проёб по 2му пункту")
        return false;
    }

    if (!(phone.indexOf('+7') !== 0 || phone.indexOf('+3') !== 0)) {
        console.log("Проёб по 3му пункту")
        return false;
    }

    for (var i = 2; i < phone.length; i++) {
        if (isNaN(phone[i])) {
            console.log("Проёб по 4му пункту")
            return false;
        }
    }

    console.log("Всё хорошо")

    return true;
}

function validatePhoneInput() {
    var input = document.getElementById("phone");
    var value = input.value;

    if (value === "") {
      // Если поле пустое, удаляем любые предыдущие классы
      input.classList.remove("valid");
      input.classList.remove("invalid");
    } else if (isValidPhone(value)) {
      // Если данные введены корректно, устанавливаем класс "valid"
      input.classList.remove("invalid");
      input.classList.add("valid");
    } else {
      // Если данные введены некорректно, устанавливаем класс "invalid"
      input.classList.remove("valid");
      input.classList.add("invalid");
    }
  }

  function validateNameInput() {
    var input = document.getElementById("fio");
    var value = input.value;

    if (value === "") {
      // Если поле пустое, удаляем любые предыдущие классы
      input.classList.remove("valid");
      input.classList.remove("invalid");
    } else if (isValidName(value)) {
      // Если данные введены корректно, устанавливаем класс "valid"
      input.classList.remove("invalid");
      input.classList.add("valid");
    } else {
      // Если данные введены некорректно, устанавливаем класс "invalid"
      input.classList.remove("valid");
      input.classList.add("invalid");
    }
  }

