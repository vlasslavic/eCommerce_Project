<?php require  APPROOT . '/views/includes/header.php'?>

<div class="py-5 d-flex justify-content-center bg-black bg-opacity-75">
    <img alt="Change profile photo" 
        style="width: 45%; object-fit: cover;" id="pic_preview" 
        src="<?php echo ''.URLROOT.''?>public/img/car.png">
    <h1 class="w-25 text-center text-white ms-5 my-auto">Experience the all-in solution for your car. </h1>
</div>
<div style="height: 2rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);"> 
    </div>


    <div class="container ps-5 py-5 " id="hanging-icons">
        <h1 class="pb-3 border-bottom">Why choosing us?</h1>
        <p>Because numbers talk, take a look by yourself:</p>
        <div class="ms-5 ps-3">
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3 ">
            
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
                </div>
                <div class="text-center">
                <h2 class="text-center"><i class="bi bi-tags-fill me-3"></i>
                    <?php $product= new \app\models\Product();
                            $product = $product->getAllId();
                        
                        echo''.sizeof($product).'';?>
                </h2>
                <p>Products Available</p>
                
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg>
                </div>
                <div class="text-center">
                <h2 class="text-center"><i class="bi bi-ui-radios me-3"></i>
                    <?php $service= new \app\models\Service();
                            $service = $service->getAllId();
                        echo''.sizeof($service).'';?>
                </h2>
                <p>Services Available</p>
                
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg>
                </div>
                <div>
                <h2 class="text-center"><i class="bi bi-people-fill me-3"></i>
                    <?php $profile= new \app\models\Profile();
                            $profile = $profile->getAllId();
                            echo''.sizeof($profile).'';?>
                </h2>
                <p>Registered Shops</p>
                
                </div>
            </div>
        
        </div>

        <div class="row g-4 pt-2 pb-5 row-cols-1 row-cols-lg-3 ms-2">
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
                </div>
                <div class="text-center">
                <h2 class="text-center"><i class="bi bi-bar-chart-fill me-3"></i>
                
                <?php $paid= new \app\models\Cart();
                
                        $paid = $paid->getAllOrdersID();
                        echo''.sizeof($paid).'';?>
                </h2>
                <p>Products Sold</p>
                
                </div>
            </div>
            <div class="col d-flex align-items-start ms-n2">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg>
                </div>
                <div>
                <h2 class="text-center"><i class="bi bi-check-circle-fill me-3"></i>
                <?php $app= new \app\models\Appointment();
                
                        $app = $app->getAllAppID();
                        echo''.sizeof($app).'';?>
                
            </h2>
                <p class="text-center mb-0">Appointments</plass=>
                <p class="text-center mt-0">Done</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg>
                </div>
                <div>
                <h2 class="text-center"><i class="bi bi-check-circle-fill me-3"></i>
                <?php $garage= new \app\models\Garage();
                            $garage = $garage->getAllId();
                        echo''.sizeof($garage).'';?>
                </h2>
                <p>Registered Cars</p>
                
                </div>
            </div>
        </div>
        </div>
  </div>
  <div style="height: 2rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);"> 
    </div>
    <!-- Catalog Preview -->
    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-2">
                <h1 class="mb-5 pb-3 border-bottom">Some products from our Catalog:</h1>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-container">
               
                <?php 
                if(isset($data->products)){
                    
                foreach ($data->products as $datas) {
                echo'
                <div  class="product producto col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                <a class="text-decoration-none text-black " href="'.URLROOT.'Product/index/'.$datas->product_id.'">
                <div class="card  card-product-grid shadow" >
                    <div class="card-img-top"> <img class="card-img-top"  style="width: 100%; height: 17rem ; object-fit: cover;  overflow: hidden;" src="'.URLROOT.'public/'.((isset($datas->image)And($datas->image!=''))?'uploads/'.$datas->image:'img/blank.jpg').'" alt="...">
                    </div>
                    <div class="info-wrap "> 
                        <div class="title m-3  text-center" style="height: 3em; overflow: hidden;"><h5>
                        '.(isset($datas->product_name)?$datas->product_name:'Product Name').'</h5></div>
                        <hr class="m-0">
                    </div>
                    <div class="bottom-wrap m-3 mx-4 d-flex align-items-center flex" style="height: 3em; overflow: hidden;">
                        <div class="price-wrap lh-sm text-start"> <strong class="price"> $'.(isset($datas->sell_price)?$datas->sell_price:'00.00').' </strong> <br>
                            <small class="text-muted">'.(isset($datas->in_stock)?
                                                            (($datas->in_stock<10)?
                                                                ('Only '.$datas->in_stock):
                                                                ($datas->in_stock))
                                                            :'0').' left </small> </div>
                    
                            <a href="'.URLROOT.'Cart/addToCart/'.$datas->product_id.'" class=" btn btn-warning float-end ms-auto btn-sm"> Add to cart</a>
                            <!-- price-wrap.// -->
                    </div> <!-- bottom-wrap.// -->
                </div> <!-- card // -->
                </a>
            </div> <!-- col.// -->

                    ';}}?>
                </div>
            </div>
            <div class='d-flex'>
            <a href="<?php echo''.URLROOT.'Main/catalog'?>" id="loadMore" type="button" class="btn btn-warning btn-lg rounded-3 shadow mx-auto mt-5" >
                Go to Catalog
            </a>
            </div>
        </section>
        
        
        
   <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<script>
  $(document).ready(function () {
  $(".producto").slice(0, 4).show();
  })
</script>

                                
<?php require APPROOT . '/views/includes/footer.php'; ?>
                                    