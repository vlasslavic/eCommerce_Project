<?php require  APPROOT . '/views/includes/header.php'?>


    <section class=" bg-light ">
    <div class="container pt-4 pb-5 ">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
          <div class="card card-registration card-registration-2 shadow-lg" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                      <h6 class="mb-0 text-muted"><?php 
                      if(isset($data->items)){
                        // Count all items in cart, including items with 2 or more quantities.
                        $count = sizeof($data->items);
                        foreach (($data->items) as $item) {
                         if(($item->quantity)>1){
                          $count+=(($item->quantity)-1);
                         } 
                        }
                        if(isset($count)){
                        echo''.$count.'';}else{echo'0';}}; ?> 
                      items</h6>
                    </div>
                    <hr class="my-4">
                    <?php if(isset($data->items)){
                      foreach (($data->items) as $item) {
                        echo'<input hidden id="order_id" name="order_id" value="'.$item->order_id.'">';
                        $product = new \app\models\Product();
                        $product = $product->get($item->product_id);
                        $seller = new \app\models\Profile();
                        $seller = $seller->getProfile($item->profile_id);
                        echo'

                          <div class="row mb-4 d-flex justify-content-between align-items-center">
                          
                            <div class="col-md-2 col-lg-2 col-xl-2">
                            <a class="text-decoration-none text-black " href="'.URLROOT.'Product/index/'.$item->product_id.'">
                              <img
                              
                                src="'.URLROOT.'public/'.((isset($product->image)And($product->image!=''))?'uploads/'.$product->image:'img/blank.jpg').'"
                                class="img-fluid rounded-3" alt="'.(isset($item->product_name)?$item->product_name:"Error").'">
                                </a>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                              <a class="text-decoration-none text-muted" href="'.URLROOT.'Profile/myStore?profile_id='.$item->profile_id.'">
                                <h6 class="text-muted">'.(isset($seller->business_name)?$seller->business_name:"Error").'</h6>
                              </a>
                              <a class="text-decoration-none text-black " href="'.URLROOT.'Product/index/'.$item->product_id.'">
                                <h6 class="text-black mb-0">'.(isset($item->product_name)?$item->product_name:"Error").'</h6>
                              </a>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                              <a class="btn btn-link p-0 text-black fw-bolder"
                              href="'.URLROOT.'Cart/substractQuantity/'.$item->order_item_id.'">
                                <i class="bi bi-dash fs-4"></i>
                              </a>
        
                              <input disabled id="form1" min="0" name="quantity" value="'.(isset($item->quantity)?$item->quantity:"1").'" type="text"
                                class="text-center form-control form-control-sm " />
        
                              <a class="btn btn-link p-0 text-black fw-bolder"
                              href="'.URLROOT.'Cart/addQuantity/'.$item->order_item_id.'">
                                <i class="bi bi-plus fs-4"></i>
                              </a>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                              <h6 class="mb-0">$ '.(isset($item->sell_price)?$item->sell_price:"Error").'</h6>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                              <a href="'.URLROOT.'Cart/deleteProduct/'.$item->order_item_id.'" class="text-muted fw-bolder fs-3"><i class="bi bi-x"></i></a>
                            </div>
                          </div>
        
                          <hr class="my-4">
                        ';};
                      }else{
                      echo'
                          <div class="row mb-4 d-flex justify-content-between align-items-center">
                        
                                      <div class="emptyMessage card  p-5">
                                          <div class="text-center fs-3">Your cart is Empty</div>
                                          <a class="text-center fs-3 " href="'.URLROOT.'Main/catalog" style="margin-top:10px;">Continue Shopping</a>
                                      </div>
                          </div>
                          
                      ';}
                  ?>
                    <div class="pt-5">
                      <h6 class="mb-0"><a href="<?php echo''.URLROOT.''?>Main/catalog" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Back to Catalog</a></h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">
                    <?php 
                      if(isset($data->items)){
                        // Calculates subtotal, taxes, shipping and total.
                          $subtotal=0;
                          $savings=0;
                          $newSubtotal=0;
                            foreach (($data->items) as $item) {
                            if(($item->quantity)>1){
                              $subtotal+=(($item->sell_price)*($item->quantity));
                            }else{
                              $subtotal+=($item->sell_price);
                            } 
                            }
                          $taxes = round((($subtotal+20)*0.15), 2);
                          $total = round((($subtotal+$taxes)+20), 2);

                          // If coupon set rrecalculates aeverything
                          if(isset($data->coupon->percentage)){
                            $savings =  round((($subtotal)*((($data->coupon)->percentage)/100)), 2);
                            $newSubtotal = round(($subtotal-$savings),2); 
                            $taxes = round((($newSubtotal+20)*0.15), 2);
                            $total = round((($newSubtotal+$taxes)+20), 2);
                          }

                          if($newSubtotal==0 And $subtotal==0){
                            $taxes=0;
                            $total=0;
                          }
                          
                        
                        echo'
                    <div class="d-flex justify-content-between  mb-4">
                      <h5 class="text-uppercase">Subtotal</h5>
                      <div class=" d-flex flex-column justify-content-end ">
                      '.((isset($data->coupon->code))?('<div class="text-decoration-line-through">$ '.$subtotal.'</div>'):'').'
                      <h5>$ '.((isset($data->coupon->code))?($newSubtotal):($subtotal)).'</h5>
                      </div>
                    </div>
  
                    <h5 class="text-uppercase mb-3">Coupon</h5>
  
                    <div class="mb-1">
                      <div class="form-outline">
                      <form method="POST" action="" role="CheckCoupon">
                        <input type="text" id="coupon" name="coupon" value="'.((isset($data->coupon->code))?(($data->coupon)->code):'').'" class="form-control form-control-lg" />
                        <label class="form-label d-flex justify-content-between align-items-center" for="form3Examplea2"><span> Enter your code </span>
                        <button name="action" value="CheckCoupon" type="submit" class="btn btn-warning m-1"> Redeem
                        </button></label>
                        </form>
                      </div>
                    </div>'.((isset($data->coupon->code))?'
                    <div class="d-flex justify-content-between mb-2">
                    <h5 class="text-uppercase text-success">Savings:</h5>
                    <h5 class="text-success">-$ '.$savings.'</h5></div>':'').'
                    <hr class="my-4">
                    <h5 class="text-uppercase mb-3">Shipping</h5>
  
                    <div class="mb-4 pb-2">
                      <select class="form-select form-select-lg">
                        <option value="1">Standard: $20.00</option>
                      </select>
                    </div>

                    <hr class="my-4">
                    <div class="d-flex justify-content-between mb-1">
                      <h5 class="text-uppercase text-muted">Taxes:</h5>
                      <h5 class="text-muted">$'.$taxes.'</h5>
                    </div>
                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Total price</h5>
                      <input hidden id="totalPrice" name="totalPrice" value="'.$total.'">
                      <h5>$ '.$total.'</h5>
                    </div>
                    <div class="d-flex justify-content-center"><a href="'.URLROOT.'Cart/checkout" class="btn btn-lg btn-warning btn-block"> Continue Checkout <i class="bi bi-arrow-right"></i>
                        </a></div>
                    ';}else{echo'';}?>
                         
                    

                    
                      
                
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
    





<?php require APPROOT . '/views/includes/footer.php'?>