
<?php require  APPROOT . '/views/includes/header.php'?>
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Browse our Catalog</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Here you can find everithing you need (or not)</p>
                </div>
            </div>
        </header>

<section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center product-container">
               
                <?php 
                if(isset($data)){
                    
                foreach ($data as $datas) {
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
            <button id="loadMore" type="button" class="btn btn-warning btn-lg rounded-3 shadow mx-auto mt-5" >
                Load More
            </button>
            </div>
        </section>

        
        
   <script src ="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
<script src ="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> </script>
<script>
  $(document).ready(function () {
  $(".producto").slice(0, 8).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".producto:hidden").slice(0, 8).slideDown();
    if ($(".producto:hidden").length == 0) {
      $("#loadMore").text("No Content").addClass("noContent");
    }
  });
  })
</script>


        <?php require APPROOT . '/views/includes/footer.php'; ?>