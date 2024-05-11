$(document).ready(function () {
    $('#form').submit(function (event) {

        var formElements = this.elements;
        for (var i = 0; i < formElements.length; i++) {
            if (formElements[i].type === 'radio') {
                var radioGroup = document.getElementsByName(formElements[i].name);
                var isChecked = Array.prototype.slice.call(radioGroup).some(x => x.checked);
                if (!isChecked) {
                    alert('Пожалуйста, выберите один из вариантов ответа.');
                    radioGroup[0].focus();
                    event.preventDefault();
                    return false;
                }
            } else if (formElements[i].type === 'select-one') {
                if (formElements[i].value === '') {
                    alert('Пожалуйста, выберите один из вариантов из списка.');
                    formElements[i].focus();
                    event.preventDefault();
                    return false;
                }
            } else if (formElements[i].type === 'textarea') {
                if (formElements[i].value.trim() === '') {
                    alert('Пожалуйста, заполните все поля.');
                    formElements[i].focus();
                    event.preventDefault();
                    return false;
                }
                if (formElements[i].id === "3rd answer" && !checkLen(formElements[i].value)){
                    alert('Ответ должен быть больше 35 слов.');
                    formElements[i].focus();
                    event.preventDefault();
                    return false;
                }
            }
        }
    });
});

function checkLen(string) {
    var words = string.split(' ');
    console.log(words)
    return (words.length > 35);
}
