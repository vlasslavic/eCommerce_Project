<?php require  APPROOT . '/views/includes/header.php'?>;
<div class="container mt-5">
      <div class="row">
        <div class="col-md-5 ms-0">
          <img src="<?php echo''.URLROOT.''?>public/img/image2.jpg" alt="Image" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-7 contents mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="fs-1 text-center">Sign Up</h3>
              <p class="mb-4 text-center">Let's register your Seller account.</p>
              <?php
                  if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?= $_GET['error'] ?>
                </div>
                <?php	}
                  if(isset($_GET['message'])){ ?>
                <div class="alert alert-success" role="alert">
                  <?= $_GET['message'] ?>
                </div>
                <?php	}
              ?>
            </div>
            <form action="" method="post" name="Registration Form">
              <div class="form-group first mb-4 mt-3 w-75 mx-auto">
                <label for="email">Email</label>
                <input type="email" class="form-control outline-danger" id="email" name="email">
              </div>
              <div class="form-group  mb-4 mt-3 w-75 mx-auto">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group last mb-4 mt-3 w-75 mx-auto">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              </div>
              
              <span class="d-block text-center my-4 text-muted"><input type="submit" name="action"  value="Sign Up" class="btn btn-block btn-warning shadow fs-4 fw-bold me-3">
              Already have an account? <a href="<?php echo''.URLROOT.''?>User/index" class="fs-6 fw-bold text-black pl-4">Sign In</a></span>
         
            </form>
            </div>
          </div>
          
        </div>
        
      </div>

  </div>