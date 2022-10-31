  <!--This button will navigate to the top of this document-->
<a href="#myride" style=" transition:      all .25s ease-in-out;
  position:         fixed;
  bottom:           0;
  right:            0;
  display:          inline-flex;
  color:            #000000;
  cursor:           pointer;
  align-items:      center;
  justify-content:  center;
  margin:           0 2em 2em 0;
  border-radius:    50%;
  padding:          .25em;
  width:            3em;
  height:           3em;
  background-color: #F8F8F8;"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<circle style="fill:#FFD15D;" cx="256" cy="256" r="256"/>
<path style="fill:#F9B54C;" d="M303.092,507.661c103.784-19.299,185.558-101.2,204.662-205.053L327.02,121.292l-68.905-13.364  l-65.296,39.951l68.76,68.873l-17.646,232.324L303.092,507.661z"/>
<g>
	<path style="fill:#324A5E;" d="M329.388,123.63l-56.027-56.027c-6.732-6.732-17.648-6.732-24.381,0l-56.027,56.027   c-4.93,4.93-6.404,12.345-3.736,18.787c2.669,6.441,8.954,10.642,15.927,10.642h38.788v296.019h34.478V153.059h38.788   c6.971,0,13.259-4.201,15.927-10.642C335.794,135.975,334.319,128.56,329.388,123.63z"/>
</g>
<path style="fill:#2B3B4E;" d="M329.388,123.63l-56.027-56.027c-3.22-3.22-7.397-4.882-11.616-5.022v386.496h16.663V153.059h38.79  c6.971,0,13.259-4.201,15.927-10.642C335.794,135.975,334.319,128.56,329.388,123.63z"/>
<g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
<g></g><g></g><g></g><g></g>
</svg>  </a>  
  
# myRide
## Deliverable 2 - Feature Suite and ERD
*420-411-VA ECOMMERCE section 00002*    

We will build a Canadian Tire like Web application where registered customers can add their cars and schedule service appointments, track them and have history of previous records online; as well as buy relative products/accessories for their car.  
  
