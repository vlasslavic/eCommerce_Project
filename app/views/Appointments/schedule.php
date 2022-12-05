<?php require  APPROOT . '/views/includes/header.php'; ?>

<!-- <input data-provide="datepicker">-->
<div class="container">
  
    <div class=" fs-1 my-5"> 
      <a href="#" class="text-decoration-none pointer text-dark me-5"><i class="bi bi-arrow-left"></i></a>BMW LAVAL - Oil Change - 1:00 h - 120$
    </div>

  <hr class="mb-5">
  <div class="d-flex flex-row align-items-top justify-content-around">

    <div id="myCalendarWrapper"></div>  
    <div class="d-flex flex-column">
              <label for="time" id="timeLabel" class="form-label fs-4 mb-4"><strong>Select Time:</strong></label>
                <select class="form-select bg-light fs-4 text-center" size="9"  name="time"  id="time"  style=" background:black;">
                    <option value="9">9:00</option>
                    <option value="10">10:00</option>
                    <option value="11">11:00</option>
                    <option value="12">12:00</option>
                    <option value="13">13:00</option>
                    <option value="14">14:00</option>
                    <option value="15">15:00</option>
                    <option value="16">16:00</option>
                </select>
                <input  hidden id="current-date" name="current-date" >
                <input  class="rounded" id="finalDateTime" name="finalDateTime" >
                <button class="btn btn-warning btn-lg"><i class="bi bi-calendar-check"></i> Schedule</button>
        </div>
</div> 


<script>
const nextYear = new Date().getFullYear() + 1;
const myCalender = new CalendarPicker('#myCalendarWrapper', {
   // If max < min or min > max then the only available day will be today.
   min: new Date(),
   max: new Date(nextYear, 10), // NOTE: new Date(nextYear, 10) is "Nov 01 nextYear"
   locale: 'en-CA', // Can be any locale or language code supported by Intl.DateTimeFormat, defaults to 'en-US'
   showShortWeekdays: false // Can be used to fit calendar onto smaller (mobile) screens, defaults to false
});
 
const currentDateElement = document.getElementById('current-date');
currentDateElement.value  = myCalender.value;
 
const currentDayElement = document.getElementById('current-day');
currentDayElement.textContent = myCalender.value.getDay();
 
const currentToDateString = document.getElementById('current-datestring');
currentToDateString.textContent = myCalender.value.toDateString();

</script>
<script>
    myCalender.onValueChange((currentValue) => {
   currentDateElement.value  = currentValue;
   currentDayElement.textContent = currentValue.getDay();
   currentToDateString.textContent = currentValue.toDateString();
   console.log(`The current value of the calendar is: ${currentValue}`);

   
});</script>
<script>

$( "#time" ).change(function checkSelect() {
    var numOfHours = $("#time").val();
    var date = new Date($("#current-date").val());
    date.setTime(date.getTime() + numOfHours * 60 * 60 * 1000);
    $("#finalDateTime").val(date);
});


</script>


<?php require APPROOT . '/views/includes/footer.php'?>