// Получаем текущий путь страницы и сохраняем в переменную
const currentPage2 = window.location.pathname;

$(document).ready(function () {
    updateSessionHistory(currentPage2);
    updateAllTimeHistory(currentPage2);
    showDate();
});

// Функция для обновления истории текущего сеанса в локальном хранилище
function updateSessionHistory(page) {
    // Получаем данные из локального хранилища или создаем пустой объект, если данных нет
    let sessionHistory = JSON.parse(localStorage.getItem('sessionHistory')) || {};
    // Увеличиваем счетчик посещений текущей страницы в истории текущего сеанса
    sessionHistory[page] = (sessionHistory[page] || 0) + 1;
    // Обновляем данные в локальном хранилище
    localStorage.setItem('sessionHistory', JSON.stringify(sessionHistory));
}

function updateAllTimeHistory(page) {
    // Получаем данные из sessionStorage или создаем пустой объект, если данных нет
    let allTimeHistory = JSON.parse(sessionStorage.getItem('allTimeHistory')) || {};
    // Увеличиваем счетчик посещений текущей страницы в общей истории
    allTimeHistory[page] = (allTimeHistory[page] || 0) + 1;
    // Устанавливаем обновленные данные в sessionStorage
    sessionStorage.setItem('allTimeHistory', JSON.stringify(allTimeHistory));
}

function showDate() {
    var months = ["января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
    var date = new Date();
    var label = document.getElementById('dateLabel')
    console.log(date);
    label.textContent = date.getDate() + " " + months[date.getMonth()] + " " + date.getFullYear();
}