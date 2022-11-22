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

    <section class="py-5">
            <div class="container px-4 px-lg-5 mt-2">
                <h1 class="mb-5">Some products from our Catalog:</h1>
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
                    
                            <a href="#" class=" btn btn-warning float-end ms-auto btn-sm"> Add to cart</a>
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
                                    