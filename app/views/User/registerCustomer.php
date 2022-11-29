<?php require  APPROOT . '/views/includes/header.php'?>;
<div class="container mt-5 mb-5">
      <div class="row">
        <div class="col-md-5 ms-0">
          <img src="<?php echo''.URLROOT.''?>public/img/image3.jpg" alt="Image" class="img-fluid rounded-4 shadow">
        </div>
        <div class="col-md-7 contents mt-1">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3 class="fs-1 text-center">Sign Up</h3>
              <p class="mb-4 text-center">Let's register your Customer account.</p>
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
              <div class="form-group mb-4 mt-3 w-75 mx-auto">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group mb-4 mt-3 w-75 mx-auto">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              </div>
              <div class="form-group mb-4 mt-3 w-75 mx-auto">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" id="fname" name="first_name">

              </div>
              <div class="form-group mb-4 mt-3 w-75 mx-auto">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control" id="lname" name="last_name">
              </div>
              <div class="form-group last mb-4 mt-3 w-75 mx-auto">
                <label for="address">Address</label>
                <div class="register autocomplete-container" id="autocomplete-container" value="<?php echo isset($data->address)?$data->address:'' ?>"></div>
                <!-- <input type="address" class="form-control" id="address" name="address"> -->
              </div>
              

              <span class="d-block text-center my-4 text-muted"><input type="submit" name="action"  value="Sign Up" class="btn btn-block btn-warning shadow fs-4 fw-bold me-3">
              Already have an account? <a href="<?php echo''.URLROOT.''?>User/index" class="fs-6 fw-bold text-black pl-4">Sign In</a></span>
              
              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>

  </div>


