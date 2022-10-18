<?php require  APPROOT . '/views/includes/header.php'; ?>

<div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card border-0 rounded-5 shadow-lg">
        <div class="card-body p-4">
          <div class="text-center">
            <div class="h1 fw-light">Contact Us - Messages Sent</div>
            <p class="mb-5 text-muted">Wow! Look at all those messages. We are famous now!</p>
          </div>
    <div class="col">

    <?php 
        foreach ($data as $val) 
        { 
            $dec = json_decode($val, true); 
            echo 
            '<div class="row-md-10 ">
                <div class="card rounded-3 my-3 "> 
                    <div class="card-body">
                        <h2 class="card-title">'.htmlspecialchars($dec['email'], ENT_QUOTES, 'UTF-8').'</h2>
                        <p class="card-text fs-5 "><span class="fs-2">" </span>'.htmlspecialchars($dec['message'], ENT_QUOTES, 'UTF-8').'</p>
                    </div>
                </div>
            </div>';
        }
    ?>        
        <h2 class="text-center">End</h2>
    </div>
</div>

</div>
      </div>
    </div>
  </div>
</div>
<?php require  APPROOT . '/views/Counter/read.php'; ?>