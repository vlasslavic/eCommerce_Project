<?php require  APPROOT . '/views/includes/header.php'?>
<!--  if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';} -->
<div class="container mx-auto mt-4">
    <div class="row justify-content-center mx-auto">
        <div class="ms-5 col-7 border justify-content-center rounded-2 bg-white shadow">
        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                <div class="col-3 justify-content-end">
                    <div class="d-flex justify-content-end align-content-center">
                        <!-- <form enctype="multipart/form-data" method="POST" role="presentation"> -->
                            <div class=" ">
                               
                                <input type="file" name="picture" id="picture" class="form-control-file form-control d-none"  />
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-8 ms-5 mb-2">
                    <h2 class="text-start" tabindex="">
                    Add a service:
                    </h2>
                            
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Service Name:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="true" required id="service_name" placeholder="Service Name" type="text"
                            class="w-75 rounded-2" name="service_name"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Service Price:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input required aria-required="true"  step='0.01' min="0" id="service_price"  placeholder="Service Price" type="number"
                            class="w-75 rounded-2" name="service_price"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Duration:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <!-- <input aria-required="false" step="15" id="duration" placeholder="Duration" type="number"
                            class="w-75 rounded-2" name="duration"> -->
                            <input class="rounded-2 w-25" type="number" min="0" max="24" step="1" autocomplete="off" value="0" name="hours"   id="hours"  > hours,
	                        <input class="rounded-2 w-25" type="number" min="0" max="30" step="30" autocomplete="off" value="0" name="minutes" id="minutes"> minutes
                    </div>
                </div>
                
                
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveService"type="submit">Add Service</button>
                        <div>
                    </div>
                </div>
            </form> 
        </div>


</div>


<script>
	picture.onchange = evt => {
    
    const [file] = picture.files
    if (file) {
      pic_preview.src = URL.createObjectURL(file)
      preview_pic.src = URL.createObjectURL(file)
    }
  }
</script>


<script>

function time_form_input_handler(ev) {
	var form = ev.currentTarget;

	if (form.seconds.valueAsNumber == -1) {
		if (form.minutes.valueAsNumber > 0 || form.hours.valueAsNumber > 0 || form.days.valueAsNumber > 0) {
			form.minutes.valueAsNumber--;
			form.seconds.valueAsNumber = 59;
		} else {
			form.seconds.valueAsNumber = 0;
		}
	} else if (form.seconds.valueAsNumber == 60) {
		form.minutes.valueAsNumber++;
		form.seconds.valueAsNumber = 0;
	}

	if (form.minutes.valueAsNumber == -1) {
		if (form.hours.valueAsNumber > 0 || form.days.valueAsNumber > 0) {
			form.hours.valueAsNumber--;
			form.minutes.valueAsNumber = 59;
		} else {
			form.minutes.valueAsNumber = 0;
		}
	} else if (form.minutes.valueAsNumber == 60) {
		form.hours.valueAsNumber++;
		form.minutes.valueAsNumber = 0;
	}

	if (form.hours.valueAsNumber == -1) {
		if (form.days.valueAsNumber > 0) {
			form.days.valueAsNumber--;
			form.hours.valueAsNumber = 23;
		} else {
			form.hours.valueAsNumber = 0;
		}
	} else if (form.hours.valueAsNumber == 24) {
		form.days.valueAsNumber++;
		form.hours.valueAsNumber = 0;
	}

	if (form.days.valueAsNumber == -1) {
		form.days.valueAsNumber = 0;
	}
}

document.getElementById('time_form').addEventListener('input', time_form_input_handler);

</script>

<?php require APPROOT . '/views/includes/footer.php'?>