<!-- Script to power the Address Autofill function -->
<script>
  
  function addressAutocomplete(containerElement, callback, options) {
  // create input element
  var storedVal = document.getElementById("autocomplete-container").getAttribute("value");
  var inputElement = document.createElement("input");
  inputElement.setAttribute("type", "text");
  inputElement.setAttribute("value", storedVal);
  inputElement.setAttribute("name", "address");
  inputElement.setAttribute("class", "rounded-2");
  inputElement.setAttribute("style","width: 100%;");
  inputElement.setAttribute("placeholder", options.placeholder);
  containerElement.appendChild(inputElement);

  // add input field clear button
  var clearButton = document.createElement("div");
  clearButton.classList.add("clear-button");
  addIcon(clearButton);
  clearButton.addEventListener("click", (e) => {
    e.stopPropagation();
    inputElement.value = '';
    callback(null);
    clearButton.classList.remove("visible");
    closeDropDownList();
  });
  containerElement.appendChild(clearButton);

  /* Current autocomplete items data (GeoJSON.Feature) */
  var currentItems;

  /* Active request promise reject function. To be able to cancel the promise when a new request comes */
  var currentPromiseReject;

  /* Focused item in the autocomplete list. This variable is used to navigate with buttons */
  var focusedItemIndex;

  /* Execute a function when someone writes in the text field: */
  inputElement.addEventListener("input", function(e) {
    var currentValue = this.value;

    /* Close any already open dropdown list */
    closeDropDownList();

    // Cancel previous request promise
    if (currentPromiseReject) {
      currentPromiseReject({
        canceled: true
      });
    }

    if (!currentValue) {
      clearButton.classList.remove("visible");
      return false;
    }

    // Show clearButton when there is a text
    clearButton.classList.add("visible");

    /* Create a new promise and send geocoding request */
    var promise = new Promise((resolve, reject) => {
      currentPromiseReject = reject;

      var apiKey = "7ddeb7dd301c414181cbaf71821576b0";
      var url = `https://api.geoapify.com/v1/geocode/autocomplete?text=${encodeURIComponent(currentValue)}&limit=5&filter=countrycode:ca&bias=countrycode:ca&apiKey=${apiKey}`;
      
      if (options.type) {
      	url += `&type=${options.type}`;
      }

      fetch(url)
        .then(response => {
          // check if the call was successful
          if (response.ok) {
            response.json().then(data => resolve(data));
          } else {
            response.json().then(data => reject(data));
          }
        });
    });

    promise.then((data) => {
      currentItems = data.features;

      /*create a DIV element that will contain the items (values):*/
      var autocompleteItemsElement = document.createElement("div");
      autocompleteItemsElement.setAttribute("class", "autocomplete-items");
      containerElement.appendChild(autocompleteItemsElement);

      /* For each item in the results */
      data.features.forEach((feature, index) => {
        /* Create a DIV element for each element: */
        var itemElement = document.createElement("DIV");
        /* Set formatted address as item value */
        itemElement.innerHTML = feature.properties.formatted;

        /* Set the value for the autocomplete text field and notify: */
        itemElement.addEventListener("click", function(e) {
          inputElement.value = currentItems[index].properties.formatted;

          callback(currentItems[index]);

          /* Close the list of autocompleted values: */
          closeDropDownList();
        });

        autocompleteItemsElement.appendChild(itemElement);
      });
    }, (err) => {
      if (!err.canceled) {
        console.log(err);
      }
    });
  });

  /* Add support for keyboard navigation */
  inputElement.addEventListener("keydown", function(e) {
    var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
    if (autocompleteItemsElement) {
      var itemElements = autocompleteItemsElement.getElementsByTagName("div");
      if (e.keyCode == 40) {
        e.preventDefault();
        /*If the arrow DOWN key is pressed, increase the focusedItemIndex variable:*/
        focusedItemIndex = focusedItemIndex !== itemElements.length - 1 ? focusedItemIndex + 1 : 0;
        /*and and make the current item more visible:*/
        setActive(itemElements, focusedItemIndex);
      } else if (e.keyCode == 38) {
        e.preventDefault();

        /*If the arrow UP key is pressed, decrease the focusedItemIndex variable:*/
        focusedItemIndex = focusedItemIndex !== 0 ? focusedItemIndex - 1 : focusedItemIndex = (itemElements.length - 1);
        /*and and make the current item more visible:*/
        setActive(itemElements, focusedItemIndex);
      } else if (e.keyCode == 13) {
        /* If the ENTER key is pressed and value as selected, close the list*/
        e.preventDefault();
        if (focusedItemIndex > -1) {
          closeDropDownList();
        }
      }
    } else {
      if (e.keyCode == 40) {
        /* Open dropdown list again */
        var event = document.createEvent('Event');
        event.initEvent('input', true, true);
        inputElement.dispatchEvent(event);
      }
    }
  });

  function setActive(items, index) {
    if (!items || !items.length) return false;

    for (var i = 0; i < items.length; i++) {
      items[i].classList.remove("autocomplete-active");
    }

    /* Add class "autocomplete-active" to the active element*/
    items[index].classList.add("autocomplete-active");

    // Change input value and notify
    inputElement.value = currentItems[index].properties.formatted;
    callback(currentItems[index]);
  }

  function closeDropDownList() {
    var autocompleteItemsElement = containerElement.querySelector(".autocomplete-items");
    if (autocompleteItemsElement) {
      containerElement.removeChild(autocompleteItemsElement);
    }

    focusedItemIndex = -1;
  }

  function addIcon(buttonElement) {
    var svgElement = document.createElementNS("http://www.w3.org/2000/svg", 'svg');
    svgElement.setAttribute('viewBox', "0 0 24 24");
    svgElement.setAttribute('height', "24");

    var iconElement = document.createElementNS("http://www.w3.org/2000/svg", 'path');
    iconElement.setAttribute("d", "M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z");
    iconElement.setAttribute('fill', 'currentColor');
    svgElement.appendChild(iconElement);
    buttonElement.appendChild(svgElement);
  }
  
    /* Close the autocomplete dropdown when the document is clicked. 
  	Skip, when a user clicks on the input field */
  document.addEventListener("click", function(e) {
    if (e.target !== inputElement) {
      closeDropDownList();
    } else if (!containerElement.querySelector(".autocomplete-items")) {
      // open dropdown list again
      var event = document.createEvent('Event');
      event.initEvent('input', true, true);
      inputElement.dispatchEvent(event);
    }
  });

}

addressAutocomplete(document.getElementById("autocomplete-container"), (data) => {
  console.log("Selected option: ");
  console.log(data);
}, {
	placeholder: "Enter an address here"
});
</script>

  <?php require APPROOT . '/views/includes/footer.php'?>