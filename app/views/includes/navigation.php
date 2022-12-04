<header class=" bg-dark ">
      <div class="d-flex bg-dark flex-wrap text-white align-items-center mx-5 justify-content-center justify-content-md-between py-3 pt-2 ">
        <a href="/" class="d-flex align-items-center fs-1  mb-2 mb-lg-0 ms-3 text-white text-decoration-none ">
        <img alt=" profile picture" style="height:1.5em;" crossorigin="anonymous" raggable="false" src="<?php echo''.URLROOT.''?>public/img/logo.png">
        </a>
        
       
        <ul class="nav nav-pills nav-fill col-12 col-md-auto mb-2 justify-content-center fs-6 pt-2 mb-md-0 text-decoration-none">
            <?php $url =  "{$_SERVER['REQUEST_URI']}";
            $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
            echo'
          <li><a href="/" name="Home" class="nav-link text-decoration-none p-2 mx-2 '.((($escaped_url=="/") Or (str_contains($escaped_url, "/Main")))?'bg-warning text-black active':'text-white').'">Home</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 mx-2 '.((str_contains($escaped_url, "/Account"))?'bg-warning text-black active':'text-white').'">Catalog</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 mx-2 '.((str_contains($escaped_url, "/Shops"))?'bg-warning text-black active':'text-white').'">Shops</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 mx-2 '.((str_contains($escaped_url, "/FAQs"))?'bg-warning text-black active':'text-white').'">FAQs</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 mx-2 '.((str_contains($escaped_url, "/Main/about"))?'bg-warning text-black active':'text-white').'">About</a></li>
          '?>
        </ul>
        

        
      </div>
      <div class="d-flex flex-wrap align-items-center bg-light text-dark justify-content-between justify-content-md-between py-1 px-5 border-bottom" style="bg-color:#a6a6a6;">
        <form class="ms-3 input-group w-50 justify-content-start items-center d-flex col-12 col-lg-auto my-1" action="<?php echo''.URLROOT.'';?>Catalog/search" method="get"> 
                 <input hidden class="form-control btn-outline-warning" type="search" name="search_category" value="products">
                <input class="form-control btn-outline-warning" type="search" name="search_term" placeholder="Enter search term"  aria-label="Search" style="max-width:20em;">
                <button class="input-group-text" id="basic-addon1" type="submit" value="Search">
                    <i class="bi bi-search" ></i>
                </button>
            </form>

        <div class="d-flex flex-wrap align-items-center my-1 justify-content-center justify-content-lg-start">
        <?php if(!isCustomerLoggedIn() And !isSellerLoggedIn()){echo '
            <a type="button" href="'.URLROOT.'User/index'.'" class="btn btn-outline-dark me-2 text-decoration-none" name="Sign In">Sign In</a>
            <a type="button" href="'.URLROOT.'User/register'.'" class="btn btn-warning text-decoration-none" name="Sign Up">Sign Up</a>
        ';}?>
       <ul class="nav nav-pills d-flex align-items-center">
        <?php if(isSellerLoggedIn()){echo '   
            <li class="nav-item">
              <a class="nav-link text-decoration-none text-dark shadow-sm fs-6 fw-bold" aria-current="page" href="#">My Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-decoration-none text-dark fs-6 fw-bold hover:" aria-current="page" href="'.URLROOT.'Orders/list">Sales</a>
            </li>
            <li class="nav-item dropdown ">
              <a class=" nav-link dropdown-toggle text-decoration-none text-dark  fs-6 fw-bold" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Products<a/>
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-plus-circle-fill p-2"></i>Add Product</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-pen-fill p-2"></i>Modify Product</a></li>
                
              </ul>
            </li>
            <li class="nav-item dropdown ">
              <a class=" nav-link dropdown-toggle text-decoration-none text-dark  fs-6 fw-bold" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Appointments<a/>
              <ul class="dropdown-menu ">
<<<<<<< Updated upstream
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-plus-circle-fill p-2"></i>Add Service</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-pen-fill p-2"></i>Modify Appointments</a></li>
=======
                <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Service/addService"><i class="bi bi-plus-circle-fill p-2"></i>Add Service</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Service/list"><i class="bi bi-pen-fill p-2"></i>Modify Service</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Appointments/index"><i class="bi bi-calendar2-week-fill p-2"></i>My Appointments</a></li>
>>>>>>> Stashed changes
                
              </ul>
            </li>
            
            
        ';}?>
        

<<<<<<< Updated upstream
        <?php if(isCustomerLoggedIn()){ echo'
            <li>
              <i class="btn bi bi-cart-fill" style="font-size: 1.5rem;"></i>
            </li> 
        ';}?>
        <?php if(isCustomerLoggedIn()){ echo'
=======
        <?php if(isCustomerLoggedIn()){ 
            $count=0;
            $cart = new \app\models\Cart();
            $cart=$cart->getCart($_SESSION["user_id"]);
            if(isset($cart->order_id)){
              $cart=$cart->getAllItems($cart->order_id);
              $count = sizeof($cart);
                foreach (($cart) as $item) {
                if(($item->quantity)>1){
                $count+=(($item->quantity)-1);
                } 
              }
            };
          echo'
            <li class="nav-item">
              <a class="nav-link text-decoration-none text-dark fs-6 fw-bold hover:" aria-current="page" href="'.URLROOT.'Orders/myList">Orders</a>
            </li>
            <li class="nav-item dropdown ">
            <a class=" nav-link dropdown-toggle text-decoration-none text-dark  fs-6 fw-bold" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Garage<a/>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Garage/addCar"><i class="bi bi-plus-circle-fill p-2"></i>Add Car</a></li>
              <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Garage/myList"><i class="bi bi-pen-fill p-2"></i>Modify Garage</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class=" nav-link dropdown-toggle text-decoration-none text-dark  fs-6 fw-bold" data-bs-toggle="dropdown"  role="button" aria-expanded="false">Appointments<a/>
            <ul class="dropdown-menu ">
              <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Appointments/index"><i class="bi bi-calendar2-week-fill p-2"></i>My Appointments</a></li>
              
            </ul>
          </li>
            <li class="me-3">
                <a class="btn btn-outline-dark " href="'.URLROOT.'Cart/index" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-dark text-white ms-1 rounded-pill">
                '.((isset($count))?($count):('0')).'

                </span>
                </a>
            </li>
>>>>>>> Stashed changes
            <li class="nav-item dropdown" name="Profile Pic">
              <img alt="Image Placeholder" src="'.URLROOT.'public/img/account.jpg" class="rounded-circle shadow-4 nav-link dropdown-toggle " data-bs-toggle="dropdown"  role="button" aria-expanded="false""
                style="width: 5em;" alt="Avatar" name="Profile Pic" />
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-person-circle p-2"></i>Profile</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-gear-fill p-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a name="Logout" href="Main/logout"class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-door-open-fill p-2"></i>Logout</a></li>
              </ul>
            </li> 
          ';}?>
          <?php if(isSellerLoggedIn()){ echo'
            <li class="nav-item dropdown" name="Profile Pic">
              <img alt="Image Placeholder" src="'.URLROOT.'public/img/account.jpg" class="rounded-circle shadow-4 nav-link dropdown-toggle " data-bs-toggle="dropdown"  role="button" aria-expanded="false"
                style="width: 5em;" alt="Avatar" name="Profile Pic" />
              <ul class="dropdown-menu ">
                <li><a class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-person-circle p-2"></i>Profile</a></li>
                <li><a class="dropdown-item text-decoration-none text-dark" href="'.URLROOT.'Profile/settings"><i class="bi bi-gear-fill p-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a name="Logout" href="Main/logout" class="dropdown-item text-decoration-none text-dark" href="#"><i class="bi bi-door-open-fill p-2"></i>Logout</a></li>
              </ul>
            </li> 
          ';}?>
          </ul>
        </div>
        </div>
</header>