// Получаем текущий путь страницы и сохраняем в переменную
const currentPage = window.location.pathname; 

// Функция для обновления истории текущего сеанса в локальном хранилище
function updateSessionHistory(page) {
    // Получаем данные из локального хранилища или создаем пустой объект, если данных нет
    let sessionHistory = JSON.parse(localStorage.getItem('sessionHistory')) || {};
    // Увеличиваем счетчик посещений текущей страницы в истории текущего сеанса
    sessionHistory[page] = (sessionHistory[page] || 0) + 1;
    // Обновляем данные в локальном хранилище
    localStorage.setItem('sessionHistory', JSON.stringify(sessionHistory));
}

// Функция для обновления истории за все время в куках
// Функция для обновления истории за все время в sessionStorage
function updateAllTimeHistory(page) {
    // Получаем данные из sessionStorage или создаем пустой объект, если данных нет
    let allTimeHistory = JSON.parse(sessionStorage.getItem('allTimeHistory')) || {};
    // Увеличиваем счетчик посещений текущей страницы в общей истории
    allTimeHistory[page] = (allTimeHistory[page] || 0) + 1;
    // Устанавливаем обновленные данные в sessionStorage
    sessionStorage.setItem('allTimeHistory', JSON.stringify(allTimeHistory));
}


// Обработчик события загрузки страницы
window.addEventListener('load', () => {
    // Обновляем историю текущего сеанса и за все время для текущей страницы
    updateSessionHistory(currentPage);
    updateAllTimeHistory(currentPage);

    // Отображаем историю на странице
    displayHistory();
});

// Функция для отображения истории на странице
function displayHistory() {
    // Получаем данные из локального хранилища и куки
    const sessionHistory = JSON.parse(localStorage.getItem('sessionHistory')) || {};
    const allTimeHistory = JSON.parse(sessionStorage.getItem('allTimeHistory')) || {};

    // Получаем ссылки на таблицы, где будем отображать историю
    const sessionTable = document.getElementById('sessionHistory');
    const allTimeTable = document.getElementById('allTimeHistory');

    // Очищаем таблицы перед обновлением
    sessionTable.innerHTML = '<tr><th>Страница</th><th>Количество посещений</th></tr>';
    allTimeTable.innerHTML = '<tr><th>Страница</th><th>Количество посещений</th></tr>';

    // Заполняем таблицу истории текущего сеанса
    for (const page in sessionHistory) {
        const sessionRow = `<tr><td>${page}</td><td>${sessionHistory[page]}</td></tr>`;
        sessionTable.innerHTML += sessionRow;
    }

    // Заполняем таблицу общей истории за все время
    for (const page in allTimeHistory) {
        const allTimeRow = `<tr><td>${page}</td><td>${allTimeHistory[page]}</td></tr>`;
        allTimeTable.innerHTML += allTimeRow;
    }
}

// Функция для получения значения Cookie по имени
function getCookie(name) {
    // Разбиваем строку cookie на массив итерируемых элементов
    const cookies = document.cookie.split(';');
    // Итерируем по массиву cookie
    for (const cookie of cookies) {
        // Разбиваем каждый cookie на имя и значение
        const [cookieName, cookieValue] = cookie.split('=');
        // Проверяем, соответствует ли имя cookie искомому имени
        if (cookieName.trim() === name) {
            // Возвращаем значение cookie
            return cookieValue;
        }
    }
    // Возвращаем null, если cookie с заданным именем не найдено
    return null;
}


// Функция для установки Cookie
function setCookie(name, value, expirationDays) {
    const date = new Date();
    date.setTime(date.getTime() + (expirationDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
}

