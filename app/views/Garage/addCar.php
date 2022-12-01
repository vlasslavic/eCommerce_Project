<?php

use PHPUnit\Framework\Constraint\StringContains;

 require  APPROOT . '/views/includes/header.php'?>
<!--  if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';} -->
<div class="container mx-auto mt-4">
    <div class="row justify-content-center mx-auto">
        <div class="ms-5 col-7 border justify-content-center rounded-2 bg-white shadow">
        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                
                <div class="col-8 ms-5 mb-2">
                    <h2 class="text-center" tabindex="">
                    Add a car:
                    </h2>
                            
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Year:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                    <select required class="w-75 rounded-2 form-select" id="floatingSelect" aria-label="Floating label select example" name="year" id="year" > 
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
                    <select required class="w-75 rounded-2 form-select" id="floatingSelect2" aria-label="Floating label select example" name="make" id="make" > 
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
                            class="w-75 rounded-2" name="model"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Color:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input   id="color"  placeholder="Color" type="text"
                            class="w-75 rounded-2" name="color"
                           >
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Vin:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input  id="vin"  placeholder="Vin" type="text"
                            class="w-75 rounded-2" name="vin"
                           >
                    </div>
                </div>
                
                
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveCar"type="submit">Add Car</button>
                        <div>
                    </div>
                </div>
            </form> 
        </div>


</div>


<?php require APPROOT . '/views/includes/footer.php'?>
