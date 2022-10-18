<header class="  fixed-top bg-dark ">
      <div class="d-flex bg-dark flex-wrap text-white align-items-center mx-5 justify-content-center justify-content-md-between py-3 pt-2 ">
        <a href="/" class="d-flex align-items-center fs-1  mb-2 mb-lg-0 ms-3 text-white text-decoration-none ">
        <img alt=" profile picture" style="height:2em;" crossorigin="anonymous" raggable="false" src="<?php echo''.URLROOT.''?>public/img/logo.png">
        </a>
        
       
        <ul class="nav nav-pills nav-fill col-12 col-md-auto mb-2 justify-content-center fs-6 pt-2 mb-md-0 text-decoration-none">
            <?php $url =  "{$_SERVER['REQUEST_URI']}";
            $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
            echo'
          <li><a href="/" class="nav-link text-decoration-none p-2 '.((($escaped_url=="/") Or (str_contains($escaped_url, "/Main")))?'bg-warning text-black active':'text-white').'">Home</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 '.((str_contains($escaped_url, "/Account"))?'bg-warning text-black active':'text-white').'">Catalog</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 '.((str_contains($escaped_url, "/Shops"))?'bg-warning text-black active':'text-white').'">Shops</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 '.((str_contains($escaped_url, "/FAQs"))?'bg-warning text-black active':'text-white').'">FAQs</a></li>
          <li><a href="#" class="nav-link text-decoration-none p-2 '.((str_contains($escaped_url, "/Main/about"))?'bg-warning text-black active':'text-white').'">About</a></li>
          ';?>
        </ul>
        

        
      </div>
      <div class="d-flex flex-wrap align-items-center bg-light text-dark justify-content-between justify-content-md-between py-1 px-5" style="bg-color:#a6a6a6;">
        <form class="ms-3 input-group w-50 justify-content-start items-center d-flex col-12 col-lg-auto my-1" action="Main/search" method="get"> 
                
                <input class="form-control btn-outline-warning" type="search" name="search_term" placeholder="Enter search term"  aria-label="Search" style="max-width:20em;">
                <button class="input-group-text" id="basic-addon1" type="submit" value="Search">
                    <i class="bi bi-search" ></i>
                </button>
            </form>

        <div class="d-flex flex-wrap align-items-center my-1 justify-content-center justify-content-lg-start">
            <a type="button" class="btn btn-outline-dark me-2 text-decoration-none">Login</a>
            <a type="button" class="btn btn-warning text-decoration-none">Sign-up</a>
            <a type="button" class="btn btn-light">
                    <i class="bi bi-cart" style="font-size: 1.5rem;"></i>
            </a>    
        </div>
        </div>
</header>
