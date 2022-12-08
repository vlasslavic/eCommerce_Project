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
                      <a class="btn btn-lg" href="<?php echo''.URLROOT.'';?>Cart/index"><i class="bi bi-arrow-left me-1"></i>Go Back</a><h1 class="fw-bold mb-0 text-black">Shipping Address</h1>
                    
                    </div>
                    <hr class="my-4">

                    <form class="needs-validation pb-5 mb-5" method="POST" action="" name="checkout_form" id="checkout_form" >
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control bg-light" name="firstName" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control bg-light" name="lastName" id="lastName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control bg-light" name="email" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">Phone</label>
              <input type="phone" class="form-control bg-light" name="phone" id="phone" required>
              <div class="invalid-feedback">
                Please enter a valid phone number for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control bg-light"  name="address" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control bg-light" name="address2" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select bg-light" id="country" name="country" required>
                <option value="">Choose...</option>
                <option value="Canada">Canada</option>
                <option  value="United States">United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
                <label for="province" id="provinceLabel" class="form-label">Province</label>
                <select class="form-select bg-light" name="province"  id="province">
                    <option value="">Choose...</option>
                    <option value="AB">Alberta</option>
                    <option value="BC">British Columbia</option>
                    <option value="MB">Manitoba</option>
                    <option value="NB">New Brunswick</option>
                    <option value="NL">Newfoundland and Labrador</option>
                    <option value="NS">Nova Scotia</option>
                    <option value="NT">Northwest Territories</option>
                    <option value="NU">Nunavut</option>
                    <option value="ON">Ontario</option>
                    <option value="PE">Prince Edward Island</option>
                    <option value="QC">Quebec</option>
                    <option value="SK">Saskatchewan</option>
                    <option value="YT">Yukon</option>
                </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <input hidden id="paypall_json" name="paypall_json"></input>
            <input hidden id="order_id" name="order_id" value="<?php echo''.((isset($data->order_id)?($data->order_id):'')).''?>">
              <input hidden id="total_price" name="total_price">
            <div class="col-md-3">
              <label for="zip" id="postalLabel" class="form-label">Postal Code</label>
              <input type="text" class="form-control bg-light" name="zip" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Postal Code code required.
              </div>
            </div>
          </div> 
          <button name="action" value="SaveCar"type="submit" id="submitShippingInfo" class="d-none"></button>
        </form>   
        
                    <hr class="my-4">
                        
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
                    ';}else{echo'';}?>
                   
                   <div class="fs-5 text-center" id="filler">
                          <strong>Please Fill Your Address Details First</strong>
                    </div> 
                    <div class="d-none" id="smart-button-container">
                      
                      <div style='text-align: center;'>
                        <div id='paypal-button-container'>
                        </div>
                      </div>
                    </div>
                      
                
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
    
<script src="https://www.paypal.com/sdk/js?client-id=AURb8u7_eVlTk4fqaVfzE2XP8w5AqWnM-vPmGik_KL7yabYdfdQvzCaCFQgfyMF2pSM7Stfsh4PbNO_X&locale=en_US&commit=true&currency=CAD"></script>
<!-- <script>
  paypal.Buttons().render('#paypal-button-container')
</script> -->

  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=CAD" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'checkout',
          
        },

        createOrder: function(data, actions) {
          const amount =  document.getElementById('totalPrice').value;
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"CAD","value":amount}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

            // Show a success message within this page, e.g.
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = '';
            element.innerHTML = '<h3>Thank you for your payment!</h3>';
            $('#paypall_json').val(JSON.stringify(orderData, null, 2));
            $('#total_price').val($("#totalPrice").val());
            // const order_id =  document.getElementById('order_id').value;
            $( "#submitShippingInfo").click();
            // $( "form#checkout_form" ).submit();
            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>

