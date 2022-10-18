<?php

    

    function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
      
    function isAdminLoggedIn(){
      if(isset($_SESSION['adminSession'])){
        return true;
      } else {
        return false;
      }
    }

?>