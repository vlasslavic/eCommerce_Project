<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container  mt-4">

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Service Name</th>
              <th scope="col">Service Price</th>
              <th scope="col">Duration</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $service = new \app\models\Service();
          $service = $service->getAllServices($_SESSION["profile_id"]);
          
          foreach ($service as $data) { 
                echo'
                <tr class="text-center">
                    <td class="text-center">'.$data->service_id.'</td>
                    <td >'.$data->service_name.'</td>
                    <td>$'.$data->service_price.'</td>
                    <td>'.$data->duration.'</td>
                    <td class="mx-auto ">
                        <span class="me-4"><a class="btn btn-warning px-4"  href="'.URLROOT.'Service/modifyService/'.$data->service_id.'">Edit</a></span>
                        <span class="" ><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Delete
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Service #'.$data->service_id.'</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>Are you sure you want to delete:</h5>
                                <h5>'.$data->service_name.'?</h5>
                                <p>This action will erase permanently the service record. </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="'.URLROOT.'Service/delete/'.$data->service_id.'" class="btn btn-Danger">Delete</a>
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