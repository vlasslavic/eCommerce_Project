<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
            crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="http://localhost/public/img/favicon.ico">
        <link rel="stylesheet" href="http://localhost/public/css/styles.css">
        <script type="text/javascript" src="http://localhost/public/javascript/script.js"></script>
        <title>myRide</title>    
  
</head>
<body class="bg-light user-select-none">
    <!-- Display Announcements -->
<?php
    $coupon = new \app\models\Cart();
    $coupon = $coupon->getCoupon("WELCOME22");
    if(isset($coupon->description)){ 
           echo' <div class="alert alert-warning headline text-center m-0" role="alert">'.($coupon->description).'</div>';
     }
?>

<!-- Display Navigation -->
<?php require APPROOT . '/views/includes/navigation.php'?>
<<<<<<< Updated upstream
=======

<!-- Display Messages & Errors -->
<?php
	if(isset($_GET['error'])){ ?>
<div class="alert alert-danger headline text-center" role="alert">
    <?= $_GET['error'] ?>
</div>
<?php	}

if(isset($_GET['info'])){ ?>
<div class="alert alert-warning headline text-center" role="alert">
<?= $_GET['info'] ?>
</div>
<?php	}

if(isset($_GET['message'])){ ?>
<div class="alert alert-success headline text-center" role="alert">
    <?= $_GET['message'] ?>
</div>
<?php	}
?>
<?php if((isset($data->isEnabled)?(!$data->isEnabled)And(isSellerLoggedIn()):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center " role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';}?>
>>>>>>> Stashed changes
<main>




