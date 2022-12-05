<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container  mt-4">

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Year</th>
              <th scope="col">Make</th>
              <th scope="col">Model</th>
              <th scope="col">Color</th>
              <th scope="col">Vin</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $garage = new \app\models\Garage();
          $garage = $garage->getAllCars($_SESSION["user_id"]);
          
          foreach ($garage as $data) { 
                echo'
                <tr class="text-center">
                    <td class="text-center">'.$data->vehicle_id.'</td>
                    <td>'.$data->year.'</td>
                    <td>'.$data->make.'</td>
                    <td>'.$data->model.'</td>
                    <td>'.$data->color.'</td>
                    <td>'.$data->vin.'</td>
                    <td class="mx-auto ">
                    <span class="me-4"><a class="btn btn-secondary px-4"  href="'.URLROOT.'Appointments/history/'.$data->vehicle_id.'">History</a></span>
                        <span class="me-4"><a class="btn btn-warning px-4"  href="'.URLROOT.'Garage/modifyGarage/'.$data->vehicle_id.'">Edit</a></span>
                        <span class="" ><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal'.$data->vehicle_id.'">
                          Delete
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$data->vehicle_id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$data->vehicle_id.'" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel'.$data->vehicle_id.'">Delete Car #'.$data->vehicle_id.'</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>Are you sure you want to delete:</h5>
                                <h5>'.$data->year.' '.$data->make.' '.$data->model.'?</h5>
                                <p>This action will erase permanently the car record. </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="'.URLROOT.'Garage/delete/'.$data->vehicle_id.'" class="btn btn-Danger">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                                
                        </span>

                    </td>
                </tr>
                '; } ?>
           

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