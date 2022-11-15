<?php require  APPROOT . '/views/includes/header.php'?>;

<div class="container mt-5">
      <div class="row">
        <div class="col-md-5 ms-0">
          <img src="<?php echo''.URLROOT.''?>public/img/image1.jpg" alt="Image" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-7 contents mt-5">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="fs-1 text-center">Sign In</h3>
              <p class="mb-4 text-center">Let's log into your account.</p>
            </div>
            <form action="" method="post" class="">
              <div class="form-group first w-75 mx-auto">
                <label for="email">Email</label>
                <input type="email" class="form-control outline-danger " id="email" name="email">

              </div>
              <div class="form-group last w-75 mx-auto mb-4 mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>

              <span class="d-block text-center my-4 text-muted"><input type="submit" name="action"  value="Sign In" class="btn btn-block btn-warning shadow fs-4 fw-bold me-3">
              Don't have an account? <a href="<?php echo''.URLROOT.''?>User/register" class="fs-6 fw-bold text-black pl-4">Sign Up</a></span>
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>

  </div>