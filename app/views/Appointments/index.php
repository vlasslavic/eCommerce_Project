<?php require  APPROOT . '/views/includes/header.php'?>

<div class="mx-5   mt-4">

<div class="table-responsive mx-5">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">Appointment#</th>
              <th scope="col">Created Date</th>
              <th scope="col">Shop</th>
              <th scope="col">Description</th>
              <th scope="col">Vehicle</th>
              <th scope="col">Status</th>
              <th scope="col">Appointment Date</th>
              <th scope="col">Address</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
        
          if(isset($data)){
          foreach ($data as $items) { 
                $service = new \app\models\Service();
                $service=$service->get($items->service_id);
                $profile = new \app\models\Profile();
                $profile=$profile->getProfile($service->profile_id);
                $vehicle = new \app\models\Garage();
                $vehicle=$vehicle->get($items->vehicle_id);

                echo'
                <tr class="text-center">
                    
                    <td class="text-center">'.$items->appointment_id.'</td>
                    <td>'.$items->created_date.'</td>
                    <td ><a class="text-decoration-none text-secondary " href="'.URLROOT.'Profile/myStore?profile_id='.$profile->profile_id.'">'.$profile->business_name.'</a></td>
                    <td>'.$service->service_name.'</td>
                    <td>'.$vehicle->year.' '.$vehicle->make.' '.$vehicle->model.'</td>
                    <td>'.$items->status.'</td>
                    <td>'.$items->date_time.'</td>
                    <td><textarea disabled>'.$profile->address.'</textarea></td>
                    <td class="mx-auto ">
                        <span class="me-4"><a class="btn btn-warning px-4"  href="'.URLROOT.'Appointments/modifyAppointment/'.$items->appointment_id.'">Modify</a></span>
                        <span class="" ><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal'.$items->appointment_id.'">
                          Cancel
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$items->appointment_id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$items->appointment_id.'" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel'.$items->appointment_id.'">Cancel Appointment #'.$items->appointment_id.'</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>Are you sure you want to cancel your appointment:</h5>
                                <h5>'.$service->service_name.' for your '.$vehicle->year.' '.$vehicle->make.' '.$vehicle->model.'?</h5>
                                <p>This action may be subjected to penalties if appointment is cancelled less than 24 hours in advance. </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="'.URLROOT.'Appointments/cancelAppointment/'.$items->appointment_id.'" class="btn btn-Danger">Cancel Appointment</a>
                              </div>
                            </div>
                          </div>
                        </div>
                                
                        </span>

                    </td>
                    
                </tr>
                '; }} ?>
           

          </tbody>
        </table>
      </div>
    
</div>

<script>
    const myModal = document.getElementById('exampleModalCenter')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})
    </script>

<?php require APPROOT . '/views/includes/footer.php'?>