<?php require  APPROOT . '/views/includes/header.php'?>;
<div class="container pt-5 ">
<h1 class="text-center fs-3 fw-bold mb-4" >Select an account type:</h1>
    <div class=" d-flex justify-content-center align-items-center pt-4" >
            <a href="<?php echo''.URLROOT.''?>User/registerCustomer" class="text-decoration-none text-dark" name="Customer">
                <div class="card mx-5 shadow" style="width: 19rem; height: 400px; ">
                <img src="<?php echo''.URLROOT.'' ?>/public/img/undraw_By_my_car_re_j3jt.png" class="card-img-top " alt="..."  height="200" >
                    <div class="card-body">
                        <h5 class="card-title fs-2">Customer</h5>
                        <p class="card-text pb-3">Set appointments with verified repair shops, have your car maintenance history and shop car products, all in one place.</p>
                    
                    </div>
                </div>
            </a>
            <a href="<?php echo''.URLROOT.''?>User/registerSeller" class="text-decoration-none text-dark" name="Seller">
                <div class="card mx-5 shadow" style="width: 19rem; height: 400px;" >
                <img src="<?php echo''.URLROOT.'' ?>/public/img/undraw_web_shopping_re_owap.png" class="card-img-top" alt="..."  height="200" >
                    <div class="card-body">
                        <h5 class="card-title fs-2">Seller</h5>
                        <p class="card-text pb-3">Reach more customers, post services and appoiments availabilities, post products and monitor your sales, all in one place.</p>
                        
                    </div>
                </div>
            </a>
    </div>
</div>