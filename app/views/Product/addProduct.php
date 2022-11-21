<?php require  APPROOT . '/views/includes/header.php'?>
<!--  if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';} -->
<div class="container  mt-4">
    <div class="row align-items-start ">
        <div class="col-3 text-center border rounded-2 justify-content-center bg-white shadow">
             <div class="col text-start justify-content-center align-items-center g-2 mt-3 mb-5 ms-3 me-3">
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'Profile/settings';?>" class="btn btn-warning shadow-sm ">Profile Settings</a></div>
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'User/updatePassword';?>" class="mt-1 btn ">Change Password</a></div>
            </div>
            
        </div>
        <div class="ms-5 col-8 border justify-content-center rounded-2 bg-white shadow">
        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                <div class="col-3 justify-content-end">
                    <div class="d-flex justify-content-end align-content-center">
                        <!-- <form enctype="multipart/form-data" method="POST" role="presentation"> -->
                            <div class=" ">
                                <label class="form-label text-white m-1" for="picture">
                                    <img alt="Change profile photo" class="form-control-file rounded-circle shadow"
                                        style="width: 5em; height: 5em; object-fit: cover;" id="pic_preview" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>">
                                </label>
                                <input type="file" name="picture" id="picture" class="form-control-file form-control d-none"  />
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
                                Change your profile picture.
                                </label>                    
                            </div>
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Business Name:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="business_name" placeholder="Business Name" type="text"
                            class="w-75 rounded-2" name="business_name"
                            value="<?php echo isset($data->business_name)?$data->business_name:'' ?>">
                    </div>
                </div>
                <div class="row justify-content-center align-items-start g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="description text-center">Description:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <textarea aria-required="false" id="description" placeholder="Description" type="text"
                            class="w-75 rounded-2" name="description"
                            value=""><?php echo isset($data->description)?$data->description:'' ?></textarea>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="description text-center">Address:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <!-- This is an address autofill module using the Geoapify API -->
                        <!-- The value passed in order to display any current stored value -->
                        <div class="autocomplete-container" id="autocomplete-container" value="<?php echo isset($data->address)?$data->address:'' ?>"></div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="phone text-center">Business Phone:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="phone" placeholder="Business Phone" type="tel-national"
                            class="w-75 rounded-2" name="phone" pattern="\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$"
                            value="<?php echo isset($data->phone)?$data->phone:'' ?>">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_email">Business Email:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="business_email" placeholder="Business Email" type="email"
                            class="w-75 rounded-2" name="business_email"
                            value="<?php echo isset($data->email)?$data->email:'' ?>">
                    </div>
                </div>
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveProfile"type="submit">Submit</button>
                            <?php echo isset($data->profile_id)?'<a class="btn " href="visibilityProfile"  > '.($data->isEnabled==0?'Activate my account':'Temporarily deactivate my account'):''.' </a> '; ?>
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
    }
  }
</script>



<?php require APPROOT . '/views/includes/footer.php'?>
