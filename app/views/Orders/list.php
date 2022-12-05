<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container  mt-4">

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">Order#</th>
              <th scope="col">Product Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Status</th>
              <th scope="col">Sell Price</th>
              <th scope="col">Cost Price</th>
              <th scope="col">Shipping Info</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php 
          $product = new \app\models\Product();
          $product = $product->getAllProducts($_SESSION["profile_id"]);
          if(isset($data)){
          foreach ($data as $items) { 
                echo'
                <tr class="text-center">
                    
                    <td class="text-center">'.$items->order_id.'</td>
                    <td ><a class="text-decoration-none text-secondary " href="'.URLROOT.'Product/index/'.$items->product_id.'">'.$items->product_name.'</a></td>
                    <td>'.$items->quantity.' pcs.</td>
                    <td>'.$items->status.'</td>
                    <td>$'.$items->sell_price.'</td>
                    <td>$'.$items->cost_price.'</td>
                    <td><textarea disabled>'.$items->shipping_info.'</textarea></td>
                    <td class="mx-auto ">
                        <span class="me-4"><a class="btn btn-warning px-4"  href="'.URLROOT.'Orders/ship/'.$items->order_item_id.'">Ship</a></span>
                        <span class="" ><!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal'.$items->order_item_id.'">
                          Cancel
                        </button>
                        
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal'.$items->order_item_id.'" tabindex="-1" aria-labelledby="exampleModalLabel'.$items->order_item_id.'" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel'.$items->order_item_id.'">Cancel Product #'.$items->order_item_id.' / Order #'.$items->order_id.'</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>Are you sure you want to cancel:</h5>
                                <h5>'.$items->quantity.'pcs. '.$items->product_name.'?</h5>
                                <p>This action will cancel the entire order including the other products and you will have to refund the client. </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a type="button" href="'.URLROOT.'Orders/cancel/'.$items->order_item_id.'" class="btn btn-Danger">Cancel Order</a>
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