## Table of contents  
1. [List of Features](#our-project-will-support-the-following-feature-stories)
2. [Test Scenarions](#test-scenarios) 
2. [Database Design](#erd) 

## Team: BootstrapFTW   

##### Team Members:  

- [Veaceslav Vlas](https://github.com/vlasslavic)
- [Anthony Mastronardi](https://github.com/antho-mastro)
##### Teacher:  
- [Michel Paquette](https://github.com/paquettm)

<div style='page-break-after: always'></div>

## Our project will support the following feature stories:
 This is our complete list of features along with the reference to their Test scenarions:

| **As a** | **I can**                                                                                      |**Test Scenario #**  |
|:--------:|:-----------------------------------------------------------------------------------------------|:-----------------:|
|  Seller  | Register, login, and logout (these are not new features - they are given in class).            |[1](#feature-1-register),[2](#feature-2-login),[3](#feature-3-logout)             |
|  Seller  | Create, modify and disable my store profile (3 features).                                      |[4](#feature-4-create-profile),[5](#feature-5-modify-profile),[6](#feature-6-disable-profile)              |
|  Seller  | Add, modify and delete products for sale (3 features).                                         |[7](#feature-7-add-product),[8](#feature-8-modify-product),[9](#feature-9-delete-product)                    |
|  Seller  | View product sales, cancel an order or mark an order as shipped (3 features).                  |[10](#feature-10-view-sales),[11](#feature-11-cancel-order),[12](#feature-12-mark-order-shipped)       |
|  Seller  | Add, modify and delete services (3 features).                                                  |[13](#feature-13-add-service),[14](#feature-14-modify-service),[15](#feature-15-delete-service)        |
|  Seller  | View client appointments for service, modify appointment and cancel appointment (3 features).  |[16](#feature-16-view-appointments),[17](#feature-17-modify-client-appointment),[18](#feature-18-cancel-client-appointment)        |
|  Seller  | Change appointment status (1 features).                                                        |[19](#feature-19-change-appointment-status)                |
|  User    | Register, login, and logout (these are not new features - they are given in class).            |[1](#feature-1-register),[2](#feature-2-login),[3](#feature-3-logout)             |
|  User    | Add, modify, delete a car to/from my garage (Year/Make/Model/Engine/VIN) (3 features).         |[20](#feature-20-add-car),[21](#feature-21-modify-car),[22](#feature-22-delete-car)           |
|  User    | Schedule, modify and cancel my service appointment/s (3 features).                             |[23](#feature-23-schedule-my-appointment),[24](#feature-24-modify-my-appointment),[25](#feature-25-cancel-my-appointment)         |
|  User    | Check the status of the current service appointment (1 feature).                               |[26](#feature-26-view-my-appointment-status)                 |
|  User    | Can check past service records. (1 feature).                                                   |[27](#feature-27-view-past-records)                 |
|  User    | Search the product catalog (1 feature).                                                        |[28](#feature-28-search-product)                |
|  User    | See product details (1 feature).                                                               |[29](#feature-29-view-product-details)                 |
|  User    | Add, modify and remove quantities of products from/to shopping cart (3 features).              |[30](#feature-30-add-to-cart),[31](#feature-31-modify-cart),[32](#feature-32-remove-cart)           |
|  User    | Checkout my order (1 feature).                                                                 |[33](#feature-33-checkout-cart)                |
  
<div style='page-break-after: always'></div>  

## Test Scenarios:
This list contains the description of all test scenarios:
Legend:   
  * "**User**" - it is a general visitor of the web-application 
  * "**Customer**" - registered user with a "Customer" account;
  * "**Seller**"- registered user with a "Seller" account;


### Feature 1: Register    
In order to create an account, As a user, I need to click sign up, select the user type, fill form and click "Register" to create an account.
      
    Feature: register
        In order to create an account,
        As a "User",
        I need to click sign up, select the user type, fill form and click "Register" to create an account

    Scenario: try register a "Customer" account
        Given I am on "http://localhost/"
        When I click "Sign Up"
        Then I am on "http://localhost/User/register"
        And I see "Customer"
        And I see "Seller"
        When I click "Customer"
        Then I am on "http://localhost/User/registerCustomer"
        And I see "Let's register your Customer account"
        When I fill customer information
        And I click "Sign Up"
        Then I am on "http://localhost/User/index"
        And I see "Sign In"

    Scenario: try register a "Seller" account
        Given I am on "http://localhost/"
        When I click "Sign Up"
        Then I am on "http://localhost/User/register"
        And I see "Customer"
        And I see "Seller"
        When I click "Seller"
        Then I am on "http://localhost/User/registerSeller"
        And I see "Let's register your Seller account"
        When I fill seller information
        And I click "Sign Up"
        Then I am on "http://localhost/User/index"
        And I see "Sign In"

    Scenario: try cancel creating account 
        Given I am on "http://localhost/"
        When I click "Sign Up"
        Then I am on "http://localhost/User/register"
        And I see "Customer"
        And I see "Seller"
        When I click "Home"    
        Then I see Home Page
                                      
### Feature 2: Login    
In order to login, As a user, I need to click "Login", input my credentials and click "Login" to access my account.   

    Feature: login
        In order to login,
        As a "User",
        I need to click "Login", input my credentials and click "Login" to access my account

    Scenario: try login "Customer"
        Given I am on "http://localhost/"
        When I click "Sign In"
        Then I am on "http://localhost/User/index"
        When I input correct credentials
        And I click "Sign In"
        Then I am logged to "Customer" account

    Scenario: try login "Seller"
        Given I am on "http://localhost/"
        When I click "Sign In"
        Then I am on "http://localhost/User/index"
        When I input correct credentials
        And I click "Sign In"
        Then I am logged to "Seller" account

    Scenario: verify that any user cannot log in with wrong credentials
        Given I am on "http://localhost/"
        When I click "Sign In"
        Then I am on "http://localhost/User/index"
        When I input wrong credentials
        And I click "Sign In"
        Then I am on "http://localhost/User/index"

### Feature 3: Logout 
In order to logout, As a user, I need to click "Logout", to logout from my account.

    Feature: logout
        In order to logout
        As a "Customer or Seller"
        I need to click "Logout", to logout from my account

    Scenario: try logout from "Customer" account
        Given I am on "http://localhost/"
        And I am logged-in "Customer"
        When I click "Profile Pic"
        And I click "Logout"
        Then I am on "http://localhost/User/index"

    Scenario: try logout from "Seller" account
        Given I am on "http://localhost/"
        And I am logged-in "Seller"
        When I click "Profile Pic"
        And I click "Logout"
        Then I am on "http://localhost/User/index"

### Feature 4: Create Profile
In order to create a profile, As a "Seller", I need to have a "Seller" account.

    Feature: createProfile
        In order to create a profile
        As a "Seller"
        I need to have a "Seller" account

        Scenario: try createProfile as 'Seller'
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            When I click on "My Store" 
            Then I see "Let's register your Seller account"
            When I fill profile information
            And I click "Create Profile"
            Then I see "My Profile"

        Scenario: try createProfile as 'Seller' with profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click on "My Store" 
            Then I see "My Profile"

### Feature 5: Modify Profile
In order to modify my profile, As a "Seller", I need to have a "Seller" account and profile.

    Feature: modifyProfile
        In order to modify my profile
        As a "Seller"
        I need to have a "Seller" account and profile

        Scenario: try modifyProfile as a "Seller" with a profile created 
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Profile Pic"
            And I click "Settings"
            Then I see "Profile Form"
            When I fill profile information
            And I click "Save Profile"
            Then I am on "http://localhost/"
            And I see message "Account Modified"

        Scenario: try modifyProfile as a "Seller" without a profile created 
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Profile Pic"
            And I click "Settings"
            Then I see "Profile Form"
            And I see message "Let's Create your Profile"
            When I fill profile information
            And I click "Create Profile"
            Then I am on "http://localhost/Profile/index"
            And I see "My Profile"

### Feature 6: Disable Profile
In order to disable a profile, As a "Seller", I need to have a "Seller" account and a profile.

    Feature: disableProfile
        In order to disable a profile
        As a "Seller"
        I need to have a "Seller" account and a profile

        Scenario: try disableProfile as 'Seller'
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Profile Pic"
            And I click "Settings"
            Then I see "Disable Profile"
            When I click "Disable Profile"
            Then I am on "http://localhost/"
            And I see message "Account Disabled"

        Scenario: verify that a "Seller" can re-enable a profile after disabling it
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Profile Pic"
            And I click "Settings"
            Then I see "Enable Profile"
            When I click "Enable Profile"
            Then I am on "http://localhost/Profile/index"
            And I see message "Account Enabled"

### Feature 7: Add Product
In order to add a product, As a "Seller", I need to have a "Seller" account, a profile and click "Add Product" to add a new product.

    Feature: addProduct
        In order to add a product
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Add Product" to add a new product

        Scenario: try addProduct as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click “Products”
            And I click “Add Product”
            Then I see "Product Form"
            And I fill product information
            When I click “Add Product”
            Then I am on "http://localhost/Profile/productList"
            And I see message "Product Added"

        Scenario: try addProduct as a "Seller" without a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click “Products”
            And I click “Add Product”
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 8: Modify Product
In order to modify a product, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Product" to modify a product.

    Feature: modifyProduct
        In order to modify a product
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Product" to modify a product

        Scenario: try modifyProduct as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Products"
            And I click "Modify Product"
            Then I see "My Products List"
            When I click "Modify" next to the product I want to update
            Then I am on "http://localhost/Product/modify"
            And I see "Modify Form"
            When I fill product information
            And I click “Modify Product”
            Then I am on "http://localhost/Product/myProducts"
            And I see message "Product Modified"

        Scenario: try modifyProduct as a "Seller" with a profile and without products
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Products"
            Then I don't see "Modify Product"

        Scenario: try modifyProduct as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Products"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 9: Delete Product
In order to delete a product, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Product" to delete a product.

    Feature: deleteProduct
        In order to delete a product
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Product" to delete a product

        Scenario: try deleteProduct as a "Seller" with a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Products"
            And I click "Modify Product"
            Then I see "My Products List"
            When I click "Delete" next to the product I want to delete
            Then I see confirmation prompt
            When I click "Confirm"
            Then am on "http://localhost/Product/myProducts"
            And I see message "Product Deleted"

        Scenario: try deleteProduct as a "Seller" with a profile created and without products
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Products"
            Then I don't see "Modify Product"

        Scenario: try deleteProduct as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Products"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

        Scenario: try cancel deletingProduct as a "Seller" with a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Products"
            And I click "Modify Product"
            Then I see "My Products List"
            When I click "Delete" next to the product I want to delete
            Then I see confirmation prompt
            When I click "Cancel"
            Then am on "http://localhost/Product/myProducts"
            And I see "My Products List"

### Feature 10: View Sales
In order to view my sales, As a "Seller", I need to have a "Seller" account, a profile and click "Sales" to view my sales.

    Feature: viewSales
        In order to view my sales
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Sales" to view my sales

        Scenario: try viewSales as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I am on "http://localhost/Sales/mySales"
            And I see "My Sales List"


        Scenario: try viewSales as a "Seller" with a profile and without sales
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I don't see "Modify Product"
            And I see message "You don't have any Orders yet"

        Scenario: try viewSales as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Sales"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 11: Cancel Order
In order to cancel an order, As a "Seller", I need to have a "Seller" account, a profile and click "Sales" to cancel an order.

    Feature: cancelOrder
        In order to cancel an order
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Sales" to cancel an order

        Scenario: try cancelOrder as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I am on "http://localhost/Sales/mySales"
            And I see "My Sales List"
            When I click "Cancel" next to the order I want to cancel
            Then I see confirmation prompt
            When I click "Confirm"
            Then I am on "http://localhost/Sales/mySales"
            And I see message "Order Cancelled"

        Scenario: try cancelOrder as a "Seller" with a profile and without sales
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I don't see "Modify Product"
            And I see message "You don't have any Orders yet"

        Scenario: try cancelOrder as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Sales"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 12: Mark Order Shipped
In order to ship an order, As a "Seller", I need to have a "Seller" account, a profile and click "Sales" to ship an order.

    Feature: shipOrder
        In order to ship an order
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Sales" to ship an order

        Scenario: try shipOrder as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I am on "http://localhost/Sales/mySales"
            And I see "My Sales List"
            When I click "Fullfil" next to the order I want to ship
            Then I see confirmation prompt
            When I click "Confirm"
            Then I am on "http://localhost/Sales/mySales"
            And I see message "Order Cancelled"

        Scenario: try shipOrder as a "Seller" with a profile and without sales
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Sales"
            Then I see message "You don't have any Orders yet"

        Scenario: try shipOrder as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Sales"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 13: Add Service
In order to add a service, As a "Seller", I need to have a "Seller" account and a profile and click "Add Service" to add a new service.

    Feature: addService
        In order to add a service
        As a "Seller"
        I need to have a "Seller" account and a profile and click "Add Service" to add a new service

        Scenario: try addService as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            And I click “Add Service"
            Then I see "Service Form"
            And I fill service information
            When I click “Add Service"
            Then I am on "http://localhost/Appointment/myServices"
            And I see message "Service Added"

        Scenario: try addService as a "Seller" without a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 14: Modify Service
In order to modify a service, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Service" to modify a service.

    Feature: modifyService
        In order to modify a service
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Service" to modify a service

        Scenario: try modifyService as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            And I click "Modify Service"
            Then I am on "http://localhost/Appointment/myServices"
            And I see "My Service List"
            When I click "Modify" next to the service I want to update
            Then I am on "http://localhost/Appointment/modifyService"
            And I see "Modify Form"
            When I fill service information
            And I click "Modify Service"
            Then I am on "http://localhost/Appointment/myServices"
            And I see message "Service Modified"

        Scenario: try modifyService as a "Seller" with a profile and without service
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            Then I don't see "Modify Service"

        Scenario: try modifyService as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 15: Delete Service
In order to delete a service, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Service" to delete a service.

    Feature: deleteService
        In order to delete a service
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Service" to delete a service

        Scenario: try deleteService as a "Seller" with a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            And I click "Modify Service"
            Then I see "My Service List"
            When I click "Delete" next to the service I want to delete
            Then I see confirmation prompt
            When I click "Confirm"
            Then am on "http://localhost/Appointments/myServices"
            And I see message "Service Deleted"

        Scenario: try deleteService as a "Seller" with a profile created and without service
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            Then I don't see "Modify Service"

        Scenario: try deleteService as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

        Scenario: try cancel deleteService as a "Seller" with a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            And I click "Modify Service"
            Then I see "My Service List"
            When I click "Delete" next to the service I want to delete
            Then I see confirmation prompt
            When I click "Cancel"
            Then am on "http://localhost/Appointments/myServices"
            And I see "My Services List"

### Feature 16: View Appointments
In order to view my appointments, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Appointments" to view my appointments.

    Feature: viewAppointments
        In order to view my appointments
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Appointments" to view my appointments

        Scenario: try viewAppointments as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"


        Scenario: try viewAppointments as a "Seller" with a profile and without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I see message "You don't have any Appointments yet"

        Scenario: try viewAppointments as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

### Feature 17: Modify Client Appointment
In order to modify a client appointment, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Appointment" to modify an appointment.

    Feature: modifyAppointment
        In order to modify a client appointment
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Appointment" to modify an appointment

        Scenario: try modifyAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Modify" next to the appointment I want to modify
            Then I am on "http://localhost/Appointments/modifyAppointment"
            And I see "Modify Form"
            When I fill appointment information
            And I click "Modify Appointment"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see message "Appointment Modified"

        Scenario: try modifyAppointment as a "Seller" with a profile and without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            Then I don't see "Modify Appointments"
            And I see message "You don't have any Appointmets yet."

        Scenario: try modifyAppointment as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

        Scenario: try cancel modifyAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Modify" next to the appointment I want to modify
            Then I am on "http://localhost/Appointments/modifyAppointment"
            And I see "Modify Form"
            When I fill appointment information
            And I click "Cancel"
            Then I am on "http://localhost/Appointments/myAppointments"    

### Feature 18: Cancel Client Appointment
In order to cancel a client appointment, As a "Seller", I need to have a "Seller" account, a profile and click "Sales" to cancel an appointment.

    Feature: cancelAppointment
        In order to cancel a client appointment
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Sales" to cancel an appointment

        Scenario: try cancelAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Cancel" next to the appointment I want to cancel
            Then I see confirmation prompt
            When I click "Confirm"
            Then I am on "http://localhost/Sales/mySales"
            And I see message "Order Cancelled"

        Scenario: try cancelAppointment as a "Seller" with a profile and without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            Then I see message "You don't have any Appointments yet"

        Scenario: try cancelOrcancelAppointmentder as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

        Scenario: try cancel cancelAppointment as a "Seller" with a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Cancel" next to the appointment I want to cancel
            Then I see confirmation prompt
            When I click "Abort"
            Then I am on "http://localhost/Appointments/myAppointments"

### Feature 19: Change Appointment Status
In order to update the status of a client appointment, As a "Seller", I need to have a "Seller" account, a profile and click "Modify Appointment" to update the status of a client appointment.

    Feature: updateAppointment
        In order to update the status of a client appointment
        As a "Seller"
        I need to have a "Seller" account, a profile and click "Modify Appointment" to update the status of a client appointment

        Scenario: try updateAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Update Status" next to the appointment I want to update
            Then I am on "http://localhost/Appointments/updateAppointment"
            And I see "Update Form"
            When I fill appointment status information
            And I click "Update Status"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see message "Appointment Status Updated"

        Scenario: try updateAppointment as a "Seller" with a profile and without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click "Appointments"
            Then I don't see "Modify Appointments"
            And I see message "You don't have any Appointmets yet."

        Scenario: try updateAppointment as a "Seller" without a profile created
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I don't have profile
            When I click "Appointments"
            Then I am on "http://localhost/Profile/settings"
            And I see message "Let's Create your Profile first"

        Scenario: try cancel updateAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Seller"
            And I have profile
            When I click  "Appointments"
            And I click "Modify Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Update Status" next to the appointment I want to update
            Then I am on "http://localhost/Appointments/updateAppointment"
            And I see "Update Form"
            When I fill appointment status information
            And I click "Cancel"
            Then I am on "http://localhost/Appointments/myAppointments"

### Feature 20: Add Car
In order to add a car, As a "Customer", I need to have a "Customer" account and click "Add Car" to add a car to my garage.

    Feature: addCar
        In order to add a car
        As a "Customer"
        I need to have a "Customer" account and click "Add Car" to add a car to my garage

        Scenario: try addCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click “Add Car"
            Then I am on "http://localhost/Garage/addCar"
            Then I see "Car Form"
            And I fill car information
            When I click “Add Car"
            Then I am on "http://localhost/Garage/myGarage"
            And I see message "Car Added"

        Scenario: try cancel addCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "Add Car"
            Then I am on "http://localhost/Garage/addCar"
            Then I see "Car Form"
            And I fill car information
            When I click "Cancel"
            Then I am on "http://localhost/"

### Feature 21: Modify Car
In order to modify a car, As a "Customer", I need to have a "Customer" account and click "Modify Car" to modify a car.

    Feature: modifyCar
        In order to modify a car
        As a "Customer"
        I need to have a "Customer" account and click "Modify Car" to modify a car

        Scenario: try modifyCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Modify" next to the car I want to modify
            Then I am on "http://localhost/Garage/modifyCar"
            And I see "Modify Form"
            When I fill car information
            And I click "Modify Car"
            Then I am on "http://localhost/Garage/myGarage"
            And I see message "Car Modified"

        Scenario: try modifyCar as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"

        Scenario: try cancel modifyCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Modify" next to the car I want to modify
            Then I am on "http://localhost/Garage/modifyCar"
            And I see "Modify Form"
            When I fill car information
            And I click "Cancel"
            Then I am on "http://localhost/Garage/myGarage"

### Feature 22: Delete Car
In order to delete a car, As a "Customer", I need to have a "Customer" account and click "Modify Car" to delete a car.

    Feature:deleteCar
        In order to delete a car
        As a "Customer"
        I need to have a "Customer" account and click "Modify Car" to delete a car

        Scenario: try deleteCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Delete" next to the car I want to delete
            Then I see confirmation prompt
            When I click "Confirm"
            Then I am on "http://localhost/Garage/myGarage"
            And I see message "Car Deleted"

        Scenario: try deleteCar as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"

        Scenario: try cancel deleteCar as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Delete" next to the car I want to delete
            Then I see confirmation prompt
            And I click "Cancel"
            Then I am on "http://localhost/Garage/myGarage"

### Feature 23: Schedule My Appointment
In order to schedule a service appointment, As a "Customer", I need to have a "Customer" account and click "Schedule Appointment" to schedule an appointment.

    Feature: scheduleAppointment
        In order to schedule a service appointment
        As a "Customer"
        I need to have a "Customer" account and click "Schedule Appointment" to schedule an appointment

        Scenario: try scheduleAppointment as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click  "Appointments"
            And I click "Schedule Appointments"
            Then I am on "http://localhost/Appointments/scheduleAppointment"
            And I see "Appointments Form"
            When I fill appointment information
            And I click “Schedule Appointment”
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see message "Appointment Scheduled"

        Scenario: try scheduleAppointment as a "Customer" whithout cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Customer/addCar"
            And I see message "Let's Add a Car first"


        Scenario: try scheduleAppointment as a "User" without an account created
            Given I am on "http://localhost/"
            And I am not logged-in "Customer"
            When I click "Schedule Appointment"
            Then I am on "http://localhost/User/registerCustomer"
            And I see message "Let's Create a Customer Account first"

### Feature 24: Modify My Appointment
In order to modify a service appointment, As a "Customer", I need to have a "Customer" account and click "My Appointments" to modify a service appointment.

    Feature: changeAppointment
        In order to modify a service appointment
        As a "Customer"
        I need to have a "Customer" account and click "My Appointments" to modify a service appointment

        Scenario: try changeAppointment as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            And I click "My Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Modify" next to the appointment I want to modify
            Then I am on "http://localhost/Appointments/modifyAppointment"
            And I see "Modify Form"
            When I fill appointment information
            And I click "Modify Appointment"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see message "Appointment Modified"

        Scenario: try changeAppointment as a "Customer" without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Appointments/scheduleAppointment"
            And I see message "Let's Schedule an Appointment first"

        Scenario: try changeAppointment as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"

        Scenario: try cancel changeAppointment as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            And I click "My Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Modify" next to the appointment I want to modify
            Then I am on "http://localhost/Appointments/modifyAppointment"
            And I see "Modify Form"
            When I fill appointment information
            And I click "Cancel"
            Then I am on "http://localhost/Customer/myGarage"

### Feature 25: Cancel My Appointment
In order to cancel a service appointment, As a "Customer", I need to have a "Customer" account and click "My Appointments" to cancel a service appointment.

    Feature: cancelAppointment
        In order to cancel a service appointment
        As a "Customer"
        I need to have a "Customer" account and click "My Appointments" to cancel a service appointment

        Scenario: try cancelAppointment as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            And I click "My Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Cancel" next to the appointment I want to cancel
            Then I see confirmation prompt
            When I click "Confirm"
            Then I am on "http://localhost/"
            And I see message "Appointment Cancelled"

        Scenario: try cancelAppointment as a "Customer" without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Appointments/scheduleAppointment"
            And I see message "Let's Schedule an Appointment first"

        Scenario: try cancelAppointment as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"

        Scenario: try cancel cancelAppointment as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            And I click "My Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            When I click "Cancel" next to the appointment I want to cancel
            Then I see confirmation prompt
            When I click "Cancel"
            Then I am on "http://localhost/Appointments/myAppointments"

### Feature 26: View My Appointment Status
In order to view the status of a service appointment, As a "Customer", I need to have a "Customer" account and click "My Appointment" to view the status of a service appointment.

    Feature: viewAppointment
        In order to view the status of a service appointment
        As a "Customer"
        I need to have a "Customer" account and click "My Appointment" to view the status of a service appointment

        Scenario: try viewAppointment as a "Seller" with a profile
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            And I click "My Appointments"
            Then I am on "http://localhost/Appointments/myAppointments"
            And I see "My Appointments List"
            And I see "Status" next to the appointment I want

        Scenario: try viewAppointment as a "Customer" without appointments
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Appointments/scheduleAppointment"
            And I see message "Let's Schedule an Appointment first"

        Scenario: try viewAppointment as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "Appointments"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"

### Feature 27: View Past Records
In order to view past records of service appointments related to my car, As a "Customer", I need to have a "Customer" account and click "Past Records" to view past records of service appointments related to my car.

    Feature: viewRecords
        In order to view past records of service appointments related to my car
        As a "Customer"
        I need to have a "Customer" account and click "Past Records" to view past records of service appointments related to my car

        Scenario: try viewRecords as a "Customer"
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Past Records" next to the car I want
            Then I am on "http://localhost/Garage/pastRecords"
            And I see "Past Appointments List"

        Scenario: try viewRecords as a "Customer" without records
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            And I click "My Cars"
            Then I am on "http://localhost/Garage/myGarage"
            And I see "My Cars List"
            When I click "Past Records" next to the car I want
            Then I see message "Sorry: We don't have any previous history of this car."

        Scenario: try viewRecords as a "Customer" without cars
            Given I am on "http://localhost/"
            And I am logged-in "Customer"
            When I click "My Garage"
            Then I am on "http://localhost/Garage/addCar"
            And I see message "Let's Add a Car first"


### Feature 28: Search Product
In order to search for a product, As a "User", I need to input the name of the product and click "Search".

    Feature: searchProduct
        In order to search for a product
        As a "User"
        I need to input the name of the product and click "Search"

        Scenario: try searchProduct
            Given I am on "http://localhost/"
            And I input "charger"
            And I click "Search"
            Then I see "charger"

        Scenario: try searchProduct for a nonexistent product
            Given I am on "http://localhost/"
            And I input "charger"
            And I click "Search"
            Then I see message "Sorry, We haven't found the product you are looking for.."

### Feature 29: View Product Details
In order to view a product's details, As a "User", I need to click on the product card from the catalog.

    Feature: viewProduct
        In order to view a product's details
        As a "User"
        I need to click on the product card from the catalog

        Scenario: try viewProduct
            Given I am on "http://localhost/Catalog/index"
            And I am not logged-in
            When I click "Details"
            Then I am on "http://localhost/Catalog/product"
            And I see the product details

### Feature 30: Add To Cart
In order to add products to cart, As a "Customer", I need to have a "Customer" account and click "Add To Cart" from the product page.

    Feature: addToCart 
        In order to add products to cart
        As a "Customer"
        I need to have a "Customer" account and click "Add To Cart" from the product page

        Scenario: try addToCart
            Given I am on "http://localhost/Catalog/product"
            And I am logged-in "Customer"
            When I click "Add To Cart"
            Then I am on "http://localhost/Catalog/viewCart"
            And I see the added product

### Feature 31: Modify Cart
In order to modify products from cart, As a "Customer", I need to have a "Customer" account and click "Cart" from the any page.

    Feature: modifyCart
        In order to modify products from cart
        As a "Customer"
        I need to have a "Customer" account and click "Cart" from the any page

        Scenario: try modifyCart
            Given I am on "http://localhost/Catalog/viewCart"
            And I am logged-in "Customer"
            Then I see "My Cart List"
            When I click "+" 
            Then I see the quantity of the added product increment
            When I click "-" 
            Then I see the quantity of the added product increment

        Scenario: try modifyCart with empty cart
            Given I am on "http://localhost/Catalog/viewCart"
            And I am logged-in "Customer"
            And cart is empty
            Then I see message "Your cart is empty"
            And I see "Continue Shopping"
            When I click "Continue Shopping"
            Given I am on "http://localhost/Catalog/index"
            And I see "Products Gird"

### Feature 32: Remove Cart
In order to remove products from cart, As a "Customer", I need to have a "Customer" account and click "Remove" next to the product to remove.

    Feature: removeCart
        In order to remove products from cart
        As a "Customer"
        I need to have a "Customer" account and click "Remove" next to the product to remove

        Scenario: try removeCart
            Given I am on "http://localhost/Catalog/viewCart"
            And I am logged-in "Customer"
            Then I see "My Cart List"
            When I click "Remove" next to the product to remove
            Then I see the product disappear
            And I see "Subtotal" change

        Scenario: try removeCart with empty cart
            Given I am on "http://localhost/Catalog/viewCart"
            And I am logged-in "Customer"
            And cart is empty
            Then I see message "Your cart is empty"
            And I see "Continue Shopping"
            When I click "Continue Shopping"
            Given I am on "http://localhost/Catalog/index"
            And I see "Products Gird"

### Feature 33: Checkout Cart
In order to checkout, As a "Customer", I need to have a "Customer" account and click "Checkout" from the Cart page.

    Feature: checkout
        In order to checkout
        As a "Customer"
        I need to have a "Customer" account and click "Checkout" from the Cart page

        Scenario: try checkout
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        Then I see "My Cart List"
        When I click "Checkout" 
        Then I see "Products to Buy"
        And I see "Taxes and Total"
        When I click “Pay with Paypal"
        Then I see "Checkout Form"
        When I fill checkout information
        And I click "Continue"
        Then I am on "https://www.paypal.com/ca/home"
        When I complete paypall checkout
        Then I am on "http://localhost/Catalog/viewCart"
        And I see message "Thank You!"

        Scenario: try cancel checkout
        Given I am on "http://localhost/Catalog/viewCart"
        And I am logged-in "Customer"
        Then I see "My Cart List"
        When I click "Checkout" 
        Then I see "Products to Buy"
        And I see "Taxes and Total"
        When I click “Pay with Paypal"
        Then I see "Checkout Form"
        When I click "Cancel"
        Then I am on "http://localhost/Catalog/viewCart"
        And I see "My Cart List"
  
<div style='page-break-after: always'></div>  

## ERD:
 This picture shows the database design required for our implementation:

![Link to Diagram](https://github.com/vlasslavic/eCommerce_Project/blob/main/Deliverables/Database%20ER%20diagram.png)