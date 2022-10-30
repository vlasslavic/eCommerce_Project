Feature: addProduct
    In order to add a product
    As a "Seller"
    I need to have a "Seller" account and a profile and click "Add Product" to add a new product

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
