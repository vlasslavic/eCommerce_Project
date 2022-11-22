<?php require  APPROOT . '/views/includes/header.php'?>

<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="<?php echo ''.URLROOT.'public/'?><?php echo (isset($data->image)And($data->image!=''))?'uploads/'.$data->image:'img/addPic.jpg'; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1"><?php echo''.(isset($data->in_stock)?((($data->in_stock<10)?
                                                                                    ('Only '.$data->in_stock):
                                                                                    ($data->in_stock)).(($data->in_stock<10)?(' left'):(' available')))
                                                                                :'0').''; ?>  </div>
                        <h1 class="display-5 fw-bolder"><?php echo isset($data->product_name)?$data->product_name:'Product Name' ?></h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through">$<?php echo ''.(isset($data->sell_price)?$data->sell_price*1.15:'00.00').'';?></span>
                            <span>$<?php echo ''.(isset($data->sell_price)?$data->sell_price:'00.00').'';?></span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem quidem modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            <input required class="form-control text-center me-3" id="inputQuantity" type="number" value="1" min="1" max="<?php echo ''.(isset($data->in_stock)?($data->in_stock):0).'';?>" style="max-width: 4rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php 
                    if(!isset($data->related)){echo'Sorry we haven`t found any related products.';}else{
                    
                    foreach ($data->related as $related) { 
                                if($related->product_id!=$data->product_id){
                                echo'
                                <div  class="product col-lg-3 col-sm-6 col-12 mb-4">
                                <div class="card  card-product-grid shadow" >
                                    <div class="img-wrap m-auto mt-3"> <img style="width: 100%; height: 17rem ; object-fit: cover;  overflow: hidden;" src="'.URLROOT.'public/'.((isset($related->image)And($related->image!=''))?'uploads/'.$related->image:'img/blank.jpg').'"> </div>
                                    <div class="info-wrap"> 
                                        <p class="title m-3 text-center">'.(isset($related->product_name)?$related->product_name:'Product Name').'</p>
                                        <hr class="m-0">
                                    </div>
                                    <div class="bottom-wrap m-3 mx-4 d-flex align-items-center flex">
                                        <div class="price-wrap lh-sm text-start"> <strong class="price"> $'.(isset($related->sell_price)?$related->sell_price:'00.00').' </strong> <br>
                                            <small class="text-muted">'.(isset($related->in_stock)?
                                                                            (($related->in_stock<10)?
                                                                                ('Only '.$related->in_stock):
                                                                                ($related->in_stock))
                                                                            :'0').' left </small> </div>
                                    
                                            <a href="#" class=" btn btn-warning float-end ms-auto btn-sm"> Add to cart</a>
                                            <!-- price-wrap.// -->
                                    </div> <!-- bottom-wrap.// -->
                                </div> <!-- card // -->
                            </div> <!-- col.// -->
                            ';};}}?>
                    
                </div>
            </div>
        </section>
<?php require APPROOT . '/views/includes/footer.php'?>