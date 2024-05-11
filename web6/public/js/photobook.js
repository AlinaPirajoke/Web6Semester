// function createPhotoTable() {
//     // Предположим, что у вас есть массив URL-адресов изображений
//     let miniImages = ["../images_mini/otter.jpg", "../images_mini/lake1.jpg", "../images_mini/mountains.jpg", "../images_mini/river1.jpg", "../images_mini/lake2.jpg", "../images_mini/river2.png", "../images_mini/lake3.jpg", "../images_mini/lake4.png", "../images_mini/lake5.png", "../images_mini/waterfall.png", "../images_mini/sea.png", "../images_mini/swamp.png", "../images_mini/mountains2.jpg", "../images_mini/river3.png", "../images_mini/forest.png"];
//     let fullImages = ["../images/otter.png", "../images/lake1.jpg", "../images/mountains.jpeg", "../images/river1.jpg", "../images/lake2.jpg", "../images/river2.jpeg", "../images/lake3.jpg", "../images/lake4.jpeg", "../images/lake5.jpg", "../images/waterfall.jpg", "../images/sea.jpg", "../images/swamp.webp", "../images/mountains2.jpg", "../images/river3.jpg", "../images/forest.webp"];
//     let description = ["Выдра", "Озеро и горы", "Цветочки и гора", "Красивое светлое местечко", "Озеро вобще жесть", "Пруд в парке", "Ещё одно озеро, но на восходе", "Озеро, но уже с высоты", "Да сколько тут горных озёр?", "Водопадик", "Море (уже не озеро)", "Болото какое-то", "Мне кажется где-то я это уже видел", "Деревья отражаются в речке", "Поляна"];
//     let mdiv = document.getElementById('photos');
//     let table = document.getElementById('photoTable');
//     mdiv.appendChild(table);
//     let tbody = document.createElement('tbody');
//     table.appendChild(tbody);

//     let row;
//     miniImages.forEach((image, index) => {
//         if (index % 3 === 0) {
//             row = document.createElement('tr');
//             tbody.appendChild(row);
//         }
//         let cell = document.createElement('td');
//         //let link = document.createElement('a');
//         //link.href = fullImages[index]; // Устанавливаем URL-адрес ссылки
//         let img = document.createElement('img');
//         img.src = miniImages[index];
//         img.title = description[index];
//         img.alt = description[index];
//         cell.addEventListener("click", function() {openImage(fullImages[index])});

//         let descr = document.createElement("p");
//         descr.innerText = description[index];

//         //link.appendChild(img); // Добавляем изображение в ссылку
//         //cell.appendChild(link);
//         cell.appendChild(img); // Добавляем ссылку в ячейку
//         cell.appendChild(descr); // Добавляем текст в ячейку
//         row.appendChild(cell);
//     });

// }

// function createPhotoTable2() {
//     var div = document.getElementById("photos");
//     var title = document.createElement("h1");
//     title.innerText = "Мои картинки (Я не любитель снимать себя)";
//     div.appendChild(title);
// }

// function openImage(imageUrl) {
//     // Получаем ссылку на элементы DOM
//     var imageContainer = document.getElementById('imageContainer');
//     var image = document.getElementById('image');

//     // Устанавливаем адрес изображения
//     image.src = imageUrl;

//     // Показываем динамически формируемое окно
//     imageContainer.style.display = 'flex';
// }

// function closeImage() {
//     // Скрываем динамически формируемое окно при клике
//     var imageContainer = document.getElementById('imageContainer');
//     imageContainer.style.display = 'none';
// }

$(document).ready(function () {
  console.log("Запуск!");
  // Предположим, что у вас есть массив URL-адресов изображений
  let miniImages = ["../images_mini/otter.jpg", "../images_mini/lake1.jpg", "../images_mini/mountains.jpg", "../images_mini/river1.jpg", "../images_mini/lake2.jpg", "../images_mini/river2.png", "../images_mini/lake3.jpg", "../images_mini/lake4.png", "../images_mini/lake5.png", "../images_mini/waterfall.png", "../images_mini/sea.png", "../images_mini/swamp.png", "../images_mini/mountains2.jpg", "../images_mini/river3.png", "../images_mini/forest.png"];
  let fullImages = ["../images/otter.png", "../images/lake1.jpg", "../images/mountains.jpeg", "../images/river1.jpg", "../images/lake2.jpg", "../images/river2.jpeg", "../images/lake3.jpg", "../images/lake4.jpeg", "../images/lake5.jpg", "../images/waterfall.jpg", "../images/sea.jpg", "../images/swamp.webp", "../images/mountains2.jpg", "../images/river3.jpg", "../images/forest.webp"];
  let description = ["Выдра", "Озеро и горы", "Цветочки и гора", "Красивое светлое местечко", "Озеро вобще жесть", "Пруд в парке", "Ещё одно озеро, но на восходе", "Озеро, но уже с высоты", "Да сколько тут горных озёр?", "Водопадик", "Море (уже не озеро)", "Болото какое-то", "Мне кажется где-то я это уже видел", "Деревья отражаются в речке", "Поляна"];

  var slider = $("#slider");
  var title = $("#title");

  for (var i = 0; i < miniImages.length; i++) {
    var img = $("<img width='500' height = '400'>").attr({
      src: miniImages[i],
      alt: description[i]
    });
    slider.append(img);
  }

  var currentIndex = 0;
  var slides = $('.slider img');
  var totalSlides = slides.length;

  // Показываем первый слайд (индекс 0)
  slides.eq(currentIndex).show().css({ "opacity": 1 });
  title.html(description[currentIndex]);

  // Обработчик нажатия на кнопку next
  $('#slider-next').click(function () {
    console.log("Переключение вперёд");

    // Скрываем текущий слайд
    slides.eq(currentIndex)
      .animate({ "opacity": 0 }, 700)
      .css({ "opacity": 1 })
      .hide();

    // Увеличиваем индекс текущего слайда на 1
    currentIndex++;

    // Если достигнут конец слайдера, переходим на первый слайд
    if (currentIndex === totalSlides) {
      currentIndex = 0;
    }

    // Показываем следующий слайд
    slides.eq(currentIndex)
      .show()
      .animate({ "opacity": 1 }, { "opacity": 0 }, 1700);
    title.html(description[currentIndex]);
  });

  // Обработчик нажатия на кнопку prev
  $('#slider-prev').click(function () {
    console.log("Переключение назад");
    // Скрываем текущий слайд
    slides.eq(currentIndex)
      .animate({ "opacity": 0 }, 700)
      .css({ "opacity": 1 })
      .hide();
    // Уменьшаем индекс текущего слайда на 1
    currentIndex--;

    // Если достигнуто начало слайдера, переходим на последний слайд
    if (currentIndex < 0) {
      currentIndex = totalSlides - 1;
    }

    // Показываем предыдущий слайд
    slides.eq(currentIndex)
      .show()
      .animate({ "opacity": 1 }, { "opacity": 0 }, 1700);
    title.html(description[currentIndex]);
  });
  console.log("Закончили!");
})



function openImage(imageUrl) {
  // Получаем ссылку на элементы DOM
  var imageContainer = document.getElementById('imageContainer');
  var image = document.getElementById('image');

  // Устанавливаем адрес изображения
  image.src = imageUrl;

  // Показываем динамически формируемое окно
  imageContainer.style.display = 'flex';
}

function closeImage() {
  // Скрываем динамически формируемое окно при клике
  var imageContainer = document.getElementById('imageContainer');
  imageContainer.style.display = 'none';
}