<?php require  APPROOT . '/views/includes/header.php'?>


<div style="height: 1rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);"> 
    </div>
    <div class="container px-4 py-5">
    <header class="card-img-top d-flex align-items-center justify-content-around overflow-hidden bg-cover  rounded-4 mb-3"
        style="background-image: url('bootstrap5-ecommerce/images/banners/bg-cafe.webp');">
        <div class="card-body bg-dark-50">
            <div class="d-lg-flex align-items-center justify-content-around">
                <div class="d-flex  align-items-top justify-content-around">
                    <div class="aside"> 
                        <img alt="Change profile photo" class="me-5 form-control-file rounded-circle "
                                        style="width: 12em; height: 12em; object-fit: cover;" id="pic_preview" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>"> </div>
                    <div class="info ms-5 my-auto">
                        <h3 class="text-black my-0"><?=$data->business_name ?></h3>
                        <div class="text-black-50 my-4">
                            <span class="fw-bold ">23</span><span class="me-3"> services</span>
                            <span class="ms-4 fw-bold">5</span><span> products</span>
                        </div>
                        <p class="text-black-50 my-0"><?=$data->description ?></p>

                    </div>
                    
                </div>
               
            </div>
        </div> <!-- card-body.// -->
    </header>
    </div>
    <div style="height: 2rem;
                background-color: rgba(0, 0, 0, .1);
                border: solid rgba(0, 0, 0, .15);
                border-width: 1px 0;
                box-shadow: inset 0 0.5em 1.5em rgb(0 0 0 / 10%), inset 0 0.125em 0.5em rgb(0 0 0 / 15%);"> 
    </div>
    <div class="row g-0 m-3 pt-3">
        <aside class="col-lg-3 border-end">
            <nav class="nav flex-column nav-pills m-3  "> 
                <h3 class=" text-black active mb-3">Contacts:</h3> 
                <a target="_blank" href="https://www.google.com/maps/place/<?php echo''.$data->address.''; ?>" class="text-decoration-none d-flex text-black-50 my-2 px-3 "><i class="bi bi-geo-alt-fill mt-1 me-3"></i><div><?=$data->address ?></div></a>
                <a  href="mailto:<?php echo''.$data->email.''; ?>" class="text-decoration-none d-flex text-black-50 my-2 px-3 "><i class="bi bi-envelope-fill mt-1 me-3"></i><div><?=$data->email ?></div></a>
                <a  href="tel:<?php echo''.$data->phone.''; ?>" class="text-decoration-none d-flex text-black-50 my-2 px-3 "><i class="bi bi-telephone-fill mt-1 me-3"></i><div><?=$data->phone ?></div></a>
            </nav>
        </aside>
        <div class="col-lg-9">
            <div class="content-body m-4 mt-2 ms-5">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-black active" id="products-tab" data-bs-toggle="tab" data-bs-target="#products-tab-pane" type="button" role="tab" aria-controls="products-tab-pane" aria-selected="true"><h4>Products</h4></button>
                </li>
                <li class="nav-item " role="presentation">
                    <button class="nav-link text-black  " id="services-tab" data-bs-toggle="tab" data-bs-target="#services-tab-pane" type="button" role="tab" aria-controls="services-tab-pane" aria-selected="false"><h4>Services</h4></button>
                </li>
                </ul>

                <div class="tab-content bg-white border-bottom border-start border-end rounded-bottom rounded-end" id="myTabContent">
<!-- Product Section Start -->
                    <section class="padding-y p-4 tab-pane fade show active "
                    id="products-tab-pane" role="tabpanel" aria-labelledby="products-tab" tabindex="0">
                        <div class="container pt-4 ">
                            <div class="row">
                                <div  class="product col-lg-3 col-sm-6 col-12 mb-4">
                                    <div class="card  card-product-grid shadow" >
                                        <div class="img-wrap m-auto mt-3"> <img style="width: 100%; height: 17rem ; object-fit: cover;  overflow: hidden;" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>"> </div>
                                        <div class="info-wrap"> 
                                            <p class="title m-3 text-center">Apple iPhone 13 Pro max 7.1" RAM 6GB 512GB Global</p>
                                            <hr class="m-0">
                                        </div>
                                        <div class="bottom-wrap m-3 mx-4 d-flex align-items-center flex">
                                            <div class="price-wrap lh-sm text-start"> <strong class="price"> $39.50 </strong> <br>
                                                <small class="text-muted">Only 4 left </small> </div>
                                        
                                                <a href="#" class=" btn btn-warning float-end ms-auto btn-sm"> Add to cart</a>
                                                <!-- price-wrap.// -->
                                        </div> <!-- bottom-wrap.// -->
                                    </div> <!-- card // -->
                                </div> <!-- col.// -->
                                
                                
                                
                                
                            </div>


                        </div> <!-- container .// -->
                    </section>
<!-- Product Section End -->
<!-- Services Section Start -->
                    <section class="padding-y p-4 tab-pane fade show active "
                    id="services-tab-pane" role="tabpanel" aria-labelledby="services-tab" tabindex="0">
                        <div class="container pt-4 ">
                            <div class="row">
                            </div>
                        </div>
                    </section>
<!-- Services Section End -->
                </div>
            </div>
        </div>
    </div>




<?php require APPROOT . '/views/includes/footer.php'?>
