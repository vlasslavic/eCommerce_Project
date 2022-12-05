<?php require  APPROOT . '/views/includes/header.php'?>
<!--  if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';} -->
<div class="container  mt-4">
    <div class="row align-items-start ">
        <div class="col-4 text-center border rounded-2 justify-content-center bg-white shadow">
            <h4 class="mt-3 text-start ms-4">Preview:</h4>
                    <div  class="product col-9 mx-auto my-4">
                                    <div class="card  card-product-grid shadow" >
                                        <div class="img-wrap m-auto mt-3"> <img style="width: 100%; height: 17rem ; object-fit: cover;  overflow: hidden;"  id="preview_pic"  src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->image)?'uploads/'.$data->image:'img/blank.jpg'; ?>"> </div>
                                        <div class="info-wrap"> 
                                            <p id="preview_name" class="title m-3 text-center">
                                            <?php echo isset($data->product_name)?$data->product_name:'Product Name' ?>
                                            </p>
                                            <hr class="m-0">
                                        </div>
                                        <div class="bottom-wrap m-3 mx-4 d-flex align-items-center flex">
                                            <div class="price-wrap lh-sm text-start"> <strong class="price" id="preview_price">$<?php echo isset($data->sell_price)?$data->sell_price:'00.00' ?></strong> <br>
                                                <small class="text-muted" id="preview_stock">Only <?php echo isset($data->in_stock)?$data->in_stock:'0' ?>  left </small> </div>
                                        
                                                <a href="#" class=" btn btn-warning float-end ms-auto btn-sm"> Add to cart</a>
                                                <!-- price-wrap.// -->
                                        </div> <!-- bottom-wrap.// -->
                                    </div> <!-- card // -->
                                </div> <!-- col.// -->
            
        </div>
        <div class="ms-5 col-7 border justify-content-center rounded-2 bg-white shadow">
        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                <div class="col-3 justify-content-end">
                    <div class="d-flex justify-content-end align-content-center">
                        <!-- <form enctype="multipart/form-data" method="POST" role="presentation"> -->
                            <div class=" ">
                                <label class="form-label text-white m-1" for="picture">
                                    <img alt="Change profile photo" class="form-control-file rounded-circle shadow" 
                                        style="width: 5em; height: 5em; object-fit: cover;" id="pic_preview" src="<?php echo ''.URLROOT.'public/'?><?php echo (isset($data->image)And($data->image!=''))?'uploads/'.$data->image:'img/addPic.jpg'; ?>">
                                </label>
                                <input type="file" name="picture" id="picture" accept="image/gif, image/jpeg, image/png" class="form-control-file form-control d-none"  />
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-8 ms-5">
                    <h2 class="text-start" tabindex="">
                        <?php echo''.$_SESSION["email"].'' ?>
                    </h2>
                            <div class="text-secondary ">
                                <label class="form-label " for="picture">
                                Add a product picture.
                                </label>                    
                            </div>
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Product Name:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="true" id="product_name" placeholder="Product Name" value="<?php echo''.$data->product_name?$data->product_name:"".'' ?>" type="text"
                            class="w-75 rounded-2" name="product_name"
                           required >
                        <input name="caption" hidden id="caption" value="<?php echo''.$data->image?$data->image:NULL.'' ?>">
                    </div>
                </div>
                <div class="row justify-content-center align-items-start g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="description text-center">Description:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <textarea aria-required="true" id="description" placeholder="Description" type="text"
                            class="w-75 rounded-2" name="description" required
                            value=""><?php echo isset($data->description)?$data->description:'' ?></textarea>
                    </div>
                </div>

                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Sell Price:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="true" required step='0.01' min="0" id="sell_price" value="<?php echo isset($data->sell_price)?$data->sell_price:'' ?>" placeholder="Sell Price" type="number"
                            class="w-75 rounded-2" name="sell_price"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Cost Price:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false"  step='0.01' min="0" id="cost_price" value="<?php echo isset($data->cost_price)?$data->cost_price:'' ?>" placeholder="Cost Price" type="number"
                            class="w-75 rounded-2" name="cost_price">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">In Stock:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input required require min="0" id="in_stock" value="<?php echo isset($data->in_stock)?$data->in_stock:'' ?>" placeholder="In Stock" type="number"
                            class="w-75 rounded-2" name="in_stock"
                           >
                    </div>
                </div>
                
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveProfile"type="submit">Save Product</button>
                        <div>
                    </div>
                </div>
            </form> 
        </div>


</div>


<script>
	picture.onchange = evt => {
    
    const [file] = picture.files
    if (file) {
      pic_preview.src = URL.createObjectURL(file)
      preview_pic.src = URL.createObjectURL(file)
    }
  }
</script>
<script>
    $('input[name=product_name]').change(function() { 
        $('p#preview_name').text($(this).val().length>0?$(this).val():'Product Name');
     });
     $('input[name=sell_price]').change(function() { 
        $('strong#preview_price').text('$'+($(this).val().length>0?$(this).val():'39.50'));
     });
     $('input[name=in_stock]').change(function() { 
        $('small#preview_stock').text(($(this).val()>9?'':'Only ')+($(this).val().length>0?$(this).val():'4')+' left' );
     });
</script>

<?php require APPROOT . '/views/includes/footer.php'?>