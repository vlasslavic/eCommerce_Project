<?php require  APPROOT . '/views/includes/header.php'; ?>
<div class="container px-5 my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card border-0 rounded-5 shadow-lg pb-4 pt-3">
        <div class="card-body p-4">
          <div class="text-center">
            <div class="h1 fw-light">Contact Us</div>
            <p class="mb-5 text-muted">Wanna reach us? Write your email and messahe in the folowing form an then submit!</p>
          </div>

          <form id="contactForm"  action="sendMessage" method="post">

            <!-- Email Input -->
            <div class="form-floating mb-3">
              <input class="form-control" id="email" name="email" type="email" placeholder="Email Address" required data-sb-validations="required,email" />
              <label for="emailAddress">Email Address</label>
            </div>

            <!-- Message Input -->
            <div class="form-floating mb-3">
              <textarea class="form-control" id="message" name="message" type="text" placeholder="Message" style="height: 10rem;" required data-sb-validations="required"></textarea>
              <label for="message">Message</label>
            </div>

            <!-- Submit button -->
            <div class="d-grid">
              <button class="btn btn-primary btn-lg mt-5"name="submit" type="submit">Submit</button>
            </div>
          </form>
          <!-- End of contact form -->

        </div>
      </div>
    </div>
  </div>
</div>


<?php require  APPROOT . '/views/Counter/read.php'; ?>