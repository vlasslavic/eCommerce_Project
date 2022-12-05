<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container  mt-4">

<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr class="text-center">
              <th scope="col">Order#</th>
              <th scope="col">Order Date</th>
              <th scope="col">Product Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Order Price</th>
              <th scope="col">Status</th>
              <th scope="col">Shipping Info</th>
              <th scope="col">Shipping Date</th>
            </tr>
          </thead>
          <tbody>
          <?php 
        
          if(isset($data)){
          foreach ($data as $items) { 
                echo'
                <tr class="text-center">
                    
                    <td class="text-center">'.$items->order_id.'</td>
                    <td>'.$items->order_date.'</td>
                    <td ><a class="text-decoration-none text-secondary " href="'.URLROOT.'Product/index/'.$items->product_id.'">'.$items->product_name.'</a></td>
                    <td>'.$items->quantity.' pcs.</td>
                    <td>$'.$items->total_price.'</td>
                    <td>'.$items->status.'</td>
                    <td><textarea disabled>'.$items->shipping_info.'</textarea></td>
                    <td class="mx-auto ">
                    '.(($items->status=='Canceled')?'':($items->ship_date)).'
                      
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