<?php require  APPROOT . '/views/includes/header.php'?>

<div class="container my-5">
    
    <h3 class="text-center">Contact us</h3><br />

<div class="row">
  <div class="col-md-7">
       <form  id="contactForm" action= "https://formspree.io/f/mlevygrd" method="POST" data-sb-form-api-token="API_TOKEN">
        <input class="form-control input-lg" name="name" placeholder="Name..." /><br />
        <input class="form-control input-lg" name="phone" placeholder="Phone..." /><br />
        <input class="form-control input-lg" name="email" placeholder="E-mail..." /><br />
        <textarea class="form-control input-lg" name="text" placeholder="How can we help you?" style="height:150px;"></textarea><br />
        <input class="btn btn-warning btn-lg fs-5" type="submit" value="Send" /><br /><br />
      </form>
  </div>
  <div class="col-md-4 fs-5 ms-4">

    <b>Customer service:</b> <br />
    Phone: +1 514-574-9744<br />
    E-mail: <a href="mailto:support@mysite.com">support@mysite.com</a><br />
    <br />
    <b>Headquarter:</b><br />
    Vanier College, <br />
    821 Av. Sainte-Croix, Saint-Laurent<br />
    Phone: +1 514-574-9744<br />
    <a href="mailto:usa@mysite.com">usa@mysite.com</a><br />


    <br />
    <b>Canada:</b><br />
    Company My Ride, <br />
    Canada, Quebec <br />
    Phone: +1 514-574-9744<br />
    <a href="mailto:hk@mysite.com">Qc@mysite.com</a><br />



  </div>
</div>
</div>
</div>
</div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>