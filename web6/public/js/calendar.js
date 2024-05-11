function generateCalendar(month, year) {
  let result = '';
  let curTime = new Date();
  let months = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

  result += '<h4 class="datetimepicker-header-close" onclick="closeDatePicker(this)">Закрыть</h4>';
  result += '<div class="datetimepicker-wrapper" id="wrapper">';
  result += '<div class="datetimepicker-header">';
  result += '<h1 class="datetimepicker-title">Выберите дату</h1>';
  result += '</div>';
  result += '<div class="datetimepicker-body">';
  result += '<div class="row">';
  result += '<div class="col">';
  result += '<select class="form-control datetimepicker-month" onchange="datePickerMonthChange(this)">';

  for (let index in months)
    if (index == month)
      result += `<option value="${index}" selected>${months[index]}</option>`;
    else
      result += `<option value="${index}">${months[index]}</option>`;

  result += '</select>';
  result += '</div>';
  result += '<div class="col">';
  result += '<input type="number" class="form-control datetimepicker-year" value="' + year + '" onchange="datePickerYearChange(this)"/>';
  result += '</div>';
  result += '</div>';
  result += '<div class="row"><div class="col-sm-12">';
  result += '<table class="table"><tbody class="datetimepicker-datetablebody"></tbody></table>';
  result += '</div></div>';
  result += '</div>';
  result += '</div>';
  result += '';



  return result;
}

function generateDateTableBody(month, year) {
  let result = '';
  let counter = 0;
  let curDate = new Date(year, month, 1, 0, 0, 0, 0);
  let startDatOffset = curDate.getDay() * -1 + 2;

  for (let week = 0; week < 6; week++) {
    result += '<tr>';

    for (let day = 0; day < 7; day++) {

      let d = new Date(year, month, counter + startDatOffset, 0, 0, 0, 0);
      if (d.getMonth() == month)
        result += `<td class="datetimepicker-curmonth" data-month="${d.getMonth()}" data-year="${d.getFullYear()}" onclick="dayClick(this)">${d.getDate()}</td>`;
      else
        result += `<td class="datetimepicker-not-curmonth" data-month="${d.getMonth()}" data-year="${d.getFullYear()}" onclick="dayClick(this)">${d.getDate()}</td>`;

      counter++;
    }

    result += '</tr>';
  }

  return result;
}

function startDatePickerMonth() {
  var e = document.getElementById("selector");
  datePickerMonthChange(e);
}

function datePickerMonthChange(e) {
  let month = e.options[e.selectedIndex].value;
  let wrapper = e.closest(`.datetimepicker-wrapper`);
  let tableBody = wrapper.getElementsByClassName('datetimepicker-datetablebody')[0];
  let yearSelector = wrapper.getElementsByClassName('datetimepicker-year')[0];
  tableBody.innerHTML = generateDateTableBody(parseInt(month), parseInt(yearSelector.value));
}

function datePickerYearChange(e) {
  let year = parseInt(e.value);
  let wrapper = e.closest(`.datetimepicker-wrapper`);
  let tableBody = wrapper.getElementsByClassName('datetimepicker-datetablebody')[0];
  let monthSelector = wrapper.getElementsByClassName('datetimepicker-month')[0];
  tableBody.innerHTML = generateDateTableBody(parseInt(monthSelector.options[monthSelector.selectedIndex].value), year);
}

function dayClick(e) {
  let wrapper = e.closest(`.datetimepicker-wrapper`);
  let curDate = new Date(parseInt(e.dataset.year), parseInt(e.dataset.month), parseInt(e.innerHTML), 0, 0, 0, 0);
  wrapper.parentNode.selectCB(curDate.getDate() + " " + (curDate.getMonth() + 1) + " " + curDate.getFullYear());
  closeDatePicker(e)
}

function datePicker(wrapper, cb, startDate = null) {
  let curDate = new Date();

  if (startDate !== null)
    curDate = new Date(startDate);

  wrapper.innerHTML = generateCalendar(curDate.getMonth(), curDate.getFullYear());
  wrapper.selectCB = cb;
  generateDateTableBody(curDate.getMonth(), curDate.getFullYear());
}

function closeDatePicker(e) {
  label = document.getElementById("label");
  label.style.display = "flex";
  e.closest(`.datetimepicker-wrapper`).remove();
}

function calendarCB(date) {
  document.getElementById('dateInput').value = date;
}

function showCalend() {
  label = document.getElementById("label");
  label.style.display = "none";
  datePicker(document.getElementById('datePickerWrapper'), calendarCB);

}