<!-- Changes States/Provinces on Country Change -->
<script>
$( "#country" ).change(function checkSelect() {
    var desiredOption = $("#country").val();
    if (desiredOption == 'United States'){
      $('#province').find('option').remove().end();
      $("#provinceLabel").html("State");
      $("#postalLabel").html("ZIP");
      $('#province').append($('<option>', {value: "",text: 'Choose...'}));
      $('#province').append($('<option>', {value: "AL",text: 'Alabama'}));
      $('#province').append($('<option>', {value: "AK",text: 'Alaska'}));
      $('#province').append($('<option>', {value: "AR",text: 'Arkansas'}));
      $('#province').append($('<option>', {value: "CA",text: 'California'}));
      $('#province').append($('<option>', {value: "CO",text: 'Colorado'}));
      $('#province').append($('<option>', {value: "CT",text: 'Connecticut'}));
      $('#province').append($('<option>', {value: "DC",text: 'District Of Columbia'}));
      $('#province').append($('<option>', {value: "FL",text: 'Florida'}));
      $('#province').append($('<option>', {value: "GA",text: 'Georgia'}));
      $('#province').append($('<option>', {value: "HI",text: 'Hawaii'}));
      $('#province').append($('<option>', {value: "ID",text: 'Idaho'}));
      $('#province').append($('<option>', {value: "IL",text: 'Illinois'}));
      $('#province').append($('<option>', {value: "IN",text: 'Indiana'}));
      $('#province').append($('<option>', {value: "IA",text: 'Iowa'}));
      $('#province').append($('<option>', {value: "KS",text: 'Kansas'}));
      $('#province').append($('<option>', {value: "KY",text: 'Kentucky'}));
      $('#province').append($('<option>', {value: "LA",text: 'Louisiana'}));
      $('#province').append($('<option>', {value: "ME",text: 'Maine'}));
      $('#province').append($('<option>', {value: "MD",text: 'Maryland'}));
      $('#province').append($('<option>', {value: "MA",text: 'Massachusetts'}));
      $('#province').append($('<option>', {value: "MI",text: 'Michigan'}));
      $('#province').append($('<option>', {value: "MN",text: 'Minnesota'}));
      $('#province').append($('<option>', {value: "MS",text: 'Mississippi'}));
      $('#province').append($('<option>', {value: "MO",text: 'Missouri'}));
      $('#province').append($('<option>', {value: "MT",text: 'Montana'}));
      $('#province').append($('<option>', {value: "NE",text: 'Nebraska'}));
      $('#province').append($('<option>', {value: "NV",text: 'Nevada'}));
      $('#province').append($('<option>', {value: "NH",text: 'New Hampshire'}));
      $('#province').append($('<option>', {value: "NJ",text: 'New Jersey'}));
      $('#province').append($('<option>', {value: "NM",text: 'New Mexico'}));
      $('#province').append($('<option>', {value: "NY",text: 'New York'}));
      $('#province').append($('<option>', {value: "NC",text: 'North Carolina'}));
      $('#province').append($('<option>', {value: "ND",text: 'North Dakota'}));
      $('#province').append($('<option>', {value: "OH",text: 'Ohio'}));
      $('#province').append($('<option>', {value: "OK",text: 'Oklahoma'}));
      $('#province').append($('<option>', {value: "OR",text: 'Oregon'}));
      $('#province').append($('<option>', {value: "PA",text: 'Pennsylvania'}));
      $('#province').append($('<option>', {value: "RI",text: 'Rhode Island'}));
      $('#province').append($('<option>', {value: "SC",text: 'South Carolina'}));
      $('#province').append($('<option>', {value: "TN",text: 'Tennessee'}));
      $('#province').append($('<option>', {value: "TX",text: 'Texas'}));
      $('#province').append($('<option>', {value: "UT",text: 'Utah'}));
      $('#province').append($('<option>', {value: "VT",text: 'Vermont'}));
      $('#province').append($('<option>', {value: "VA",text: 'Virginia'}));
      $('#province').append($('<option>', {value: "WA",text: 'Washington'}));
      $('#province').append($('<option>', {value: "WV",text: 'West Virginia'}));
      $('#province').append($('<option>', {value: "WI",text: 'Wisconsin'}));
      $('#province').append($('<option>', {value: "WY",text: 'Wyoming'}));
    }else if(desiredOption == 'Canada'){
      $('#province').find('option').remove().end();
      $("#provinceLabel").html("Province");
      $("#postalLabel").html("Postal Code");
      $('#province').append($('<option>', {value: "",text: 'Choose...'}));
      $('#province').append($('<option>', {value: "AB",text: 'Alberta'}));
      $('#province').append($('<option>', {value: "BC",text: 'British Columbia'}));
      $('#province').append($('<option>', {value: "MB",text: 'Manitoba'}));
      $('#province').append($('<option>', {value: "NB",text: 'New Brunswick'}));
      $('#province').append($('<option>', {value: "NL",text: 'Newfoundland and Labrador'}));
      $('#province').append($('<option>', {value: "NS",text: 'Nova Scotia'}));
      $('#province').append($('<option>', {value: "NT",text: 'Northwest Territories'}));
      $('#province').append($('<option>', {value: "NU",text: 'Nunavut'}));
      $('#province').append($('<option>', {value: "ON",text: 'Ontario'}));
      $('#province').append($('<option>', {value: "PE",text: 'Prince Edward Island'}));
      $('#province').append($('<option>', {value: "QC",text: 'Quebec'}));
      $('#province').append($('<option>', {value: "SK",text: 'Saskatchewan'}));
      $('#province').append($('<option>', {value: "YT",text: 'Yukon'}));
    }
  })
</script>

<!-- Responsable for hiding chekcout button if Zip not filled -->
<script>
    $( "#zip" ).change(function openCheckout() {
      $("#filler").addClass("d-none");
      $("#smart-button-container").removeClass("d-none");
      
                      
    });
  </script>

<?php require APPROOT . '/views/includes/footer.php'?>