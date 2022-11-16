<?php require  APPROOT . '/views/includes/header.php'?>
<?php if((isset($data->isEnabled)?(!$data->isEnabled):FALSE) And !isset($_GET['info']) )
    {echo '<div class="alert alert-warning headline text-center -mt-2" role="alert">
            Your profile is disabled! Users won\'t be able to see your awesome store.
          </div>';}?>
<div class="container  mt-4">
    <div class="row align-items-start ">
        <div class="col-3 text-center border rounded-2 justify-content-center bg-white shadow">
             <div class="col text-start justify-content-center align-items-center g-2 mt-3 mb-5 ms-3 me-3">
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'Profile/settings';?>" class="btn btn-warning shadow-sm ">Profile Settings</a></div>
                <div class="row d-flex justify-content-center text-center"><a href="<?php echo''.URLROOT.'User/updatePassword';?>" class="mt-1 btn ">Change Password</a></div>
            </div>
            
        </div>
        <div class="ms-5 col-8 border justify-content-center rounded-2 bg-white shadow">
        <form enctype="multipart/form-data" method="POST" action="" role="presentation">
            <div class="row d-flex justify-content-center align-items-center g-2 mt-4">
                <div class="col-3 justify-content-end">
                    <div class="d-flex justify-content-end align-content-center">
                        <!-- <form enctype="multipart/form-data" method="POST" role="presentation"> -->
                            <div class=" ">
                                <label class="form-label text-white m-1" for="picture">
                                    <img alt="Change profile photo" class="form-control-file rounded-circle shadow"
                                        style="width: 5em; height: 5em; object-fit: cover;" id="pic_preview" src="<?php echo ''.URLROOT.'public/'?><?php echo isset($data->picture)?'uploads/'.$data->picture:'img/account.jpg'; ?>">
                                </label>
                                <input type="file" name="picture" id="picture" class="form-control-file form-control d-none"  />
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="col-8 ms-5">
                    <h2 class="text-start" tabindex="">
                        <?php echo''.$_SESSION["email"].'' ?>
                    </h2>
                            <div class="text-secondary ">
                                <label class="form-label " for="picture">
                                Change your profile picture.
                                </label>                    
                            </div>
                </div>
            </div>
            <!-- <form class="_ab43" method="post" action=""> -->
                <div class="row justify-content-center align-items-center g-2  mt-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_name text-center">Business Name:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="business_name" placeholder="Business Name" type="text"
                            class="w-75 rounded-2" name="business_name"
                            value="<?php echo isset($data->business_name)?$data->business_name:'' ?>">
                    </div>
                </div>
                <div class="row justify-content-center align-items-start g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="description text-center">Description:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <textarea aria-required="false" id="description" placeholder="Description" type="text"
                            class="w-75 rounded-2" name="description"
                            value=""><?php echo isset($data->description)?$data->description:'' ?></textarea>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="description text-center">Address:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <!-- This is an address autofill module using the Geoapify API -->
                        <!-- The value passed in order to display any current stored value -->
                        <div class="autocomplete-container" id="autocomplete-container" value="<?php echo isset($data->address)?$data->address:'' ?>"></div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="phone text-center">Business Phone:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="phone" placeholder="Business Phone" type="tel-national"
                            class="w-75 rounded-2" name="phone" pattern="\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$"
                            value="<?php echo isset($data->phone)?$data->phone:'' ?>">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2 mb-4">
                    <div class="col-3 text-end">
                        <label for="business_email">Business Email:</label>
                    </div>
                    <div class="col-8 ms-5 ">
                        <input aria-required="false" id="business_email" placeholder="Business Email" type="email"
                            class="w-75 rounded-2" name="business_email"
                            value="<?php echo isset($data->email)?$data->email:'' ?>">
                    </div>
                </div>
                <div class="row  justify-content-center align-items-center g-2  mt-2 mb-5">
                    <div class="col-3 text-end">
                    </div>
                    <div class="col-8 ms-5 justify-content-center align-items-center g-2">
                        <div class="w-75 d-flex  justify-content-center">
                            <button class=" btn btn-warning me-3 ps-4 pe-4 shadow" name="action" value="SaveProfile"type="submit">Submit</button>
                            <?php echo isset($data->profile_id)?'<a class="btn " href="visibilityProfile"  > '.($data->isEnabled==0?'Activate my account':'Temporarily deactivate my account'):''.' </a> '; ?>
                        <div>
                    </div>
                </div>
            </form> 
        </div>


</div>


<script>
	picture.onchange = evt => {
    
    const [file] = picture.files
    if (file) {
      pic_preview.src = URL.createObjectURL(file)
    }
  }
</script>

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
