<?php require  APPROOT . '/views/includes/header.php'?>
<?php if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';}?>

<div class=" bg-white  m-3 p-2 rounded-3 shadow-sm ">
    <header class="card-img-top d-flex align-items-center justify-content-around overflow-hidden bg-cover bg-warning bg-opacity-75 p-5 rounded-4"
        style="background-image: url('bootstrap5-ecommerce/images/banners/bg-cafe.webp');">
        <div class="card-body bg-dark-50">
            <div class="d-lg-flex align-items-center justify-content-around">
                <div class="d-flex  align-items-center justify-content-around">
                    <div class="aside"> 
                        <img alt="Change profile photo" class="form-control-file rounded-3 "
                                        style="width: 10em; height: 10em; object-fit: cover;" id="pic_preview" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>"> </div>
                    <div class="info ms-4 ">
                        <h3 class="text-black my-0"><?=$data->business_name ?></h3>
                        <p class="text-black-50 my-0"><?=$data->description ?></p>

                    </div>
                    
                </div>
               
            </div>
        </div> <!-- card-body.// -->
    </header>
    <div class="row g-0">
        <aside class="col-lg-3 border-end">
            <nav class="nav flex-column nav-pills m-3 "> 
                <a href="#" class="nav-link bg-warning bg-opacity-75 text-black active">Contacts</a> 
                <p class="text-black-50 my-0 px-3 pt-2"><?=$data->address ?></p>
                        <p class="text-black-50 my-0 p-3"><?=$data->email ?></p>
                        <p class="text-black-50 my-0 px-3"><?=$data->phone ?></p>
            </nav>
        </aside>
        <div class="col-lg-9 p-2">
            <div class="content-body">
                <h4 class="card-title">Products</h4>
                <section class="padding-y bg-light">
                    <div class="container mt-3">


                        <div class="row">



                            <div class="col-lg-3 col-sm-6 col-12 mb-4">
                                <div class="card card-product-grid">
                                    <div class="img-wrap"> <img style="width: 100%; object-fit: cover;" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>"> </div>
                                    <div class="info-wrap"> 
                                        <p class="title m-2">Apple iPhone 13 Pro max 7.1" RAM 6GB 512GB Global</p>
                                        <hr class="m-0">
                                    </div>
                                    <div class="bottom-wrap m-2 d-flex align-items-center flex">
                                        <div class="price-wrap lh-sm"> <strong class="price"> $399.50 </strong> <br>
                                            <small class="text-muted">Only 4 left </small> </div>
                                       
                                            <a href="#" class=" btn btn-primary float-end ms-auto btn-sm"> Add to cart</a>
                                             <!-- price-wrap.// -->
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- card // -->
                            </div> <!-- col.// -->
                            
                            
                            
                            
                        </div>


                    </div> <!-- container .// -->
                </section>
            </div>
        </div>
    </div>
</div>



<?php require APPROOT . '/views/includes/footer.php'?>
