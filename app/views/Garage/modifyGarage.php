<?php require  APPROOT . '/views/includes/header.php'?>
<!--  if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';} -->
<div class="container  mx-auto mt-4">
    <div class="row justify-content-center  mx-auto">
        <div class="ms-5 col-7 border justify-content-center rounded-2 bg-white shadow">

        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                
                <div class="col-8 ms-5 mb-2">
                    <h2 class="text-center" tabindex="">
                    Modify my car:
                    </h2>
                            
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Year:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                    <select required class="w-75 rounded-2 form-select" value="default" id="floatingSelect" aria-label="Floating label select example" name="year" id="year"  > 
                    <?php echo'<option   value="'.(isset($data->year)?($data->year):'').'">'.(isset($data->year)?($data->year):'').'</option>' ?> 
                        <?php foreach ($data->yearSelect as $dataes) 
                        { echo'<option   value="'.$dataes.'">'.$dataes.'</option>';}?> 
                    </select>

                    
                        

                        
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Make:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                    <select required class="w-75 rounded-2 form-select" id="floatingSelect2" aria-label="Floating label select example" name="make" id="make" value="default" > 
                    <?php echo'<option   value="'.(isset($data->make)?($data->make):'').'">'.(isset($data->make)?($data->make):'').'</option>' ?>
                        <?php
                         foreach ($data->makeSelect->data as $datas) { 
                        echo'<option   value="'.$datas->name.'">'.$datas->name.'</option>';}?>
                    </select>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Model:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input required aria-required="true"   id="model"  placeholder="Model" type="text"
                            class="w-75 rounded-2" name="model" value="<?php echo''.(isset($data->model)?($data->model):'').'' ?>"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Color:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input   id="color"  placeholder="Color" type="text"
                            class="w-75 rounded-2" name="color" value="<?php echo''.(isset($data->color)?($data->color):'').'' ?>"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Vin:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input  id="vin"  placeholder="Vin" type="text"
                            class="w-75 rounded-2" name="vin" value="<?php echo''.(isset($data->vin)?($data->vin):'').'' ?>"
                           >
                    </div>
                </div>
                
                
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveCar"type="submit">Save Car</button>
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
