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
              <h3 class="fs-1">Sign In</h3>
              <p class="mb-4">Let's log into your account.</p>
            </div>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="email" class="form-control outline-danger" id="email">

              </div>
              <div class="form-group last mb-4 mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
              </div>

              <input type="submit" value="Sign In" class="btn btn-block btn-warning shadow">

              <span class="d-block text-left my-4 text-muted">Don't have an account? <a href="<?php echo''.URLROOT.''?>User/register" class="fs-6 fw-bold text-black pl-4">Sign Up</a></span>
              
              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span> 
                </a>
              </div>
            </form>
            </div>
          </div>
          
        </div>
        
      </div>

  </div>