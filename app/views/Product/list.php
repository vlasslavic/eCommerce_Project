<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container  mt-4">

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Product Name</th>
              <th scope="col">In Stock</th>
              <th scope="col">Sell Price</th>
              <th scope="col">Cost Price</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $product = new \app\models\Product();
          $product = $product->getAllProducts($_SESSION["profile_id"]);
          
          foreach ($product as $data) { 
                echo'
                <tr class="text-center">
                    
                    <td class="text-center">'.$data->product_id.'</td>
                    <td ><a class="text-decoration-none text-secondary " href="'.URLROOT.'Product/index/'.$data->product_id.'">'.$data->product_name.'</a></td>
                    <td>'.$data->in_stock.' pcs.</td>
                    <td>$'.$data->sell_price.'</td>
                    <td>$'.$data->cost_price.'</td>
                    
                    <td class="mx-auto ">
                        <span class="me-4"><a class="btn btn-warning px-4"  href="'.URLROOT.'Product/modifyProduct/'.$data->product_id.'">Edit</a></span>
                        <span class="" ><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal'.$data->product_id.'">
                          Delete
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$data->product_id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$data->product_id.'" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel'.$data->product_id.'">Delete Product #'.$data->product_id.'</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>Are you sure you want to delete:</h5>
                                <h5>'.$data->product_name.'?</h5>
                                <p>This action will erase permanently the product data and images. </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="'.URLROOT.'Product/delete/'.$data->product_id.'" class="btn btn-Danger">Delete</a>
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