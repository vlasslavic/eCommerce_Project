
<?php require  APPROOT . '/views/includes/header.php'?>
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Businesses Established</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Here are the businesses that decided to establish their presence on our platform.</p>
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
                <a class="text-decoration-none text-black " href="'.URLROOT.'Profile/myStore?profile_id='.$datas->profile_id.'">
                <div class="card  card-product-grid shadow" >
                    <div class="card-img-top"> <img class="card-img-top rounded-circle p-4"  style="width: 100%; height: 17rem; object-fit: cover;  overflow: hidden;" src="'.URLROOT.'public/'.((isset($datas->picture)And($datas->picture!=''))?'uploads/'.$datas->picture:'img/blank.jpg').'" alt="...">
                    </div>
                    <div class="info-wrap "> 
                        <div class="title m-3  text-center" style="height: 3em; overflow: hidden;"><h5>
                        '.(isset($datas->business_name)?$datas->business_name:'Profile Name').'</h5></div>
                        <hr class="m-0">
                    </div>
                    <div class="bottom-wrap m-3 mx-auto d-flex align-items-center flex" style="height: 3em; overflow: hidden;">
                        
                    
                            <a href="'.URLROOT.'Profile/myStore?profile_id='.$datas->profile_id.'" class=" btn btn-warning btn-lg ms-auto ">View Profile</a>
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