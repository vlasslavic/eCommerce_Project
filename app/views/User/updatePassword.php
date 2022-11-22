<?php require  APPROOT . '/views/includes/header.php'?>;

<div class="container mt-4">
    <div class="row align-items-start ">
        <div class="col-3 text-center border rounded-2 justify-content-center bg-white shadow">
             <div class="col text-start justify-content-center align-items-center g-2 mt-3 mb-5 ms-3 me-3">
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'Profile/settings';?>" class=" btn ">Profile Settings</a></div>
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'User/updatePassword';?>" class="mt-1 btn btn-warning shadow-sm ">Change Password</a></div>
            </div>
        </div>
        <div class="ms-5 col-8 border justify-content-center rounded-2 bg-white shadow">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                <div class="col-3 justify-content-end">
                    <div class="d-flex justify-content-end align-content-center">
                        <form enctype="multipart/form-data" method="POST" role="presentation">
                            <div class=" ">
                                <label class="form-label text-white m-1" for="customFile2">
                                    <img alt="Change profile photo" class="form-control-file rounded-circle shadow"
                                        style="width: 5em; height: 5em; object-fit: cover;" src="<?php echo''.URLROOT.((isset($_SESSION['profile_pic']))?('public/uploads/'.$_SESSION['profile_pic']):('public/img/account.jpg')).''?>">

                                </label>
                                <input type="file" disabled class="form-control-file form-control d-none" id="customFile2" />
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-8 ms-5">
                    <h2 class="text-start" tabindex="">
                        <?php echo''.$_SESSION["email"].'' ?>
                    </h2>
                    
                    <form enctype="multipart/form-data" method="POST" role="presentation">
                            <div class="text-secondary ">
                                <label class="form-label " for="customFile2">
                                Let's change your password.
                                </label>
                                <input type="file" disabled class="form-control-file form-control d-none" id="customFile2" />
                            </div>

                        </form>    
                    
                </div>
            </div>
            <form class="_ab43" method="post" action="">
            <div class="row justify-content-center align-items-center mt-2 g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Current Password:</label>
                    </div>
                    <div class="col-8 ms-5 ">
            
                        <input aria-required="true" id="current_password" placeholder="Current Password" type="password"
                            class="w-75 rounded-2" name="current_password"
                            value="">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">New Password:</label>
                    </div>
                    <div class="col-8 ms-5 ">
            
                        <input aria-required="true" id="new_password" placeholder="New Password" type="password"
                            class="w-75 rounded-2" name="new_password"
                            value="">
                    </div>
                </div>
                
                <div class="row  justify-content-center align-items-center mt-2 g-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveProfile"type="submit">Save Password</button>
                        <div>
                    </div>
                </div>
            </form> 
        </div>


</div>

<?php require APPROOT . '/views/includes/footer.php'?>
