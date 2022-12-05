<?php require  APPROOT . '/views/includes/header.php'; ?>

<!-- <input data-provide="datepicker">-->
<div class="container card">
  <?php if(isset($data->appointment_id)){
    $service = new \app\models\Service();
    $service=$service->get($data->service_id);
    $profile = new \app\models\Profile();
    $profile=$profile->getProfile($service->profile_id);
    $car = new \app\models\Garage();
    $car=$car->get($data->vehicle_id);

    echo'
    <form  method="POST" action="" role="">

    <div id="setCar" class="">
     <div class=" fs-1 my-5" > 
      <a href="'.URLROOT.'Profile/myStore?profile_id='.$profile->profile_id.'" class="text-decoration-none pointer text-dark me-5"><i class="bi bi-arrow-left"></i></a>'.(isset($profile->business_name)?($profile->business_name):'').' - '.(isset($service->service_name)?($service->service_name):'').' - '.(isset($service->duration)?($service->duration):'').'h - $'.(isset($service->service_price)?($service->service_price):'').'
      <div class="text-muted fs-4 ms-5 ps-5" id="vehicleName1">'.$car->year.' '.$car->make.' '.$car->model.'</div>
      </div>

      <hr class="mb-5">
      <div class="d-flex flex-row align-items-top justify-content-around">

        
    
          <div class="d-flex flex-column">
   
              <label for="vehicle" id="vehicleLb" class="form-label fs-4 mb-4"><strong>Change Vehicle:</strong></label>
                <select class="form-select bg-light fs-4 text-center" name="vehicle_id"  id="vehicle_id"  style=" background:black;">
                <option class="text-start" value="'.$car->vehicle_id.'">Current: '.$car->year.' '.$car->make.' '.$car->model.'</option>
                  ';};?>
                  <?php if(isset($data->service_id)){
                    $service = new \app\models\Service();
                    $service=$service->get($data->service_id);
                    $profile = new \app\models\Profile();
                    $profile=$profile->getProfile($service->profile_id);
                    $car = new \app\models\Garage();
                    $car=$car->get($data->vehicle_id);
                    $garage = new \app\models\Garage();
                    $garage = $garage->getAllCars($_SESSION["user_id"]);
                    foreach ($garage as $mycar) { 
                    echo' <option class="text-start" value="'.$mycar->vehicle_id.'">'.$mycar->year.' '.$mycar->make.' '.$mycar->model.'</option>';};  
                 
                    echo'
                </select>
                <input  hidden id="user_id" name="user_id" value="'.(isset($_SESSION['user_id'])?($_SESSION['user_id']):'').'">
                <label for="odometer"  id="odometerLb" class="form-label fs-4 my-4"><strong>Odometer:</strong></label>
                <input class="rounded bg-light fs-4 text-center" value="'.(isset($data->odometer)?($data->odometer):'').'" id="odometer" type="number" name="odometer" placeholder="km" >

                <a id="nextStep" class="btn btn-warning btn-lg mt-5">Continue <i class="bi bi-arrow-right"></i></a>
        
        </div>
      </div>
    </div>

    <div id="setTime" class="d-none">
      <div class=" fs-1 my-5" > 
        <a id="goBack" class=" text-decoration-none pointer text-dark me-5"><i class="bi bi-arrow-left"></i></a>'.(isset($profile->business_name)?($profile->business_name):'').' - '.(isset($service->service_name)?($service->service_name):'').' - '.(isset($service->duration)?($service->duration):'').'h - $'.(isset($service->service_price)?($service->service_price):'').'
        <div class="text-muted fs-4 ms-5 ps-5" id="vehicleName">'.$car->year.' '.$car->make.' '.$car->model.'</div>
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
                  <input  hidden id="service_id" name="service_id" value="'.(isset($data->service_id)?($data->service_id):'').'">
                  <input  hidden id="current-date" name="current-date" >
                  
                  <input disabled class="rounded" id="finalDateTime" name="finalDateTime" value="'.(isset($data->date_time)?($data->date_time):'').'" >
                  <button name="action" type="submit" class="btn btn-warning btn-lg"><i class="bi bi-calendar-check"></i> Save Updates</button>
          
          </div>
        </div>
      </div>
      </div>
    </form>
        ';};?>
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
   
            $("#vehicle_id").change(function() {
                var value = $("#vehicle_id option:selected");
                $("#vehicleName").html(value.text());
            });
        


    $( "#goBack" ).click(function click() {
      $("#setTime").addClass("d-none");
      $("#setCar").removeClass("d-none");               
    });


    $( "#nextStep" ).click(function click() {
      $("#setCar").addClass("d-none");
      $("#setTime").removeClass("d-none");               
    });
    
 
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
    $("#finalDateTime").val((date.getFullYear())+'-'+(date.getMonth()+ 1)+'-'+(date.getDate())+' '+(date.getHours())+':'+(date.getMinutes())+':'+(date.getSeconds()));
});


</script>




<?php require APPROOT . '/views/includes/footer.php'?>